<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactUsTable extends Migration
{

    public function up()
    {
        Schema::create('conact-us', function (Blueprint $table) {
            $table->id();
            $table->string('name' , 50);
            $table->string('email' , 20);
            $table->string('phone' , 20);
            $table->string('address' , 30);
            $table->string('contact_type');
            $table->longText('message');
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('conact-us');
    }
}
