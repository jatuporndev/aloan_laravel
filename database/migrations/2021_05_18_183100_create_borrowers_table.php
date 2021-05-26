<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrowers', function (Blueprint $table) {
            $table->bigIncrements('BorrowerID');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('phone');
            $table->string('address');
            $table->char('gender', 1)->nullable();
            $table->date('birthday')->nullable();
            $table->string('job');
            $table->string('married')->nullable();
            $table->integer('salary');
            $table->string('IDCard');
            $table->string('IDCard_back');
            $table->string('bank');
            $table->string('IDBank');
            $table->string('LineID')->nullable();
            $table->string('image_face')->nullable();
            $table->string('image_IDCard')->nullable();
            $table->string('imageProfile')->nullable();
            $table->string('signature')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('verify')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('borrowers');
    }
}
