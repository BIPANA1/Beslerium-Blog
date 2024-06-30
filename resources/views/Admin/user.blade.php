@extends('Admin.layouts.main')
@section('content')

<div class="container">
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

</main>
</div>












@endsection
