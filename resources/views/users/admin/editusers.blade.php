@extends('layout.app')

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
<form action="{{ route('update-user', ['id' => $user->id]) }}" method="post">
    @csrf
    @method('PUT')
    <div class="card-body">
      <div class="form-group">
        <label for="exampleInputEmail1" >User Name</label>
        <input type="text" class="form-control"  name="username" placeholder="User Name" value="{{ $user->username }}">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1" >Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email" value="{{$user->email}}">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1" >User Contact</label>
        <input type="text" class="form-control"  name="contact" placeholder="User Contact" value="{{$user->contact}}">
      </div>

    
      
      
      
    
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <button type="submit" style="float: right;" class="btn btn-primary">Cancel</button>
    </div>
    
  </form>
@endsection
