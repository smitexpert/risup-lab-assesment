@extends('layout.master')

@section('heading')
<h1>Create User</h1>
<nav>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
    <li class="breadcrumb-item active">User Info</li>
  </ol>
</nav>
</div><!-- End Page Title -->
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">User Info</h5>
                    <table>
                        <tr>
                            <th>Name</th>
                            <td>:</td>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>:</td>
                            <td>{{ $user->email }}</td>
                        </tr><tr>
                            <th>Role</th>
                            <td>:</td>
                            <td>{{ $user->role }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">View Attendance</h5>
                    <div class="row">
                        <div class="col-12">
                            <form action="{{ route('users.show', ['id' => $user->id]) }}">
                                <div class="input-group">
                                    <input class="form-control" type="month" name="date" required>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-success">Go</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <p>Present: {{ $present }}, Absent: {{ $total_days - $present }}, Total Days: {{ $total_days }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
