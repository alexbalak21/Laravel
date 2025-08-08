<x-layout title="New Post">
    <h1 class="text-center">New Post</h1>
    <form action="{{ route('posts.create') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" required></textarea>
        </div>
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary">Create <i class="fa-solid fa-circle-plus ms-1"></i></button>
        </div>
    </form>
</x-layout>