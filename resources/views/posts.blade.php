{{-- IF I PASS A USER ID TO THIS VIEW, IT WILL SHOW ONLY THAT USER'S POSTS --}}

<x-layout title="{{ isset($user_id) && $user_id ? 'My Posts' : 'Posts' }}">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h1 class="text-center">{{ isset($user_id) && $user_id ? 'My' : '' }} Posts</h1>
    
    <div class="text-end my-4">
    @auth
    @if (!isset($user_id))
        <a href="/posts/my" class="btn btn-success ">My Posts <i class="fa-solid fa-user ms-1"></i></a>
    @else
        <a href="/posts" class="btn btn-success ">All Posts <i class="fa-solid fa-globe ms-1"></i></a>
    @endif
    @endauth
    </div>
    
    <div class="row">
        @foreach ($posts as $post)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->content }}</p>
                        <a href="/posts/{{ $post->id }}" class="btn btn-info">view <i class="fa-solid fa-eye ms-1"></i></a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>