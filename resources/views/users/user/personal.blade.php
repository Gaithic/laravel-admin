@extends('layout.master')

@push('styles')
<link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
    <style type="text/css">
        i{
            font-size: 50px !important;
            padding: 10px;
        }
    </style>
@endpush
@section('breadcrumbs')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">All Post's</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active">Posts</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                All Post
            </div>
            <div class="card-body table-responsive table-striped table-bordered">
                <table class="table" id="data-table">
                    <thead>
                        <tr>
                            <th>Post Name</th>
                            <th>Post Body</th>
                            <th>Post Image</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>


                     @if($posts)
                     @foreach ($posts as $post )
                          <tr>
                          <td>{{ $post->title}}</td>
                          <td>{{ $post->body }}</td>
                          <td><img src="{{asset('/storage/cover_image/'.$post->cover_image)}}" alt="Logo" height="50"/></td>
                          <td><a href="{{ route('user-edit-post', ['id' => $post->id])}}"><i class="right fas fa-setting" style="background: black"></i>Edit</a></td>
                          </tr>
                      @endforeach


                     @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection





