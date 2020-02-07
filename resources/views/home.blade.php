@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Total User: {{ $users->count() }}</div>

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
                      @foreach($users as $user)
                      <tr>
                        <td> {{ $loop->index +1 }} </td>
                        <td> {{ $user->name }} </td>
                        <td> {{ $user->email }} </td>
                        <td> {{ $user->created_at->format('D/M/Y  h:i:s A') }} </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
