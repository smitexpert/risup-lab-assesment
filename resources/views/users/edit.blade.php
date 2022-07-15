@extends('layout.master')

@section('heading')
<h1>Create User</h1>
<nav>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
    <li class="breadcrumb-item active">Update User</li>
  </ol>
</nav>
</div><!-- End Page Title -->
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Update User</h5>
                    <form action="{{ route('users.update', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control" required>
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="type">User Type</label>
                                    <select name="type" id="type" class="form-control">
                                        <option value="">SELECT USER TYPE</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Member">Member</option>
                                    </select>
                                    @error('type')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="icon">Profile Icon</label>
                                    <input type="file" name="icon" id="icon" class="form-control">
                                    @error('icon')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-6">
                                        <div style="width: 60px; height: auto;">
                                            <img style="width: 100%" src="{{ asset($user->avatar) }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group" style="float: right">
                                            <button type="submit" class="btn btn-info">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
