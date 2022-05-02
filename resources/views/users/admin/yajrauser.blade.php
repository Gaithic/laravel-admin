@extends('layout.app')


@section('content')
<div class="card-body p-0">
    <table class="table table-bordered yajra-datatable">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th width="100px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>


    <script type="text/javascript">
        $(function {
            var table = $('.yajra-datatable').DataTable({
                processing: true,
                serverside: true,
                ajax: "{{ route('manage-uesers') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', username: 'username'},
                    {data: 'email', email: 'email'},
                    {data: 'contact', contact: 'contact'},
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

</div>
@endsection