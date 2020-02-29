@extends('layouts.master')

@section('breadcrumb')
  <nav class="breadcrumb sl-breadcrumb">
    <span class="breadcrumb-item active">Home Page</span>
  </nav>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Total User: {{ $users->total() }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered table-dark">
                    <thead>
                      <tr>
                        <th scope="col">Serial No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Create At:</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- for normal view -->
                      <!-- @foreach($users as $user)
                      <tr>
                        <td> {{ $loop->index +1 }} </td>
                        <td> {{ $user->name }} </td>
                        <td> {{ $user->email }} </td>
                        <td> {{ $user->created_at->format('D/M/Y  h:i:s A') }} </td>
                      </tr>
                      @endforeach -->

                      <!-- for paginate with view -->
                      @foreach($users as $index => $user)
                      <tr>
                        <td> {{ $users-> firstItem() + $index }} </td>
                        <td> {{ $user->name }} </td>
                        <td> {{ $user->email }} </td>
                        <td> {{ $user->created_at->format('D/M/Y  h:i:s A') }} </td>
                      </tr>
                      @endforeach

                    </tbody>
                  </table>

                  {{ $users->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
