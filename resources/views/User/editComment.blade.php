@extends('User.layouts.main')

@section('content')
<div class="container mt-5">
    <form action="{{ route('comment.update', $comment->id) }}" method="POST" class="form-control">
        @csrf
        @method('POST')
        <h2 class="mb-4 text-center">Edit Comment</h2>
        <div class="form-group">
            <label for="comment">Comment</label>
            <textarea name="comment" id="comment" class="form-control" rows="4" required>{{ $comment->comment }}</textarea>
        </div>
        <div class="text-center mt-3">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection
