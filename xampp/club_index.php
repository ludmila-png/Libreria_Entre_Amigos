<?php


?>
<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Club de Lectura - Sistema Completo</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
  />
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <link rel="stylesheet" href="Styles_club.css">
</head>
<body class="min-h-screen flex flex-col bg-white text-gray-800 font-sans">

  <!-- Header -->
  <header class="bg-white shadow-lg sticky top-0 z-50">
    <div class="container mx-auto flex justify-between items-center p-6 max-w-7xl">
      <div class="flex items-center space-x-4">
        <!-- Logo -->
        <div class="flex items-center space-x-4">
          <div class="w-20 h-20 flex items-center justify-center">
            <img src="https://github.com/ludmila-png/Libreria_Entre_Amigos/blob/main/Logo%20de%20librer%C3%ADa.png?raw=true" alt="Logo del Club de Lectura" class="w-full h-full object-contain">
          </div>
          <h1 class="text-3xl font-extrabold text-turquesa tracking-wide">Club de Lectura</h1>
        </div>
      </div>
      
      <!-- Navegación -->
      <nav class="hidden md:flex space-x-8 font-semibold text-turquesa tracking-wide">
        <a href="./index.php" class="hover:text-amarillo-oscuro transition">Inicio</a>
        <a href="#clubes" class="hover:text-amarillo-oscuro transition">Clubes</a>
        <a href="#calendario" class="hover:text-amarillo-oscuro transition">Calendario</a>
        <a href="#tienda" class="hover:text-amarillo-oscuro transition">Tienda</a>
        <a href="#blog" class="hover:text-amarillo-oscuro transition">Blog</a>
      </nav>
      
      <!-- Botones de usuario -->
      <div class="flex items-center space-x-4">
        <button id="loginBtn" class="btn-secondary">Iniciar Sesión</button>
        <button id="registerBtn" class="btn-primary">Registrarse</button>
        <div id="userMenu" class="hidden relative">
          <button class="flex items-center space-x-2">
            <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80" alt="Usuario" class="w-10 h-10 rounded-full">
            <span class="font-semibold text-turquesa">Ana</span>
          </button>
          <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 hidden" id="dropdownMenu">
            <a href="#perfil" class="block px-4 py-2 hover:bg-gray-100">Mi Perfil</a>
            <a href="#mis-clubes" class="block px-4 py-2 hover:bg-gray-100">Mis Clubes</a>
            <a href="#mensajes" class="block px-4 py-2 hover:bg-gray-100">Mensajes <span class="bg-turquesa text-white rounded-full px-2 py-1 text-xs">3</span></a>
            <a href="#" id="logoutBtn" class="block px-4 py-2 hover:bg-gray-100">Cerrar Sesión</a>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Hero Section -->
  <section
    class="hero h-[80vh] flex items-center justify-center text-center px-6 relative overflow-hidden rounded-3xl"
    aria-label="Invitación al club de lectura"
    style="background-image: url('https://images.pexels.com/photos-4861330/pexels-photo-4861330.jpeg'); background-size: cover; background-position: center;"
  >
    <!-- Overlay oscuro para mejorar legibilidad -->
    <div class="absolute inset-0 bg-black bg-opacity-50 rounded-3xl pointer-events-none"></div>

    <div class="max-w-3xl relative z-10">
      <h2 class="text-5xl md:text-6xl font-extrabold text-white mb-6 drop-shadow-lg leading-tight">
        Únete al <span class="block mt-2 text-amarillo-claro">Club de Lectura</span>
      </h2>
      <p class="text-lg md:text-xl text-white mb-10 max-w-xl mx-auto drop-shadow-md font-medium">
        Comparte tu pasión por la lectura, debate y café en un ambiente cálido y amigable.
      </p>
      <a href="#clubes"
         class="btn-primary text-lg inline-block shadow-2xl px-14 py-5 text-white font-extrabold rounded-full transition transform hover:scale-110 hover:shadow-yellow-400/80 animate-pulse"
         role="button"
         aria-label="Unirme al club de lectura"
      >
        Unirme ahora
      </a>
    </div>
  </section>

  <!-- Modal de Registro/Login -->
  <div id="authModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-3xl p-8 w-full max-w-md relative">
      <button id="closeAuthModal" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">
        <i class="fas fa-times text-xl"></i>
      </button>
      
      <div class="flex border-b mb-6">
        <button class="tab-button active w-1/2" data-tab="login">Iniciar Sesión</button>
        <button class="tab-button w-1/2" data-tab="register">Registrarse</button>
      </div>
      
      <div class="tab-content active" id="loginTab">
        <h3 class="text-2xl font-bold text-turquesa mb-6">Bienvenido de nuevo</h3>
        <form class="space-y-4">
          <div>
            <label for="loginEmail" class="block mb-1 font-medium">Email</label>
            <input type="email" id="loginEmail" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-turquesa">
          </div>
          <div>
            <label for="loginPassword" class="block mb-1 font-medium">Contraseña</label>
            <input type="password" id="loginPassword" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-turquesa">
          </div>
          <div class="flex justify-between items-center">
            <label class="flex items-center">
              <input type="checkbox" class="rounded text-turquesa focus:ring-turquesa">
              <span class="ml-2">Recordarme</span>
            </label>
            <a href="#" class="text-turquesa hover:underline">¿Olvidaste tu contraseña?</a>
          </div>
          <button type="submit" class="btn-primary w-full mt-4">Iniciar Sesión</button>
        </form>
      </div>
      
      <div class="tab-content" id="registerTab">
        <h3 class="text-2xl font-bold text-turquesa mb-6">Crear una cuenta</h3>
        <form class="space-y-4">
          <div>
            <label for="registerName" class="block mb-1 font-medium">Nombre completo</label>
            <input type="text" id="registerName" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-turquesa">
          </div>
          <div>
            <label for="registerEmail" class="block mb-1 font-medium">Email</label>
            <input type="email" id="registerEmail" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-turquesa">
          </div>
          <div>
            <label for="registerPassword" class="block mb-1 font-medium">Contraseña</label>
            <input type="password" id="registerPassword" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-turquesa">
          </div>
          <div>
            <label for="registerConfirmPassword" class="block mb-1 font-medium">Confirmar contraseña</label>
            <input type="password" id="registerConfirmPassword" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-turquesa">
          </div>
          <label class="flex items-start mt-2">
            <input type="checkbox" class="rounded text-turquesa focus:ring-turquesa mt-1">
            <span class="ml-2 text-sm">Acepto los <a href="#" class="text-turquesa hover:underline">términos y condiciones</a> y la <a href="#" class="text-turquesa hover:underline">política de privacidad</a></span>
          </label>
          <button type="submit" class="btn-primary w-full mt-4">Registrarse</button>
        </form>
      </div>
    </div>
  </div>

  <main class="container mx-auto px-6 py-16 space-y-24 max-w-7xl">
    
    <!-- Filtros de Búsqueda -->
    <section id="clubes" class="bg-white rounded-3xl shadow-lg p-8">
      <h2 class="text-3xl font-extrabold text-turquesa mb-8">Encuentra tu club ideal</h2>
      
      <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-10">
        <div>
          <label class="block mb-2 font-medium">Género literario</label>
          <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-turquesa">
            <option value="">Todos los géneros</option>
            <option value="ficcion">Ficción</option>
            <option value="no-ficcion">No ficción</option>
            <option value="fantasia">Fantasía</option>
            <option value="ciencia-ficcion">Ciencia ficción</option>
            <option value="romance">Romance</option>
            <option value="misterio">Misterio</option>
            <option value="biografia">Biografía</option>
          </select>
        </div>
        
        <div>
          <label class="block mb-2 font-medium">Modalidad</label>
          <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-turquesa">
            <option value="presencial">Presencial</option>
            <option value="virtual">Virtual</option>
           
          </select>
        </div>
        
        <div>
          <label class="block mb-2 font-medium">Frecuencia</label>
          <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-turquesa">
            <option value="">Cualquier frecuencia</option>
            <option value="semanal">Semanal</option>
            <option value="quincenal">Quincenal</option>
            <option value="mensual">Mensual</option>
          </select>
        </div>
        
        <div>
          <label class="block mb-2 font-medium">Buscar</label>
          <div class="flex">
            <input type="text" placeholder="Nombre del club o libro..." class="w-full px-4 py-2 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-turquesa">
            <button class="bg-turquesa text-white px-4 rounded-r-lg hover:bg-amarillo-oscuro transition">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </div>
      
      <!-- Listado de Clubes -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Club 1 -->
        <div class="club-card bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100">
          <div class="h-40 bg-cover bg-center" style="background-image: url('https://github.com/ludmila-png/Libreria_Entre_Amigos/blob/main/club%20de%20lectura%20imagenes/Posteo%20para%20Instagram%20Reuni%C3%B3n%20Dominical%20Graffiti%20Blanco%20y%20verde%20(2).png?raw=true')"></div>
          <div class="p-6">
            <div class="flex justify-between items-start mb-4">
              <h3 class="text-xl font-bold text-turquesa">35 años despues</h3>
              <span class="bg-amarillo-claro text-amarillo-oscuro px-3 py-1 rounded-full text-sm font-semibold">25 miembros</span>
            </div>
            <p class="text-gray-600 mb-4">Encuentro presencial con Ricardo Piccardi.
