<div class="form-group row">
  <label class="col-lg-3 col-form-label"> Title </label>
  <div class="col-lg-9">
    {!! Form::text('title', (isset($data->title) ? $data->title : ''), ['class' => $errors->has('title') ? 'form-control is-invalid' : 'form-control', 'required' => 'required']) !!}
    @error('title') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>
 
<div class="form-group row">
  <label class="col-lg-3 col-form-label"> Content </label>
  <div class="col-lg-9">
    {!! Form::textarea('content', (isset($data->content) ? $data->content : ''), ['id' => 'ex-textarea', 'class' => $errors->has('content') ? 'form-control is-invalid' : 'form-control']) !!}
    @error('content') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>
 
<div class="form-group row">
  <label class="col-lg-3 col-form-label"> Category </label>
  <div class="col-lg-9">
    <select name="category" class="form-control" id="category" >
    @foreach (json_decode('{"technology":"Technology","tips":"Tips","health":"Health"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($accesspoint->category) && $accesspoint->category == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>    @error('category') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>
 

