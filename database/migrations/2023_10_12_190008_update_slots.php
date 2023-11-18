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
       Schema::table('boards',function (Blueprint $table){
        $table->unsignedBigInteger('slot_ten')->after('slot_nine')->nullable();
        $table->unsignedBigInteger('slot_eleven')->after('slot_ten')->nullable();
        $table->unsignedBigInteger('slot_twelve')->after('slot_eleven')->nullable();
        $table->unsignedBigInteger('slot_thirteen')->after('slot_twelve')->nullable();


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
