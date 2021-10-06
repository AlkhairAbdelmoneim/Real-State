<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingsTable extends Migration
{

    public function up()
    {
        Schema::create('buildings', function (Blueprint $table) {
            $table->id();
            $table->string('bu_name' , 100);
            $table->string('bu_place' , 50);
            $table->string('bu_price' , 20);
            $table->string('bu_square' , 10);
            $table->integer('rooms');
            $table->string('bu_smail_dis' , 160)->default('no data'); // Standards discription of google 
            $table->string('bu_meta' , 200);
            $table->string('bu_langtude' , 50);
            $table->string('bu_latitude' , 50);
            $table->longText('bu_larg_dis');
            $table->tinyInteger('bu_type')->default(1);
            $table->integer('bu_rent');
            $table->tinyInteger('bu_status')->default(0);
            $table->string('bu_image' ,100)->default('default.png');
            $table->integer('user_id');
            $table->string('month' , 3);
            $table->string('year' , 4);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('buildings');
    }
}
