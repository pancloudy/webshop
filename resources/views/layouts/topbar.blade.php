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
      font-size: 18px;
    }
    .navbar-nav > li{
    
    }
    .nav-item{
      padding-right: 89px;
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
  
  
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <ul class="navbar-nav ml-auto">
      <a class="navbar-brand" href="{{ route('home') }}"> Hangszer Webshop</a>
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
                <button type="submit" class="btn btn-primary" style="font-size: 15px">Keresés</button>
            </form>
            </a>
          </li>
          <li class="nav-item">
            @if (Auth::user())
              @if (Auth::user()->role == '1')
                <a class="nav-link" href="{{ url('dashboard') }}" style="margin-right: 14px">Dashboard</a>
              @elseif (Auth::user()->role == '2')
                <a class="nav-link" href="{{ route('users.index') }}">Super admin</a>
              @else 
                <a class="nav-link" href="" style="margin-right: 102px"></a>
              @endif
            @endif
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('cart') }}">Kosár</a>
          </li>
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item" >
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Belépés') }}</a>
                        </li>
                    @endif
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Regisztrálás') }}</a>
                        </li>
                    @endif
                    @else
                        
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                          </a>
                          <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="{{ route('order.history') }}" style="font-size: 14px">Rendelési előzmények</a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                            </a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                          </form>
                          </ul>
                        </li>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                    <a class="dropdown-item" href="{{ route('order.history') }}">Rendelési előzmények</a>
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
<footer class="bg-light py-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <h5>Rólunk</h5>
        <p>Egy egyszerű hangszerbolt.</p>
      </div>
      <div class="col-lg-4">
        <h5>Latest Posts</h5>
        <ul class="list-unstyled">
          <li><a href="#">Post Title 1</a></li>
          <li><a href="#">Post Title 2</a></li>
          <li><a href="#">Post Title 3</a></li>
        </ul>
      </div>
      <div class="col-lg-4">
        <h5>Contact Us</h5>
        <address>
          <strong>Hangszer webshop</strong><br>
          Budapest<br>
          Fő utca 12, 2040<br>
          Telefonszám: (123)456-7890
        </address>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-lg-6">
        <p class="text-muted">&copy; 2023 Hangszer webshop. All rights reserved.</p>
      </div>
      <div class="col-lg-6 text-lg-end">
        <ul class="list-inline mb-0">
          <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
          <li class="list-inline-item"><a href="#">Terms of Use</a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>

</html>