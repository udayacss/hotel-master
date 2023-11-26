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
        Schema::table('seller_earnings', function (Blueprint $table) {
            $table->unsignedBigInteger('paid_by')->nullable();
            $table->unsignedBigInteger('seller_withdrawal_id')->nullable();
        });
        Schema::create('seller_withdrawals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seller_id');
            $table->string('type',20)->default('DIRECT_SALE');
            $table->integer('amount')->default(0);
            $table->timestamp('paid_at')->nullable();
            $table->unsignedBigInteger('paid_by')->nullable();
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
        //
    }
};
