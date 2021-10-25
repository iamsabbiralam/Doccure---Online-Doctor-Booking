@extends('layouts.admin')
@section('page_title', 'Add New Doctor')
@section('container')

<!-- Page Header -->
<div class="page-header">
    <div class="row">
        <div class="col">
            <h3 class="page-title">Add New Doctor</h3>
        </div>
    </div>
</div>
<!-- /Page Header -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Form</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('doctors.store') }}" method="post">
                    @csrf
                    @include('admin.doctor._form', ['buttonText' => __('Create')])
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
