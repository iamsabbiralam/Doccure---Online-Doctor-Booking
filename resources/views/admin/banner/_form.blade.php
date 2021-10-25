<div class="form-group row">
    <label class="col-form-label col-md-2">File Input</label>
    <div class="col-md-10">
        <input class="form-control" type="file" name="banner" id="banner">
        <p class="text-red-600">{{ $errors->first('banner') }}</p>
    </div>
    <button class="px-4 py-2 bg-green-600" type="submit">{{ $buttonText }}</button>
</div>
