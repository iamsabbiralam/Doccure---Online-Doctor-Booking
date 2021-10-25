@extends('layouts.admin')
@section('page_title', 'Categories')
@section('container')

<!-- Page Header -->
<div class="page-header">
    <div class="row">
        <div class="col">
            <button class="btn btn-primary">
                <a href="{{ route('categories.create') }}">
                    <h3 class="page-title">Add Category</h3>
                </a>
            </button>
        </div>
    </div>
</div>
<!-- /Page Header -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Categories</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>
                                        <img src="{{ asset($category->image) }}" alt="image" width="100" height="100">
                                    </td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <a href="{{ route('categories.edit', $category->id) }}">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                             | <a class="delete-row" data-confirm="Are you sure to delete this?" href="{{ route('categories.destroy', $category->id) }}">
                                                 <i class="fa fa-trash-o" style="color:red" aria-hidden="true"></i>
                                             </a>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" align="center">No categories found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
