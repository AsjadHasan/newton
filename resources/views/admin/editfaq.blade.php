@extends('layouts.master')

@section('breadcrumb')
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ url('home') }}">Home Page</a>
    <a class="breadcrumb-item" href="{{ url('add/faq') }}">Add FAQ Page</a>
    <span class="breadcrumb-item active">Edit FAQ Page</span>
  </nav>
@endsection

@section('content')

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
