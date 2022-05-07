@extends('layout.master')




@section('breadcrumbs')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">All Users</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active">Users</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
@endsection


@section('content')
<!-- Main Content-->


@foreach ($posts as $post )
  
   {{-- @if($post->user_id == auth()->user()->id) --}}
      @if($post->isapproved==1)
     
      
        <div class="container px-4 px-lg-5">
          <div class="row gx-4 gx-lg-5 justify-content-center m-4 p-4">
              <table class="table custom-table" style="margin-top: 10%;">
                <thead>
                  <tr class="text-center">
                    <th scope="col">
                      <label class="control control--checkbox">
                        <input type="checkbox" class="js-check-all"/>
                        <div class="control__indicator"></div>
                      </label>
                    </th>
                    <th scope="col">Author Name</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">view</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">
                      <label class="control control--checkbox">
                        <input type="checkbox"/>
                        <div class="control__indicator"></div>
                      </label>
                    </th>
                    <td>
                      {{ $post->user->username }}
                    </td>
                    <td>
                      {{ $post->title }}
                    <td>
                      <small class="d-block">{!! $post->body !!}</small>
                    </td>
                    <td> <img src="{{ asset('/storage/cover_image/'.$post->cover_image) }}"/></td>
                    <td>
                      <ul class="persons">
                        <li>
                          <a href="#">
                            Read Full Post
                          </a>
                        </li>
                    </td>
                  </tr>
                </tbody>

              </table>
              {!! $data->links() !!}
          </div>
        </div>

      
    @endif
   
@endforeach

@endsection