@extends('layouts.app')

@section('content')
<style>
    /* Common style for both buttons */
    .action-btn {
        width: 100px;
        height: 36px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 0.875rem;
        padding: 0;
        border-radius: 6px !important; /* Force same radius */
        transition: all 0.2s ease;
    }

    /* Edit button active/focus style */
    .btn-outline-primary.action-btn:active,
    .btn-outline-primary.action-btn:focus,
    .btn-outline-primary.action-btn:focus-visible {
        background-color: #cce5ff !important; /* Light blue active */
        color: #084298 !important;
        border-color: #b6d4fe !important;
    }

    /* Optional: Hover style for Edit button if you want consistency */
    .btn-outline-primary.action-btn:hover {
        background-color: #e2eefd;
        border-color: #b6d4fe;
        color: #084298;
    }
</style>

<div class="container py-4">
    <div class="row">
        <div class="col-12">
            {{-- Page header --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="h3 mb-1">
                        <i class="fas fa-newspaper me-2"></i>Manage Articles
                    </h1>
                    <p class="text-muted mb-0">Create, edit, and manage your news content</p>
                </div>
                <a href="{{ route('admin.articles.create') }}" class="btn btn-success">
                    <i class="fas fa-plus me-1"></i>Create New Article
                </a>
            </div>

            {{-- Success message --}}
            @if(session('success'))
                <div class="alert alert-success d-flex align-items-center">
                    <i class="fas fa-check-circle me-2"></i>
                    <div>{{ session('success') }}</div>
                </div>
            @endif

            {{-- Articles table --}}
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Articles Overview</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                    <th class="text-center" style="width: 220px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($articles as $article)
                                    <tr>
                                        <td><strong>{{ Str::limit($article->title, 50) }}</strong></td>
                                        <td>{{ $article->user->name }}</td>
                                        <td>
                                            <span class="badge {{ $article->published ? 'bg-success' : 'bg-warning text-dark' }}">
                                                {{ $article->published ? 'Published' : 'Draft' }}
                                            </span>
                                        </td>
                                        <td>{{ $article->created_at->format('M j, Y') }}</td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.articles.edit', $article->id) }}" 
                                                   class="btn btn-sm btn-outline-primary action-btn">
                                                    <i class="fas fa-edit me-1"></i>Edit
                                                </a>
                                                <form method="POST" action="{{ route('admin.articles.delete', $article->id) }}" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="btn btn-sm btn-outline-danger action-btn"
                                                            onclick="return confirm('Are you sure you want to delete this article?')">
                                                        <i class="fas fa-trash me-1"></i>Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4">
                                            <i class="fas fa-newspaper text-muted mb-2" style="font-size: 2rem;"></i>
                                            <p class="text-muted mb-0">No articles found</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
