<div class="form-group row">
  <label class="col-lg-3 col-form-label"> Name </label>
  <div class="col-lg-9">
    {{ Html::text('name', (isset($data->name) ? $data->name : ''))->class([ $errors->has('name') ? 'form-control is-invalid' : 'form-control'])->required() }}
    @error('name') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>

@if($formMode == 'create')
<div class="form-group row">
  <label class="col-lg-3 col-form-label"> Month </label>
  <div class="col-lg-9">
    <select name="month" class="form-control selectpicker" required>
      <option value=""> - Select Month - </option>
      <option value="01"> January </option>
      <option value="02"> February </option>
      <option value="03"> March </option>
      <option value="04"> April </option>
      <option value="05"> May </option>
      <option value="06"> June </option>
      <option value="07"> July </option>
      <option value="08"> August </option>
      <option value="09"> September </option>
      <option value="10"> October </option>
      <option value="11"> November </option>
      <option value="12"> December </option>
    </select>
  </div>
</div>

<div class="form-group row">
  <label class="col-lg-3 col-form-label"> {{ __('default.label.date') }} </label>
  <div class="col-lg-9">
    <select name="date[]" class="form-control selectpicker" multiple data-actions-box="true" title="- {{ __('default.select.date') }} -" required>
      <option value="01"> 1 </option>
      <option value="02"> 2 </option>
      <option value="03"> 3 </option>
      <option value="04"> 4 </option>
      <option value="05"> 5 </option>
      <option value="06"> 6 </option>
      <option value="07"> 7 </option>
      <option value="08"> 8 </option>
      <option value="09"> 9 </option>
      <option value="10"> 10 </option>
      <option value="11"> 11 </option>
      <option value="12"> 12 </option>
      <option value="13"> 13 </option>
      <option value="14"> 14 </option>
      <option value="15"> 15 </option>
      <option value="16"> 16 </option>
      <option value="17"> 17 </option>
      <option value="18"> 18 </option>
      <option value="19"> 19 </option>
      <option value="20"> 20 </option>
      <option value="21"> 21 </option>
      <option value="22"> 22 </option>
      <option value="23"> 23 </option>
      <option value="24"> 24 </option>
      <option value="25"> 25 </option>
      <option value="26"> 26 </option>
      <option value="27"> 27 </option>
      <option value="28"> 28 </option>
      <option value="29"> 29 </option>
      <option value="30"> 30 </option>
      <option value="31"> 31 </option>
    </select>
  </div>
</div>

<div class="form-group row">
  <label class="col-lg-3 col-form-label"> {{ __('default.label.time') }} </label>
  <div class="col-lg-9">
    <div class="input-group timepicker">
      <input name="time" class="form-control" id="ex_timepicker_time" required placeholder="- {{ __('default.select.time') }} -" type="text">
      <div class="input-group-append">
        <span class="input-group-text">
          <i class="la la-clock-o"></i>
        </span>
      </div>
    </div>
  </div>
</div>
@endif

@if($formMode == 'edit')
<div class="form-group row">
  <label class="col-lg-3 col-form-label"> Date </label>
  <div class="col-lg-9">
    {{ Html::text('date', (isset($data->date) ? $data->date : ''))->class([ $errors->has('date') ? 'form-control is-invalid' : 'form-control'])->required() }}
    @error('date') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>
@endif

<div class="form-group row">
  <label class="col-lg-3 col-form-label"> Description </label>
  <div class="col-lg-9">
    {{ Html::textarea('description', (isset($data->description) ? $data->description : ''))->class([ $errors->has('description') ? 'form-control is-invalid' : 'form-control', ])->id('ex-textarea') }}
    @error('description') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>
