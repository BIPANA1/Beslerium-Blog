@extends('Admin.layouts.main')
@section('content')

<main class="main-container">
    <div class="main-title">
      <p class="font-weight-bold">DASHBOARD</p>
    </div>
    <div class="container">
        <div class="dropdown pt-2" style="margin-left:72%">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Popularity
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item sort-blog" href="#" data-sort="highest">Highest</a></li>
                <li><a class="dropdown-item sort-blog" href="#" data-sort="lowest">Lowest</a></li>
            </ul>
        </div>

        <div class="container mt-2" id="blog-list">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>User Name</th>
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blog as $blogs )
                    <tr>
                        <td>{{$blogs->user->name}}</td>
                        <td>{{$blogs->title}}</td>
                        <td>
                            <img src="{{asset($blogs->image)}}" alt="image" height="55px" width="55px">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.sort-blog').click(function(e) {
        e.preventDefault();

        var sortType = $(this).data('sort');
        var url = '';

        if (sortType === 'highest') {
            url = '{{ route('admin.highest') }}';
        } else if (sortType === 'lowest') {
            url = '{{ route('admin.lowest') }}';
        }

        $.ajax({
            url: url,
            type: 'GET',
            success: function(response) {
                var blogList = $('#blog-list tbody');
                blogList.empty();

                response.forEach(function(blog) {
                    blogList.append(
                        '<tr>' +
                            '<td>' + blog.user.name + '</td>' +
                            '<td>' + blog.title + '</td>' +
                            '<td>' +
                                '<img src="' + blog.image + '" alt="image" height="55px" width="55px">' +
                            '</td>' +
                        '</tr>'
                    );
                });
            }
        });
    });
});
</script>
