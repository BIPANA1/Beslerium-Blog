@extends('Admin.layouts.main')
@section('content')

<main class="main-container">
    <div class="main-title">
      <p class="font-weight-bold">DASHBOARD</p>
    </div>
        <div class="container">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>User Name</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blog as $blogs )
                    <tr>
                        <td>{{$blogs->user->name}}</td>
                        <td>{{$blogs->title}}</td>
                        <td>{{$blogs->description}}</td>
                        <td>
                          <img src="{{asset($blogs->image)}}" height="45px" width="45px">
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
  </main>

@endsection
