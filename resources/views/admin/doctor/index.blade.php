@extends('layouts.admin')
@section('page_title', 'Doctors')
@section('container')

<!-- Page Header -->
<div class="page-header">
    <div class="row">
        <div class="col">
            <button class="btn btn-primary">
                <a href="{{ route('doctors.create') }}">
                    <h3 class="page-title">Add New Doctor</h3>
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
                <h4 class="card-title">Doctor</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Specialist</th>
                                <th>Chamber</th>
                                <th>Visit</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($doctors as $doctor)
                                <tr>
                                    <td>{{ $doctor->id }}</td>
                                    <td>{{ $doctor->name }}</td>
                                    <td>{{ $doctor->categories->name }}</td>
                                    <td>{{ $doctor->specialist }}</td>
                                    <td>{{ $doctor->chamber }}</td>
                                    <td>{{ $doctor->cost }}</td>
                                    <td>
                                        <a href="{{ route('doctors.edit', $doctor->id) }}">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a>
                                        | <a class="delete-row" href="{{ route('doctors.destroy', $doctor->id) }}">
                                            <i class="fa fa-trash-o" style="color:red" aria-hidden="true"></i>
                                            </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" align="center">No doctor found</td>
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
