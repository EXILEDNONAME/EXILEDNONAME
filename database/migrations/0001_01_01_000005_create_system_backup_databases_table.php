<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

  public function up(): void {
    Schema::create('system_backup_databases', function (Blueprint $table) {
      $table->increments('id');
      $table->timestamp('date_start')->nullable();
      $table->timestamp('date_end')->nullable();
      $table->timestamp('date')->nullable();
      $table->string('file')->nullable();
      $table->string('name');
      $table->string('path');
      $table->integer('active')->default(1);
      $table->integer('status')->default(1);
      $table->timestamps();
      $table->integer('created_by')->default(1);
      $table->integer('updated_by')->default(1);
      $table->softDeletes();
    });
  }

  public function down(): void {
    Schema::dropIfExists('system_backup_databases');
  }

};
