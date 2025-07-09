<div id="cookieConsent" class="cookie-consent" style="display: none;">
    <div class="cookie-content">
        <div class="cookie-text">
            <div class="cookie-icon">
                <i class="fas fa-cookie-bite"></i>
            </div>
            <div class="cookie-message">
                <h5>We value your privacy</h5>
                <p>This website uses cookies to ensure you get the best experience. We use essential cookies for site functionality and analytics cookies to understand how you interact with our content. By continuing to browse, you consent to our use of cookies.</p>
            </div>
        </div>
        <div class="cookie-actions">
            <button id="acceptCookies" class="btn btn-accept">
                <i class="fas fa-check me-1"></i>Accept All
            </button>
            <button id="declineCookies" class="btn btn-decline">
                <i class="fas fa-times me-1"></i>Decline
            </button>
            <a href="#" class="btn btn-learn-more">
                <i class="fas fa-info-circle me-1"></i>Learn More
            </a>
        </div>
    </div>
</div>

<style>
.cookie-consent {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(0, 0, 0, 0.95);
    backdrop-filter: blur(10px);
    color: white;
    z-index: 9999;
    padding: 1.5rem;
    border-top: 3px solid #dc3545;
    animation: slideUp 0.5s ease-out;
}

@keyframes slideUp {
    from {
        transform: translateY(100%);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

.cookie-content {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 2rem;
}

.cookie-text {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    flex: 1;
}

.cookie-icon {
    font-size: 2rem;
    color: #dc3545;
    flex-shrink: 0;
    margin-top: 0.5rem;
}

.cookie-message h5 {
    color: #dc3545;
    font-family: 'Playfair Display', serif;
    margin-bottom: 0.5rem;
    font-size: 1.2rem;
}

.cookie-message p {
    margin-bottom: 0;
    font-size: 0.9rem;
    line-height: 1.5;
    opacity: 0.9;
}

.cookie-actions {
    display: flex;
    align-items: center;
    gap: 1rem;
    flex-shrink: 0;
}

.cookie-actions .btn {
    padding: 10px 20px;
    border-radius: 25px;
    font-weight: 600;
    font-size: 0.9rem;
    text-decoration: none;
    border: 2px solid transparent;
    transition: all 0.3s ease;
    cursor: pointer;
    display: flex;
    align-items: center;
    white-space: nowrap;
}

.btn-accept {
    background: #dc3545;
    color: white;
    border-color: #dc3545;
}

.btn-accept:hover {
    background: #c82333;
    border-color: #c82333;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(220, 53, 69, 0.4);
}

.btn-decline {
    background: transparent;
    color: white;
    border-color: rgba(255, 255, 255, 0.3);
}

.btn-decline:hover {
    background: rgba(255, 255, 255, 0.1);
    border-color: rgba(255, 255, 255, 0.5);
    color: white;
}

.btn-learn-more {
    background: transparent;
    color: #dc3545;
    border: none;
    text-decoration: underline;
    padding: 10px 0;
}

.btn-learn-more:hover {
    color: #ff6b7a;
    text-decoration: none;
}

@media (max-width: 768px) {
    .cookie-content {
        flex-direction: column;
        text-align: center;
        gap: 1.5rem;
    }
    
    .cookie-text {
        flex-direction: column;
        text-align: center;
        gap: 1rem;
    }
    
    .cookie-actions {
        flex-wrap: wrap;
        justify-content: center;
        gap: 0.75rem;
    }
    
    .cookie-actions .btn {
        padding: 8px 16px;
        font-size: 0.8rem;
    }
    
    .cookie-message p {
        font-size: 0.85rem;
    }
}

@media (max-width: 480px) {
    .cookie-consent {
        padding: 1rem;
    }
    
    .cookie-actions {
        flex-direction: column;
        width: 100%;
    }
    
    .cookie-actions .btn {
        width: 100%;
        justify-content: center;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const cookieConsent = document.getElementById('cookieConsent');
    const acceptBtn = document.getElementById('acceptCookies');
    const declineBtn = document.getElementById('declineCookies');
    
    // Check if user has already made a choice
    if (!localStorage.getItem('cookieConsent')) {
        setTimeout(() => {
            cookieConsent.style.display = 'block';
        }, 1000); // Show after 1 second
    }
    
    acceptBtn.addEventListener('click', function() {
        localStorage.setItem('cookieConsent', 'accepted');
        localStorage.setItem('cookieConsentDate', new Date().toISOString());
        hideBanner();
        
        // Enable analytics or other tracking here
        console.log('Cookies accepted - Analytics enabled');
    });
    
    declineBtn.addEventListener('click', function() {
        localStorage.setItem('cookieConsent', 'declined');
        localStorage.setItem('cookieConsentDate', new Date().toISOString());
        hideBanner();
        
        // Disable non-essential cookies
        console.log('Cookies declined - Only essential cookies active');
    });
    
    function hideBanner() {
        cookieConsent.style.animation = 'slideDown 0.5s ease-out forwards';
        setTimeout(() => {
            cookieConsent.style.display = 'none';
        }, 500);
    }
});

// Add slide down animation
const style = document.createElement('style');
style.textContent = `
    @keyframes slideDown {
        from {
            transform: translateY(0);
            opacity: 1;
        }
        to {
            transform: translateY(100%);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);
</script><?php /**PATH C:\xampp\htdocs\backend-news-website\resources\views/components/cookie-consent.blade.php ENDPATH**/ ?>