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
        Schema::create('seller_subcriptions', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->unsignedBigInteger('seller_id');
            $table->unsignedBigInteger('level_id');

            $table->string('bank_ref')->nullable();
            $table->string('ref_no');
            $table->tinyInteger('status')->default(0)->comment(' 0 - pending 1 - checked');
            $table->tinyInteger('achieved')->default(0)->comment(' 0 - pending 1 - completed');

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
        Schema::dropIfExists('seller_subcriptions');
    }
};
