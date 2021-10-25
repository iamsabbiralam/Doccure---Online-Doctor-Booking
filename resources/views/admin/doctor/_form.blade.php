<div class="form-group row">
    <label class="col-form-label col-md-2">Name</label>
    <div class="col-md-10">
        <input class="form-control" type="text" name="name" id="name" value="{{ old('name', isset($doctor) ? $doctor->name : '') }}">
        <p class="text-red-600">{{ $errors->first('name') }}</p>
    </div>
    <label class="col-form-label col-md-2">Category</label>
    <div class="col-md-10">
        <select class="form-control" name="cat_id" id="cat_id">
            <option value="">Select Category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <p class="text-red-600">{{ $errors->first('cat_id') }}</p>
    </div>
    <label class="col-form-label col-md-2">Specialist</label>
    <div class="col-md-10">
        <input class="form-control" type="text" name="specialist" id="specialist" value="{{ old('specialist', isset($doctor) ? $doctor->specialist : '') }}">
        <p class="text-red-600">{{ $errors->first('specialist') }}</p>
    </div>
    <label class="col-form-label col-md-2">Chamber</label>
    <div class="col-md-10">
        <input class="form-control" type="text" name="chamber" id="chamber" value="{{ old('chamber', isset($doctor) ? $doctor->chamber : '') }}">
        <p class="text-red-600">{{ $errors->first('chamber') }}</p>
    </div>
    <label class="col-form-label col-md-2">Cost</label>
    <div class="col-md-10">
        <input class="form-control" type="number" name="cost" id="cost" min="0" value="{{ old('cost', isset($doctor) ? $doctor->cost : '') }}">
        <p class="text-red-600">{{ $errors->first('cost') }}</p>
    </div>
    <button class="btn btn-primary" type="submit">{{ $buttonText }}</button>
</div>
