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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("password");
            $table->string("email");
            $table->string("contact");
            $table->string("semester");
            $table->string("hobby");
            $table->string("gender");
            $table->string("color");
            $table->string("interest");
            $table->string("dob");
            $table->string("month");
            $table->string("url");
            $table->string("photo");
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
        Schema::dropIfExists('students');
    }
};
