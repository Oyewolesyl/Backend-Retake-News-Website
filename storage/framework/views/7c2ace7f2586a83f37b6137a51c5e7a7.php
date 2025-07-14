<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-4">
            <div class="profile-sidebar">
                <div class="profile-card">
                    <div class="profile-header">
                        <div class="profile-avatar">
                            <i class="fas fa-user-circle"></i>
                        </div>
                        <h3 class="profile-name"><?php echo e(Auth::user()->name); ?></h3>
                        <p class="profile-email"><?php echo e(Auth::user()->email); ?></p>
                        <span class="profile-badge">
                            <i class="fas fa-calendar-alt me-1"></i>
                            Member since <?php echo e(Auth::user()->created_at->format('M Y')); ?>

                        </span>
                    </div>
                    
                    <div class="profile-stats">
                        <div class="stat-item">
                            <div class="stat-number"><?php echo e($userArticles->count()); ?></div>
                            <div class="stat-label">Articles</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">0</div>
                            <div class="stat-label">Comments</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">0</div>
                            <div class="stat-label">Likes</div>
                        </div>
                    </div>
                </div>
                
                <div class="profile-menu">
                    <h4 class="menu-title">
                        <i class="fas fa-cog me-2"></i>Account Settings
                    </h4>
                    <ul class="menu-list">
                        <li class="menu-item active">
                            <a href="#profile-info" data-tab="profile-info">
                                <i class="fas fa-user me-2"></i>Profile Information
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#my-articles" data-tab="my-articles">
                                <i class="fas fa-newspaper me-2"></i>My Articles
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#account-settings" data-tab="account-settings">
                                <i class="fas fa-cog me-2"></i>Settings
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#security" data-tab="security">
                                <i class="fas fa-shield-alt me-2"></i>Security
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="col-md-8">
            <div class="profile-content">
                <!-- Profile Information Tab -->
                <div id="profile-info" class="tab-content active">
                    <div class="content-header">
                        <h2><i class="fas fa-user me-3"></i>Profile Information</h2>
                        <p class="text-muted">Manage your personal information and preferences</p>
                    </div>
                    
                    <div class="profile-form">
                        <form>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName" class="form-label">
                                        <i class="fas fa-user me-2"></i>First Name
                                    </label>
                                    <input type="text" class="form-control" id="firstName" 
                                           value="<?php echo e(explode(' ', Auth::user()->name)[0] ?? ''); ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName" class="form-label">
                                        <i class="fas fa-user me-2"></i>Last Name
                                    </label>
                                    <input type="text" class="form-control" id="lastName" 
                                           value="<?php echo e(explode(' ', Auth::user()->name, 2)[1] ?? ''); ?>">
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="email" class="form-label">
                                    <i class="fas fa-envelope me-2"></i>Email Address
                                </label>
                                <input type="email" class="form-control" id="email" 
                                       value="<?php echo e(Auth::user()->email); ?>" readonly>
                            </div>
                            
                            <div class="mb-3">
                                <label for="bio" class="form-label">
                                    <i class="fas fa-align-left me-2"></i>Bio
                                </label>
                                <textarea class="form-control" id="bio" rows="4" 
                                          placeholder="Tell us about yourself..."></textarea>
                            </div>
                            
                            <div class="mb-3">
                                <label for="location" class="form-label">
                                    <i class="fas fa-map-marker-alt me-2"></i>Location
                                </label>
                                <input type="text" class="form-control" id="location" 
                                       placeholder="Your location">
                            </div>
                            
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Save Changes
                            </button>
                        </form>
                    </div>
                </div>
                
                <!-- My Articles Tab -->
                <div id="my-articles" class="tab-content">
                    <div class="content-header">
                        <h2><i class="fas fa-newspaper me-3"></i>My Articles</h2>
                        <p class="text-muted">Manage your published articles</p>
                    </div>
                    
                    <div class="articles-grid">
                        <?php $__empty_1 = true; $__currentLoopData = $userArticles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="article-card">
                                <?php if($article->image): ?>
                                    <div class="article-image">
                                        <img src="<?php echo e(asset('storage/' . $article->image)); ?>" 
                                             alt="<?php echo e($article->title); ?>">
                                        <div class="article-status">
                                            <span class="badge <?php echo e($article->published ? 'bg-success' : 'bg-warning'); ?>">
                                                <?php echo e($article->published ? 'Published' : 'Draft'); ?>

                                            </span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="article-info">
                                    <h5 class="article-title">
                                        <a href="<?php echo e(route('article.show', $article->id)); ?>">
                                            <?php echo e($article->title); ?>

                                        </a>
                                    </h5>
                                    
                                    <p class="article-excerpt">
                                        <?php echo e(Str::limit(strip_tags($article->content), 100)); ?>

                                    </p>
                                    
                                    <div class="article-meta">
                                        <span class="article-date">
                                            <i class="fas fa-calendar-alt me-1"></i>
                                            <?php echo e($article->created_at->format('M j, Y')); ?>

                                        </span>
                                        <div class="article-actions">
                                            <a href="#" class="action-link">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" class="action-link text-danger">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="no-articles">
                                <i class="fas fa-newspaper text-muted mb-3"></i>
                                <h4>No Articles Yet</h4>
                                <p class="text-muted">You haven't published any articles yet.</p>
                                <a href="#" class="btn btn-primary">
                                    <i class="fas fa-plus me-2"></i>Write Your First Article
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                
                <!-- Account Settings Tab -->
                <div id="account-settings" class="tab-content">
                    <div class="content-header">
                        <h2><i class="fas fa-cog me-3"></i>Account Settings</h2>
                        <p class="text-muted">Manage your account preferences</p>
                    </div>
                    
                    <div class="settings-form">
                        <div class="setting-group">
                            <h5><i class="fas fa-bell me-2"></i>Notifications</h5>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="emailNotifications" checked>
                                <label class="form-check-label" for="emailNotifications">
                                    Email notifications for new articles
                                </label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="pushNotifications">
                                <label class="form-check-label" for="pushNotifications">
                                    Push notifications
                                </label>
                            </div>
                        </div>
                        
                        <div class="setting-group">
                            <h5><i class="fas fa-eye me-2"></i>Privacy</h5>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="profileVisibility" checked>
                                <label class="form-check-label" for="profileVisibility">
                                    Make profile public
                                </label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="showEmail">
                                <label class="form-check-label" for="showEmail">
                                    Show email address on profile
                                </label>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Save Settings
                        </button>
                    </div>
                </div>
                
                <!-- Security Tab -->
                <div id="security" class="tab-content">
                    <div class="content-header">
                        <h2><i class="fas fa-shield-alt me-3"></i>Security</h2>
                        <p class="text-muted">Manage your account security settings</p>
                    </div>
                    
                    <div class="security-form">
                        <div class="security-section">
                            <h5><i class="fas fa-key me-2"></i>Change Password</h5>
                            <form>
                                <div class="mb-3">
                                    <label for="currentPassword" class="form-label">Current Password</label>
                                    <input type="password" class="form-control" id="currentPassword">
                                </div>
                                <div class="mb-3">
                                    <label for="newPassword" class="form-label">New Password</label>
                                    <input type="password" class="form-control" id="newPassword">
                                </div>
                                <div class="mb-3">
                                    <label for="confirmPassword" class="form-label">Confirm New Password</label>
                                    <input type="password" class="form-control" id="confirmPassword">
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>Update Password
                                </button>
                            </form>
                        </div>
                        
                        <div class="security-section">
                            <h5><i class="fas fa-mobile-alt me-2"></i>Two-Factor Authentication</h5>
                            <p class="text-muted">Add an extra layer of security to your account</p>
                            <button class="btn btn-outline-primary">
                                <i class="fas fa-shield-alt me-2"></i>Enable 2FA
                            </button>
                        </div>
                        
                        <div class="security-section danger-zone">
                            <h5><i class="fas fa-exclamation-triangle me-2"></i>Danger Zone</h5>
                            <p class="text-muted">Permanently delete your account and all associated data</p>
                            <button class="btn btn-outline-danger">
                                <i class="fas fa-trash me-2"></i>Delete Account
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.profile-sidebar {
    position: sticky;
    top: 2rem;
}

