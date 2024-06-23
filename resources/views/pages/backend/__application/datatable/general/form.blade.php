<div class="form-group row">
  <div class="col-lg-3 col-form-label"> Date </div>
  <div class="col-lg-9">
    <div class="input-group input-group-solid date" id="ex_datetimepicker_date_start" data-target-input="nearest">
      {{ Html::text('date', (isset($data->date) ? $data->date : ''))->class([ $errors->has('date') ? 'form-control is-invalid' : 'form-control form-control-solid datetimepicker-input', 'data-target' => "#ex_datetimepicker_date_start"])->placeholder('- ' . __('default.select.date') . ' -')->autocomplete('off')->required() }}
      <div class="input-group-append" data-target="#ex_datetimepicker_date_start" data-toggle="datetimepicker">
        <span class="input-group-text"><i class="ki ki-calendar"></i></span>
      </div>
    </div>
  </div>
</div>

<div class="form-group row">
  <label class="col-lg-3 col-form-label"> Name </label>
  <div class="col-lg-9">
    {{ Html::text('name', (isset($data->name) ? $data->name : ''))->class([ $errors->has('name') ? 'form-control is-invalid' : 'form-control'])->required() }}
    @error('name') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>

<div class="form-group row">
  <label class="col-lg-3 col-form-label"> Description </label>
  <div class="col-lg-9">
    {{ Html::textarea('description', (isset($data->description) ? $data->description : ''))->class([ $errors->has('description') ? 'form-control is-invalid' : 'form-control', ])->id('ex-textarea') }}
    @error('description') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>
