<?php

namespace App\Http\Requests\Backend\__Main\AccessPoint;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest {

  public function authorize() {
    return true;
  }

  public function rules() {
    return [
      // 
    ];
  }

}
