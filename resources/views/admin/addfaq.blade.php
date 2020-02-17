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

{{-- view start --}}
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
                  <th scope="col">Create At</th>
                  <th scope="col">Last Updated At</th>
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
                    @if ($faq->created_at)
                      {{ $faq->created_at -> format('d/m/Y h:i:s A') }}
                      @else
                        ----
                    @endif
                 </td>

                 <td>
                   @if ($faq->updated_at)
                     {{ $faq->updated_at -> format('d/m/Y h:i:s A') }}
                     <br>
                     {{ $faq->updated_at -> diffForHumans() }}
                     @else
                       ----
                   @endif
                </td>

                  <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <a type="button" class="btn btn-info btn-sm" href="{{ url('faq/edit') }}/{{ $faq->id }}">
                        <i class="far fa-edit text-white font-weight-bold pt-1" style="font-size: 18px;"></i>
                      </a>
                      <a type="button" class="btn btn-danger btn-sm" href="{{ url('faq/softDelete') }}/{{ $faq->id }}">
                        <i class="fas fa-user-times text-white font-weight-bold pt-2" style="font-size: 18px;"></i>
                      </a>
                    </div>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="12" class="text-center text-danger">Data Not Found</td>
                </tr>
                @endforelse



              </tbody>
            </table>
            </div>
          </div>
{{-- view end --}}

<br><br>


{{-- soft delete to undo and heard delete start --}}
          <div class="card">
            <div class="card-header">
              <h3>Soft Delete List FAQ</h3>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-dark">
              <thead>
                <tr>
                  <th scope="col">Serial No.</th>
                  <th scope="col">FAQ Question</th>
                  <th scope="col">FAQ Answer</th>
                  <th scope="col">Create At</th>
                  <th scope="col">Last Updated At</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- for paginate with view -->
                @forelse( $soft_delete_faqs as $soft_delete_faq)
                  <tr>
                  <td> {{ $loop-> index + 1 }} </td>
                  <td> {{ $soft_delete_faq->faq_qsn }} </td>
                  <td> {{ $soft_delete_faq->faq_ans }} </td>
                  <td>
                    @if ($soft_delete_faq->created_at)
                      {{ $soft_delete_faq->created_at -> format('d/m/Y h:i:s A') }}
                      @else
                        ----
                    @endif
                 </td>

                 <td>
                   @if ($soft_delete_faq->updated_at)
                     {{ $soft_delete_faq->updated_at -> format('d/m/Y h:i:s A') }}
                     <br>
                     {{ $soft_delete_faq->updated_at -> diffForHumans() }}
                     @else
                       ----
                   @endif
                </td>

                  <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <a type="button" class="btn btn-success btn-sm" href="{{ url('faq/undo') }}/{{ $soft_delete_faq->id }}">
                        <i class="fas fa-undo text-white font-weight-bold pt-2" style="font-size: 18px;"></i>
                      </a>
                      <a type="button" class="btn btn-danger btn-sm" href="{{ url('faq/hardDelete') }}/{{ $soft_delete_faq->id }}">
                        <i class="fas fa-trash-alt text-white font-weight-bold pt-1" style="font-size: 18px;"></i>
                      </a>
                    </div>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="12" class="text-center text-danger">No Deleted File</td>
                </tr>
                @endforelse
{{-- soft delete to undo and heard end --}}


              </tbody>
            </table>
            </div>
          </div>

      </div>


{{-- insert qsn and ans start --}}
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
      {{-- insert qsn and ans end --}}

    </div>
  </div>

@endsection
