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
        Schema::create('seller_earnings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('board_slot_id');
            $table->unsignedBigInteger('seller_id');
            $table->string('type',20)->default('DIRECT_SALE');
            $table->integer('points')->default(0);
            $table->tinyInteger('status')->comment('0=not paid 1 = paid');
            $table->timestamp('paid_at')->nullable();
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
        Schema::dropIfExists('seller_earnings');
    }
};
