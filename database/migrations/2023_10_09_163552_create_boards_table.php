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
        Schema::create('boards', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->unsignedBigInteger('owner_seller_id');
            $table->unsignedBigInteger('slot_one')->nullable()->comment('seller_id of referral');
            $table->unsignedBigInteger('slot_two')->nullable();
            $table->unsignedBigInteger('slot_three')->nullable();
            $table->unsignedBigInteger('slot_four')->nullable();
            $table->unsignedBigInteger('slot_five')->nullable();
            $table->unsignedBigInteger('slot_six')->nullable();
            $table->unsignedBigInteger('slot_seven')->nullable();
            $table->unsignedBigInteger('slot_eight')->nullable();
            $table->unsignedBigInteger('slot_nine')->nullable();

            
            
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
        Schema::dropIfExists('boards');
    }
};
