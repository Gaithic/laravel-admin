@extends('layout.app')

@push('styles')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"
@endpush
@section('breadcrumbs')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Create User</h1>
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
<form action="{{route('create-user')}}" method="post" id="updateUser" style="color: red;">
    @csrf
    <div class="card-body">
      <div class="form-group">
        <label for="exampleInputEmail1" style="color: #222;">User Name</label>
        <input type="text" class="form-control"  name="username" placeholder="User Name"  >
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1" style="color: #222;">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email" >
      </div>


      <div class="form-group">
        <label for="exampleInputEmail1" style="color: #222;" >User Contact</label>
        <input type="text" class="form-control"  name="contact" placeholder="User Contact">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1" style="color: #222;" >User Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="User Password" >
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1" style="color: #222;" >Confirm Password</label>
        <input type="password" class="form-control"  name="confirm-password" placeholder="Confirm Password" >
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1" style="color: #222;" >Role id</label>
        <select name="cars" id="cars">
            <option >Select</option>
            <option value="1">Admin</option>
            <option value="2">Manager</option>
            <option value="3">user</option>
        </select>
      </div>



      <div class="form-group" style="margin:10px;">
        <input type="radio" id="approved" name="isapproved" value="1" style="accent-color: green;">
          <label for="Appraved" style="color: green;" >Enabled</label>
    <br>
        <input type="radio" id="approved" name="isapproved" value="2" style="accent-color: red;">
        <label for="cancel" style="color:red;">Disabled</label>
  </div>









    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <button type="submit" style="float: right;" class="btn btn-primary">Cancel</button>
    </div>

  </form>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <script>
    $(document).ready(function() {
        $("#updateUser").validate({
            rules: {
              username: "required",
              email: "required",
              contact: "required",
              isapproved: "required",
              password : {
                  required: true,
                    minlength : 5
                },
                password_confirm : {
                    required: true,
                    minlength : 5,
                    equalTo : "#password"
                }
            }
        });
    });
</script>
@endsection
