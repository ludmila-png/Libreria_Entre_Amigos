<?php
session_start()

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entre Amigos - Librería en Línea</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body class="min-h-screen flex flex-col">
    <!-- Header -->
    <header class="bg-white shadow-lg sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center p-4">
             <img src="https://github.com/ludmila-png/Libreria_Entre_Amigos/blob/main/Logo%20de%20librer%C3%ADa.png?raw=true" alt="Logo Entre Amigos" class="h-20 w-20">
        
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <input type="text" id="searchInput" placeholder="Buscar libros..." class="pl-10 pr-4 py-2 border rounded-full focus:outline-none focus:ring-2 focus:ring-teal-500">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                </div>
                <button id="cartBtn" class="relative bg-teal-500 text-white px-4 py-2 rounded-full">
                    <i class="fas fa-shopping-cart"></i>
                    <span id="cartCount" class="cart-count">0</span>
                </button>
            </div>
            <nav class="hidden md:flex">
                <ul class="flex space-x-6">
                    <li><a href="./index.php" class="text-teal-600 hover:text-teal-800 transition">Inicio</a></li>
                    <li><a href="#featured-books" class="text-teal-600 hover:text-teal-800 transition">Libros</a></li>
                    <li><a href="#categories" class="text-teal-600 hover:text-teal-800 transition">Categorías</a></li>
                    <li><a href="#cafe-club" class="text-teal-600 hover:text-teal-800 transition">Café Literario</a></li>
                    <li><a href="#cafe-club" class="text-teal-600 hover:text-teal-800 transition">Club de Lectura</a></li>
                    <li><a href="#" class="text-teal-600 hover:text-teal-800 transition">Contacto</a></li>
                    <!-- Esto hace que cambie arriba a la derecha y pase a decir tu perfil cuando estas logeado -->
                                        <?php if (!isset($_SESSION["OK"])) : ?>
                    					<li><a href="./login.php" class="text-teal-600 hover:text-teal-800 transition">Acceder</a></li>
                                        <?php else : ?>
                                        <li><a href="./inicio_prueba.php" class="text-teal-600 hover:text-teal-800 transition">Mi perfil</a></li>
                                        <?php endif;?>

                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero h-screen flex items-center justify-center">
        <div class="hero-content text-center text-white fade-in">
            <h2 class="text-5xl md:text-7xl font-bold mb-4">Descubre Historias Entre Amigos</h2>
            <p class="text-xl md:text-2xl mb-8">Sumérgete en un universo de libros que conectan almas. Encuentra tu próxima aventura aquí.</p>
            <button id="exploreBtn" class="btn-primary text-lg px-8 py-4">Comienza a Explorar</button>
        </div>
    </section>

    <!-- Categories -->
    <section id="categories" class="py-16 bg-white">
        <div class="container mx-auto text-center">
            <h3 class="text-3xl font-bold text-teal-600 mb-8">Explora por Categorías</h3>
            <div class="fade-in">
                <button class="category-btn">Romance</button>
                <button class="category-btn">Misterio</button>
                <button class="category-btn">Fantasía</button>
                <button class="category-btn">Infantil</button>
                <button class="category-btn">Ciencia Ficción</button>
                <button class="category-btn">Biografías</button>
            </div>
        </div>
    </section>

    <!-- Enhanced Café Literario y Club de Lectura Section -->
    <section id="cafe-club" class="py-20 bg-gradient-to-r from-#A4E8E0 to-#F8EA8C">
        <div class="container mx-auto">
            <div class="text-center mb-12">
                <h3 class="text-5xl font-bold text-teal-600 mb-6 fade-in">Café Literario & Club de Lectura</h3>
                <p class="text-lg text-gray-700 mb-8 fade-in max-w-2xl mx-auto">Embárcate en un viaje donde las páginas cobran vida. Nuestro café literario ofrece un ambiente cálido para disfrutar de lecturas individuales, debates apasionados y conexiones profundas. Únete al club de lectura para explorar géneros diversos, compartir insights únicos y construir una comunidad de amantes de los libros. Eventos semanales, talleres creativos y noches temáticas te esperan.</p>
                <div class="flex justify-center space-x-4 fade-in">
                    <button id="joinClubBtn" class="btn-primary"><a href="./club_index.php">Únete al Club</a></button>
                    <button id="reserveCafeBtn" class="btn-primary">Reserva en el Café</button>
                </div>
            </div>
            
            <!-- Enhanced Carousel -->
            <div class="carousel fade-in">
                <div class="carousel-inner">
                    <div class="carousel-item">
                        <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/e0298996-5bf2-4e7f-869d-5f419c90219b.png" alt="Interior vibrante del café literario con mesas atestadas de libros antiguos y modernos, tazas de café elegante, grupos animados en conversaciones profundas, luces doradas creando una atmósfera mágica, estanterías repletas de volúmenes en tonos tierra y marfil, estilo ilustrativo detallado con detalles vívidos de camaradería intelectual" class="w-full h-80 md:h-96 object-cover">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-6 text-white">
                            <h4 class="text-2xl font-bold mb-2">Sesiones de Café Literario</h4>
                            <p class="text-sm mb-4">Relájate con un buen libro y una taza de café en nuestro espacio inspirador, diseñado para fomentar la creatividad y el diálogo.</p>
                            <span class="inline-block bg-#4CD7D0 px-3 py-1 rounded-full text-sm font-medium">Disponible todos los días</span>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/e84ad7f1-9fec-4dc2-a473-8b04e19680f4.png" alt="Reunión del club de lectura con participantes diversos sentados en círculo cómodo bajo iluminación suave, libros abiertos en manos, expresiones de fascinación y debate animado, fondo de paredes con carteles literarios coloridos, colores cálidos en cremas y verdes suaves, composición centrada en conexión humana con detalles de notas y marcadores" class="w-full h-80 md:h-96 object-cover">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-6 text-white">
                            <h4 class="text-2xl font-bold mb-2">Actividades del Club de Lectura</h4>
                            <p class="text-sm mb-4">Comparte perspectivas únicas y profundiza en historias con otros lectores apasionados en sesiones interactivas.</p>
                            <span class="inline-block bg-#4CD7D0 px-3 py-1 rounded-full text-sm font-medium">Cada Miércoles a las 7 PM</span>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/8ba8dac7-97fa-40d6-89e6-6af7c985db23.png" alt="Evento nocturno especial en el café literario con velas parpadeantes, stacks de libros vintage, personas en discusiones profundas bajo luces tenues, elementos mágicos sutiles como sombras danzantes y auras de curiosidad, atmósfera íntima y envolvente con toques de misterio y calidez" class="w-full h-80 md:h-96 object-cover">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-6 text-white">
                            <h4 class="text-2xl font-bold mb-2">Encuentros Nocturnos Especiales</h4>
                            <p class="text-sm mb-4">Experimenta noches temáticas con debates filosóficos, lecturas en vivo y una selección especial de bebidas artesanales.</p>
                            <span class="inline-block bg-#4CD7D0 px-3 py-1 rounded-full text-sm font-medium">Último viernes del mes</span>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/e7e70d65-6ada-4ad6-9cbb-aa670c4497ac.png" alt="Taller creativo en el café con artists y escritores colaborando en mesas desordenadas, pinceles, cuadernos esparcidos, expresiones concentradas y creativas, iluminación natural filtrada a través de ventanas grandes, colores inspiradores en azules y amarillos vibrantes, estilo dinámico con movimiento y energía palpable" class="w-full h-80 md:h-96 object-cover">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-6 text-white">
                            <h4 class="text-2xl font-bold mb-2">Talleres Creativos</h4>
                            <p class="text-sm mb-4">Desarrolla habilidades de escritura y arte literario en nuestros talleres exclusivos liderados por autores invitados.</p>
                            <span class="inline-block bg-#4CD7D0 px-3 py-1 rounded-full text-sm font-medium">Sábados alternos</span>
                        </div>
                    </div>
                </div>
                <div class="carousel-controls">
                    <button class="carousel-btn prev-btn">&lsaquo;</button>
                    <button class="carousel-btn next-btn">&rsaquo;</button>
                </div>
                <div class="carousel-indicators">
                    <div class="indicator active" data-slide="0"></div>
                    <div class="indicator" data-slide="1"></div>
                    <div class="indicator" data-slide="2"></div>
                    <div class="indicator" data-slide="3"></div>
                </div>
            </div>
            
            <!-- Testimonials for Café Club -->
            <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-8 fade-in">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <p class="italic text-gray-700 mb-4">"El café literario es mi oasis. Cada reunión profundiza mi amor por las palabras."</p>
                    <cite class="font-bold text-teal-600">- Maríana Soto</cite>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <p class="italic text-gray-700 mb-4">"El club de lectura ha transformado mi rutina en aventuras semanales inolvidables."</p>
                    <cite class="font-bold text-teal-600">- Jorge Mendoza</cite>
                </div>
            </div>
        </div>
    </section>

    <!-- Join Club Modal -->
    <div id="joinModal" class="cafe-modal">
        <div class="cafe-modal-content">
            <h4 class="text-2xl font-bold text-teal-600 mb-4">Únete al Club de Lectura</h4>
            <form id="joinForm">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input type="text" id="name" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 p-2">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                    <input type="email" id="email" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 p-2">
                </div>
                <div class="mb-4">
                    <label for="preferences" class="block text-sm font-medium text-gray-700">Géneros Preferidos</label>
                    <select id="preferences" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 p-2">
                        <option>Romance</option>
                        <option>Misterio</option>
                        <option>Fantasía</option>
                        <option>Infantil</option>
                        <option>Ciencia Ficción</option>
                        <option>Biografías</option>
                    </select>
                </div>
                <button type="submit" class="btn-primary w-full">Enviar Solicitud</button>
            </form>
            <button id="closeJoinModal" class="mt-4 btn-primary">Cerrar</button>
        </div>
    </div>

    <!-- Featured Books -->
    <section id="featured-books" class="py-16 bg-gradient-to-b from-teal-100 to-yellow-100">
        <div class="container mx-auto">
            <h3 class="text-4xl font-bold text-center text-teal-600 mb-12 fade-in">Libros Destacados</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="book-card fade-in">
                    <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/167961ed-9ff1-4b8a-bda3-b3f4cc9c16c4.png" alt="Portada romántica detallada con pareja apasionada bajo lluvia torrencial en un parque urbano, colores vibrantes en azules profundos y rojos intensos, composición dramática con reflejos de agua y expresiones emotivas, estilo ilustrativo moderno con toques de realismo" class="w-full h-80 object-cover rounded-t-15">
                    <div class="p-6">
                        <h4 class="text-2xl font-bold text-teal-600">Amor Bajo la Lluvia</h4>
                        <p class="text-gray-700 mt-2">Una pasión que desafía las tormentas que azotan sus vidas.</p>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-xl font-bold text-yellow-600">$29.99</span>
                            <div class="flex">
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star-half-alt text-yellow-400"></i>
                            </div>
                        </div>
                        <button class="btn-primary mt-4 w-full add-to-cart" data-title="Amor Bajo la Lluvia" data-price="29.99">Agregar al Carrito</button>
                    </div>
                </div>
                <div class="book-card fade-in">
                    <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/3af147d3-59e8-40ba-b9a0-322e48f71695.png" alt="Portada de suspense detallada con detective sombrío investigando una mansión gótica victoriana bajo luna llena, colores oscuros en grises y negros con acentos rojos, composición tenebrosa con sombras alargadas y elementos míticos como cuervos sobre tejados puntiagudos, estilo noir con detalle hiperrealista" class="w-full h-80 object-cover rounded-lg">
                    <div class="p-6">
                        <h4 class="text-2xl font-bold text-teal-600">Sombras en la Mansión</h4>
                        <p class="text-gray-700 mt-2">Un misterio ancestral que demanda ser resuelto.</p>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-xl font-bold text-yellow-600">$24.99</span>
                            <div class="flex">
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                            </div>
                        </div>
                        <button class="btn-primary mt-4 w-full add-to-cart" data-title="Sombras en la Mansión" data-price="24.99">Agregar al Carrito</button>
                    </div>
                </div>
                <div class="book-card fade-in">
                    <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/64a00607-9732-4771-8282-95c693f7b716.png" alt="Portada infantil alegre con animales antropomórficos aventureros en un bosque encantado con duendes y flores luminosas, colores vivos en verdes esmeralda y amarillos brillantes, composición dinámica con personajes interactuando en una escena de juego, estilo ilustrativo animado con detalles encantadores y expresiones felices" class="w-full h-80 object-cover rounded-lg">
                    <div class="p-6">
                        <h4 class="text-2xl font-bold text-teal-600">Las Aventuras de los Animales Amigos</h4>
                        <p class="text-gray-700 mt-2">Risas y lecciones en un mundo lleno de magia.</p>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-xl font-bold text-yellow-600">$19.99</span>
                            <div class="flex">
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star-half-alt text-yellow-400"></i>
                            </div>
                        </div>
                        <button class="btn-primary mt-4 w-full add-to-cart" data-title="Las Aventuras de los Animales Amigos" data-price="19.99">Agregar al Carrito</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials py-16 text-white">
        <div class="container mx-auto text-center">
            <h3 class="text-3xl font-bold mb-8">Lo Que Dicen Nuestros Lectores</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white bg-opacity-20 p-6 rounded-lg fade-in">
                    <p class="italic">"Entre Amigos es mi escape favorito. Siempre encuentro historias que me transportan."</p>
                    <cite class="font-bold mt-4">- Ana López</cite>
                </div>
                <div class="bg-white bg-opacity-20 p-6 rounded-lg fade-in">
                    <p class="italic">"Recomiendo este lugar a todos. Calidad y variedad excepcionales."</p>
                    <cite class="font-bold mt-4">- Carlos García</cite>
                </div>
                <div class="bg-white bg-opacity-20 p-6 rounded-lg fade-in">
                    <p class="italic">"Me encantan las recomendaciones personalizadas de Entre Amigos."</p>
                    <cite class="font-bold mt-4">- Elena Martínez</cite>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="py-16 bg-yellow-100">
        <div class="container mx-auto text-center">
            <h3 class="text-3xl font-bold text-teal-600 mb-8">Suscríbete a Nuestro Boletín</h3>
            <p class="text-lg mb-8">Recibe las últimas noticias literarias y descuentos exclusivos.</p>
            <form class="max-w-md mx-auto fade-in">
                <input type="email" placeholder="Tu correo electrónico" class="w-full px-4 py-3 border border-gray-300 rounded-full mb-4 focus:outline-none focus:ring-2 focus:ring-teal-500">
                <button type="submit" class="btn-primary w-full">Suscribirse</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer py-8 text-teal-600">
        <div class="container mx-auto text-center">
            <p>© 2023 Entre Amigos. Todos los derechos reservados.</p>
            <div class="mt-4">
                <a href="#" class="text-teal-600 hover:text-teal-800 mx-2 transition"><i class="fab fa-facebook-f"></i> Facebook</a>
                <a href="#" class="text-teal-600 hover:text-teal-800 mx-2 transition"><i class="fab fa-twitter"></i> Twitter</a>
                <a href="#" class="text-teal-600 hover:text-teal-800 mx-2 transition"><i class="fab fa-instagram"></i> Instagram</a>
            </div>
        </div>
    </footer>

    <!-- Cart Modal -->
    <div id="cartModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
        <div class="bg-white p-8 rounded-lg w-11/12 md:w-1/2">
            <h3 class="text-2xl font-bold mb-4">Tu Carrito</h3>
            <ul id="cartItems" class="space-y-2"></ul>
            <p class="text-xl font-bold mt-4" id="cartTotal">Total: $0</p>
            <button id="closeCart" class="btn-primary mt-4 mr-4">Cerrar</button>
            <button class="btn-primary mt-4">Proceder al Pago</button>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>