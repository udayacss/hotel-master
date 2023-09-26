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
        Schema::create('price_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('grid_type_id')->nullable();
            $table->unsignedBigInteger('panel_type_id')->nullable();
            $table->unsignedBigInteger('inverter_type_id')->nullable();
            $table->unsignedBigInteger('phase_type_id')->nullable();
            $table->decimal('capacity')->nullable();
            $table->integer('max_units')->nullable();
            $table->decimal('average_bill')->nullable();
            $table->decimal('price')->nullable();

            $table->date('valid_from')->nullable();
            $table->date('valid_to')->nullable();

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
        Schema::dropIfExists('price_lists');
    }
};
