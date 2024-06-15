<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" type="image/x-icon" href="img/logo-pestaña.png" />
    <title>VaxPaw</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark bs-primary-bg-subtle">
        <div class="container px-10 ">
            <a class="navbar-brand" href="#!"></a>
            <img src="img/palabra.png" alt="" width="300" height="60">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Inicio</a></li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>                        
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                                                   
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                     {{ __('Logout') }}
                                 </a>  
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                        </div>                    
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="bg-info">
        <div class="container d-flex align-items-center ">
            <div id="imagen-inicio">
                <!-- Asegúrate de especificar clases para controlar el tamaño de la imagen si es necesario -->
                <img src="img/logo.png" alt="">
            </div>
            <div>
                <!-- Contenedor para el texto -->
                <h2 class='text-center fs-1' id="titulo"><strong>¿Quienes somos?</strong></h2>
                <div class="container m-0 p-4">
                    <p id="header1" class="text-black fs-5"><em><strong></strong>El aplicativo web que redefine el cuidado y
                            la felicidad de tus mascotas. Imagina un espacio digital donde el bienestar de tu fiel
                            compañero es nuestra prioridad. Fusionamos con maestría el arte del cuidado animal con la
                            innovación tecnológica, ofreciéndote un universo de servicios de salud y un marketplace
                            exclusivo para animales,
                            todo accesible desde la comodidad de tu hogar.</em></p>
                </div>
            </div>
        </div>
    </header>
<hr>
<section class="py-4 border-bottom" id="features">
    <div class="container px-5 my-5">
        <div class="row gx-5">
            <div class="col-lg-4">
                <div class="p-3 d-flex flex-column align-items-center">
                    <div class="feature bg-info text-white rounded-3 mb-3 d-flex justify-content-center align-items-center" style="width: 100px; height: 100px; font-size: 3rem;">
                        <i class="bi bi-clipboard2-pulse"></i>
                    </div>
                    <h2 id="titulo" class="h3 fw-bolder text-center">Centro de salud digital</h2>
                    <p class="cuadrito1 text-center">Nuestra plataforma te permite gestionar fácilmente la salud de tu mascota, incluido su historial de vacunas, garantizando un cuidado completo y accesible en todo momento.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="p-3 d-flex flex-column align-items-center">
                    <div class="feature bg-info text-white rounded-3 mb-3 d-flex justify-content-center align-items-center" style="width: 100px; height: 100px; font-size: 3rem;">
                        <i class="bi bi-info-circle"></i>
                    </div>
                    <h2 class="h3 fw-bolder text-center">Algo sobre Vaxpaw</h2>
                    <p class="cuadrito1 text-center">Una plataforma web que transforma el cuidado de tus mascotas combinando cuidado animal y tecnología, ofreciendo un marketplace exclusivo, todo desde tu hogar.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="p-3 d-flex flex-column align-items-center">
                    <div class="feature bg-info text-white rounded-3 mb-3 d-flex justify-content-center align-items-center" style="width: 100px; height: 100px; font-size: 3rem;">
                        <i class="bi bi-shop"></i>
                    </div>
                    <h2 class="h3 fw-bolder text-center">Una tienda especial</h2>
                    <p class="cuadrito1 text-center">Explora hoy nuestro marketplace y descubre por qué somos la elección número uno de los dueños de mascotas conscientes y cariñosos como tú.</p>
                </div>
            </div>
        </div>
    </div>
</section>

    <section class="py-5 border-bottom bg-light">
        <div class="container card align-items-center">
            <h2 id="tituloservicio"><strong>Servicios</strong></h2>
        </div>
        
        <p class="text-center"><em>Siempre pensando en nuestros peluditos</em></p>
        <div class="d-flex">
            <div class="container card" style="width: 18rem;">
                <img src="img/logo-pestaña.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center">Registra tu mascota</h5>
                    <p class="card-text">Utiliza nuestra aplicacion para que puedas guardar la informacion basica
                        de tu mascota.</p>
                        <div class="d-flex flex-column">
                            <a class="btn btn-primary mt-5 mx-2" href="{{url('addnewanimal')}}">Registro de animales</a>
                            <a class="btn btn-primary mt-3 mx-2" href="{{url('animallist')}}">Consulta de animales</a>
                        </div>
                </div>
            </div>
            <div class="container card" style="width: 18rem;">
                <img src="img/logo-pestaña.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center">Registro o consulta de vacunas</h5>
                    <p class="card-text">Agrega, modifica o consulta las fechas de vacunacion de tu mascota para que
                        lleves un control organzado.</p>
                        <div class="d-flex flex-column">
                            <a class="btn btn-primary mt-4 mx-2" href="{{url('addnewvaccune')}}">Registro de vacunas</a>
                            <a class="btn btn-primary mt-3 mx-2" href="{{url('vaccunelist')}}">Consulta de vacunas</a>
                        </div>
                </div>
            </div>
            <div class="container card" style="width: 18rem;">
                <img src="img/logo-pestaña.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center">Citas</h5>
                    <p class="card-text">En esta seccion podras agendar las citas de los animales y poder consultarlas para estar al dia con las atenciones.</p>              

                    <div class="d-flex flex-column mt-1">
                        <a class="btn btn-primary mt-5 mx-2" href="{{url('add')}}">Registro de citas</a>
                        <a class="btn btn-primary mt-3 mx-2" href="{{url('appointmentlist')}}">Consulta de citas</a>
                    </div>
                </div>
                        
            </div>
        </div>
        <ul>

    </section>

    <footer class="py-3 bg-dark">
        <div>
            <p class="m-0 text-center text-white">Copyright &copy; VaxPaw 2024</p>
        </div>
    </footer>

</body>

</html>