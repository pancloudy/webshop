<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Hangszer Webshop</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <!-- Custom CSS -->
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f7f7f7;
      margin: 0px;
    }
    .navbar {
      background-color: #1b2024;
    }
    head{
      margin: 0px;
    }
    .navbar-brand {
      color: #fff;
      font-weight: bold;
    }
    .navbar-nav .nav-link {
      color: #fff;
      size: 5px;
    }
    .nav-item{
      padding-right: 100px;
    }
    
    .btn {
      background-color: #58b86d;
      color: #000000;
      border: none;
    }
    .btn:hover {
      background-color: #23272b;
      color: #fff;
    }
  </style>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark">
      <a class="navbar-brand" href="#">Hangszer Webshop</a>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Termékek</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Rólunk</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Kosár</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"><form action="{{ route('search') }}">
                <input type="text" name="search">
                <button type="submit" class="btn btn-primary">Keresés</button>
            </form>
            </a>
          </li>
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                    @else
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                            <div class="dropdown-menu dropdown-menu-dark">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                              </div>
                            
                @endguest
                  </ul>
  </nav>
</head>
<body>
  @yield('content')
</body>
</html>