.profile-card {
    background: white;
    border-radius: 10px;
    padding: 2rem;
    text-align: center;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    margin-bottom: 2rem;
}

.profile-header {
    margin-bottom: 2rem;
}

.profile-avatar i {
    font-size: 5rem;
    color: #dc3545;
    margin-bottom: 1rem;
}

.profile-name {
    font-family: 'Playfair Display', serif;
    color: #333;
    margin-bottom: 0.5rem;
}

.profile-email {
    color: #666;
    margin-bottom: 1rem;
}

.profile-badge {
    background: #f8f9fa;
    color: #666;
    padding: 5px 12px;
    border-radius: 15px;
    font-size: 0.8rem;
}

.profile-stats {
    display: flex;
    justify-content: space-around;
    padding-top: 1.5rem;
    border-top: 1px solid #f8f9fa;
}

.stat-item {
    text-align: center;
}

.stat-number {
    font-size: 1.5rem;
    font-weight: 700;
    color: #dc3545;
}

.stat-label {
    font-size: 0.8rem;
    color: #666;
    text-transform: uppercase;
}

.profile-menu {
    background: white;
    border-radius: 10px;
    padding: 1.5rem;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.menu-title {
    color: #dc3545;
    font-family: 'Playfair Display', serif;
    margin-bottom: 1.5rem;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid #f8f9fa;
}

.menu-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.menu-item {
    margin-bottom: 0.5rem;
}

.menu-item a {
    display: block;
    padding: 12px 15px;
    color: #666;
    text-decoration: none;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.menu-item a:hover,
.menu-item.active a {
    background: #dc3545;
    color: white;
}

.profile-content {
    background: white;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    min-height: 600px;
}

.tab-content {
    display: none;
    padding: 2rem;
}

.tab-content.active {
    display: block;
}

.content-header {
    margin-bottom: 2rem;
    padding-bottom: 1rem;
    border-bottom: 2px solid #f8f9fa;
}

.content-header h2 {
    color: #dc3545;
    font-family: 'Playfair Display', serif;
    margin-bottom: 0.5rem;
}

.profile-form .form-control {
    border-radius: 8px;
    padding: 12px 15px;
    border: 2px solid #e9ecef;
    transition: all 0.3s ease;
}

.profile-form .form-control:focus {
    border-color: #dc3545;
    box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
}

.articles-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 1.5rem;
}

.article-card {
    background: #f8f9fa;
    border-radius: 10px;
    overflow: hidden;
    transition: all 0.3s ease;
}

.article-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

.article-image {
    position: relative;
    height: 150px;
    overflow: hidden;
}

.article-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.article-status {
    position: absolute;
    top: 10px;
    right: 10px;
}

.article-info {
    padding: 1.5rem;
}

.article-title a {
    color: #333;
    text-decoration: none;
    font-weight: 600;
    transition: color 0.3s ease;
}

.article-title a:hover {
    color: #dc3545;
}

.article-excerpt {
    color: #666;
    font-size: 0.9rem;
    line-height: 1.6;
    margin: 1rem 0;
}

.article-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 0.8rem;
    color: #666;
}

