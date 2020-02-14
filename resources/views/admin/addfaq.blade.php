@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">

      <div class="col-lg-8">

          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif
          @if (session('Deletestatus'))
            <div class="alert alert-danger" role="alert">
              {{ session('Deletestatus') }}
            </div>
          @endif

          <div class="card">
            <div class="card-header">
              <h3>List FAQ</h3>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-dark">
              <thead>
                <tr>
                  <th scope="col">Serial No.</th>
                  <th scope="col">FAQ Question</th>
                  <th scope="col">FAQ Answer</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- for paginate with view -->
                @forelse( $faqs as $faq)
                <tr>
                  <td> {{ $loop-> index + 1 }} </td>
                  <td> {{ $faq->faq_qsn }} </td>
                  <td> {{ $faq->faq_ans }} </td>
                  <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <a type="button" class="btn btn-info btn-sm" href="{{ url('faq/edit') }}/{{ $faq->id }}">Edit</a>
                      <a type="button" class="btn btn-danger btn-sm" href="{{ url('faq/delete') }}/{{ $faq->id }}">Delete</a>
                    </div>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="3" class="text-center text-danger">Data Not Found</td>
                </tr>
                @endforelse



              </tbody>
            </table>
            </div>
          </div>

      </div>

      <div class="col-lg-4">

        <div class="card">
          <div class="card-header">
            <h3>Add FAQ</h3>
          </div>
          <div class="card-body">

            <form method="post" action="{{ url('add/faq/post') }}">
              @csrf

            <div class="form-group">
              <label for="exampleInputEmail1">Questions</label>
              <input type="text" class="form-control" placeholder="Enter Your Question" name="faq_qsn" value="{{ old('faq_qsn') }}">
              @error ('faq_qsn')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>


            <div class="form-group">
              <label for="exampleInputEmail1">Answer</label>
              <textarea class="form-control" rows="4" name="faq_ans">{{ old('faq_ans') }}</textarea>
              @error ('faq_ans')
                <small class="text-danger">Answer koi?</small>
              @enderror
            </div>

            <button type="submit" class="btn btn-success">Add FAQ</button>
          </form>

          </div>
        </div>

      </div>

    </div>
  </div>

@endsection
