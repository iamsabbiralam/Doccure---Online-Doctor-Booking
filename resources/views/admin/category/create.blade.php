@extends('layouts.admin')
@section('page_title', 'Add Category')
@section('container')

<!-- Page Header -->
<div class="page-header">
    <div class="row">
        <div class="col">
            <h3 class="page-title">Add Category</h3>
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
                <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('admin.category._form', ['buttonText' => __('Create')])
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
