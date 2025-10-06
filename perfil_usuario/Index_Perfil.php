<?php
session_start();
    $email = $_SESSION["EMAIL"];
    $psw = $_SESSION["PSW"];

      $ref = mysqli_connect("localhost","root","");
    if(!$ref)
        $msj = "Error de conexion";
    else {
        $consulta = "SELECT * FROM lapiz_magico.usuarios WHERE EMAIL='$email' AND password='$psw'";
        $rta=mysqli_query($ref,$consulta);
                    if(!$rta)
            $msj="Query error";
        else {
            if(mysqli_num_rows($rta) == 0) {
                $msj = "No se ha encontrado un usuario con ese nombre o contraseña.";
            } else {
                $row = mysqli_fetch_assoc($rta);
                $nombre = $row['nombre'];
                $apellido = $row['apellido'];
            }
        }
    }
if (!isset($_SESSION["OK"]))
{
	header("location:../login.php");
}
if (isset($_POST["cerrar"]))
{
	$_SESSION[] = array();
	if(isset($_COOKIE[session_name()]))
	{
		setcookie(session_name(), '', time()-100, ini_get("session.cookie_path"));
		session_destroy();
	}
	header("location:../login.php");
}
?>
<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Mi Perfil - Club de Lectura</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
  />
  <style>
    :root {
      --amarillo-claro: #F8EA8C;
      --celeste-suave: #A4E8E0;
      --turquesa: #4CD7D0;
      --amarillo-oscuro: #E1C340;
      --azul-oscuro: #1E3A8A;
    }
    
    .bg-amarillo-claro {
      background-color: var(--amarillo-claro);
    }
    .bg-celeste-suave {
      background-color: var(--celeste-suave);
    }
    .bg-turquesa {
      background-color: var(--turquesa);
    }
    .bg-amarillo-oscuro {
      background-color: var(--amarillo-oscuro);
    }
    .text-amarillo-oscuro {
      color: var(--amarillo-oscuro);
    }
    .text-turquesa {
      color: var(--turquesa);
    }
    .border-turquesa {
      border-color: var(--turquesa);
    }
    .border-amarillo-oscuro {
      border-color: var(--amarillo-oscuro);
    }
    
    .btn-primary {
      background-color: var(--turquesa);
      color: white;
      font-weight: 600;
      border-radius: 9999px;
      padding-left: 2.5rem;
      padding-right: 2.5rem;
      padding-top: 1rem;
      padding-bottom: 1rem;
      box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
      transition: all 0.3s;
      transform: transform 0.3s;
    }

    .btn-primary:hover {
      background-color: var(--amarillo-oscuro);
      transform: scale(1.05);
    }

    .btn-secondary {
      background-color: var(--amarillo-oscuro);
      color: white;
      font-weight: 600;
      border-radius: 9999px;
      padding-left: 1.5rem;
      padding-right: 1.5rem;
      padding-top: 0.75rem;
      padding-bottom: 0.75rem;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
      transition: background-color 0.3s;
    }

    .btn-secondary:hover {
      background-color: var(--turquesa);
    }
    
    .club-card {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .club-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }
    
    .book-card {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .book-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }
    
    .tab-content {
      display: none;
    }
    .tab-content.active {
      display: block;
    }
    .tab-button {
      padding-left: 1rem;
      padding-right: 1rem;
      padding-top: 0.5rem;
      padding-bottom: 0.5rem;
      border-top-left-radius: 0.5rem;
      border-top-right-radius: 0.5rem;
      font-weight: 600;
      transition: all 0.3s;
    }
    .tab-button.active {
      background-color: var(--turquesa);
      color: white;
    }
    
    .progress-bar {
      width: 100%;
      background-color: #e5e7eb;
      border-radius: 9999px;
      height: 1rem;
    }
    .progress-fill {
      background-color: var(--turquesa);
      height: 1rem;
      border-radius: 9999px;
    }
  </style>
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
        <a href="../index.php" class="hover:text-amarillo-oscuro transition">Inicio</a>
        <a href="../index.php#clubes" class="hover:text-amarillo-oscuro transition">Clubes</a>
        <a href="tienda.html" class="hover:text-amarillo-oscuro transition">Tienda</a>
       
      </nav>
      
      <!-- Botones de usuario -->
      <div class="flex items-center space-x-4">
        <div id="userMenu" class="relative">
          <button class="flex items-center space-x-2">
            <img src="https://github.com/ludmila-png/Libreria_Entre_Amigos/blob/main/Imagenes%20perfil/Sabrina%20grisel.jpg?raw=true" alt="Usuario" class="w-10 h-10 rounded-full">
            <span class="font-semibold text-turquesa"><?php echo $nombre?></span>
          </button>
          <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 hidden" id="dropdownMenu">
            <a href="perfil.html" class="block px-4 py-2 hover:bg-gray-100">Mi Perfil</a>
            <a href="#mis-clubes" class="block px-4 py-2 hover:bg-gray-100">Mis Clubes</a>
            <a href="#mensajes" class="block px-4 py-2 hover:bg-gray-100">Mensajes <span class="bg-turquesa text-white rounded-full px-2 py-1 text-xs">3</span></a>
            <a href="#" id="logoutBtn" class="block px-4 py-2 hover:bg-gray-100">Cerrar Sesión</a>
          </div>
        </div>
      </div>
    </div>
  </header>

  <main class="container mx-auto px-6 py-16 max-w-7xl">
    <!-- Encabezado del perfil -->
    <section class="bg-white rounded-3xl shadow-lg p-8 mb-12">
      <div class="flex flex-col md:flex-row items-center md:items-start space-y-6 md:space-y-0 md:space-x-8">
        <div class="flex-shrink-0">
          <img src="https://github.com/ludmila-png/Libreria_Entre_Amigos/blob/main/Imagenes%20perfil/simple-flat-isolated-people-icon-free-vector.jpg?raw=true" alt="Foto de perfil" class="w-32 h-32 rounded-full object-cover border-4 border-turquesa">
        </div>
        
        <div class="flex-grow text-center md:text-left">
          <h1 class="text-4xl font-extrabold text-turquesa mb-2"><?php echo $nombre." ".$apellido?></h1>
          <p class="text-gray-600 mb-4">Lectora apasionada desde 2018</p>
          
          <div class="flex flex-wrap justify-center md:justify-start gap-4 mb-6">
            <div class="bg-celeste-suave rounded-full px-4 py-2">
              <span class="font-semibold text-turquesa">15</span> Clubes activos
            </div>
            <div class="bg-amarillo-claro rounded-full px-4 py-2">
              <span class="font-semibold text-amarillo-oscuro">47</span> Libros leídos
            </div>
            <div class="bg-gray-100 rounded-full px-4 py-2">
              <span class="font-semibold text-gray-700">Nivel 5</span> Lectora avanzada
            </div>
          </div>
          
          <div class="flex flex-wrap justify-center md:justify-start gap-4">
            <button class="btn-secondary">Editar perfil</button>
            <button class="btn-primary">Compartir perfil</button>
            <form method="POST" action="Index_Perfil.php">
			      <button class="btn-primary"><input type="submit" value="Cerrar sesión" name="cerrar"></button>
		</form>
          </div>
        </div>
        
        <div class="bg-amarillo-claro rounded-2xl p-6 w-full md:w-64">
          <h3 class="text-xl font-bold text-amarillo-oscuro mb-4">Mi progreso</h3>
          
          <div class="mb-4">
            <p class="font-semibold mb-1">Puntos de lectura</p>
            <div class="progress-bar">
              <div class="progress-fill" style="width: 75%"></div>
            </div>
            <p class="text-sm mt-1">750/1000 puntos</p>
          </div>
          
          <div class="mb-4">
            <p class="font-semibold mb-1">Reto anual</p>
            <div class="progress-bar">
              <div class="progress-fill" style="width: 60%"></div>
            </div>
            <p class="text-sm mt-1">18/30 libros</p>
          </div>
          
          <div>
            <p class="font-semibold">Próximo logro</p>
            <p class="text-sm">Lectora ávida (25 libros)</p>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Navegación por pestañas -->
    <div class="flex border-b mb-8 overflow-x-auto">
      <button class="tab-button active" data-tab="clubes">Mis Clubes</button>
      <button class="tab-button" data-tab="carrito">Carrito <span class="bg-turquesa text-white rounded-full px-2 py-1 text-xs ml-1">3</span></button>
      <button class="tab-button" data-tab="deseos">Lista de Deseos</button>
      <button class="tab-button" data-tab="compras">Mis Compras</button>
      <button class="tab-button" data-tab="configuracion">Configuración</button>
    </div>
    
    <!-- Contenido de las pestañas -->
    
    <!-- Pestaña: Mis Clubes -->
    <div id="clubesTab" class="tab-content active">
      <section class="mb-12">
        <h2 class="text-3xl font-extrabold text-turquesa mb-6">Mis Clubes de Lectura</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <!-- Club 1 -->
          <div class="club-card bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100">
            <div class="h-40 bg-cover bg-center" style="background-image: url('https://github.com/ludmila-png/Libreria_Entre_Amigos/blob/main/club%20de%20lectura%20imagenes/Posteo%20para%20Instagram%20Reuni%C3%B3n%20Dominical%20Graffiti%20Blanco%20y%20verde%20(2).png?raw=true')"></div>
            <div class="p-6">
              <div class="flex justify-between items-start mb-4">
                <h3 class="text-xl font-bold text-turquesa">35 años despues</h3>
                <span class="bg-amarillo-claro text-amarillo-oscuro px-3 py-1 rounded-full text-sm font-semibold">Activo</span>
              </div>
              <p class="text-gray-600 mb-4">Encuentro presencial con Ricardo Piccardi. Espacio íntimo para conversar sobre la obra.</p>
              
              <div class="mb-4">
                <p class="font-semibold">Próxima reunión: <span class="font-normal">15 Jul, 19:00</span></p>
                <p class="font-semibold">Lugar: <span class="font-normal">Librería Entre Amigos - Sala A</span></p>
              </div>
              
              <div class="flex justify-between items-center">
                <button class="btn-primary py-2 px-6 text-sm">Ver detalles</button>
                <button class="text-red-500 hover:text-red-700 font-semibold">Abandonar</button>
              </div>
            </div>
          </div>
          
          <!-- Club 2 -->
          <div class="club-card bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100">
            <div class="h-40 bg-cover bg-center" style="background-image: url('https://github.com/ludmila-png/Libreria_Entre_Amigos/blob/main/club%20de%20lectura%20imagenes/1000060573.jpg?raw=true')"></div>
            <div class="p-6">
              <div class="flex justify-between items-start mb-4">
                <h3 class="text-xl font-bold text-turquesa">Amanecer de Lecturas</h3>
                <span class="bg-amarillo-claro text-amarillo-oscuro px-3 py-1 rounded-full text-sm font-semibold">Activo</span>
              </div>
              <p class="text-gray-600 mb-4">Encuentro conmemorativo de 20 años de Crepúsculo.</p>
              
              <div class="mb-4">
                <p class="font-semibold">Próxima reunión: <span class="font-normal">22 Jul, 11:00</span></p>
                <p class="font-semibold">Lugar: <span class="font-normal">Libreria Entre Amigos-Sala B</span></p>
              </div>
              
              <div class="flex justify-between items-center">
                <button class="btn-primary py-2 px-6 text-sm">Ver detalles</button>
                <button class="text-red-500 hover:text-red-700 font-semibold">Abandonar</button>
              </div>
            </div>
          </div>
          
          <!-- Club 3 -->
          <div class="club-card bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100">
            <div class="h-40 bg-cover bg-center" style="background-image: url('https://github.com/ludmila-png/Libreria_Entre_Amigos/blob/main/club%20de%20lectura%20imagenes/el%20resplandor.jpg?raw=true')"></div>
            <div class="p-6">
              <div class="flex justify-between items-start mb-4">
                <h3 class="text-xl font-bold text-turquesa">Luces y Sombras</h3>
                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-semibold">Nuevo</span>
              </div>
              <p class="text-gray-600 mb-4">Club de lectura de El Resplandor de Stephen King.</p>
              
              <div class="mb-4">
                <p class="font-semibold">Próxima reunión: <span class="font-normal">5 Ago, 17:00</span></p>
                <p class="font-semibold">Lugar: <span class="font-normal">Librería Entre Amigos - Sala A</span></p>
              </div>
              
              <div class="flex justify-between items-center">
                <button class="btn-primary py-2 px-6 text-sm">Ver detalles</button>
                <button class="text-red-500 hover:text-red-700 font-semibold">Abandonar</button>
              </div>
            </div>
          </div>
        </div>
        
        <div class="mt-8 text-center">
          <button class="btn-primary">Explorar más clubes</button>
        </div>
      </section>
      
      <!-- Clubes recomendados -->
      <section>
        <h2 class="text-3xl font-extrabold text-turquesa mb-6">Clubes Recomendados para ti</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <!-- Club recomendado 1 -->
          <div class="club-card bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100">
            <div class="h-40 bg-cover bg-center" style="background-image: url('https://github.com/ludmila-png/Libreria_Entre_Amigos/blob/main/club%20de%20lectura%20imagenes/ana%20frank.jpg?raw=true')"></div>
            <div class="p-6">
              <div class="flex justify-between items-start mb-4">
                <h3 class="text-xl font-bold text-turquesa">Voces desde el escondite</h3>
                <span class="bg-amarillo-claro text-amarillo-oscuro px-3 py-1 rounded-full text-sm font-semibold">20 miembros</span>
              </div>
              <p class="text-gray-600 mb-4">Encuentro literario sobre El Diario de Ana Frank.</p>
              
              <div class="mb-4">
                <p class="font-semibold">Próxima reunión: <span class="font-normal">15 Ago, 17:00</span></p>
              </div>
              
              <div class="flex justify-between items-center">
                <button class="btn-primary py-2 px-6 text-sm">Unirse</button>
                <a href="#" class="text-turquesa hover:underline font-semibold">Ver detalles</a>
              </div>
            </div>
          </div>
          
          <!-- Club recomendado 2 -->
          <div class="club-card bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100">
            <div class="h-40 bg-cover bg-center" style="background-image: url('https://github.com/ludmila-png/Libreria_Entre_Amigos/blob/main/club%20de%20lectura%20imagenes/el%20eternauta.jpg?raw=true')"></div>
            <div class="p-6">
              <div class="flex justify-between items-start mb-4">
                <h3 class="text-xl font-bold text-turquesa">Bajo la nevada eterna</h3>
                <span class="bg-amarillo-claro text-amarillo-oscuro px-3 py-1 rounded-full text-sm font-semibold">28 miembros</span>
              </div>
              <p class="text-gray-600 mb-4">Encuentro literario sobre El Eternauta.</p>
              
              <div class="mb-4">
                <p class="font-semibold">Próxima reunión: <span class="font-normal">12 Ago, 18:30</span></p>
              </div>
              
              <div class="flex justify-between items-center">
                <button class="btn-primary py-2 px-6 text-sm">Unirse</button>
                <a href="#" class="text-turquesa hover:underline font-semibold">Ver detalles</a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    
    <!-- Pestaña: Carrito -->
    <div id="carritoTab" class="tab-content">
      <section class="mb-12">
        <h2 class="text-3xl font-extrabold text-turquesa mb-6">Mi Carrito de Compras</h2>
        
        <div class="bg-white rounded-3xl shadow-lg p-8">
          <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2">
              <!-- Producto 1 -->
              <div class="flex flex-col md:flex-row items-center border-b border-gray-200 pb-6 mb-6">
                <div class="w-32 h-40 bg-gray-100 rounded-lg flex items-center justify-center mb-4 md:mb-0 md:mr-6">
                  <img src="https://github.com/ludmila-png/Libreria_Entre_Amigos/blob/main/Imagenes%20perfil/35-a%C3%B1os.png?raw=true" alt="Portada del libro" class="w-full h-full object-cover rounded-lg">
                </div>
                <div class="flex-grow">
                  <h3 class="text-xl font-bold text-turquesa mb-2">35 Años Después</h3>
                  <p class="text-gray-600 mb-2">Ricardo Piccardi</p>
                  <p class="text-amarillo-oscuro font-bold text-lg mb-4">$30.000</p>
                  <div class="flex items-center">
                    <button class="bg-gray-200 rounded-l-lg px-3 py-1">-</button>
                    <span class="bg-gray-100 px-4 py-1">1</span>
                    <button class="bg-gray-200 rounded-r-lg px-3 py-1">+</button>
                    <button class="text-red-500 ml-4 hover:text-red-700">
                      <i class="fas fa-trash"></i> Eliminar
                    </button>
                  </div>
                </div>
              </div>
              
              <!-- Producto 2 -->
              <div class="flex flex-col md:flex-row items-center border-b border-gray-200 pb-6 mb-6">
                <div class="w-32 h-40 bg-gray-100 rounded-lg flex items-center justify-center mb-4 md:mb-0 md:mr-6">
                  <img src="https://github.com/ludmila-png/Libreria_Entre_Amigos/blob/main/Imagenes%20perfil/crepusculo.jpg?raw=true" alt="Portada del libro" class="w-full h-full object-cover rounded-lg">
                </div>
                <div class="flex-grow">
                  <h3 class="text-xl font-bold text-turquesa mb-2">Crepúsculo </h3>
                  <p class="text-gray-600 mb-2">Stephenie Meyer</p>
                  <p class="text-amarillo-oscuro font-bold text-lg mb-4">$29.000</p>
                  <div class="flex items-center">
                    <button class="bg-gray-200 rounded-l-lg px-3 py-1">-</button>
                    <span class="bg-gray-100 px-4 py-1">1</span>
                    <button class="bg-gray-200 rounded-r-lg px-3 py-1">+</button>
                    <button class="text-red-500 ml-4 hover:text-red-700">
                      <i class="fas fa-trash"></i> Eliminar
                    </button>
                  </div>
                </div>
              </div>
              
              <!-- Producto 3 -->
              <div class="flex flex-col md:flex-row items-center pb-6">
                <div class="w-32 h-40 bg-gray-100 rounded-lg flex items-center justify-center mb-4 md:mb-0 md:mr-6">
                  <img src="https://github.com/ludmila-png/Libreria_Entre_Amigos/blob/main/Imagenes%20perfil/el-resplandor.jpg?raw=true" alt="Portada del libro" class="w-full h-full object-cover rounded-lg">
                </div>
                <div class="flex-grow">
                  <h3 class="text-xl font-bold text-turquesa mb-2">El Resplandor</h3>
                  <p class="text-gray-600 mb-2">Stephen King</p>
                  <p class="text-amarillo-oscuro font-bold text-lg mb-4">$25.999</p>
                  <div class="flex items-center">
                    <button class="bg-gray-200 rounded-l-lg px-3 py-1">-</button>
                    <span class="bg-gray-100 px-4 py-1">1</span>
                    <button class="bg-gray-200 rounded-r-lg px-3 py-1">+</button>
                    <button class="text-red-500 ml-4 hover:text-red-700">
                      <i class="fas fa-trash"></i> Eliminar
                    </button>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="bg-amarillo-claro rounded-2xl p-6 h-fit">
              <h3 class="text-xl font-bold text-amarillo-oscuro mb-4">Resumen del pedido</h3>
              
              <div class="space-y-3 mb-6">
                <div class="flex justify-between">
                  <span>Subtotal (3 productos)</span>
                  <span>$$84.999</span>
                </div>
                <div class="flex justify-between">
                  <span>Envío</span>
                  <span class="text-green-600">Gratis</span>
                </div>
                <div class="flex justify-between">
                  <span>Descuento</span>
                  <span class="text-green-600">-</span>
                </div>
                <div class="border-t border-gray-300 pt-3 flex justify-between font-bold text-lg">
                  <span>Total</span>
                  <span>$84.999</span>
                </div>
              </div>
              
              <button class="btn-primary w-full mb-4">Proceder al pago</button>
              <button class="btn-secondary w-full">Seguir comprando</button>
              
              <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">¿Tienes un código de descuento?</p>
                <div class="flex mt-2">
                  <input type="text" placeholder="Ingresa el código" class="flex-grow px-4 py-2 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-turquesa">
                  <button class="bg-turquesa text-white px-4 rounded-r-lg hover:bg-amarillo-oscuro transition">Aplicar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    
    <!-- Pestaña: Lista de Deseos -->
    <div id="deseosTab" class="tab-content">
      <section class="mb-12">
        <h2 class="text-3xl font-extrabold text-turquesa mb-6">Mi Lista de Deseos</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <!-- Libro 1 -->
          <div class="book-card bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100">
            <div class="h-64 flex items-center justify-center bg-gray-100">
              <img src="https://github.com/ludmila-png/Libreria_Entre_Amigos/blob/main/Imagenes%20perfil/el%20eternauta%20libro.jpg?raw=true" 
                   alt="Portada del libro El Eternauta" 
                   class="h-full w-full object-contain">
            </div>
            <div class="p-6">
              <h3 class="text-xl font-bold text-turquesa mb-2">El Eternauta</h3>
              <p class="text-gray-600 mb-2">Héctor Germán Oesterheld</p>
              <p class="text-amarillo-oscuro font-bold text-lg mb-4">$35.999</p>
              
              <div class="flex justify-between items-center">
                <button class="btn-primary py-2 px-4 text-sm">Agregar al carrito</button>
                <button class="text-red-500 hover:text-red-700">
                  <i class="fas fa-heart"></i>
                </button>
              </div>
            </div>
          </div>
          
          <!-- Libro 2 -->
          <div class="book-card bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100">
            <div class="h-64 flex items-center justify-center bg-gray-100">
              <img src="https://github.com/ludmila-png/Libreria_Entre_Amigos/blob/main/Imagenes%20perfil/la%20chica%20del%20tren%20portada.jpg?raw=true" 
                   alt="Portada del libro La Chica del Tren" 
                   class="h-full w-full object-contain">
            </div>
            <div class="p-6">
              <h3 class="text-xl font-bold text-turquesa mb-2">La Chica del Tren</h3>
              <p class="text-gray-600 mb-2">Paula Hawkins</p>
              <p class="text-amarillo-oscuro font-bold text-lg mb-4">$27.999</p>
              
              <div class="flex justify-between items-center">
                <button class="btn-primary py-2 px-4 text-sm">Agregar al carrito</button>
                <button class="text-red-500 hover:text-red-700">
                  <i class="fas fa-heart"></i>
                </button>
              </div>
            </div>
          </div>
          
          <!-- Libro 3 -->
          <div class="book-card bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100">
            <div class="h-64 flex items-center justify-center bg-gray-100">
              <img src="https://github.com/ludmila-png/Libreria_Entre_Amigos/blob/main/Imagenes%20perfil/al%20final%20mueren%20los%20dos%20portada.jpg?raw=true" 
                   alt="Portada del libro Al Final Mueren los Dos" 
                   class="h-full w-full object-contain">
            </div>
            <div class="p-6">
              <h3 class="text-xl font-bold text-turquesa mb-2">Al Final Mueren los Dos</h3>
              <p class="text-gray-600 mb-2">Adam Silvera</p>
              <p class="text-amarillo-oscuro font-bold text-lg mb-4">$29.900</p>
              
              <div class="flex justify-between items-center">
                <button class="btn-primary py-2 px-4 text-sm">Agregar al carrito</button>
                <button class="text-red-500 hover:text-red-700">
                  <i class="fas fa-heart"></i>
                </button>
              </div>
            </div>
          </div>
          
          <!-- Libro 4 -->
          <div class="book-card bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100">
            <div class="h-64 flex items-center justify-center bg-gray-100">
              <img src="https://github.com/ludmila-png/Libreria_Entre_Amigos/blob/main/Imagenes%20perfil/alfonsina%20storni%20portada.jpg?raw=true" 
                   alt="Portada del libro Las Grandes Mujeres" 
                   class="h-full w-full object-contain">
            </div>
            <div class="p-6">
              <h3 class="text-xl font-bold text-turquesa mb-2">Las Grandes Mujeres</h3>
              <p class="text-gray-600 mb-2">Alfonsina Storni</p>
              <p class="text-amarillo-oscuro font-bold text-lg mb-4">$18,900</p>
              
              <div class="flex justify-between items-center">
                <button class="btn-primary py-2 px-4 text-sm">Agregar al carrito</button>
                <button class="text-red-500 hover:text-red-700">
                  <i class="fas fa-heart"></i>
                </button>
              </div>
            </div>
          </div>
          
          <!-- Libro 5 -->
          <div class="book-card bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100">
            <div class="h-64 flex items-center justify-center bg-gray-100">
              <img src="https://github.com/ludmila-png/Libreria_Entre_Amigos/blob/main/Imagenes%20perfil/bestiario%20portada.jpg?raw=true" 
                   alt="Portada del libro Bestiario" 
                   class="h-full w-full object-contain">
            </div>
            <div class="p-6">
              <h3 class="text-xl font-bold text-turquesa mb-2">Bestiario</h3>
              <p class="text-gray-600 mb-2">Julio Cortazar</p>
              <p class="text-amarillo-oscuro font-bold text-lg mb-4">$18.999</p>
              
              <div class="flex justify-between items-center">
                <button class="btn-primary py-2 px-4 text-sm">Agregar al carrito</button>
                <button class="text-red-500 hover:text-red-700">
                  <i class="fas fa-heart"></i>
                </button>
              </div>
            </div>
          </div>
          
          <!-- Libro 6 -->
          <div class="book-card bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100">
            <div class="h-64 flex items-center justify-center bg-gray-100">
              <img src="https://github.com/ludmila-png/Libreria_Entre_Amigos/blob/main/Imagenes%20perfil/el%20diario%20de%20ana%20frank%20portada.jpg?raw=true" 
                   alt="Portada del libro El Diario de Ana Frank" 
                   class="h-full w-full object-contain">
            </div>
            <div class="p-6">
              <h3 class="text-xl font-bold text-turquesa mb-2">El Diario de Ana Frank</h3>
              <p class="text-gray-600 mb-2">Ana Frank</p>
              <p class="text-amarillo-oscuro font-bold text-lg mb-4">$17.999</p>
              
              <div class="flex justify-between items-center">
                <button class="btn-primary py-2 px-4 text-sm">Agregar al carrito</button>
                <button class="text-red-500 hover:text-red-700">
                  <i class="fas fa-heart"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    
    <!-- Pestaña: Mis Compras -->
    <div id="comprasTab" class="tab-content">
      <section class="mb-12">
        <h2 class="text-3xl font-extrabold text-turquesa mb-6">Historial de Compras</h2>
        
        <div class="bg-white rounded-3xl shadow-lg p-8">
          <!-- Compra 1 -->
          <div class="border-b border-gray-200 pb-6 mb-6">
            <div class="flex justify-between items-center mb-4">
              <div>
                <p class="font-semibold text-lg">Pedido #ORD-7842</p>
                <p class="text-gray-600">Realizado el 10 de Julio, 2024</p>
              </div>
              <div class="text-right">
                <p class="font-bold text-lg">$55.000</p>
                <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm">Entregado</span>
              </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div class="flex items-center">
                <div class="w-16 h-20 bg-gray-100 rounded-lg mr-4">
                  <img src="https://github.com/ludmila-png/Libreria_Entre_Amigos/blob/main/Imagenes%20perfil/cien%20a%C3%B1os%20de%20soledad.jpg?raw=true" alt="Portada del libro" class="w-full h-full object-cover rounded-lg">
                </div>
                <div>
                  <p class="font-semibold">Cien Años de Soledad</p>
                  <p class="text-gray-600">Gabriel García Márquez</p>
                  <p class="text-amarillo-oscuro">$23.000</p>
                </div>
              </div>
              
              <div class="flex items-center">
                <div class="w-16 h-20 bg-gray-100 rounded-lg mr-4">
                  <img src="https://github.com/ludmila-png/Libreria_Entre_Amigos/blob/main/Imagenes%20perfil/rayuela.jpg?raw=true" alt="Portada del libro" class="w-full h-full object-cover rounded-lg">
                </div>
                <div>
                  <p class="font-semibold">Rayuela</p>
                  <p class="text-gray-600">Julio Cortázar</p>
                  <p class="text-amarillo-oscuro">$22,000</p>
                </div>
              </div>
            </div>
            
            <div class="mt-4 flex justify-end">
              <button class="btn-secondary mr-2">Ver detalles</button>
              <button class="btn-primary">Volver a comprar</button>
            </div>
          </div>
          
          <!-- Compra 2 -->
          <div class="border-b border-gray-200 pb-6 mb-6">
            <div class="flex justify-between items-center mb-4">
              <div>
                <p class="font-semibold text-lg">Pedido #ORD-6721</p>
                <p class="text-gray-600">Realizado el 25 de Junio, 2024</p>
              </div>
              <div class="text-right">
                <p class="font-bold text-lg">$25.900</p>
                <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-sm">En camino</span>
              </div>
            </div>
            
            <div class="flex items-center">
              <div class="w-16 h-20 bg-gray-100 rounded-lg mr-4">
                <img src="https://github.com/ludmila-png/Libreria_Entre_Amigos/blob/main/Imagenes%20perfil/it%20libro.jpg?raw=true" alt="Portada del libro" class="w-full h-full object-cover rounded-lg">
              </div>
              <div>
                <p class="font-semibold">IT</p>
                <p class="text-gray-600">Stephen King</p>
                <p class="text-amarillo-oscuro">$25,900</p>
              </div>
            </div>
            
            <div class="mt-4 flex justify-end">
              <button class="btn-secondary mr-2">Ver detalles</button>
              <button class="btn-primary">Seguir pedido</button>
            </div>
          </div>
        </div>
      </section>
    </div>
    
    <!-- Pestaña: Configuración -->
    <div id="configuracionTab" class="tab-content">
      <section class="mb-12">
        <h2 class="text-3xl font-extrabold text-turquesa mb-6">Configuración de la Cuenta</h2>
        
        <div class="bg-white rounded-3xl shadow-lg p-8">
          <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div>
              <h3 class="text-xl font-bold text-turquesa mb-4">Información Personal</h3>
              
              <form class="space-y-4">
                <div>
                  <label for="nombre" class="block mb-1 font-medium">Nombre completo</label>
                  <input type="text" id="nombre" value="Sabrina Grisel" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-turquesa">
                </div>
                
                <div>
                  <label for="email" class="block mb-1 font-medium">Email</label>
                  <input type="email" id="email" value="sabrina.grisel@email.com" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-turquesa">
                </div>
                
                <div>
                  <label for="telefono" class="block mb-1 font-medium">Teléfono</label>
                  <input type="tel" id="telefono" value="+54 9 11 1234-5678" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-turquesa">
                </div>
                
                <div>
                  <label for="fechaNacimiento" class="block mb-1 font-medium">Fecha de nacimiento</label>
                  <input type="date" id="fechaNacimiento" value="1990-05-15" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-turquesa">
                </div>
                
                <button type="submit" class="btn-primary">Guardar cambios</button>
              </form>
            </div>
            
            <div>
              <h3 class="text-xl font-bold text-turquesa mb-4">Preferencias</h3>
              
              <div class="space-y-4">
                <div>
                  <label class="flex items-center">
                    <input type="checkbox" class="rounded text-turquesa focus:ring-turquesa" checked>
                    <span class="ml-2">Recibir notificaciones por email</span>
                  </label>
                </div>
                
                <div>
                  <label class="flex items-center">
                    <input type="checkbox" class="rounded text-turquesa focus:ring-turquesa" checked>
                    <span class="ml-2">Recibir recomendaciones personalizadas</span>
                  </label>
                </div>
                
                <div>
                  <label class="flex items-center">
                    <input type="checkbox" class="rounded text-turquesa focus:ring-turquesa">
                    <span class="ml-2">Compartir mis lecturas en el perfil público</span>
                  </label>
                </div>
                
                <div>
                  <label for="generos" class="block mb-1 font-medium">Géneros favoritos</label>
                  <select id="generos" multiple class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-turquesa">
                    <option value="ficcion" selected>Ficción</option>
                    <option value="fantasia" selected>Fantasía</option>
                    <option value="ciencia-ficcion">Ciencia ficción</option>
                    <option value="romance">Romance</option>
                    <option value="misterio" selected>Misterio</option>
                    <option value="biografia">Biografía</option>
                  </select>
                  <p class="text-sm text-gray-600 mt-1">Mantén presionada la tecla Ctrl para seleccionar múltiples opciones</p>
                </div>
              </div>
              
              <h3 class="text-xl font-bold text-turquesa mt-8 mb-4">Cambiar contraseña</h3>
              
              <form class="space-y-4">
                <div>
                  <label for="passwordActual" class="block mb-1 font-medium">Contraseña actual</label>
                  <input type="password" id="passwordActual" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-turquesa">
                </div>
                
                <div>
                  <label for="nuevaPassword" class="block mb-1 font-medium">Nueva contraseña</label>
                  <input type="password" id="nuevaPassword" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-turquesa">
                </div>
                
                <div>
                  <label for="confirmarPassword" class="block mb-1 font-medium">Confirmar nueva contraseña</label>
                  <input type="password" id="confirmarPassword" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-turquesa">
                </div>
                
                <button type="submit" class="btn-primary">Cambiar contraseña</button>
              </form>
            </div>
          </div>
        </div>
      </section>
    </div>
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
            <li><a href="index.html" class="text-gray-300 hover:text-white">Inicio</a></li>
            <li><a href="index.html#clubes" class="text-gray-300 hover:text-white">Clubes</a></li>
            <li><a href="index.html#calendario" class="text-gray-300 hover:text-white">Calendario</a></li>
            <li><a href="tienda.html" class="text-gray-300 hover:text-white">Tienda</a></li>
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

  <script>
    // Funcionalidad para las pestañas del perfil
    document.addEventListener('DOMContentLoaded', function() {
      const tabButtons = document.querySelectorAll('.tab-button');
      const tabContents = document.querySelectorAll('.tab-content');
      const userMenu = document.getElementById('userMenu');
      const dropdownMenu = document.getElementById('dropdownMenu');
      const logoutBtn = document.getElementById('logoutBtn');
      
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
          // Redirigir a la página de inicio
          window.location.href = 'index.html';
        });
      }
      
      // Funcionalidad para los botones de cantidad en el carrito
      const minusButtons = document.querySelectorAll('.bg-gray-200:first-child');
      const plusButtons = document.querySelectorAll('.bg-gray-200:last-child');
      
      minusButtons.forEach(button => {
        button.addEventListener('click', () => {
          const quantitySpan = button.nextElementSibling;
          let quantity = parseInt(quantitySpan.textContent);
          if (quantity > 1) {
            quantity--;
            quantitySpan.textContent = quantity;
          }
        });
      });
      
      plusButtons.forEach(button => {
        button.addEventListener('click', () => {
          const quantitySpan = button.previousElementSibling;
          let quantity = parseInt(quantitySpan.textContent);
          quantity++;
          quantitySpan.textContent = quantity;
        });
      });
    });
  </script>
</body>
</html>
