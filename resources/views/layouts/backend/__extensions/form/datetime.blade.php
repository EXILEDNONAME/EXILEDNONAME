@if (!empty($datetime) && $datetime == 'true')
<div class="form-group row">
  <label class="col-4 col-form-label"> {{ __('default.label.datetime') }} </label>
  <div class="col-8">
    <div class="input-group date" id="ex_datetimepicker" data-target-input="nearest">
      {{ Html::text('datetime', (isset($data->datetime) ? $data->datetime : ''))->class([ $errors->has('date') ? 'form-control is-invalid datetimepicker-input text-center' : 'form-control datetimepicker-input text-center', ])->id('date')->placeholder('- ' . __("default.select.datetime") . ' -')->attribute('data-target', '#ex_datetimepicker')->attribute('data-toggle', 'datetimepicker')->isReadOnly() }}
      <div class="input-group-append" >
        <span class="input-group-text">
          <i class="ki ki-calendar"></i>
        </span>
      </div>
    </div>

  </div>
</div>
@endif
