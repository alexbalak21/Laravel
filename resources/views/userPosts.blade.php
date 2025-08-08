<x-layout title="My Posts">
    <h1 class="text-center">My Posts</h1>
    <div class="container">
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ $post->content }}</p>
                            <a href="/posts/{{ $post->id }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>