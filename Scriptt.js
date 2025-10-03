// Carousel functionality
document.addEventListener('DOMContentLoaded', function() {
    // Elementos del carousel
    const carouselInner = document.querySelector('.carousel-inner');
    const carouselItems = document.querySelectorAll('.carousel-item');
    const prevBtn = document.querySelector('.prev-btn');
    const nextBtn = document.querySelector('.next-btn');
    const indicators = document.querySelectorAll('.indicator');
    
    let currentSlide = 0;
    const totalSlides = carouselItems.length;
    
    // Función para actualizar el carousel
    function updateCarousel() {
        // Mover el carousel
        carouselInner.style.transform = `translateX(-${currentSlide * 100}%)`;
        
        // Actualizar indicadores
        indicators.forEach((indicator, index) => {
            indicator.classList.toggle('active', index === currentSlide);
        });
    }
    
    // Botón siguiente
    nextBtn.addEventListener('click', function() {
        currentSlide = (currentSlide + 1) % totalSlides;
        updateCarousel();
    });
    
    // Botón anterior
    prevBtn.addEventListener('click', function() {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        updateCarousel();
    });
    
    // Indicadores
    indicators.forEach((indicator, index) => {
        indicator.addEventListener('click', function() {
            currentSlide = index;
            updateCarousel();
        });
    });
    
    // Auto-slide cada 5 segundos
    let autoSlide = setInterval(() => {
        currentSlide = (currentSlide + 1) % totalSlides;
        updateCarousel();
    }, 5000);
    
    // Pausar auto-slide cuando el mouse está sobre el carousel
    const carousel = document.querySelector('.carousel');
    carousel.addEventListener('mouseenter', () => {
        clearInterval(autoSlide);
    });
    
    carousel.addEventListener('mouseleave', () => {
        autoSlide = setInterval(() => {
            currentSlide = (currentSlide + 1) % totalSlides;
            updateCarousel();
        }, 5000);
    });
    
    // También agrega la funcionalidad del carrito y otros elementos
    initializeCart();
    initializeModal();
    initializeAnimations();
});

// Funcionalidad del carrito
function initializeCart() {
    const cartBtn = document.getElementById('cartBtn');
    const cartModal = document.getElementById('cartModal');
    const closeCart = document.getElementById('closeCart');
    const cartItems = document.getElementById('cartItems');
    const cartTotal = document.getElementById('cartTotal');
    const cartCount = document.getElementById('cartCount');
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    
    let cart = [];
    
    // Abrir modal del carrito
    cartBtn.addEventListener('click', function() {
        updateCartDisplay();
        cartModal.classList.remove('hidden');
    });
    
    // Cerrar modal del carrito
    closeCart.addEventListener('click', function() {
        cartModal.classList.add('hidden');
    });
    
    // Agregar productos al carrito
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function() {
            const title = this.getAttribute('data-title');
            const price = parseFloat(this.getAttribute('data-price'));
            
            // Agregar al carrito
            cart.push({ title, price });
            updateCartCount();
            
            // Mostrar feedback
            alert(`¡${title} agregado al carrito!`);
        });
    });
    
    function updateCartCount() {
        cartCount.textContent = cart.length;
    }
    
    function updateCartDisplay() {
        cartItems.innerHTML = '';
        let total = 0;
        
        cart.forEach(item => {
            const li = document.createElement('li');
            li.textContent = `${item.title} - $${item.price.toFixed(2)}`;
            cartItems.appendChild(li);
            total += item.price;
        });
        
        cartTotal.textContent = `Total: $${total.toFixed(2)}`;
    }
}

// Funcionalidad del modal
function initializeModal() {
    const joinClubBtn = document.getElementById('joinClubBtn');
    const joinModal = document.getElementById('joinModal');
    const closeJoinModal = document.getElementById('closeJoinModal');
    const joinForm = document.getElementById('joinForm');
    
    if (joinClubBtn && joinModal) {
        joinClubBtn.addEventListener('click', function(e) {
            e.preventDefault();
            joinModal.style.display = 'block';
        });
        
        closeJoinModal.addEventListener('click', function() {
            joinModal.style.display = 'none';
        });
        
        joinForm.addEventListener('submit', function(e) {
            e.preventDefault();
            alert('¡Gracias por unirte al club! Te contactaremos pronto.');
            joinModal.style.display = 'none';
        });
    }
}

// Animaciones
function initializeAnimations() {
    // Animación de fade-in para elementos
    const fadeElements = document.querySelectorAll('.fade-in');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });
    
    fadeElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(el);
    });
    
    // Botón de explorar
    const exploreBtn = document.getElementById('exploreBtn');
    if (exploreBtn) {
        exploreBtn.addEventListener('click', function() {
            document.getElementById('featured-books').scrollIntoView({ 
                behavior: 'smooth' 
            });
        });
    }
}