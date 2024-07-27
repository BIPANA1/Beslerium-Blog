@extends('User.layouts.main')
@section('content')
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>


<h6 class="display-6 text-center">Blog Section</h6>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card mb-3">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <img src="{{asset($blog->image)}}" height="45px" width="45px" class="rounded-circle me-2" alt="User Image">
                    <div>
                        <p class="m-0">{{$user->name}}</p>
                        <p class="m-0">{{$user->email}}</p>
                    </div>
                </div>
                <p>{{$blog->description}}</p>
                <div class="d-flex justify-content-between align-items-center cursor-pointer">
                    <div>
                        <button class="btn btn-outline-success upvote-btn" data-id="{{ $blog->id }}">
                            <i class="far fa-thumbs-up"></i>
                        </button>
                        <span class="like-count">{{ $blog->upvote }}</span>

                        <button class="btn btn-outline-danger downvote-btn" data-id="{{ $blog->id }}">
                            <i class="fa-regular fa-thumbs-down fa-flip-horizontal"></i>
                        </button>
                        <span class="dislike-count">{{ $blog->downvote }}</span>
                    </div>

                    <div class="text-muted">
                        <i class="far fa-clock"></i> {{$blog->created_at}}
                    </div>
                </div>
                @if (Auth::user() == $user)
                <div class="mt-4">
                    <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#editCommentModal">
                        <i class="fas fa-edit"></i>
                    </button>
                    <form action="{{ route('blog.destroy', ['id' => $blog->id]) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?');">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </div>
            @endif
            </div>
        </div>
        <div>
        </div>

        {{-- User's comment section --}}

        <h6 class="display-6 text-center">Comment Section</h6>
        <div class="row justify-content-center">

        @foreach($comments as $comment)
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-body">
                    {{-- @if ($comment->user) --}}
                    <div class="d-flex align-items-center">
                        <p> <img src="{{asset($comment->user->image)}}" height="45px" width="45px" alt="image" style="border-radius: 50%;">{{$comment->user->name}} </p>
                    </div>
                    {{-- @endif --}}

                    <p>{{$comment->comment}}</p>
                    @if (Auth::user() == $user)
                    <a href="{{route('comment.edit',['id'=>$comment->id])}}" class="btn btn-primary ml-4 mr-2">
                        <i class="fa-solid fa-edit"></i> Edit</a>
                        <form action="{{ route('comment.destroy', ['id' => $comment->id]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?');">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                        </form>
                    @endif

                        <p></p>
                    <div class="mt-4" style="cursor: pointer">
                        <a href=""><button class="btn btn-outline-success upvote=btn" data-id="{{$comment->id}}" ><i class="fas fa-thumbs-up"></i></button></a>
                        <span class="like-count">{{$comment->upvote}}</span>
                        <a href=""><button class="btn btn-outline-danger downvote-btn" data-id="{{$comment->id}}" style="cursor: pointer"><i class="fas fa-thumbs-down"></i></button></a>
                        <span class="dislike-count">{{$comment->downvote}}</span>
                    </div>
                    <div class="flex" style="margin-left: 58%;">
                        <div class="sidebar-brand mg-4 mt-2 flex" style="cursor: pointer; margin-left: 15%; margin-bottom: 5%;">
                            <span style="margin-left: 18%;"> <i class="fa-regular fa-clock"></i> {{$comment->created_at}} </span>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
        @endforeach

    </div>


        <form action="{{ route('comment.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="comment">Your Comment</label>
                <textarea name="comment" id="comment" class="form-control mt-2" required></textarea>
            </div>
            <input type="hidden" name="blog_id" value="{{ $blog->id }}" />
            <button type="submit" class="btn btn-primary mt-4">Submit</button>
        </form>
    {{-- </div> --}}
{{-- </div> --}}
</div>


<!-- edit page for user's blog -->
<form action="{{route('blog.update',['id'=> $blog->id])}}" method="POST" enctype="multipart/form-data">
@csrf
<div class="modal fade" id="editCommentModal" tabindex="-1" aria-labelledby="editCommentModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="editProfileModalLabel">Edit comment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form>
            <div class="mb-3">
                <label for="profileImage" class="form-label">Profile Image</label>
                <img src="{{ asset($blog->image)}}" alt="blog-image" height="100px" width="auto">
                <input type="file" onchange="previewImage(event)" name="image" class="form-control" id="profileImage">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Title</label>
                <input type="text" name="title" value={{$blog->title}} class="form-control" id="title">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Description</label>
                <textarea type="text" class="form-control" name="description" id="address"> {{$blog->description}} </textarea>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit"  class="btn btn-primary">Save Changes</button>
    </div>
</div>
</div>
</div>
</form>



@endsection

<script>
    function previewImage(event){
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function(){
            var imgElement = document.getElementById('image-preview');
            imgElement.src = reader.result;
        }
        reader.readAsDataURL(input.files[0]);

    }
</script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Handle upvote
        $('.upvote-btn').click(function(e) {
            e.preventDefault();
            var blogId = $(this).data('id');
            var $button = $(this);

            $.ajax({
                url: '{{route('blog.upvote',['id'=>$blog->id])}}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $button.next('.like-count').text(response.upvote);
                    $button.siblings('.dislike-count').text(response.downvote);
                }
            });
        });

        // Handle downvote
        $('.downvote-btn').click(function(e) {
            e.preventDefault();
            var blogId = $(this).data('id');
            var $button = $(this);

            $.ajax({
                url: '{{route('blog.downvote',['id'=>$blog->id])}}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $button.next('.dislike-count').text(response.downvote);
                    $button.siblings('.like-count').text(response.upvote);
                }
            });
        });
    });
</script>
