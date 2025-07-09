<?php if($paginator->hasPages()): ?>
    <nav class="pagination-nav" aria-label="Pagination Navigation">
        <ul class="pagination-list">
            
            <?php if($paginator->onFirstPage()): ?>
                <li class="pagination-item disabled">
                    <span class="pagination-link">
                        <i class="fas fa-chevron-left"></i>
                        <span class="sr-only">Previous</span>
                    </span>
                </li>
            <?php else: ?>
                <li class="pagination-item">
                    <a class="pagination-link" href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev">
                        <i class="fas fa-chevron-left"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
            <?php endif; ?>

            
            <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                <?php if(is_string($element)): ?>
                    <li class="pagination-item disabled">
                        <span class="pagination-link dots"><?php echo e($element); ?></span>
                    </li>
                <?php endif; ?>

                
                <?php if(is_array($element)): ?>
                    <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($page == $paginator->currentPage()): ?>
                            <li class="pagination-item active">
                                <span class="pagination-link current"><?php echo e($page); ?></span>
                            </li>
                        <?php else: ?>
                            <li class="pagination-item">
                                <a class="pagination-link" href="<?php echo e($url); ?>"><?php echo e($page); ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            
            <?php if($paginator->hasMorePages()): ?>
                <li class="pagination-item">
                    <a class="pagination-link" href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next">
                        <i class="fas fa-chevron-right"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            <?php else: ?>
                <li class="pagination-item disabled">
                    <span class="pagination-link">
                        <i class="fas fa-chevron-right"></i>
                        <span class="sr-only">Next</span>
                    </span>
                </li>
            <?php endif; ?>
        </ul>
        
        <div class="pagination-info">
            <p class="pagination-text">
                Showing <?php echo e($paginator->firstItem()); ?> to <?php echo e($paginator->lastItem()); ?> of <?php echo e($paginator->total()); ?> results
            </p>
        </div>
    </nav>
<?php endif; ?>

<style>
.pagination-nav {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 1rem;
    margin: 2rem 0;
}

.pagination-list {
    display: flex;
    list-style: none;
    padding: 0;
    margin: 0;
    gap: 0.5rem;
    align-items: center;
}

.pagination-item {
    display: flex;
}

.pagination-link {
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 40px;
    height: 40px;
    padding: 8px 12px;
    color: #666;
    text-decoration: none;
    background: white;
    border: 2px solid #e9ecef;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.pagination-link:hover {
    color: white;
    background: #dc3545;
    border-color: #dc3545;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(220, 53, 69, 0.3);
}

.pagination-item.active .pagination-link {
    color: white;
    background: #dc3545;
    border-color: #dc3545;
    box-shadow: 0 4px 12px rgba(220, 53, 69, 0.3);
}

.pagination-item.disabled .pagination-link {
    color: #ccc;
    background: #f8f9fa;
    border-color: #e9ecef;
    cursor: not-allowed;
}

.pagination-item.disabled .pagination-link:hover {
    transform: none;
    box-shadow: none;
    background: #f8f9fa;
    color: #ccc;
}

.pagination-link.dots {
    border: none;
    background: none;
    color: #666;
    cursor: default;
}

.pagination-link.dots:hover {
    background: none;
    color: #666;
    transform: none;
    box-shadow: none;
}

.pagination-info {
    text-align: center;
}

.pagination-text {
    color: #666;
    font-size: 0.9rem;
    margin: 0;
    padding: 0.5rem 1rem;
    background: #f8f9fa;
    border-radius: 20px;
    display: inline-block;
}

.sr-only {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    white-space: nowrap;
    border: 0;
}

@media (max-width: 768px) {
    .pagination-list {
        flex-wrap: wrap;
        justify-content: center;
    }
    
    .pagination-link {
        min-width: 35px;
        height: 35px;
        padding: 6px 10px;
        font-size: 0.9rem;
    }
    
    .pagination-text {
        font-size: 0.8rem;
    }
}
</style><?php /**PATH C:\xampp\htdocs\backend-news-website\resources\views/custom-pagination.blade.php ENDPATH**/ ?>