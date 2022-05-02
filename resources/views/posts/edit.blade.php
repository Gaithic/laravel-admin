@extends('layout.app')



@section('breadcrumbs')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Post</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active">Post</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
@endsection

@section('content')
<form action="{{ route('update-post', ['id' => $post->id]) }}" method="post">
    @csrf
    @method('PUT')
    <div class="card-body">
      <div class="form-group">
        <label for="exampleInputEmail1" >User Name</label>
        <input type="text" class="form-control"  name="title" placeholder="Post Namr" value="{{ $post->title }}">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1" >Email address</label>
        <textarea type="text" class="ckeditor form-control" id="body" name="body" placeholder="Enter Message Here">{!! $post->body !!}</textarea>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1" >Change Post Image</label>
        <input type="file" class="form-control"  name="cover_image" placeholder="Change Image">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1" >Post Image</label>
    </div>
    <img src="{{ asset('/storage/cover_image/'.$post->cover_image) }}"/>
    
      
      
      
    
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <button type="submit" style="float: right;" class="btn btn-primary">Cancel</button>
    </div>
    
  </form>
  @push('scripts')
  <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
  <script type="text/javascript" src="{{ asset('js/my.js') }}">
  <script type="text/javascript">
      $(document).ready(function() {
      $('.ckeditor').ckeditor();
  });
  @endpush
@endsection