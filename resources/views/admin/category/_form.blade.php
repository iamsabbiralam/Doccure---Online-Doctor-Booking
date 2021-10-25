<div class="form-group row">
    <label class="col-form-label col-md-2">File Input</label>
    <div class="col-md-10">
        <input class="form-control" type="file" name="image" id="image">
        <p class="text-red-600">{{ $errors->first('image') }}</p>
    </div>
    <label class="col-form-label col-md-2">Name</label>
    <div class="col-md-10">
        <input class="form-control" type="text" name="name" id="name" value="{{ old('name', isset($categories) ? $categories->name: '') }}">
        <p class="text-red-600">{{ $errors->first('name') }}</p>
    </div>
    <button class="btn btn-primary" type="submit">{{ $buttonText }}</button>
</div>
