@extends('layout.app')


@section('content')
<div class="card-body p-0">
    {{-- <table class="table table-striped projects"> --}}
    <table class="table table-bordered border-primary">
        <thead>
            <tr>

                <th >
                    ID
                </th>

                <th class="text-center">
                    User Name
                </th>

                <th class="text-center">
                    Email
                </th>

                <th class="text-center">
                    Contact
                </th>

                <th  class="text-center">
                    Permissions
                </th>
                <th class="text-center">
                    Edit
                </th>
                <th class="text-center">
                    Delete
                </th>

            </tr>
        </thead>
        @foreach ($users as $user)
        <tbody>
            <tr>
                <td class="text-center">
                    {{$user->id}}
                </td>

                <td class="text-center">
                    {{ $user->username}}
                </td>

                <td class="text-center">
                    {{ $user->email}}
                </td>

                <td class="text-center" style="width:20px; height:40px;">
                    {{ $user->contact}}
                </td>
                <td class="text-center" >
                    <a class="btn btn-warning btn-sm" href="#">
                        <i class="fas fa-folder">
                        </i>
                        Permissions
                    </a>

                </td>
                <td class="text-center">
                    <a class="btn btn-info btn-sm" href="{{route('edit.index', ['id' => $user->id])}}">
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
