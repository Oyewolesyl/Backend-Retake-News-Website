<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8">
            <article class="article-detail">
                <div class="article-header">
                    <div class="article-meta">
                        <span class="article-category">
                            <i class="fas fa-tag me-1"></i>Breaking News
                        </span>
                        <span class="article-date">
                            <i class="fas fa-calendar-alt me-1"></i>
                            <?php echo e($article->created_at->format('F j, Y')); ?>

                        </span>
                        <span class="article-author">
                            <i class="fas fa-user me-1"></i>
                            By <?php echo e($article->user->name); ?>

                        </span>
                    </div>
                    
                    <h1 class="article-title"><?php echo e($article->title); ?></h1>
                    
                    <div class="article-social">
                        <span class="share-text">Share this article:</span>
                        <div class="social-buttons">
                            <a href="#" class="social-btn facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="social-btn twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="social-btn linkedin">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="social-btn whatsapp">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <?php if($article->image): ?>
                    <div class="article-image">
                        <img src="<?php echo e(asset('storage/' . $article->image)); ?>" 
                             alt="<?php echo e($article->title); ?>" 
                             class="img-fluid">
                        <div class="image-caption">
                            <i class="fas fa-camera me-2"></i><?php echo e($article->title); ?>

                        </div>
                    </div>
                <?php endif; ?>

                <div class="article-content">
                    <div class="content-body">
                        <?php echo nl2br(e($article->content)); ?>

                    </div>
                    
                    <div class="article-footer">
                        <div class="article-tags">
                            <i class="fas fa-tags me-2"></i>
                            <span class="tag">Breaking News</span>
                            <span class="tag">Politics</span>
                            <span class="tag">Current Affairs</span>
                        </div>
                        
                        <div class="article-actions">
                            <button class="action-btn like-btn">
                                <i class="fas fa-heart me-1"></i>Like (24)
                            </button>
                            <button class="action-btn comment-btn">
                                <i class="fas fa-comment me-1"></i>Comment
                            </button>
                            <button class="action-btn bookmark-btn">
                                <i class="fas fa-bookmark me-1"></i>Save
                            </button>
                        </div>
                    </div>
                </div>
            </article>
            
            <div class="related-articles">
                <h3 class="section-title">
                    <i class="fas fa-newspaper me-2"></i>Related Articles
                </h3>
                <div class="row">
                    <?php $__currentLoopData = $relatedArticles ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-6 mb-3">
                            <div class="related-card">
                                <?php if($related->image): ?>
                                    <div class="related-image">
                                        <img src="<?php echo e(asset('storage/' . $related->image)); ?>" 
                                             alt="<?php echo e($related->title); ?>">
                                    </div>
                                <?php endif; ?>
                                <div class="related-content">
                                    <h5>
                                        <a href="<?php echo e(route('article.show', $related->id)); ?>">
                                            <?php echo e(Str::limit($related->title, 60)); ?>

                                        </a>
                                    </h5>
                                    <span class="related-date">
                                        <?php echo e($related->created_at->format('M j, Y')); ?>

                                    </span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="sidebar">
                <div class="sidebar-widget">
                    <h4 class="widget-title">
                        <i class="fas fa-fire me-2"></i>Trending Stories
                    </h4>
                    <div class="trending-list">
                        <?php for($i = 1; $i <= 5; $i++): ?>
                            <div class="trending-item">
                                <div class="trending-number"><?php echo e($i); ?></div>
                                <div class="trending-content">
                                    <a href="#" class="trending-title">
                                        Breaking: Major political development shakes the nation
                                    </a>
                                    <span class="trending-date">2 hours ago</span>
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
                
                <div class="sidebar-widget">
                    <h4 class="widget-title">
                        <i class="fas fa-newspaper me-2"></i>Latest News
                    </h4>
                    <div class="latest-news">
                        <?php for($i = 1; $i <= 4; $i++): ?>
                            <div class="news-item">
                                <div class="news-thumb">
                                    <img src="/placeholder.svg?height=60&width=80" alt="News">
                                </div>
                                <div class="news-info">
                                    <h6><a href="#">Economic indicators show positive growth</a></h6>
                                    <span class="news-time">
                                        <i class="fas fa-clock me-1"></i>3 hours ago
                                    </span>
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
                
                <div class="sidebar-widget ad-widget">
                    <h4 class="widget-title">
                        <i class="fas fa-bullhorn me-2"></i>Advertisement
                    </h4>
                    <div class="ad-content">
                        <img src="/placeholder.svg?height=250&width=300" alt="Advertisement" class="img-fluid">
                        <p class="ad-text">Your Ad Here</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.article-detail {
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    margin-bottom: 2rem;
}

