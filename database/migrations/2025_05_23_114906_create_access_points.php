<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccessPoints extends Migration {

    public function up() {
      Schema::create('access_points', function (Blueprint $table) {
        $table->increments('id');
          $table->string('title')->nullable();
        $table->text('content')->nullable();
        $table->string('category');
      
        $table->integer('active')->default(1); 
        $table->integer('sort')->default(1); 
        $table->integer('status')->default(1); 
        $table->integer('created_by')->nullable()->default('0'); 
        $table->integer('updated_by')->nullable()->default('0'); 
        $table->softDeletes(); 
        $table->timestamps();
      });
    }

    public function down() {
      Schema::drop('access_points');
    }

}
