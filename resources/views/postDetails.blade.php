<x-layout title="{{ $post->title }}">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <article class="card shadow-sm">
                    <div class="card-body">
                        <!-- Post Title -->
                        <h1 class="card-title display-5 mb-4">{{ $post->title }}</h1>
                        
                        <!-- Post Meta -->
                        <div class="d-flex align-items-center mb-4">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                    {{ strtoupper(substr($post->user->name, 0, 1)) }}
                                </div>
                                <div class="ms-3">
                                    <h6 class="mb-0">{{ ucfirst($post->user->name) }}</h6>
                                    <small class="text-muted">
                                        <i class="far fa-clock me-1"></i> 
                                        Last updated {{ $post->updated_at->diffForHumans() }}
                                    </small>
                                </div>
                            </div>
                            <div class="ms-auto">
                                <span class="badge bg-light text-dark">
                                    <i class="far fa-calendar-alt me-1"></i>
                                    {{ $post->created_at->format('M d, Y') }}
                                </span>
                            </div>
                        </div>
                        
                        <!-- Post Content -->
                        <div class="post-content mb-4">
                            {!! nl2br(e($post->content)) !!}
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                            <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-2"></i> Back to Posts
                            </a>
                            @auth
                                @if(Auth::id() === $post->user_id)
                                    <div class="d-flex">
                                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-outline-primary me-2">
                                            <i class="fas fa-edit me-1"></i> Edit
                                        </a>
                                        <div>
                                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                                <i class="fas fa-trash me-1"></i> Delete
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            @endauth
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
    
    @push('styles')
    <style>
        .post-content {
            font-size: 1.1rem;
            line-height: 1.8;
        }
        .post-content p:last-child {
            margin-bottom: 0;
        }
    </style>
    @endpush
    
    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this post? This action cannot be undone.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash me-1"></i> Delete Post
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>