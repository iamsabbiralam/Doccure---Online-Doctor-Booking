@extends('layouts.front')
@section('container')
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Doctors</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Doctors</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12">

                <div class="row row-grid">
                    @foreach ($doctors as $doctor)
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="card widget-profile pat-widget-profile">
                            <div class="card-body">
                                <div class="pro-widget-content">
                                    <div class="profile-info-widget">
                                        <div class="profile-det-info">
                                            <h3><a href="patient-profile.html">{{ $doctor->name }}</a></h3>

                                            <div class="patient-details">
                                                <h5><b>Speciality :</b> {{ $doctor->specialist }}</h5>
                                                <h5 class="mb-0"><b>Chamber :</b><i class="fas fa-map-marker-alt"></i> {{ $doctor->chamber }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="patient-info">
                                    <ul>
                                        <li>Fee <span>{{ $doctor->cost }}</span></li>
                                        @php
                                            $date = date("Y-m-d");
                                            // dd($date);
                                            $appointment = DB::table('appointments')->where('doctor_id', $doctor->id)->where('date', $date)->get();
                                            // dump($appointment);
                                        @endphp
                                        @if (count($appointment) < 5)
                                                <li><span><a href="{{ route('appointment.create', $doctor->id) }}"><button class="btn btn-primary">Get Appoinment</button></a></span></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>

    </div>

</div>
@endsection
