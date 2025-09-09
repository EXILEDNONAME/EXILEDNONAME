@if (!empty($file) && $file == 'true')
<div class="form-group row">
  <label class="col-4 col-form-label"> {{ __('default.label.file') }} </label>
  <div class="col-8">
    <input type="file" name="file" accept="image/*">
    <div id="previewContainer" style="margin-top: 15px;">
      <img id="previewImage" src="" style="max-width: 200px; display: none;">
    </div>
    <div id="uploadProgress" class="progress mt-3" style="height: 15px; display: none;">
      <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%">0%</div>
    </div>
    <div id="uploadStatus" class="mt-2"></div>
  </div>
</div>
@endif