.article-header {
    padding: 2rem;
    border-bottom: 1px solid #f8f9fa;
}

.article-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    margin-bottom: 1.5rem;
    font-size: 0.9rem;
}

.article-category {
    background: #dc3545;
    color: white;
    padding: 5px 12px;
    border-radius: 20px;
    font-weight: 600;
}

.article-date, .article-author {
    color: #666;
}

.article-title {
    font-family: 'Playfair Display', serif;
    font-size: 2.5rem;
    font-weight: 700;
    color: #333;
    line-height: 1.3;
    margin-bottom: 1.5rem;
}

.article-social {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.share-text {
    color: #666;
    font-weight: 600;
}

.social-buttons {
    display: flex;
    gap: 0.5rem;
}

.social-btn {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    text-decoration: none;
    transition: all 0.3s ease;
}

.social-btn.facebook { background: #3b5998; }
.social-btn.twitter { background: #1da1f2; }
.social-btn.linkedin { background: #0077b5; }
.social-btn.whatsapp { background: #25d366; }

.social-btn:hover {
    transform: translateY(-2px);
    color: white;
}

.article-image {
    position: relative;
    margin-bottom: 2rem;
}

.article-image img {
    width: 100%;
    height: 400px;
    object-fit: cover;
}

.image-caption {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(0,0,0,0.7);
    color: white;
    padding: 1rem;
    font-size: 0.9rem;
}

.article-content {
    padding: 2rem;
}

.content-body {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #333;
    margin-bottom: 2rem;
}

.content-body p {
    margin-bottom: 1.5rem;
}

.article-footer {
    border-top: 1px solid #f8f9fa;
    padding-top: 1.5rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
}

.article-tags {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #666;
}

.tag {
    background: #f8f9fa;
    color: #dc3545;
    padding: 5px 12px;
    border-radius: 15px;
    font-size: 0.8rem;
    font-weight: 600;
}

.article-actions {
    display: flex;
    gap: 1rem;
}

.action-btn {
    background: none;
    border: 1px solid #e9ecef;
    color: #666;
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 0.9rem;
    cursor: pointer;
    transition: all 0.3s ease;
}

.action-btn:hover {
    background: #dc3545;
    border-color: #dc3545;
    color: white;
}

.related-articles {
    background: white;
    border-radius: 10px;
    padding: 2rem;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.section-title {
    color: #dc3545;
    font-family: 'Playfair Display', serif;
    margin-bottom: 1.5rem;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid #f8f9fa;
}

.related-card {
    display: flex;
    background: #f8f9fa;
    border-radius: 8px;
    overflow: hidden;
    transition: all 0.3s ease;
}

.related-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.related-image {
    width: 80px;
    height: 80px;
    flex-shrink: 0;
}

.related-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.related-content {
    padding: 1rem;
    flex: 1;
}

.related-content h5 {
    margin-bottom: 0.5rem;
}

.related-content a {
    color: #333;
    text-decoration: none;
    font-size: 0.9rem;
    line-height: 1.4;
    transition: color 0.3s ease;
}

.related-content a:hover {
    color: #dc3545;
}

.related-date {
    font-size: 0.8rem;
    color: #666;
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

.news-item {
    display: flex;
    margin-bottom: 1rem;
    padding-bottom: 1rem;
    border-bottom: 1px solid #f8f9fa;
}

.news-item:last-child {
    border-bottom: none;
    margin-bottom: 0;
}

.news-thumb {
    width: 60px;
    height: 60px;
    border-radius: 5px;
    overflow: hidden;
    margin-right: 1rem;
    flex-shrink: 0;
}

.news-thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.news-info h6 {
    margin-bottom: 0.5rem;
}

.news-info a {
    color: #333;
    text-decoration: none;
    font-size: 0.9rem;
    line-height: 1.4;
    transition: color 0.3s ease;
}

.news-info a:hover {
    color: #dc3545;
}

.news-time {
    font-size: 0.8rem;
    color: #666;
}

.ad-widget .ad-content {
    text-align: center;
}

.ad-text {
    margin-top: 1rem;
    color: #666;
    font-style: italic;
}

@media (max-width: 768px) {
    .article-title {
        font-size: 2rem;
    }
    
    .sidebar {
        padding-left: 0;
        margin-top: 2rem;
    }
    
    .article-social {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
    }
    
    .article-footer {
        flex-direction: column;
        align-items: flex-start;
    }
}
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\backend-news-website\resources\views/article.blade.php ENDPATH**/ ?>