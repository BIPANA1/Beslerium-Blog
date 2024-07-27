@extends('Admin.layouts.main')
@section('content')

<main class="main-container">
    <div class="main-title">
      <p class="font-weight-bold">DASHBOARD</p>
    </div>

    <div class="container">
      <div class="row mb-4 justify-content-center">
        <div class="col-md-6 shadow">
          <table class="table">
            <thead class="thead-white">
              <tr>
                  <th scope="col">Title</th>
                  <th scope="col">Name</th>
                  <th scope="col">Address</th>
              </tr>
          </thead>
          <tbody>
            @foreach ($blog as $blogs)
              <tr>
                  <td>{{$blogs->title}}</td>
                  <td>{{$blogs->user->name}}</td>
                  <td>{{$blogs->user->address}}</td>
                  <td>
                    <img src="{{asset($blogs->user->image)}}" height="45px" width="45px">
                  </td>
              </tr>
              @endforeach
          </tbody>
          </table>
        </div>
      </div>
    </div>


    <div class="container-fluid">
      <div class="charts-card">
        <p class="chart-title">Top 5 Products</p>
        <div id="bar-chart"></div>
      </div>
      <!-- <div class="charts-card">
        <p class="chart-title">Top 5 Products</p>
        <div id="bar-chart"></div>
      </div> -->
    </div>
  </main>

@endsection
