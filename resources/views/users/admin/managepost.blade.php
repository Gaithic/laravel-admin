@extends('layout.app')


@section('content')
<div class="card-body p-0">
    {{-- <table class="table table-striped projects"> --}}
    <table class="table table-bordered border-primary">
        <thead>
            <tr>

                <th >
                    Author Name
                </th>

                <th >
                    Post Title
                </th>

                <th class="text-center">
                    Post Body
                </th>

                <th  class="text-center">
                    Approval
                </th>
                <th  class="text-center">
                    View
                </th>
                <th class="text-center">
                    Edit
                </th>
                <th class="text-center">
                    Delete
                </th>

            </tr>
        </thead>
        @foreach ($posts as $post)
        <tbody>
            <tr>
                <td >
                    {{ $post->user_id}}
                </td>
                <td class="text-center">
                    {{ $post->title}}
                </td>

                <td class="text-center" style="width:20px; height:40px;">
                    {{ $post->body}}
                </td>
                <td class="text-center" >
                    <a class="btn btn-danger btn-sm" href="#">
                        <i class="fas fa-folder">
                        </i>
                        Pending
                    </a>

                </td>

                <td class="text-center">
                    <a class="btn btn-primary btn-sm" href="#">
                        <i class="fas fa-folder">
                        </i>
                        View
                    </a>
                </td>
                <td class="text-center">
                    <a class="btn btn-info btn-sm" href="#">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Edit
                    </a>
                </td>
                <td class="text-center">
                    <a class="btn btn-danger btn-sm" href="#">
                        <i class="fas fa-trash">
                        </i>
                        Delete
                    </a>
                </td>
            </tr>
        </tbody>

        @endforeach


    </table>
  </div>




@endsection
