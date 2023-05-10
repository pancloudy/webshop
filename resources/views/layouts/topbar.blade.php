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
    .container2{
      display: flex;
      flex-wrap: wrap;
      width: 1500px;
      justify-content: center;
      margin: auto;
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
    .navbar-brand:hover{
      color:#58b86d;
    }
    .navbar-brand:focus{
      color:#58b86d;
    }
    .navbar-nav .nav-link {
      color: #fff;
      font-size: 18px;
    }
    
    .nav-link{
      color:#fff;
      font-size: 18px;
    }
    .nav-link:hover{
      color:#58b86d;
    }
    .nav-link:focus{
      color:#58b86d;
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
    input:hover{
      color:#58b86d;
      box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }
  </style>
  
  
  <nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('home') }}"> Hangszer Webshop</a>
          
            <a class="nav-link" href="{{ url('product') }}">Termékek</a>
          
          
            <a class="nav-link" href="{{ url('category') }}">Kategóriák</a>
          
          
            <a class="nav-link">
            <form action="{{ route('search') }}">
                <input type="text" name="search" placeholder="Mit keres?">
                <button type="submit" class="btn btn-primary" style="font-size: 15px">Keresés</button>
            </form>
            </a>
          
          
            @if (Auth::user())
              @if (Auth::user()->role == '1')
                <a class="nav-link" href="{{ url('dashboard') }}" style="margin-right: 14px">Dashboard</a>
              @elseif (Auth::user()->role == '2')
                <a class="nav-link" href="{{ route('users.index') }}">Super admin</a>
              @else 
                <a class="nav-link" href="" style="margin-right: 102px"></a>
              @endif
            @endif
            <a class="nav-link" href="{{ route('cart') }}">Kosár</a>
          
                @guest
                    @if (Route::has('login'))
                        
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Belépés') }}</a>
                        
                    @endif
                    @if (Route::has('register'))
                        
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Regisztrálás') }}</a>
                        
                    @endif
                    @else
                    <li class="nav-item dropdown" style="list-style-type: none">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                          </a>
                          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-bg-startk">
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
                            
                @endguest
                  </div>
  </nav>
</head>
<body>
  @yield('content')
</body>
<footer class="bg-light py-4">
  <div class="container2">
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