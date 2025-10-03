<?php
session_start();

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
    <style>
        /* Estilos adicionales para mejorar la visualización de las imágenes */
        .book-image-container {
            height: 320px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f9fafb;
            overflow: hidden;
        }
        
        .book-image {
            max-height: 100%;
            max-width: 100%;
            object-fit: contain;
        }
    </style>
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
                    <li><a href="#cafe-club" class="text-teal-600 hover:text-teal-800 transition">Club de Lectura</a></li>
                    <li><a href="#" class="text-teal-600 hover:text-teal-800 transition">Contacto</a></li>
                    <!-- Esto hace que cambie arriba a la derecha y pase a decir tu perfil cuando estas logeado -->
                                        <?php if (!isset($_SESSION["OK"])) : ?>
                    					<li><a href="./login.php" class="text-teal-600 hover:text-teal-800 transition">Acceder</a></li>
                                        <?php else : ?>
                                        <li><a href="./perfil_usuario/Index_Perfil.php" class="text-teal-600 hover:text-teal-800 transition">Mi perfil</a></li>
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
                <h3 class="text-5xl font-bold text-teal-600 mb-6 fade-in"> Club de Lectura , una nueva propuesta</h3>
                <p class="text-lg text-gray-700 mb-8 fade-in max-w-2xl mx-auto">Nuestro club de lectura te invita a un espacio cálido para disfrutar de lecturas compartidas, debates apasionados y conexiones profundas. Explora géneros diversos, comparte tus ideas únicas y forma parte de una comunidad de verdaderos amantes de los libros. Con encuentros semanales, talleres creativos y noches temáticas, cada página se convierte en una nueva experiencia.</p>
                <div class="flex justify-center space-x-4 fade-in">
                    <button id="joinClubBtn" class="btn-primary"><a href="Club De Lectura/Index.php">Únete al Club</a></button>
                  
                </div>
            </div>
            
            <!-- Enhanced Carousel -->
            <div class="carousel fade-in">
                <div class="carousel-inner">
                    <div class="carousel-item">
                        <img src="https://github.com/ludmila-png/Libreria_Entre_Amigos/blob/main/pexels-cottonbro-4861347.jpg?raw=true" alt="Interior vibrante del café literario con mesas atestadas de libros antiguos y modernos, tazas de café elegante, grupos animados en conversaciones profundas, luces doradas creando una atmósfera mágica, estanterías repletas de volúmenes en tonos tierra y marfil, estilo ilustrativo detallado con detalles vívidos de camaradería intelectual" class="w-full h-80 md:h-96 object-cover">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-6 text-white">
                            <h4 class="text-2xl font-bold mb-2">Amigos entre Libros</h4>
                            <p class="text-sm mb-4">Un espacio para compartir lecturas, descubrir nuevos géneros y hacer amistades a través de los libros.</p>
                            <span class="inline-block bg-#4CD7D0 px-3 py-1 rounded-full text-sm font-medium">Desliza para conocer mas informacion ---></span>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://github.com/ludmila-png/Libreria_Entre_Amigos/blob/main/Club%20De%20Lectura/Dise%C3%B1o%20sin%20t%C3%ADtulo.png?raw=true"  class="w-full h-80 md:h-96 object-cover">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-6 text-white">
                            <h4 class="text-2xl font-bold mb-2">Actividades del Club de Lectura</h4>
                            <p class="text-sm mb-4">Comparte perspectivas únicas y profundiza en historias con otros lectores apasionados en sesiones interactivas.</p>
                            <span class="inline-block bg-#4CD7D0 px-3 py-1 rounded-full text-sm font-medium">Cada Miércoles a las 7 PM</span>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://github.com/ludmila-png/Libreria_Entre_Amigos/blob/main/1523159879112.jpg?raw=true"  class="w-full h-80 md:h-96 object-cover">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-6 text-white">
                            <h4 class="text-2xl font-bold mb-2">Lecturas de Memoria: Malvinas a 35 Años</h4>
                            <p class="text-sm mb-4">Un espacio de reflexión y encuentro para leer, dialogar y mantener viva la memoria sobre Malvinas, comprendiendo su impacto histórico y humano a través de la literatura.</p>
                            <span class="inline-block bg-#4CD7D0 px-3 py-1 rounded-full text-sm font-medium">Último viernes del mes</span>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://github.com/ludmila-png/Libreria_Entre_Amigos/blob/main/club%20de%20lectura%20imagenes/1000060573.jpg?raw=true" class="w-full h-80 md:h-96 object-cover">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-6 text-white">
                            <h4 class="text-2xl font-bold mb-2">Entre Sombras y Juventud</h4>
                            <p class="text-sm mb-4">Un club de lectura pensado para jóvenes lectores que quieren sumergirse en el universo de Crepúsculo, compartiendo risas, debates y la emoción de vivir cada página juntos.</p>
                            <span class="inline-block bg-#4CD7D0 px-3 py-1 rounded-full text-sm font-medium">Este sabado 22 De Julio</span>
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
                <div class="book-card fade-in bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="book-image-container">
                        <img src="https://github.com/ludmila-png/Libreria_Entre_Amigos/blob/main/Imagenes%20perfil/la%20chica%20del%20tren%20portada.jpg?raw=true" 
                             alt="La chica del tren" 
                             class="book-image">
                    </div>
                    <div class="p-6">
                        <h4 class="text-2xl font-bold text-teal-600">La Chica Del Tren</h4>
                        <p class="text-gray-700 mt-2">La protagonista observa cada mañana desde el tren a una pareja aparentemente perfecta, sin imaginar que pronto quedará envuelta en un misterio que cambiará su vida.</p>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-xl font-bold text-yellow-600">$27.999</span>
                            <div class="flex">
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star-half-alt text-yellow-400"></i>
                            </div>
                        </div>
                        <button class="btn-primary mt-4 w-full add-to-cart" data-title="La chica del tren" data-price="27.999">Agregar al Carrito</button>
                    </div>
                </div>
                <div class="book-card fade-in bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="book-image-container">
                        <img src="https://github.com/ludmila-png/Libreria_Entre_Amigos/blob/main/Imagenes%20perfil/bestiario%20portada.jpg?raw=true" 
                             alt="Bestiario" 
                             class="book-image">
                    </div>
                    <div class="p-6">
                        <h4 class="text-2xl font-bold text-teal-600">Bestiario</h4>
                        <p class="text-gray-700 mt-2">Una familia vive con normalidad hasta que la presencia de un tigre en la casa se convierte en parte de su rutina, marcando tensiones y silencios.</p>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-xl font-bold text-yellow-600">$18.999</span>
                            <div class="flex">
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                            </div>
                        </div>
                        <button class="btn-primary mt-4 w-full add-to-cart" data-title="Bestiario" data-price="24.99">Agregar al Carrito</button>
                    </div>
                </div>

                <div class="book-card fade-in bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="book-image-container">
                        <img src="https://github.com/ludmila-png/Libreria_Entre_Amigos/blob/main/Imagenes%20perfil/al%20final%20mueren%20los%20dos%20portada.jpg?raw=true" 
                             alt="Al final mueren los dos " 
                             class="book-image">
                    </div>
                    <div class="p-6">
                        <h4 class="text-2xl font-bold text-teal-600">Al Final Mueren Los Dos</h4>
                        <p class="text-gray-700 mt-2">Dos chicos que saben que van a morir en 24 horas se conocen gracias a una aplicación y deciden vivir intensamente su último día juntos.</p>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-xl font-bold text-yellow-600">$29.900</span>
                            <div class="flex">
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                            </div>
                        </div>
                        <button class="btn-primary mt-4 w-full add-to-cart" data-title="Al Final Mueren Los Dos" data-price="24.99">Agregar al Carrito</button>
                    </div>
                </div>
                <div class="book-card fade-in bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="book-image-container">
                        <img src="https://github.com/ludmila-png/Libreria_Entre_Amigos/blob/main/Imagenes%20perfil/alfonsina%20storni%20portada.jpg?raw=true" 
                             alt="Las Grandes Mujeres" 
                             class="book-image">
                    </div>
                    <div class="p-6">
                        <h4 class="text-2xl font-bold text-teal-600">Las Grandes Mujeres</h4>
                        <p class="text-gray-700 mt-2">En esta obra, Alfonsina Storni resalta la fuerza, la sensibilidad y la lucha de las mujeres, defendiendo su lugar en la sociedad y cuestionando los límites impuestos por la época.</p>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-xl font-bold text-yellow-600">$18.900</span>
                            <div class="flex">
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                            </div>
                        </div>
                        <button class="btn-primary mt-4 w-full add-to-cart" data-title="Bestiario" data-price="24.99">Agregar al Carrito</button>
                    </div>
                </div>
                <div class="book-card fade-in bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="book-image-container">
                        <img src="https://github.com/ludmila-png/Libreria_Entre_Amigos/blob/main/Imagenes%20perfil/cien%20a%C3%B1os%20de%20soledad.jpg?raw=true" 
                             alt="Cien Años De Solidad" 
                             class="book-image">
                    </div>
                    <div class="p-6">
                        <h4 class="text-2xl font-bold text-teal-600">Cien Años De Soledad</h4>
                        <p class="text-gray-700 mt-2">En Cien años de soledad de Gabriel García Márquez se relata la historia de la familia Buendía en el pueblo de Macondo, donde lo real y lo mágico se entrelazan para mostrar la soledad, el poder y el destino inevitable de sus generaciones.</p>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-xl font-bold text-yellow-600">$28.500</span>
                            <div class="flex">
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                            </div>
                        </div>
                        <button class="btn-primary mt-4 w-full add-to-cart" data-title="Bestiario" data-price="24.99">Agregar al Carrito</button>
                    </div>
                </div>
                <div class="book-card fade-in bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="book-image-container">
                        <img src="https://github.com/ludmila-png/Libreria_Entre_Amigos/blob/main/Imagenes%20perfil/rayuela.jpg?raw=true" 
                             alt="Rayuela" 
                             class="book-image">
                    </div>
                     <div class="p-6">
                        <h4 class="text-2xl font-bold text-teal-600">Rayuela</h4>
                        <p class="text-gray-700 mt-2">En Rayuela de Julio Cortázar, Horacio Oliveira busca sentido a su vida en un recorrido entre París y Buenos Aires, en una novela que rompe las reglas tradicionales de lectura.</p>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-xl font-bold text-yellow-600">$18.900</span>
                            <div class="flex">
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                            </div>
                        </div>
                        <button class="btn-primary mt-4 w-full add-to-cart" data-title="Bestiario" data-price="24.99">Agregar al Carrito</button>
                    </div>
                </div>
                <div class="book-card fade-in bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="book-image-container">
                        <img src="https://github.com/ludmila-png/Libreria_Entre_Amigos/blob/main/Imagenes%20perfil/crepusculo.jpg?raw=true" 
                             alt="Crepusculo" 
                             class="book-image">
                    </div>
                     <div class="p-6">
                        <h4 class="text-2xl font-bold text-teal-600">Crepusculo</h4>
                        <p class="text-gray-700 mt-2">En Crepúsculo de Stephenie Meyer, Bella Swan se enamora de Edward Cullen, un misterioso vampiro, y juntos enfrentan los peligros de un amor imposible.</p>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-xl font-bold text-yellow-600">$29.000</span>
                            <div class="flex">
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                            </div>
                        </div>
                        <button class="btn-primary mt-4 w-full add-to-cart" data-title="Bestiario" data-price="24.99">Agregar al Carrito</button>
                    </div>
                </div>
                <div class="book-card fade-in bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="book-image-container">
                        <img src="https://github.com/ludmila-png/Libreria_Entre_Amigos/blob/main/Imagenes%20perfil/el-resplandor.jpg?raw=true" 
                             alt="El Resplandor" 
                             class="book-image">
                    </div>
                    <div class="p-6">
                        <h4 class="text-2xl font-bold text-teal-600">El Resplandor</h4>
                        <p class="text-gray-700 mt-2">En El resplandor de Stephen King, una familia se muda a un hotel aislado donde fuerzas sobrenaturales y la locura amenazan con destruirlos.</p>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-xl font-bold text-yellow-600">$20.000</span>
                            <div class="flex">
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                            </div>
                        </div>
                        <button class="btn-primary mt-4 w-full add-to-cart" data-title="Bestiario" data-price="24.99">Agregar al Carrito</button>
                    </div>
                </div>
                <div class="book-card fade-in bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="book-image-container">
                        <img src="https://github.com/ludmila-png/Libreria_Entre_Amigos/blob/main/Imagenes%20perfil/it%20libro.jpg?raw=true" 
                             alt="IT" 
                             class="book-image">
                    </div>
                    <div class="p-6">
                        <h4 class="text-2xl font-bold text-teal-600">IT</h4>
                        <p class="text-gray-700 mt-2">En It de Stephen King, un grupo de amigos de la infancia enfrenta a una entidad maligna que adopta la forma de sus peores miedos, volviendo años después para derrotarla definitivamente.</p>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-xl font-bold text-yellow-600">$20.000</span>
                            <div class="flex">
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                            </div>
                        </div>
                        <button class="btn-primary mt-4 w-full add-to-cart" data-title="Bestiario" data-price="24.99">Agregar al Carrito</button>
                    </div>
                </div>
                <div class="book-card fade-in bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="book-image-container">
                        <img src="https://github.com/ludmila-png/Libreria_Entre_Amigos/blob/main/Imagenes%20perfil/el%20eternauta%20libro.jpg?raw=true" 
                             alt="El Eternauta" 
                             class="book-image">
                    </div>
                    <div class="p-6">
                        <h4 class="text-2xl font-bold text-teal-600">El Eternauta</h4>
                        <p class="text-gray-700 mt-2">En El Eternauta de Héctor Germán Oesterheld, un grupo de sobrevivientes en Buenos Aires lucha contra una invasión alienígena tras una nevada mortal que cubre la ciudad.</p>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-xl font-bold text-yellow-600">$35.999</span>
                            <div class="flex">
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                            </div>
                        </div>
                        <button class="btn-primary mt-4 w-full add-to-cart" data-title="Bestiario" data-price="24.99">Agregar al Carrito</button>
                    </div>
                </div>
                <div class="book-card fade-in bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="book-image-container">
                        <img src="https://github.com/ludmila-png/Libreria_Entre_Amigos/blob/main/Imagenes%20perfil/trilogia%20de%20la%20fundacion.jpg?raw=true" 
                             alt="Trilogia de la fundacion " 
                             class="book-image">
                    </div>
                    <div class="p-6">
                        <h4 class="text-2xl font-bold text-teal-600">Trilogia de la fundacion</h4>
                        <p class="text-gray-700 mt-2"> En la Trilogía de la Fundación de Isaac Asimov, el científico Hari Seldon desarrolla la psicohistoria para predecir el futuro y preservar el conocimiento humano frente a la caída del Imperio Galáctico.</p>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-xl font-bold text-yellow-600">$20.000</span>
                            <div class="flex">
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                            </div>
                        </div>
                        <button class="btn-primary mt-4 w-full add-to-cart" data-title="Bestiario" data-price="24.99">Agregar al Carrito</button>
                    </div>
                </div>
                <div class="book-card fade-in bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="book-image-container">
                        <img src="https://github.com/ludmila-png/Libreria_Entre_Amigos/blob/main/Imagenes%20perfil/el%20diario%20de%20ana%20frank%20portada.jpg?raw=true" 
                             alt="El Diario De Ana Frank" 
                             class="book-image">
                    </div>
                    
                    

                    <div class="p-6">
                        <h4 class="text-2xl font-bold text-teal-600">El Diario De Ana Frank</h4>
                        <p class="text-gray-700 mt-2">Ana narra con sinceridad su vida escondida durante la persecución nazi, mostrando sus miedos, esperanzas y reflexiones sobre la humanidad.</p>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-xl font-bold text-yellow-600">$17.999</span>
                            <div class="flex">
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star-half-alt text-yellow-400"></i>
                            </div>
                        </div>
                        <button class="btn-primary mt-4 w-full add-to-cart" data-title="El Diario De Ana Frank" data-price="19.99">Agregar al Carrito</button>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonios -->
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

    <script src="scriptt.js"></script>
</body>
</html>
