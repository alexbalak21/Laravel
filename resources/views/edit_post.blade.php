<x-layout title="Edit Post">
    <h1>Edit Post</h1>
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" required>{{ $post->content }}</textarea>
        </div>
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary">Update <i class="fa-solid fa-pen ms-1"></i></button>
        </div>
    </form>
</x-layout>