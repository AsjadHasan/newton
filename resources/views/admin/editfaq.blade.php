@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-6 m-auto">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('add/faq') }}">Add FAQ</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $faq->faq_qsn }}</li>
            </ol>
        </nav>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-6 m-auto">

        <div class="card">
          <div class="card-header">
            <h3>Edit FAQ</h3>
          </div>
          <div class="card-body">

            <form method="post" action="{{ url('faq/edit/post') }}">
              @csrf
              <input type="hidden" name="faq_id" value="{{ $faq->id }}">
            <div class="form-group">
              <label for="exampleInputEmail1">Questions</label>
              <input type="text" class="form-control" placeholder="Enter Your Question" name="faq_qsn" value="{{ $faq->faq_qsn }}">
            </div>


            <div class="form-group">
              <label for="exampleInputEmail1">Answer</label>
              <textarea class="form-control" rows="4" name="faq_ans">{{ $faq->faq_ans }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Edit FAQ</button>
          </form>

          </div>
    </div>
  </div>
@endsection
