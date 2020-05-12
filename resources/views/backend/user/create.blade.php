@extends('backend.layout.layout')
@extends('backend.layout.navbar')
@extends('backend.layout.sidebar')
@section('content')

<div class="col">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add user</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="name">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="email">
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="password" placeholder="password">
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Example select</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="role">
                    <option value="{{ config('common.role.admin') }}">Admin</option>
                    <option value="{{ config('common.role.user') }}">User</option>
                  </select>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <!-- /.card -->

</div>
@endsection
