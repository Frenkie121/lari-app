<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="#" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>
      <!-- Uncomment below if you prefer to use text as a logo -->
      <!-- <h1 class="logo"><a href="index.html">Butterfly</a></h1> -->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Accueil</a></li>
          <li><a class="nav-link scrollto" href="#about">Contact</a></li>
          @guest
            <li><a class="nav-link scrollto" href="{{ route('register')}}">S'inscrire</a></li>
            <li><a class="nav-link scrollto" href="{{ route('login')}}">Se connecter</a></li>
          @endguest
          
          @auth
            <li class="dropdown"><a href="#"><span>{{ auth()->user()->name }}</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                    @if(auth()->user()->hasRole('Teacher'))
                        <li><a class="nav-link scrollto" href="{{ route('admin.home') }}">Administration</a></li>
                    @endif
                    @if(auth()->user()->hasRole('Student'))
                        <li><a class="nav-link scrollto" href="#classAccess">Accéder à un cours</a></li>
                    @endif
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link nav-link-lg"style="margin-right: 100px"><i class="far fa-arrow-alt-circle-right"></i>Se déconnecter</a>
                        <form action="{{ route('logout') }}" method="post" id="logout-form">
                            @csrf
                            @method('POST') 
                        </form>
                    </li>
                </ul>
            </li>
          @endauth
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->