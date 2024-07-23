@extends('Admin.layouts.main')
@section('content')

<main class="main-container">
    <div class="main-title">
      <p class="font-weight-bold">DASHBOARD</p>
    </div>

    <div class="container">
      <div class="row mb-4">
        <div class="col-md-6 shadow">
          <table class="table">
            <thead class="thead-white">
              <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Address</th>
                  <th scope="col">Role</th>
                  <th scope="col">Image</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <td>1</td>
                  <td>Product A</td>
                  <td>Product A</td>
                  <td>Dharan</td>
                  <td>User</td>
                  <td>
                    <img src="/Image/user.png" height="45px" width="45px">
                  </td>
              </tr>
          </tbody>
          </table>
        </div>
        <div class="col-md-6 shadow">
          <table class="table">
            <thead class="thead-white">
              <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Address</th>
                  <th scope="col">Role</th>
                  <th scope="col">Image</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <td>1</td>
                  <td>Product A</td>
                  <td>Product A</td>
                  <td>Dharan</td>
                  <td>User</td>
                  <td>
                    <img src="/Image/user.png" height="45px" width="45px">
                  </td>
              </tr>
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
