<?php
session_start();
?>
<!DOCTYPE html>

<html class="scroll-smooth" lang="es">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<title>Club de Lectura </title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"/>
<link href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" rel="stylesheet"/>
<link href="styles.css" rel="stylesheet"/>
</head>
<body class="min-h-screen flex flex-col bg-white text-gray-800 font-sans">
<!-- Header -->
<header class="bg-white shadow-lg sticky top-0 z-50">
<div class="container mx-auto flex justify-between items-center p-6 max-w-7xl">
<div class="flex items-center space-x-4">
<!-- Logo -->
<div class="flex items-center space-x-4">
<div class="w-20 h-20 flex items-center justify-center">
<img alt="Logo del Club de Lectura" class="w-full h-full object-contain" src="https://github.com/ludmila-png/Libreria_Entre_Amigos/blob/main/Logo%20de%20librer%C3%ADa.png?raw=true"/>
</div>
<h1 class="text-3xl font-extrabold text-turquesa tracking-wide">Club de Lectura</h1>
</div>
</div>
<!-- Navegación -->
<nav class="hidden md:flex space-x-8 font-semibold text-turquesa tracking-wide">
<a class="hover:text-amarillo-oscuro transition" href="#">Inicio</a>
<a class="hover:text-amarillo-oscuro transition" href="#clubes">Clubes</a>
<a class="hover:text-amarillo-oscuro transition" href="#tienda">Tienda</a>
</nav>
<!-- Botones de usuario -->
<div class="flex items-center space-x-4">
<?php if (!isset($_SESSION["OK"])) : ?>
<a class="text-teal-600 hover:text-teal-800 transition" href="../login.php">Acceder</a>
<?php else : ?>
<a class="text-teal-600 hover:text-teal-800 transition" href="../perfil_usuario/Index_Perfil.php">Mi perfil</a>
<?php endif;?>
<div class="hidden relative" id="userMenu">
<button class="flex items-center space-x-2">
<img alt="Usuario" class="w-10 h-10 rounded-full" src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=100&amp;q=80"/>
<span class="font-semibold text-turquesa">Ana</span>
</button>
<div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 hidden" id="dropdownMenu">
<a class="block px-4 py-2 hover:bg-gray-100" href="#perfil">Mi Perfil</a>
<a class="block px-4 py-2 hover:bg-gray-100" href="#mis-clubes">Mis Clubes</a>
<a class="block px-4 py-2 hover:bg-gray-100" href="#mensajes">Mensajes <span class="bg-turquesa text-white rounded-full px-2 py-1 text-xs">3</span></a>
<a class="block px-4 py-2 hover:bg-gray-100" href="#" id="logoutBtn">Cerrar Sesión</a>
</div>
</div>
</div>
</div>
</header>
<!-- Hero Section -->
<section aria-label="Invitación al club de lectura" class="hero h-[80vh] flex items-center justify-center text-center px-6 relative overflow-hidden rounded-3xl" style="background-image: url('https://github.com/ludmila-png/Libreria_Entre_Amigos/blob/main/pexels-cottonbro-4861347.jpg?raw=true'); background-size: cover; background-position: center;">
<!-- Overlay oscuro para mejorar legibilidad -->
<div class="absolute inset-0 bg-black bg-opacity-50 rounded-3xl pointer-events-none"></div>
<div class="max-w-3xl relative z-10">
<h2 class="text-5xl md:text-6xl font-extrabold text-white mb-6 drop-shadow-lg leading-tight">
        Únete al <span class="block mt-2 text-amarillo-claro">Club de Lectura</span>
</h2>
<p class="text-lg md:text-xl text-white mb-10 max-w-xl mx-auto drop-shadow-md font-medium">
        Comparte tu pasión por la lectura, debate y café en un ambiente cálido y amigable.
      </p>
<a aria-label="Unirme al club de lectura" class="btn-primary text-lg inline-block shadow-2xl px-14 py-5 text-white font-extrabold rounded-full transition transform hover:scale-110 hover:shadow-yellow-400/80 animate-pulse" href="#clubes" role="button">
        Unirme ahora
      </a>
</div>
</section>

