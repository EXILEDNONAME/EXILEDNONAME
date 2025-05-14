<?php

namespace App\Models\Backend\__System\Application\Datatable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class General extends Model {

  use HasFactory, SoftDeletes;

  protected $table = 'system_application_table_generals';
  protected $primaryKey = 'id';
  protected $guarded = ['id'];
  protected static $logAttributes = ['*'];

}
