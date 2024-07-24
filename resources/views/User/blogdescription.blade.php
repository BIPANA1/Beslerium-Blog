@extends('User.layouts.main')
@section('content')

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
                <div class="mt-4">
                    <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#editCommentModal">  <i class="fas fa-edit"></i> </button>
                    <button type="button" class="btn btn-danger">  <i class="fas fa-trash-alt"></i></button>
                </div>



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
                <input type="text" class="form-control" id="title">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Description</label>
                <textarea type="text" class="form-control" id="address"> </textarea>
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
                <input type="file" class="form-control" id="profileImage">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Title</label>
                <input type="text" class="form-control" id="title">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Description</label>
                <textarea type="text" class="form-control" id="address"> </textarea>
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


@endsection
