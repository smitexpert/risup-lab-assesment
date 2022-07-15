@extends('layout.master')

@section('heading')
<div class="pagetitle">
    <h1>Manage Users</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Users</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
@endsection


@section('content')
  <div class="row mb-4">
    <div class="col-md-12">
        <div class="float-right" style="float: right">
            <a href="{{ route('users.create') }}" class="btn btn-info">Add User</a>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
       <div class="card">
        <div class="card-body">
            <h5 class="card-title">Users List</h5>
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('users.show', ['id' => $user->id]) }}" class="btn btn-sm btn-success"><i class="bi bi-eye"></i></a>
                                    <a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-sm btn-info"><i class="bi bi-gear"></i></a>
                                    @if (Auth::user()->id != $user->id)
                                        <a href="{{ route('users.delete', ['id' => $user->id]) }}" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
       </div>
    </div>
  </div>
@endsection
