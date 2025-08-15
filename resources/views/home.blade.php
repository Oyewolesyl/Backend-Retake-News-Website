@extends('layouts.app')

@section('content')
<div class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="hero-title">Latest News & Updates</h1>
                <p class="hero-subtitle">Stay informed with breaking news and in-depth analysis</p>

                  {{-- ✅ Add search form here --}}
                <form action="{{ route('home') }}" method="GET" class="hero-search mt-3">
                    <div class="input-group justify-content-center">
                        <input 
                            type="text" 
                            name="search" 
                            class="form-control w-50" 
                            placeholder="Search articles..." 
                            value="{{ request('search') }}"
                        >
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-8">
            <div class="news-section">
                <div class="section-header">
                    <h2><i class="fas fa-newspaper me-2"></i>Breaking News</h2>
                    <div class="section-line"></div>
                </div>
                

                
                <div class="row">
                    @forelse($articles as $article)
                        <div class="col-md-6 mb-4">
                            <article class="news-card">
                                @if($article->image)
                                    <div class="news-image">
                                        <img src="{{ asset('storage/' . $article->image) }}" 
                                             alt="{{ $article->title }}" 
                                             class="img-fluid">
                                        <div class="news-overlay">
                                            <span class="news-category">Breaking</span>
                                        </div>
                                    </div>
                                @endif
                                
                                <div class="news-content">
                                    <div class="news-meta">
                                        <span class="news-date">
                                            <i class="fas fa-calendar-alt me-1"></i>
                                            {{ $article->created_at->format('M j, Y') }}
                                        </span>
                                        <span class="news-author">
                                            <i class="fas fa-user me-1"></i>
                                            {{ $article->user->name }}
                                        </span>
                                    </div>
                                    
                                    <h3 class="news-title">
                                        <a href="{{ route('article.show', $article->id) }}">
                                            {{ $article->title }}
                                        </a>
                                    </h3>
                                    
                                    <p class="news-excerpt">
                                        {{ Str::limit(strip_tags($article->content), 120) }}
                                    </p>
                                    
                                    <a href="{{ route('article.show', $article->id) }}" 
                                       class="read-more">
                                        Read More <i class="fas fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </article>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="no-news">
                                <i class="fas fa-newspaper text-muted mb-3"></i>
                                <h4>No News Available</h4>
                                <p class="text-muted">Check back later for the latest updates.</p>
                            </div>
                        </div>
                    @endforelse
                </div>
                
                <div class="pagination-wrapper">
                    {{ $articles->links('custom-pagination') }}
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="sidebar">
                <div class="sidebar-widget">
                    <h4 class="widget-title">
                        <i class="fas fa-fire me-2"></i>Trending Now
                    </h4>
                    <div class="trending-list">
                        @foreach($articles->take(5) as $trending)
                            <div class="trending-item">
                                <div class="trending-number">{{ $loop->iteration }}</div>
                                <div class="trending-content">
                                    <a href="{{ route('article.show', $trending->id) }}" 
                                       class="trending-title">
                                        {{ Str::limit($trending->title, 60) }}
                                    </a>
                                    <span class="trending-date">
                                        {{ $trending->created_at->diffForHumans() }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                
                <div class="sidebar-widget">
                    <h4 class="widget-title">
                        <i class="fas fa-tags me-2"></i>Categories
                    </h4>
                    <div class="category-list">
                        <a href="#" class="category-item">Politics <span class="count">12</span></a>
                        <a href="#" class="category-item">Sports <span class="count">8</span></a>
                        <a href="#" class="category-item">Technology <span class="count">15</span></a>
                        <a href="#" class="category-item">Business <span class="count">6</span></a>
                        <a href="#" class="category-item">Entertainment <span class="count">9</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.hero-section {
    background: linear-gradient(135deg, #dc3545, #c82333);
    color: white;
    padding: 4rem 0;
    margin-bottom: 2rem;
}

.hero-title {
    font-family: 'Playfair Display', serif;
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 1rem;
    color: white; 
}

.hero-subtitle {
    font-size: 1.2rem;
    opacity: 0.9;
}

.section-header {
    margin-bottom: 2rem;
    position: relative;
}

.section-header h2 {
    color: #dc3545;
    font-family: 'Playfair Display', serif;
    font-size: 2rem;
    margin-bottom: 0.5rem;
}

.section-line {
    height: 3px;
    width: 60px;
    background: #dc3545;
    margin-bottom: 1rem;
}

.news-card {
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    height: 100%;
}

.news-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

.news-image {
    position: relative;
    height: 200px;
    overflow: hidden;
}

.news-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.news-card:hover .news-image img {
    transform: scale(1.05);
}

.news-overlay {
    position: absolute;
    top: 15px;
    left: 15px;
}

.news-category {
    background: #dc3545;
    color: white;
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
}

.news-content {
    padding: 1.5rem;
}

.news-meta {
    display: flex;
    justify-content: space-between;
    margin-bottom: 1rem;
    font-size: 0.85rem;
    color: #666;
}

.news-title {
    margin-bottom: 1rem;
}

.news-title a {
    color: #333;
    text-decoration: none;
    font-size: 1.1rem;
    font-weight: 600;
    line-height: 1.4;
    transition: color 0.3s ease;
}

.news-title a:hover {
    color: #dc3545;
}

.news-excerpt {
    color: #666;
    line-height: 1.6;
    margin-bottom: 1rem;
}

.read-more {
    color: #dc3545;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.9rem;
    transition: all 0.3s ease;
}

.read-more:hover {
    color: #c82333;
}

.sidebar {
    padding-left: 2rem;
}

.sidebar-widget {
    background: white;
    border-radius: 10px;
    padding: 1.5rem;
    margin-bottom: 2rem;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.widget-title {
    color: #dc3545;
    font-family: 'Playfair Display', serif;
    margin-bottom: 1.5rem;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid #f8f9fa;
}

.trending-item {
    display: flex;
    align-items: flex-start;
    margin-bottom: 1rem;
    padding-bottom: 1rem;
    border-bottom: 1px solid #f8f9fa;
}

.trending-item:last-child {
    border-bottom: none;
    margin-bottom: 0;
}

.trending-number {
    background: #dc3545;
    color: white;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    margin-right: 1rem;
    flex-shrink: 0;
}

.trending-title {
    color: #333;
    text-decoration: none;
    font-weight: 600;
    line-height: 1.4;
    display: block;
    margin-bottom: 0.5rem;
    transition: color 0.3s ease;
}

.trending-title:hover {
    color: #dc3545;
}

.trending-date {
    font-size: 0.8rem;
    color: #666;
}

.category-list {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.category-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.75rem;
    background: #f8f9fa;
    border-radius: 5px;
    text-decoration: none;
    color: #333;
    transition: all 0.3s ease;
}

.category-item:hover {
    background: #dc3545;
    color: white;
}

.count {
    background: white;
    color: #dc3545;
    padding: 2px 8px;
    border-radius: 12px;
    font-size: 0.8rem;
    font-weight: 600;
}

.category-item:hover .count {
    background: rgba(255,255,255,0.2);
    color: white;
}

.no-news {
    text-align: center;
    padding: 4rem 2rem;
}

.no-news i {
    font-size: 4rem;
}

.pagination-wrapper {
    margin-top: 3rem;
    text-align: center;
}

@media (max-width: 768px) {
    .hero-title {
        font-size: 2rem;
    }
    
    .sidebar {
        padding-left: 0;
        margin-top: 2rem;
    }
    
    .news-card {
        margin-bottom: 2rem;
    }
}
</style>
@endsection