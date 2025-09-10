<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

  public function up(): void {
    $teams = config('permission.teams');
    $tableNames = config('permission.table_names');
    $columnNames = config('permission.column_names');
    $pivotRole = $columnNames['role_pivot_key'] ?? 'role_id';
    $pivotPermission = $columnNames['permission_pivot_key'] ?? 'permission_id';

    throw_if(empty($tableNames), new Exception('Error: config/permission.php not loaded. Run [php artisan config:clear] and try again.'));
    throw_if($teams && empty($columnNames['team_foreign_key'] ?? null), new Exception('Error: team_foreign_key on config/permission.php not loaded. Run [php artisan config:clear] and try again.'));

    Schema::create($tableNames['roles'], static function (Blueprint $table) use ($teams, $columnNames) {
      $table->increments('id');
      $table->string('name');
      $table->string('guard_name')->default('web');
      $table->timestamps();
      $table->integer('created_by')->nullable();
      $table->integer('updated_by')->nullable();
      $table->softDeletes();
      $table->integer('active')->default(1);
    });

    Schema::create($tableNames['model_has_roles'], static function (Blueprint $table) use ($tableNames, $columnNames, $pivotRole, $teams) {
      $table->increments('id');
      $table->integer('role_id')->unsigned();
      $table->string('model_type')->default(\DB::raw("'App\\\\Models\\\\User'"));
      $table->unsignedBigInteger($columnNames['model_morph_key']);
      $table->index([$columnNames['model_morph_key'], 'model_type'], 'model_has_roles_model_id_model_type_index');
      $table->foreign('role_id')->references('id')->on('roles')->onDelete('restrict')->onUpdate('restrict');
      $table->timestamps();
      $table->integer('created_by')->nullable();
      $table->integer('updated_by')->nullable();
      $table->softDeletes();
      $table->integer('active')->default(1);
    });

    app('cache')->store(config('permission.cache.store') != 'default' ? config('permission.cache.store') : null)->forget(config('permission.cache.key'));
  }

  public function down(): void {
    $tableNames = config('permission.table_names');

    if (empty($tableNames)) {
      throw new \Exception('Error: config/permission.php not found and defaults could not be merged. Please publish the package configuration before proceeding, or drop the tables manually.');
    }

    Schema::dropIfExists('model_has_roles');
    Schema::dropIfExists('roles');
  }

};
