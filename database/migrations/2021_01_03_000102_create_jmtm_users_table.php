<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJmtmUsersTable extends Migration {
  public function up() {
    Schema::create('jmtm_users', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('id_device')->unsigned();
      $table->string('name');
      $table->string('npp')->nullable();
      $table->string('ip_address')->nullable();
      $table->string('mac_address')->nullable();
      $table->string('pc_name')->nullable();
      $table->string('pc_password')->nullable();
      $table->integer('printer');
      $table->text('description')->nullable();
      $table->integer('active')->default(1);
      $table->integer('status')->default(1);
      $table->integer('created_by')->nullable()->default('0');
      $table->integer('updated_by')->nullable()->default('0');
      $table->foreign('id_device')->references('id')->on('jmtm_devices')->onDelete('restrict')->onUpdate('restrict');
      $table->timestamps();
    });
  }

  public function down() {
    Schema::dropIfExists('jmtm_users');
  }
}
