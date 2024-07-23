@extends('User.layouts.main')
@section('content')

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('Images/tourguide.png') }}" class="card-img-top" alt="Tour Guide">
                    <div class="card-body">
                        <h5 class="card-title">Card Title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <div class="text-center">
                            <a href="/User/blogdescription.html" class="btn btn-primary">See more</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('Images/tourguide.png') }}" class="card-img-top" alt="Tour Guide">
                    <div class="card-body">
                        <h5 class="card-title">Card Title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <div class="text-center">
                            <a href="/User/blogdescription.html" class="btn btn-primary">See more</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('Images/tourguide.png') }}" class="card-img-top" alt="Tour Guide">
                    <div class="card-body">
                        <h5 class="card-title">Card Title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <div class="text-center">
                            <a href="/User/blogdescription.html" class="btn btn-primary">See more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

@endsection
