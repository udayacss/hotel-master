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
        Schema::create('board_slots', function (Blueprint $table) {
            $table->id();
          
            $table->unsignedBigInteger('board_id');
            $table->unsignedBigInteger('seller_id')->nullable()->comment('seller_idl');
            $table->unsignedBigInteger('ref_seller_id')->nullable()->comment('seller_id of referral');
     
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
        Schema::dropIfExists('board_slots');
    }
};
