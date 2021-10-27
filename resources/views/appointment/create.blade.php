@extends('layouts.front')
@section('container')

<form action="{{ route('appointment.store') }}" method="post">
@csrf
  <div class="form-group">
    <label for="date">Select Date</label>
    <input type="date" class="form-control" id="date" name="date">
  </div>
  <input type="hidden" name="doctor_id" value="{{ $doctor_id }}">
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<br>
@endsection
