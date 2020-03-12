@extends('layouts.master')

@section('title')
Add Category
@endsection

@section('addcategory_menu_active')
active
@endsection

@section('breadcrumb')
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ url('home') }}">Home Page</a>
    <span class="breadcrumb-item active">Add Category Page</span>
  </nav>
@endsection


@section('content')
  <div class="container">
    <div class="row">

      <div class="col-lg-8">

        @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
        @endif

{{-- view start --}}
          <div class="card">
            <div class="card-header">
              <h3>List Category</h3>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-dark">
              <thead>
                <tr>
                  <th scope="col">Serial No.</th>
                  <th scope="col">Category Name</th>
                  <th scope="col">Added By</th>
                  <th scope="col">Create At</th>
                  <th scope="col">Last Updated At</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- for paginate with view -->
                @forelse($categories as $category)
                  <tr>
                  <td>{{ $loop->index+1 }} </td>
                  <td> {{ $category->category_name }} </td>
                  <td> {{ App\User::find($category ->added_by)->name }} </td>
                  <td>
                    @if ($category->created_at)
                      {{ $category->created_at -> format('d/m/Y h:i:s A') }}
                      @else
                        ----
                    @endif
                 </td>

                 <td>
                   @if ($category->updated_at)
                     {{ $category->updated_at -> format('d/m/Y h:i:s A') }}
                     <br>
                     {{ $category->updated_at -> diffForHumans() }}
                     @else
                       ----
                   @endif
                </td>

                  <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <a type="button" class="btn btn-info btn-sm" href="#">
                        <i class="far fa-edit text-white font-weight-bold pt-1" style="font-size: 18px;"></i>
                      </a>
                      <a type="button" class="btn btn-danger btn-sm" href="#">
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
              <h3>Soft Delete List </h3>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-dark">
              <thead>
                <tr>
                  <th scope="col">Serial No.</th>
                  <th scope="col">Category Name</th>
                  <th scope="col">Added By</th>
                  <th scope="col">Create At</th>
                  <th scope="col">Last Updated At</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- for paginate with view -->

                  <tr>
                  <td> </td>
                  <td>  </td>
                  <td>  </td>
                  <td>
                    {{-- @if ($soft_delete_faq->created_at)
                      {{ $soft_delete_faq->created_at -> format('d/m/Y h:i:s A') }}
                      @else
                        ----
                    @endif --}}
                 </td>

                 <td>
                   {{-- @if ($soft_delete_faq->updated_at)
                     {{ $soft_delete_faq->updated_at -> format('d/m/Y h:i:s A') }}
                     <br>
                     {{ $soft_delete_faq->updated_at -> diffForHumans() }}
                     @else
                       ----
                   @endif --}}
                </td>

                  <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <a type="button" class="btn btn-success btn-sm" href="#">
                        <i class="fas fa-undo text-white font-weight-bold pt-2" style="font-size: 18px;"></i>
                      </a>
                      <a type="button" class="btn btn-danger btn-sm" href="#">
                        <i class="fas fa-trash-alt text-white font-weight-bold pt-1" style="font-size: 18px;"></i>
                      </a>
                    </div>
                  </td>
                </tr>
                {{-- @empty
                <tr>
                  <td colspan="12" class="text-center text-danger">No Deleted File</td>
                </tr>
                @endforelse --}}
{{-- soft delete to undo and heard end --}}


              </tbody>
            </table>
            </div>
          </div>

      </div>


{{-- insert category start --}}
      <div class="col-lg-4">

        <div class="card">
          <div class="card-header">
            <h3>Add Category</h3>
          </div>
          <div class="card-body">

            @if ($errors->all())
              <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </div>
            @endif

            <form method="post" action="{{ route('category.store') }}">
              @csrf

            <div class="form-group">
              <label for="exampleInputEmail1">Category Name</label>
              <input type="text" class="form-control" placeholder="Enter Category Name" name="category_name">
              {{-- @error ('category_name')
                <small class="text-danger">The Category Name Field is Required!</small>
              @enderror --}}
            </div>

            <button type="submit" class="btn btn-success">Add Category</button>
          </form>

          </div>
        </div>

      </div>
      {{-- insert category end --}}

    </div>
  </div>

@endsection
