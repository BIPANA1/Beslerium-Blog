@extends('Admin.layouts.main')
@section('content')

<div class="container mt-4">
    <table class="table" style="margin-left:35%">
        <thead class="thead-white">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Role</th>
                <th scope="col">Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $use)
            <tr>
                <td>{{$use->name}}</td>
                <td>{{$use->email}}</td>
                <td>{{$use->address}}</td>
                <td>{{$use->role}}</td>
                <td>
                  <img src="{{asset($use->image)}}" height="45px" width="45px">
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>

</main>
</div>












@endsection
