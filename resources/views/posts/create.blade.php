@extends('layout.master')

@section('content')
  <div style="margin: 20px;">
    <form action="{{ route('save-post') }}" method="POST" enctype="multipart/form-data" class="flex align-items-cemter" style="margin: 25px;">
          @csrf
          <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" class="form-control" id="title" name="title"  placeholder="Enter Title">
            @error('title')
              <div class="alert alert-danger">
                  <strong>{{ $message }}</strong>
              </div>

            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Body</label>
            <textarea type="text" class="ckeditor form-control" id="body" name="body" placeholder="Enter Message Here"></textarea>
          </div>
          @error('body')
              <div class="alert alert-danger">
                  <strong>{{ $message }}</strong>
              </div>
          @enderror

          <div class="form-group">
            <label for="exampleInputPassword1">Upload Image</label>
            <input type="file" class="ckeditor form-control" id="file" name="cover_image"/>
          </div>
          @error('cover_image')
              <div class="alert alert-danger">
                  <strong>{{ $message }}</strong>
              </div>
          @enderror
          <div class="form-group" >
            <button type="submit" class="btn btn-primary" style="margin: 10px;">Submit</button>
            <a href="" class="btn btn-danger" style="float: right; margin: 10px;" href="">Go Back</a>
          </div>
          <div class="form-group" >
          </div>
      </form>

  </div>


@endsection