<!-- Filtros de Búsqueda -->
<section class="bg-white rounded-3xl shadow-lg p-8" id="clubes">
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
<input class="w-full px-4 py-2 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-turquesa" placeholder="Nombre del club o libro..." type="text"/>
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
<a class="text-turquesa hover:underline font-semibold" href="#">Ver detalles</a>
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
<a class="text-turquesa hover:underline font-semibold" href="#">Ver detalles</a>
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
<a class="text-turquesa hover:underline font-semibold" href="#">Ver detalles</a>
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
<a class="text-turquesa hover:underline font-semibold" href="#">Ver detalles</a>
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
<a class="text-turquesa hover:underline font-semibold" href="#">Ver detalles</a>
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
<a class="text-turquesa hover:underline font-semibold" href="#">Ver detalles</a>
</div>
</div>
</div>
<!-- Club 1 -->
<div class="club-card bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100">
<div class="h-40 bg-cover bg-center" style="background-image: url('https://github.com/ludmila-png/Libreria_Entre_Amigos/blob/main/club%20de%20lectura%20imagenes/la-noche-de-los-lapices.jpg?raw=true')"></div>
<div class="p-6">
<div class="flex justify-between items-start mb-4">
<h3 class="text-xl font-bold text-turquesa">La Noche de los Lápices</h3>
<span class="bg-amarillo-claro text-amarillo-oscuro px-3 py-1 rounded-full text-sm font-semibold">40 miembros</span>
</div>
<p class="text-gray-600 mb-4">Lectura y reflexión sobre el libro de María Seoane y Héctor Ruiz Núñez. 
Un espacio para dialogar sobre la memoria, la dictadura y la importancia de la voz juvenil en la historia argentina. Contaremos con la presencia de la periodista María Seoane para un intercambio con los asistentes.</p>
<div class="mb-4">
<p class="font-semibold">Libro actual: <span class="font-normal">"La Noche de los Lápices"</span></p>
<p class="font-semibold">Próxima reunión: <span class="font-normal">10 Oct, 18:30</span></p>
<p class="font-semibold">Lugar: <span class="font-normal">Librería Entre Amigos - Sala B</span></p>
</div>
<div class="flex justify-between items-center">
<button class="btn-primary py-2 px-6 text-sm">Unirse</button>
<a class="text-turquesa hover:underline font-semibold" href="#">Ver detalles</a>
</div>
</div>
</div>
<!-- Club 2 -->
<div class="club-card bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100">
<div class="h-40 bg-cover bg-center" style="background-image: url('https://github.com/ludmila-png/Libreria_Entre_Amigos/blob/main/club%20de%20lectura%20imagenes/revolucion%20de%20mayo.jpg?raw=true')"></div>
<div class="p-6">
<div class="flex justify-between items-start mb-4">
<h3 class="text-xl font-bold text-turquesa">25 de Mayo: El nacimiento de una Nación</h3>
<span class="bg-amarillo-claro text-amarillo-oscuro px-3 py-1 rounded-full text-sm font-semibold">30 miembros</span>
</div>
<p class="text-gray-600 mb-4">Lectura del libro "Revolución de Mayo" de Felipe Pigna. 
Se explorarán los hechos, personajes y debates que marcaron la primera gran gesta de independencia. El autor Felipe Pigna será invitado especial para dialogar sobre el proceso revolucionario.</p>
<div class="mb-4">
<p class="font-semibold">Libro actual: <span class="font-normal">"Revolución de Mayo"</span></p>
<p class="font-semibold">Próxima reunión: <span class="font-normal">24 May, 17:00</span></p>
<p class="font-semibold">Lugar: <span class="font-normal">Librería Entre Amigos - Patio histórico</span></p>
</div>
<div class="flex justify-between items-center">
<button class="btn-primary py-2 px-6 text-sm">Unirse</button>
<a class="text-turquesa hover:underline font-semibold" href="#">Ver detalles</a>
</div>
</div>
</div>
<!-- Club 3 -->
<div class="club-card bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100">
<div class="h-40 bg-cover bg-center" style="background-image: url('https://github.com/ludmila-png/Libreria_Entre_Amigos/blob/main/club%20de%20lectura%20imagenes/el%20fantasma%20de%20francisca.jpg?raw=true')"></div>
<div class="p-6">
<div class="flex justify-between items-start mb-4">
<h3 class="text-xl font-bold text-turquesa">Lecturas de Libertad: El Fantasma de Francisca</h3>
<span class="bg-amarillo-claro text-amarillo-oscuro px-3 py-1 rounded-full text-sm font-semibold">28 miembros</span>
</div>
<p class="text-gray-600 mb-4">A través de la obra de Mario Méndez nos adentraremos en la historia de Francisca, un relato donde lo fantástico se enlaza con los ecos de la lucha por la independencia. Este club busca reflexionar sobre el pasado argentino, la memoria y el valor de quienes forjaron la libertad, conectando literatura y acontecimiento histórico en un espacio de diálogo y lectura compartida.</p>
<div class="mb-4">
<p class="font-semibold">Libro actual: <span class="font-normal">"Los Caminos de la Independencia"</span></p>
<p class="font-semibold">Próxima reunión: <span class="font-normal">8 Jul, 18:00</span></p>
<p class="font-semibold">Lugar: <span class="font-normal">Librería Entre Amigos - Sala Principal</span></p>
</div>
<div class="flex justify-between items-center">
<button class="btn-primary py-2 px-6 text-sm">Unirse</button>
<a class="text-turquesa hover:underline font-semibold" href="#">Ver detalles</a>
</div>
</div>
</div>
</div>
</section>
<!-- Calendario de Eventos -->
<section class="bg-white rounded-3xl shadow-lg p-8" id="calendario">
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
<li><a class="text-gray-300 hover:text-white" href="#">Inicio</a></li>
<li><a class="text-gray-300 hover:text-white" href="#clubes">Clubes</a></li>
<li><a class="text-gray-300 hover:text-white" href="#calendario">Calendario</a></li>
<li><a class="text-gray-300 hover:text-white" href="#blog">Blog</a></li>
</ul>
</div>
<div>
<h3 class="text-xl font-bold mb-4">Legal</h3>
<ul class="space-y-2">
<li><a class="text-gray-300 hover:text-white" href="#">Términos y condiciones</a></li>
<li><a class="text-gray-300 hover:text-white" href="#">Política de privacidad</a></li>
<li><a class="text-gray-300 hover:text-white" href="#">Cookies</a></li>
</ul>
</div>
<div>
<h3 class="text-xl font-bold mb-4">Síguenos</h3>
<div class="flex space-x-4">
<a class="text-gray-300 hover:text-white text-2xl" href="#"><i class="fab fa-facebook"></i></a>
<a class="text-gray-300 hover:text-white text-2xl" href="#"><i class="fab fa-twitter"></i></a>
<a class="text-gray-300 hover:text-white text-2xl" href="#"><i class="fab fa-instagram"></i></a>
<a class="text-gray-300 hover:text-white text-2xl" href="#"><i class="fab fa-goodreads"></i></a>
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

