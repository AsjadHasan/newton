@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">

      <div class="col-lg-6">

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
                </tr>
              </thead>
              <tbody>
                <!-- for paginate with view -->
                @forelse( $faqs as $faq)
                <tr>
                  <td> {{ $loop-> index + 1 }} </td>
                  <td> {{ $faq->faq_qsn }} </td>
                  <td> {{ $faq->faq_ans }} </td>
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

      <div class="col-lg-6">

        <div class="card">
          <div class="card-header">
            <h3>Add FAQ</h3>
          </div>
          <div class="card-body">

            <form method="post" action="{{ url('add/faq/post') }}">
              @csrf

            <div class="form-group">
              <label for="exampleInputEmail1">Questions</label>
              <input type="text" class="form-control" placeholder="Enter Your Question" name="faq_qsn">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Answer</label>
              <textarea class="form-control" rows="4" name="faq_ans"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Add FAQ</button>
          </form>

          </div>
        </div>

      </div>

    </div>
  </div>

@endsection
