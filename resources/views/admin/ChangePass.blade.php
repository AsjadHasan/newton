@extends('layouts.master')
@section('breadcrumb')
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ url('home') }}">Home Page</a>
    <span class="breadcrumb-item active">Password Change Page</span>
  </nav>
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-6 m-auto">

        @if (session('password_changed_success'))
          <div class="alert alert-success">
            {{ session('password_changed_success') }}
          </div>
        @endif

        @if (session('password_changed_not_success'))
          <div class="alert alert-danger">
            {{ session('password_changed_not_success') }}
          </div>
        @endif

        <div class="card">
          <div class="card-header">
            <h3> Change Password</h3>
          </div>
          <div class="card-body">

            <form method="post" action="{{ url('/change/pass') }}">
              @csrf

            <div class="form-group">
              <label for="exampleInputEmail1">Old Password</label>
              <input type="password" class="form-control" placeholder="Enter Your Old Password" name="old_password">

              {{-- @error ('old_password')
                <small class="text-danger">{{ $message }}</small>
              @enderror --}}

            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">New Password</label>
              <input type="password" class="form-control" placeholder="Enter Your New Password" name="password">

              {{-- @error ('password')
                <small class="text-danger">{{ $message }}</small>
              @enderror --}}

            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Confirm Password</label>
              <input type="password" class="form-control" placeholder="Enter Your New Password Again" name="password_confirmation">

              {{-- @error ('password_confirmation')
                <small class="text-danger">{{ $message }}</small>
              @enderror --}}

            </div>
            <button type="submit" class="btn btn-success">Change Your Password</button>
          </form>

          <br><br>
          @if ($errors->all())
            <div class="alert alert-danger">
              @foreach ($errors->all() as $error)
                <li> {{ $error }} </li>
              @endforeach
            </div>
          @endif

          </div>
    </div>
  </div>
@endsection
