<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMobileNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobile_numbers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type')->nullable();
            $table->string('mobile_no_without_plus')->unique();
            $table->string('mobile_no_with_plus')->unique();
            $table->string('national_number')->unique();
            $table->string('formatted_number')->unique();
            $table->string('country');
            $table->string('calling_code');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->OnDelete('cascade');
            
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
        Schema::dropIfExists('mobile_numbers');
    }
}
