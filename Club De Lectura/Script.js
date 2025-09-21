// Funcionalidad para el modal de autenticación
document.addEventListener('DOMContentLoaded', function() {
  const loginBtn = document.getElementById('loginBtn');
  const registerBtn = document.getElementById('registerBtn');
  const authModal = document.getElementById('authModal');
  const closeAuthModal = document.getElementById('closeAuthModal');
  const tabButtons = document.querySelectorAll('.tab-button');
  const tabContents = document.querySelectorAll('.tab-content');
  const userMenu = document.getElementById('userMenu');
  const dropdownMenu = document.getElementById('dropdownMenu');
  const logoutBtn = document.getElementById('logoutBtn');
  
  // Mostrar modal de login/registro
  if (loginBtn && registerBtn) {
    loginBtn.addEventListener('click', () => {
      authModal.classList.remove('hidden');
      document.querySelector('[data-tab="login"]').click();
    });
    
    registerBtn.addEventListener('click', () => {
      authModal.classList.remove('hidden');
      document.querySelector('[data-tab="register"]').click();
    });
  }
  
  // Cerrar modal
  if (closeAuthModal) {
    closeAuthModal.addEventListener('click', () => {
      authModal.classList.add('hidden');
    });
  }
  
  // Funcionalidad de pestañas
  tabButtons.forEach(button => {
    button.addEventListener('click', () => {
      const tab = button.dataset.tab;
      
      // Activar pestaña seleccionada
      tabButtons.forEach(btn => btn.classList.remove('active'));
      button.classList.add('active');
      
      // Mostrar contenido correspondiente
      tabContents.forEach(content => {
        content.classList.remove('active');
        if (content.id === `${tab}Tab`) {
          content.classList.add('active');
        }
      });
    });
  });
  
  // Simular login (en una app real esto se conectaría con un backend)
  const loginForm = document.querySelector('#loginTab form');
  if (loginForm) {
    loginForm.addEventListener('submit', (e) => {
      e.preventDefault();
      // Simular inicio de sesión exitoso
      authModal.classList.add('hidden');
      loginBtn.classList.add('hidden');
      registerBtn.classList.add('hidden');
      userMenu.classList.remove('hidden');
    });
  }
  
  // Simular registro (en una app real esto se conectaría con un backend)
  const registerForm = document.querySelector('#registerTab form');
  if (registerForm) {
    registerForm.addEventListener('submit', (e) => {
      e.preventDefault();
      // Simular registro exitoso
      authModal.classList.add('hidden');
      loginBtn.classList.add('hidden');
      registerBtn.classList.add('hidden');
      userMenu.classList.remove('hidden');
    });
  }
  
  // Menú desplegable de usuario
  if (userMenu) {
    const userButton = userMenu.querySelector('button');
    userButton.addEventListener('click', () => {
      dropdownMenu.classList.toggle('hidden');
    });
  }
  
  // Cerrar sesión
  if (logoutBtn) {
    logoutBtn.addEventListener('click', (e) => {
      e.preventDefault();
      userMenu.classList.add('hidden');
      loginBtn.classList.remove('hidden');
      registerBtn.classList.remove('hidden');
      dropdownMenu.classList.add('hidden');
    });
  }
  
  // Inicializar mapa (usando Leaflet)
  if (typeof L !== 'undefined') {
    const map = L.map('map').setView([-34.6850, -58.5525], 16);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([-34.6850, -58.5525])
      .addTo(map)
      .bindPopup('Ignacio Arieta 2233, San Justo, Buenos Aires')
      .openPopup();
  }
  
  // Funcionalidad para los botones de unirse a club
  const joinButtons = document.querySelectorAll('.club-card .btn-primary');
  joinButtons.forEach(button => {
    button.addEventListener('click', () => {
      if (userMenu.classList.contains('hidden')) {
        authModal.classList.remove('hidden');
        document.querySelector('[data-tab="login"]').click();
      } else {
        button.textContent = 'Solicitud enviada';
        button.classList.remove('bg-turquesa', 'hover:bg-amarillo-oscuro');
        button.classList.add('bg-gray-400', 'cursor-not-allowed');
        button.disabled = true;
      }
    });
  });
});