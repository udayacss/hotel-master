<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation_requirements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->index();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');

            $table->integer('units')->default(0);
            $table->decimal('requested_capacity',20,2)->default(0);
            $table->unsignedBigInteger('project_type')->nullable();
            $table->unsignedBigInteger('phase_type')->nullable();
            $table->unsignedBigInteger('system_type')->nullable();
            $table->unsignedBigInteger('panel_origin_type')->nullable();
            $table->unsignedBigInteger('inverter_type')->nullable();
            $table->unsignedBigInteger('battery_type')->nullable();
            $table->unsignedBigInteger('system_brand')->nullable();

            $table->string('quotation_path')->nullable();

            $table->tinyInteger('status')->default(0)->comment('0 : requested 1: quotation sent');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotation_requirements');
    }
};
