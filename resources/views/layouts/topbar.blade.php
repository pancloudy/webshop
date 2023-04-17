<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Hangszer Webshop</title>
  <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" defer></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <style>
    body {
      font-family: Arial, sans-serif;
      color: #000000;
      background-color: #ffffff;
      margin: 0px;
    }
    .navbar {
      background-color: #1b2024;
    }
    head{
      margin: 0px;
    }
    .navbar-brand {
      margin-left: 10px;
      color: #fff;
      font-weight: bold;
    }
    .navbar-nav .nav-link {
      color: #fff;
      font-size: 20px;
    }
    .navbar-nav > li{
    
    }
    .nav-item{
      padding-right: 100px;
    }
    .btn-primary {
      background-color: #58b86d;
      color: #000000;
      border: none;
    }
    .btn:hover {
      background-color: #23272b;
      color: #fff;
    }
    td{
      color:#000000;
    }
  </style>

  <nav class="navbar navbar-expand-lg navbar-dark">
      <a class="navbar-brand" href="{{ route('home') }}"> Hangszer Webshop</a>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('product') }}">Termékek</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('category') }}">Kategóriák</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link">
            <form action="{{ route('search') }}">
                <input type="text" name="search">
                <button type="submit" class="btn btn-primary">Keresés</button>
            </form>
            </a>
          </li>
        
          <li class="nav-item">
            @if (Auth::user())
              @if (Auth::user()->role == '1')
                <a class="nav-link" href="{{ url('dashboard') }}">Dashboard</a>
              @endif
              @if (Auth::user()->role == '2')
                <a class="nav-link" href="{{ route('users.index') }}">Super admin</a>
              @endif
            @endif
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('cart') }}">Kosár</a>
          </li>
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item" >
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                    @else
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
                            {{ Auth::user()->name }}
                        </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                      onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                                      {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                              </ul>
                            
                @endguest
                  </ul>
  </nav>
</head>
<body>
  @yield('content')
</body>
<footer>
  <div class="card">
    <div class="card-body" style="background-color:#23272b" style="color:#ffffff:">
      <h5 class="card-title" style="color:#fff">Special title treatment</h5>
      <p class="card-text" style="color:#fff">With supporting text below as a natural lead-in to additional content.</p>
    </div>
  </div>
</footer>
</html>