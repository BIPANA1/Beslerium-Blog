@extends('User.layouts.main')
@section('content')

<div class="d-flex mt-4 justify-content-end" style="margin-right: 28px">
    <span >
      <a href="{{route('user.addBlog')}}" class="btn btn-primary">Add Blog</a>
    </span>
  </div>

  <div class="container">
  <div class="row mt-4 mb-4">
    @foreach ($blog as $b )
    <div class="col-4">
        <div class="card" style="width: 18rem; margin-left: 5%; object-fit:cover">
            <img src="{{asset($b->image)}}" class="card-img-top" alt="...">
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
