@extends('layout.master')

@section('heading')
<h1>View Attendance</h1>
<nav>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
    <li class="breadcrumb-item active">View Attendance</li>
  </ol>
</nav>
</div><!-- End Page Title -->
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">View Attendance</h5>
                    <div class="row mb-2">
                        <div class="col-md-9">
                            <p>Present: {{ $present }}, Absent: {{ $total_days - $present }}, Total Days: {{ $total_days }}</p>
                        </div>
                        <div class="col-md-3 float-right" style="float: right">
                            <form action="">
                                <div class="input-group">
                                    <input class="form-control" type="month" name="date" required>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-success">Go</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($attendances as $attendance)
                            <div class="col-md-1 border text-center">
                                <h3 style="padding: 0; margin: 0">{{ $attendance['date'] }}</h3>
                                @if ($attendance['present'])
                                    <p style="padding: 0; margin: 0; color: green;">Present</p>
                                @else
                                    <p style="padding: 0; margin: 0; color: red;">Absent</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