Un espacio íntimo para conversar sobre la obra, su proceso creativo y el paso del tiempo en la mirada del autor. Habrá intercambio abierto con los lectores y oportunidad de compartir preguntas, réflexiones y experiencias en torno al libro.</p>
            
            <div class="mb-4">
              <p class="font-semibold">Libro actual: <span class="font-normal">"35 Años Despues"</span></p>
              <p class="font-semibold">Próxima reunión: <span class="font-normal">15 Jul, 19:00</span></p>
              <p class="font-semibold">Lugar: <span class="font-normal">Librería Entre Amigos - Sala A</span></p>
            </div>
            
            <div class="flex justify-between items-center">
              <button class="btn-primary py-2 px-6 text-sm">Unirse</button>
              <a href="#" class="text-turquesa hover:underline font-semibold">Ver detalles</a>
            </div>
          </div>
        </div>
        
        <!-- Club 2 -->
        <div class="club-card bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100">
          <div class="h-40 bg-cover bg-center" style="background-image: url('https://github.com/ludmila-png/Libreria_Entre_Amigos/blob/main/club%20de%20lectura%20imagenes/1000060573.jpg?raw=true')"></div>
          <div class="p-6">
            <div class="flex justify-between items-start mb-4">
              <h3 class="text-xl font-bold text-turquesa">Amanecer de Lecturas: 20 años de Crepúsculo</h3>
              <span class="bg-amarillo-claro text-amarillo-oscuro px-3 py-1 rounded-full text-sm font-semibold">18 miembros</span>
            </div>
            <p class="text-gray-600 mb-4">Encuentro conmemorativo.
