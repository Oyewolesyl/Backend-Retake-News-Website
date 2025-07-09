@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="admin-header mb-4">
                <h1><i class="fas fa-tachometer-alt me-3"></i>Admin Dashboard</h1>
                <p class="text-muted">Manage your news website content and users</p>
            </div>
            
            <div class="row mt-4">
                <div class="col-md-4 mb-4">
                    <div class="card admin-card h-100">
                        <div class="card-body text-center">
                            <div class="admin-icon mb-3">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            <h5 class="card-title">Articles</h5>
                            <p class="card-text text-muted">Create, edit and manage news articles</p>
                            <a href="{{ route('admin.articles') }}" class="btn btn-primary">Manage Articles</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card admin-card h-100">
                        <div class="card-body text-center">
                            <div class="admin-icon mb-3">
                                <i class="fas fa-users"></i>
                            </div>
                            <h5 class="card-title">Users</h5>
                            <p class="card-text text-muted">View and manage registered users</p>
                            <a href="{{ route('admin.users') }}" class="btn btn-primary">Manage Users</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card admin-card h-100">
                        <div class="card-body text-center">
                            <div class="admin-icon mb-3">
                                <i class="fas fa-user-shield"></i>
                            </div>
                            <h5 class="card-title">Administrators</h5>
                            <p class="card-text text-muted">View all admin users</p>
                            <a href="{{ route('admin.admins') }}" class="btn btn-primary">View Admins</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.admin-header h1 {
    color: #dc3545;
    font-family: 'Playfair Display', serif;
}

.admin-card {
    transition: all 0.3s ease;
    border: 1px solid #e9ecef;
}

.admin-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    border-color: #dc3545;
}

.admin-icon i {
    font-size: 3rem;
    color: #dc3545;
}
</style>
@endsection