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
              <div class="row-md-10 row-lg-8 row-xl-7 m-4 p-4">
                  <!-- Post preview-->
                  <div class="post-preview">
                      <a href="post.html"><h2 class="post-title">{{ $post->title }}</h2>
                          <h3 class="post-subtitle">{!! $post->body !!}</h3>
                      </a>
                      <p class="post-meta">
                          Posted by 
                          <a href="#!">{{ $post->user->username }}</a><br>
                          {{ $post->created_at }}
                      </p>
                  </div>
                  <!-- Divider-->
                  <hr class="my-4" />
                  <!-- Pager-->
                  <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>
              </div>
          </div>
        </div>
      
    

      
    @endif
   
@endforeach

@endsection