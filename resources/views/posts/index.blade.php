@extends('layout.app')


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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection


@push('scripts')
    @push('scripts')
    <script>
        $(function() {
            var table = $('#data-table').DataTable({
                processing: true,
                serverside: true,
                ajax: "{{ route('manage-post') }}",
                columns: [
                    {data: 'title', name: 'title'},
                    {data: 'body', name: 'body'},
                    {data: 'cover_image', name: '<img src="/storage/cover_image">'},
                   
                 
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    }
                ]

            });
        });
    </script>
@endpush
@endpush