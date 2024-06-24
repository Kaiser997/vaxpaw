<nav class="navbar navbar-expand-lg navbar-dark bg-dark bs-primary-bg-subtle">
    <div class="container px-10 ">
        <a class="navbar-brand" href="#!"></a>
        <img src="img/palabra.png" alt="" width="300" height="60">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" aria-current="page"
                        href="{{ url('homevaxpaw') }}">Inicio</a></li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ Auth::user()->name }}</a>
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

        </div>
        <li class="nav-item"><a class="nav-link" href="#!">Contacto</a></li>

        </ul>
    </div>
    </div>
</nav>
