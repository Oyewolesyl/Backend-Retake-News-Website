@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1><i class="fas fa-newspaper me-3"></i>Manage Articles</h1>
                    <p class="text-muted mb-0">Create, edit and manage your news content</p>
                </div>
                <a href="{{ route('admin.articles.create') }}" class="btn btn-success">
                    <i class="fas fa-plus me-2"></i>Create New Article
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
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
                                    <th width="150">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($articles as $article)
                                    <tr>
                                        <td>
                                            <strong>{{ Str::limit($article->title, 50) }}</strong>
                                        </td>
                                        <td>{{ $article->user->name }}</td>
                                        <td>
                                            <span class="badge {{ $article->published ? 'bg-success' : 'bg-warning text-dark' }}">
                                                {{ $article->published ? 'Published' : 'Draft' }}
                                            </span>
                                        </td>
                                        <td>{{ $article->created_at->format('M j, Y') }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.articles.edit', $article->id) }}" 
                                                   class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form method="POST" action="{{ route('admin.articles.delete', $article->id) }}" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                                            onclick="return confirm('Are you sure you want to delete this article?')">
                                                        <i class="fas fa-trash"></i>
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