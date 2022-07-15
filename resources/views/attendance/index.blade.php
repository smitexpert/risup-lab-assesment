@extends('layout.master')

@section('heading')
<div class="pagetitle">
    <h1>Manage Attendance</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Attendance</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
@endsection


@section('content')
  <div class="row mb-4">
    <div class="col-md-12">
        <div class="float-right" style="float: right">
            <a href="{{ route('attendance.show') }}" class="btn btn-info">View Attendance Log</a>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
       <div class="card">
        <div class="card-body">
            <h5 class="card-title">Make Attendance</h5>
            @if ($attendance)
                You are present today.
            @else

            <form action="{{ route('attendance.store') }}" method="POST">
                @csrf
                <button class="btn btn-success">Make Attendance</button>
            </form>
            @endif
        </div>
       </div>
    </div>
  </div>
@endsection
