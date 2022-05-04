@extends('layout.app')


@push('styles')


@endpush
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
<form action="{{ route('admin-update-post', ['id' => $post->id]) }}" method="post" id="userPost" onsubmit="return userValidation">
    @csrf
    @method('PUT')
    <div class="card-body">
      <div class="form-group">
        <label for="exampleInputEmail1" >Post Title</label>
        <input type="text" class="form-control"  name="title"  placeholder="Post Name" value="{{ $post->title }}">
      </div>
     
      <div class="form-group">
        <label for="exampleInputEmail1" >Post Body</label>
        <textarea type="text" class="ckeditor form-control" id="body" name="body" placeholder="Enter Message Here">{!! $post->body !!}</textarea>
      </div>
  

      <div class="form-group">
        <label for="exampleInputEmail1" >Post Image</label>
        <input type="file" class="form-control"  name="cover_image" placeholder="Change Image" >
      </div>
      <img src="{{ asset('/storage/cover_image/'.$post->cover_image) }}"/>

    
    <div class="form-group" style="margin:10px;">
          <input type="radio" id="approved" name="isapproved" value="1" style="accent-color: green;">
          <label for="Appraved" style="color: green;">Approve</label>
        <br>
          <input type="radio" id="approved" name="isapproved" value="2" style="accent-color: red;">
          <label for="cancel" style="color:red;">Cancel</label>
    </div>
      

    
  
    
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <button type="submit" style="float: right;" class="btn btn-primary">Cancel</button>
    </div>
    
  </form>
  @push('scripts')
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
  <script src="{{ asset('/js/my.js') }}"></script>

  <script type="text/javascript">
      $(document).ready(function() {
      $('.ckeditor').ckeditor();
  });
  </script>
 
  @endpush
@endsection