.article-actions {
    display: flex;
    gap: 0.5rem;
}

.action-link {
    color: #666;
    text-decoration: none;
    padding: 5px;
    border-radius: 3px;
    transition: all 0.3s ease;
}

.action-link:hover {
    background: #e9ecef;
    color: #dc3545;
}

.no-articles {
    text-align: center;
    padding: 4rem 2rem;
    grid-column: 1 / -1;
}

.no-articles i {
    font-size: 4rem;
}

.setting-group {
    margin-bottom: 2rem;
    padding-bottom: 1.5rem;
    border-bottom: 1px solid #f8f9fa;
}

.setting-group:last-child {
    border-bottom: none;
}

.setting-group h5 {
    color: #333;
    margin-bottom: 1rem;
}

.form-check-input:checked {
    background-color: #dc3545;
    border-color: #dc3545;
}

.security-section {
    margin-bottom: 2rem;
    padding-bottom: 1.5rem;
    border-bottom: 1px solid #f8f9fa;
}

.security-section:last-child {
    border-bottom: none;
}

.security-section h5 {
    color: #333;
    margin-bottom: 1rem;
}

.danger-zone {
    border-color: #dc3545 !important;
}

.danger-zone h5 {
    color: #dc3545;
}

.btn-primary {
    background: #dc3545;
    border-color: #dc3545;
    border-radius: 8px;
    padding: 12px 20px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background: #c82333;
    border-color: #c82333;
    transform: translateY(-2px);
}

.btn-outline-primary {
    border-color: #dc3545;
    color: #dc3545;
    border-radius: 8px;
    padding: 12px 20px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-outline-primary:hover {
    background: #dc3545;
    border-color: #dc3545;
    transform: translateY(-2px);
}

@media (max-width: 768px) {
    .profile-sidebar {
        position: static;
        margin-bottom: 2rem;
    }
    
    .articles-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const menuItems = document.querySelectorAll('.menu-item a');
    const tabContents = document.querySelectorAll('.tab-content');
    
    menuItems.forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Remove active class from all menu items
            document.querySelectorAll('.menu-item').forEach(mi => mi.classList.remove('active'));
            
            // Add active class to clicked item
            this.parentElement.classList.add('active');
            
            // Hide all tab contents
            tabContents.forEach(tc => tc.classList.remove('active'));
            
            // Show selected tab content
            const targetTab = this.getAttribute('data-tab');
            document.getElementById(targetTab).classList.add('active');
        });
    });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\backend-news-website\resources\views/profile.blade.php ENDPATH**/ ?>