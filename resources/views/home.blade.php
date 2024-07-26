@extends('User.layouts.main')
@section('content')

<div class="container mt-4">
    <div class="row">
@foreach ($blog as $b)
            <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{asset($b->image)}}" class="card-img-top" alt="Tour Guide">
                <div class="card-body">
                    <h5 class="card-title">{{$b->title}}</h5>
                    <p class="card-text">{{$b->description}}</p>
                    <div class="text-center">
                        <a href="{{route('user.blogDescription',['id'=>$b->id])}}" class="btn btn-primary">See more</a>
                    </div>
                </div>
            </div>
        </div>
@endforeach
    </div>
</div>
@endsection
