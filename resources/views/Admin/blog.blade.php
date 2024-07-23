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
                        <th scope="col">Id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Product A</td>
                        <td>A description of Product A</td>
                        <td>
                          <img src="/Image/user.png" height="45px" width="45px">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
  </main>

@endsection
