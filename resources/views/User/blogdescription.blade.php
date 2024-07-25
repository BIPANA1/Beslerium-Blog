@extends('User.layouts.main')
@section('content')
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>


<h6 class="display-6 text-center">Comment Section</h6>
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
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <i class="far fa-thumbs-up"></i>
                        <i class="fa-regular fa-thumbs-down fa-flip-horizontal"></i>
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
        <div class="mb-4">
            <textarea class="form-control" rows="4" placeholder="Enter your comment here..."></textarea>
        </div>
        <div>
            <button class="btn btn-primary">Send</button>
        </div>
    </div>
</div>
</div>


<!-- edit page for User's Blog -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="editProfileModalLabel">Edit Blog</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form>
            <div class="mb-3">
                <label for="profileImage" class="form-label">Profile Image</label>
                <input type="file" class="form-control" id="profileImage">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Title</label>
                <input type="text" class="form-control" value="" id="title">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Description</label>
                <textarea type="text" value="" class="form-control" id="address"> </textarea>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save Changes</button>
    </div>
</div>
</div>
</div>


<!-- edit page for comment -->
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
</form>

</div>
</div>
</div>


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