<!-- Modal de confirmación de unión -->
<div class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-50 transition-opacity duration-300" id="joinModal">
<div class="max-w-lg w-full mx-4 rounded-3xl overflow-hidden shadow-2xl transform transition-all scale-95 bg-[#0097a7] text-white animate-fadeIn">
<div class="p-8 relative">
<button class="absolute top-4 right-4 text-3xl leading-none text-white hover:text-gray-200" id="closeJoinModal">×</button>
<div class="text-center">
<h3 class="text-3xl font-extrabold mb-3" id="joinModalTitle">¡Te has unido al evento!</h3>
<p class="text-2xl font-semibold mb-4 text-amarillo-claro" id="joinModalClub"></p>
<p class="text-lg mb-6 font-medium">Fijate con atención el día, horario y la sala del evento.</p>
<div class="bg-[#00bcd4] bg-opacity-20 rounded-xl p-4 mb-6 text-left">
<p><strong>Día y horario:</strong> <span id="joinModalDate">—</span></p>
<p><strong>Sala / Lugar:</strong> <span id="joinModalPlace">—</span></p>
</div>
<p class="text-lg mb-6" id="joinModalMessage">Gracias por unirte. ¡Te esperamos en la reunión!</p>
<button class="px-6 py-2 rounded-full bg-white text-[#0097a7] font-bold hover:bg-gray-100 transition" id="joinModalClose">Cerrar</button>
</div>
</div>
</div>
</div>
<style>
@keyframes fadeIn {
  from { opacity: 0; transform: scale(0.9); }
  to { opacity: 1; transform: scale(1); }
}
.animate-fadeIn {
  animation: fadeIn 0.4s ease-out;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const joinButtons = Array.from(document.querySelectorAll('button'))
    .filter(b => b.textContent && b.textContent.trim().toLowerCase() === 'unirse');

  const modal = document.getElementById('joinModal');
  const closeBtn = document.getElementById('closeJoinModal');
  const modalClose = document.getElementById('joinModalClose');
  const clubEl = document.getElementById('joinModalClub');
  const dateEl = document.getElementById('joinModalDate');
  const placeEl = document.getElementById('joinModalPlace');

  function openModal(data) {
    clubEl.textContent = data.clubName || '';
    dateEl.textContent = data.datetime || 'No especificado';
    placeEl.textContent = data.place || 'No especificado';
    modal.classList.remove('hidden');
    modal.classList.add('flex');
  }

  function closeModal() {
    modal.classList.remove('flex');
    modal.classList.add('hidden');
  }

  closeBtn.addEventListener('click', closeModal);
  modalClose.addEventListener('click', closeModal);
  modal.addEventListener('click', (e) => {
    if (e.target === modal) closeModal();
  });

  joinButtons.forEach(btn => {
    btn.addEventListener('click', function () {
      const card = btn.closest('.club-card') || btn.closest('[class*="club-card"]');
      let clubName = '';
      let datetime = '';
      let place = '';
      if (card) {
        const h3 = card.querySelector('h3');
        if (h3) clubName = h3.textContent.trim();
        const ps = card.querySelectorAll('p, span');
        ps.forEach(p => {
          const text = p.textContent.toLowerCase();
          if (text.includes('próxima') || text.includes('fecha') || text.includes('día')) {
            datetime = p.textContent.trim();
          } else if (text.includes('sala') || text.includes('lugar')) {
            place = p.textContent.trim();
          }
        });
      }
      // Cambiar botón a "Ya unido"
      btn.textContent = '✅ Ya unido';
      btn.classList.add('bg-gray-300', 'cursor-not-allowed');
      btn.disabled = true;
      openModal({ clubName, datetime, place });
    });
  });
});
</script>
</body>
</html>
