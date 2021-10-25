@extends('layouts.admin')
@section('page_title', 'Banners')
@section('container')

<!-- Page Header -->
<div class="page-header">
    <div class="row">
        <div class="col">
            <button class="btn btn-primary">
                <a href="{{ route('banners.create') }}">
                    <h3 class="page-title">Add Banner</h3>
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
                <h4 class="card-title">Banners</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Banner</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($banners as $banner)
                                <tr>
                                    <td>{{ $banner->id }}</td>
                                    <td>
                                        <img src="{{ asset($banner->banner) }}" alt="banner" width="100" height="100">
                                    </td>
                                    <td>
                                        <a href="{{ route('banners.edit', $banner->id) }}">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                             | <a class="delete-row" href="{{ route('banners.destroy', $banner->id) }}">
                                                 <i class="fa fa-trash-o" style="color:red" aria-hidden="true"></i>
                                             </a>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" align="center">No banner found</td>
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