Un espacio especial para revivir la saga que marcó a toda una generación de lectores. Conversaremos sobre sus personajes, el fenómeno cultural que despertó y el impacto que aún mantiene hoy. Habrá intercambio abierto con los participantes y oportunidad de compartir recuerdos, anécdotas y reflexiones en torno a la historia.</p>
            
            <div class="mb-4">
              <p class="font-semibold">Libro actual: <span class="font-normal">"Saga Crepusculo"</span></p>
              <p class="font-semibold">Próxima reunión: <span class="font-normal">22 Jul, 11:00</span></p>
              <p class="font-semibold">Lugar: <span class="font-normal">Libreria Entre Amigos-Sala B</span></p>
            </div>
            
            <div class="flex justify-between items-center">
              <button class="btn-primary py-2 px-6 text-sm">Unirse</button>
              <a href="#" class="text-turquesa hover:underline font-semibold">Ver detalles</a>
            </div>
          </div>
        </div>
        
        
      <!-- Club 1 - Terror -->
            <div class="club-card bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100">
                <div class="h-40 bg-cover bg-center" style="background-image: url('https://github.com/ludmila-png/Libreria_Entre_Amigos/blob/main/club%20de%20lectura%20imagenes/el%20resplandor.jpg?raw=true')"></div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-xl font-bold text-turquesa">Luces y Sombras: Club de Lectura de El Resplandor</h3>
                        <span class="bg-amarillo-claro text-amarillo-oscuro px-3 py-1 rounded-full text-sm font-semibold">32 miembros</span>
                    </div>
                    <p class="text-gray-600 mb-4">Un encuentro para adentrarnos en la obra maestra de Stephen King y explorar su atmósfera inquietante. Conversaremos sobre los personajes, los símbolos y el terror psicológico que atraviesa la novela. Habrá intercambio abierto con los lectores y oportunidad de compartir interpretaciones, sensaciones y reflexiones en torno a la historia.</p>
                    
                    <div class="mb-4">
                        <p class="font-semibold">Libro actual: <span class="font-normal">"El Resplandor" de Stephen Hawking</span></p>
                        <p class="font-semibold">Próxima reunión: <span class="font-normal">5 Ago, 17:00</span></p>
                        <p class="font-semibold">Lugar: <span class="font-normal">Librería Entre Amigos - Sala A</span></p>
                    </div>
                    
                    <div class="flex justify-between items-center">
                        <button class="btn-primary py-2 px-6 text-sm">Unirse</button>
                        <a href="#" class="text-turquesa hover:underline font-semibold">Ver detalles</a>
                    </div>
                </div>
            </div>

            <!-- Club 2 - Ciencia Ficción -->
            <div class="club-card bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100">
                <div class="h-40 bg-cover bg-center" style="background-image: url('https://github.com/ludmila-png/Libreria_Entre_Amigos/blob/main/club%20de%20lectura%20imagenes/el%20eternauta.jpg?raw=true')"></div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-xl font-bold text-turquesa">"Bajo la nevada eterna" – Encuentro literario sobre El Eternauta</h3>
                        <span class="bg-amarillo-claro text-amarillo-oscuro px-3 py-1 rounded-full text-sm font-semibold">28 miembros</span>
                    </div>
                    <p class="text-gray-600 mb-4">Un espacio para adentrarnos en la historieta emblemática de Héctor Germán Oesterheld y Francisco Solano López. Conversaremos sobre su contexto histórico, sus personajes y el simbolismo detrás de la nevada mortal. Habrá intercambio abierto con los participantes y oportunidad de compartir interpretaciones, emociones y reflexiones en torno a esta obra clave de la literatura argentina.</p>
                    
                    <div class="mb-4">
                        <p class="font-semibold">Libro actual: <span class="font-normal">"El Eternauta" de </span></p>
                        <p class="font-semibold">Próxima reunión: <span class="font-normal">12 Ago, 18:30</span></p>
                        <p class="font-semibold">Lugar: <span class="font-normal">Librería Entre Amigos - Sala B</span></p>
                    </div>
                    
                    <div class="flex justify-between items-center">
                        <button class="btn-primary py-2 px-6 text-sm">Unirse</button>
                        <a href="#" class="text-turquesa hover:underline font-semibold">Ver detalles</a>
                    </div>
                </div>
            </div>

            <!-- Club 3 - Novela Negra -->
            <div class="club-card bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100">
                <div class="h-40 bg-cover bg-center" style="background-image: url('https://github.com/ludmila-png/Libreria_Entre_Amigos/blob/main/club%20de%20lectura%20imagenes/la%20chica%20del%20tren.jpg?raw=true')"></div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-xl font-bold text-turquesa">"Entre vagones y secretos" – Encuentro literario sobre La chica del tren</h3>
                        <span class="bg-amarillo-claro text-amarillo-oscuro px-3 py-1 rounded-full text-sm font-semibold">25 miembros</span>
                    </div>
                    <p class="text-gray-600 mb-4">Un espacio para adentrarnos en el thriller psicológico de Paula Hawkins y desentrañar sus giros inesperados. Conversaremos sobre la complejidad de los personajes, las distintas perspectivas narrativas y la tensión que sostiene la trama. Habrá intercambio abierto con los participantes y oportunidad de compartir interpretaciones, sensaciones y reflexiones en torno a la historia.</p>
                    
                    <div class="mb-4">
                        <p class="font-semibold">Libro actual: <span class="font-normal">"La chica del tren" de Paula Hawkins</span></p>
                        <p class="font-semibold">Próxima reunión: <span class="font-normal">8 Ago, 19:00</span></p>
                        <p class="font-semibold">Lugar: <span class="font-normal">Librería Entre Amigos - Sala C</span></p>
                    </div>
                    
                    <div class="flex justify-between items-center">
                        <button class="btn-primary py-2 px-6 text-sm">Unirse</button>
                        <a href="#" class="text-turquesa hover:underline font-semibold">Ver detalles</a>
                    </div>
                </div>
            </div>

            <!-- Club 4 - Biografia -->
            <div class="club-card bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100">
                <div class="h-40 bg-cover bg-center" style="background-image: url('https://github.com/ludmila-png/Libreria_Entre_Amigos/blob/main/club%20de%20lectura%20imagenes/ana%20frank.jpg?raw=true')"></div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-xl font-bold text-turquesa">"Voces desde el escondite" – Encuentro literario sobre El Diario de Ana Frank</h3>
                        <span class="bg-amarillo-claro text-amarillo-oscuro px-3 py-1 rounded-full text-sm font-semibold">20 miembros</span>
                    </div>
                    <p class="text-gray-600 mb-4">Un espacio para reflexionar sobre uno de los testimonios más conmovedores del siglo XX. Conversaremos sobre la mirada de Ana, su fuerza en medio de la adversidad y la vigencia de su mensaje de esperanza. Habrá intercambio abierto con los participantes y oportunidad de compartir emociones, aprendizajes y reflexiones en torno a esta obra imprescindible.</p>
                    
                    <div class="mb-4">
                        <p class="font-semibold">Libro actual: <span class="font-normal">"El Diario De Ana Frank" </span></p>
                        <p class="font-semibold">Próxima reunión: <span class="font-normal">15 Ago, 17:00</span></p>
                        <p class="font-semibold">Lugar: <span class="font-normal">Librería Entre Amigos - Sala A</span></p>
                    </div>
                    
                    <div class="flex justify-between items-center">
                        <button class="btn-primary py-2 px-6 text-sm">Unirse</button>
                        <a href="#" class="text-turquesa hover:underline font-semibold">Ver detalles</a>
                    </div>
                </div>
            </div>
      </div>
      
    </section>
    
    <!-- Calendario de Eventos -->
    <section id="calendario" class="bg-white rounded-3xl shadow-lg p-8">
      <h2 class="text-3xl font-extrabold text-turquesa mb-8">Calendario de Eventos</h2>
      
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
          <div class="bg-gray-50 rounded-2xl p-6">
            <div class="flex justify-between items-center mb-6">
              <h3 class="text-xl font-bold text-turquesa">Julio 2024</h3>
              <div class="flex space-x-2">
                <button class="p-2 rounded-full bg-gray-200 hover:bg-gray-300"><i class="fas fa-chevron-left"></i></button>
                <button class="p-2 rounded-full bg-gray-200 hover:bg-gray-300"><i class="fas fa-chevron-right"></i></button>
              </div>
            </div>
            
            <div class="grid grid-cols-7 gap-2 mb-4">
              <div class="text-center font-semibold">Lun</div>
              <div class="text-center font-semibold">Mar</div>
              <div class="text-center font-semibold">Mié</div>
              <div class="text-center font-semibold">Jue</div>
              <div class="text-center font-semibold">Vie</div>
              <div class="text-center font-semibold">Sáb</div>
              <div class="text-center font-semibold">Dom</div>
              
              <!-- Días del calendario -->
              <div class="calendar-day">1</div>
              <div class="calendar-day">2</div>
              <div class="calendar-day">3</div>
              <div class="calendar-day">4</div>
              <div class="calendar-day">5</div>
              <div class="calendar-day">6</div>
              <div class="calendar-day">7</div>
              
              <div class="calendar-day">8</div>
              <div class="calendar-day">9</div>
              <div class="calendar-day">10</div>
              <div class="calendar-day">11</div>
              <div class="calendar-day">12</div>
              <div class="calendar-day">13</div>
              <div class="calendar-day">14</div>
              
              <div class="calendar-day event">15</div>
              <div class="calendar-day">16</div>
              <div class="calendar-day">17</div>
              <div class="calendar-day">18</div>
              <div class="calendar-day">19</div>
              <div class="calendar-day">20</div>
              <div class="calendar-day">21</div>
              
              <div class="calendar-day event">22</div>
              <div class="calendar-day">23</div>
              <div class="calendar-day">24</div>
              <div class="calendar-day">25</div>
              <div class="calendar-day">26</div>
              <div class="calendar-day">27</div>
              <div class="calendar-day">28</div>
              
              <div class="calendar-day">29</div>
              <div class="calendar-day">30</div>
              <div class="calendar-day">31</div>
              <div class="calendar-day"></div>
              <div class="calendar-day"></div>
              <div class="calendar-day"></div>
              <div class="calendar-day"></div>
            </div>
            
            <div class="flex justify-center">
              <button class="btn-secondary flex items-center">
                <i class="fas fa-download mr-2"></i> Exportar a Google Calendar
              </button>
            </div>
          </div>
        </div>
        
        <div>
          <div class="bg-amarillo-claro rounded-2xl p-6">
            <h3 class="text-xl font-bold text-amarillo-oscuro mb-4">Próximos eventos</h3>
            
            <div class="space-y-4">
              <div class="bg-white p-4 rounded-lg">
                <p class="font-semibold text-turquesa">35 años despues</p>
                <p class="text-sm">15 Jul, 19:00 - 21:00</p>
                <p class="text-sm">Librería Entre Amigos - Sala A</p>
                <div class="mt-2 flex items-center">
                  <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center text-white text-xs">✓</div>
                  <span class="ml-2 text-sm text-green-600">Asistencia confirmada</span>
                </div>
              </div>
              
              <div class="bg-white p-4 rounded-lg">
                <p class="font-semibold text-turquesa">Amanecer de Lecturas: 20 años de Crepúsculo</p>
                <p class="text-sm">22 Jul, 11:00 - 13:00</p>
                <p class="text-sm">Libreria Entre Amigos - Sala B</p>
                <div class="mt-2">
                  <button class="text-sm bg-turquesa text-white px-3 py-1 rounded-lg hover:bg-amarillo-oscuro">Confirmar asistencia</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Sistema de Gamificación -->
    <section class="bg-white rounded-3xl shadow-lg p-8">
      <h2 class="text-3xl font-extrabold text-turquesa mb-8">Tu progreso</h2>
      
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-celeste-suave rounded-2xl p-6 text-center">
          <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-book-reader text-3xl text-turquesa"></i>
          </div>
          <h3 class="text-xl font-bold text-turquesa mb-2">Puntos de lectura</h3>
          <p class="text-4xl font-bold mb-2">350</p>
          <p class="text-sm">Canjeables por descuentos</p>
        </div>
        
        <div class="bg-amarillo-claro rounded-2xl p-6 text-center">
          <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-trophy text-3xl text-amarillo-oscuro"></i>
          </div>
          <h3 class="text-xl font-bold text-amarillo-oscuro mb-2">Logros</h3>
          <p class="text-4xl font-bold mb-2">5/12</p>
          <p class="text-sm">Logros desbloqueados</p>
        </div>
        
        <div class="bg-gray-100 rounded-2xl p-6">
          <h3 class="text-xl font-bold text-turquesa mb-4">Próximo objetivo</h3>
          <p class="mb-2">Asiste a 3 reuniones más para obtener un 15% de descuento</p>
          <div class="progress-bar">
            <div class="progress-fill" style="width: 60%"></div>
          </div>
          <p class="text-sm mt-2">2 de 3 reuniones completadas</p>
        </div>
      </div>
    </section>
    
    
    
    <!-- Mapa de Ubicaciones -->
    <section class="bg-white rounded-3xl shadow-lg p-8">
      <h2 class="text-3xl font-extrabold text-turquesa mb-8">Nuestras ubicaciones</h2>
      
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div>
          <div id="map"></div>
        </div>
        
        <div>
          <div class="bg-amarillo-claro rounded-2xl p-6">
            <h3 class="text-xl font-bold text-amarillo-oscuro mb-4">Librería Entre Amigos</h3>
            <p class="mb-2"><i class="fas fa-map-marker-alt text-turquesa mr-2"></i> Arieta 2223, San Justo </p>
            <p class="mb-2"><i class="fas fa-clock text-turquesa mr-2"></i> Lun-Sáb: 9:00-21:00, Dom: 10:00-14:00</p>
            <p class="mb-4"><i class="fas fa-phone text-turquesa mr-2"></i> +54 9 1165265193</p>
            
            <h4 class="font-semibold mb-2">Próximos eventos aquí:</h4>
            <ul class="list-disc list-inside">
              <li>Lectores Nocturnos - 15 Jul, 19:00</li>
              <li>Club de Novela Histórica - 28 Jul, 18:00</li>
              <li>Presentación de "La Librería" - 5 Ago, 12:00</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer class="bg-azul-oscuro text-white py-12">
    <div class="container mx-auto px-6 max-w-7xl">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <div>
          <h3 class="text-xl font-bold mb-4">Club de Lectura</h3>
          <p class="text-gray-300">Conectando lectores desde 2020. Un espacio para compartir la pasión por los libros.</p>
        </div>
        
        <div>
          <h3 class="text-xl font-bold mb-4">Enlaces rápidos</h3>
          <ul class="space-y-2">
            <li><a href="#" class="text-gray-300 hover:text-white">Inicio</a></li>
            <li><a href="#clubes" class="text-gray-300 hover:text-white">Clubes</a></li>
            <li><a href="#calendario" class="text-gray-300 hover:text-white">Calendario</a></li>
            <li><a href="#blog" class="text-gray-300 hover:text-white">Blog</a></li>
          </ul>
        </div>
        
        <div>
          <h3 class="text-xl font-bold mb-4">Legal</h3>
          <ul class="space-y-2">
            <li><a href="#" class="text-gray-300 hover:text-white">Términos y condiciones</a></li>
            <li><a href="#" class="text-gray-300 hover:text-white">Política de privacidad</a></li>
            <li><a href="#" class="text-gray-300 hover:text-white">Cookies</a></li>
          </ul>
        </div>
        
        <div>
          <h3 class="text-xl font-bold mb-4">Síguenos</h3>
          <div class="flex space-x-4">
            <a href="#" class="text-gray-300 hover:text-white text-2xl"><i class="fab fa-facebook"></i></a>
            <a href="#" class="text-gray-300 hover:text-white text-2xl"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-gray-300 hover:text-white text-2xl"><i class="fab fa-instagram"></i></a>
            <a href="#" class="text-gray-300 hover:text-white text-2xl"><i class="fab fa-goodreads"></i></a>
          </div>
        </div>
      </div>
      
      <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
        <p>© 2024 Club de Lectura. Todos los derechos reservados.</p>
      </div>
    </div>
  </footer>

  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
  <script src="script.js"></script>
</body>
</html>