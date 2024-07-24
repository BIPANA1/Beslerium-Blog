@extends('User.layouts.main')
@section('content')



<div class="d-flex mr-4 mt-4 justify-content-end">
    <span >
      <a href="{{route('user.addBlog')}}" class="btn btn-primary">Add Blog</a>
    </span>
  </div>

  <div class="container mt-4">
    @foreach ($blog as $b )
  <div class="row">
    <div class="col-md-4 mb-4">
        <div class="card" style="">
            <img src="{{asset($b->image)}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{$b->title}}</h5>
              <p class="card-text">{{$b->description}}</p>
              <div class="text-center">
                <a href="{{route('user.blogDescription')}}" class="btn btn-primary">See more</a>
              </div>
            </div>
          </div>
    </div>

    {{-- <div class="col-4">
        <div class="card" style="width: 18rem;">
            <img src="/Image/tourguide.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <div class="text-center">
                <a href="/User/blogdescription.html" class="btn btn-primary">See more</a>
              </div>
            </div>
          </div>
    </div>
    <div class="col-4">
        <div class="card" style="width: 18rem;">
            <img src="/Image/tourguide.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <div class="text-center">
                <a href="/User/blogdescription.html" class="btn btn-primary">See more</a>
              </div>
            </div>
          </div>
    </div> --}}


  </div>
  @endforeach
</div>


@endsection
