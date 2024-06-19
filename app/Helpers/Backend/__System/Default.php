<?php

use Spatie\Activitylog\Models\Activity;

function activities($model) {
  $data = Activity::where('subject_type', $model)->orderBy('created_at', 'desc')->get();
  return $data;
}

function activity_causer() {
  $items = DB::table('activity_log')->distinct()->get(['causer_id']);
  foreach($items as $item) {
    $data = DB::table('users')->where('id', $item->causer_id)->pluck('name', 'id')->toArray();
    return $data;
  };

}
