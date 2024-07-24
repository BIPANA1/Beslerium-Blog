@extends('User.layouts.main')
@section('content')

<style>

    input[type="submit"] {
        margin-left: 3%;
        padding: 8px 100px;
        border-radius: 10px;
        background-color: cadetblue;
        font-weight: bold;
        color: #333333;
        cursor: pointer;
        margin-top: 5px;
    }

    input[type="submit"]:hover {
        background-color: rgb(96, 178, 181);
    }

    label {
        color: #666;
        margin-left: 20px;
        margin-bottom: 5%;
        display: block; /* Ensures labels are displayed on new lines */
    }

    input[type="text"],
    input[type="file"] {
        width: 80%;
        margin: 8px;
        padding: 5px 7px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    .form-items {
        width: 350px;
        height: 440px;
        margin: auto;
        padding: 20px;
        border: 1px solid #090909;
        border-radius: 8px;
        margin-top: 4%;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.15);
        border: 1px solid #ccc;
    }

    .heading {
        margin-left: 30%;
        color: #1d1b1b;
    }

    </style>

<form class="form-items" method="POST" action="{{route('blog.store')}}" enctype="multipart/form-data">
    @csrf
    <div>
        <h2 class="heading">Add Blog</h2>
        <label for="title">Title</label>
        <input type="text" id="title" name="title">
    </div>
    <div>
        <label for="image">Image</label>
        <input type="file" id="image" name="image">
    </div>
    <div>
        <label for="description">Description</label>
        <input type="text" id="description" name="description">
    </div>
    <div>
        <input class="btn" type="submit" name="post" value="Submit">
    </div>
</form>



@endsection
