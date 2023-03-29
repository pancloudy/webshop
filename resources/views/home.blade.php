
@extends('layouts.topbar')


@section('content')
<html>
<style>
.jumbotron {
      background-image: url("https://images.pexels.com/photos/65718/pexels-photo-65718.jpeg");
      background-size: cover;
      height: 600px;
      color: #fff;
      text-align: center;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }
    .jumbotron h1 {
      font-size: 60px;
      font-weight: bold;
      margin-bottom: 0;
      text-shadow:
        0.02em 0 black,
        0 0.02em black,
        -0.02em 0 black,
        0 -0.02em black;
      color:#308a44;
    }
</style>
<body>
<div class="jumbotron">
    <h1>Köszöntjük az oldalunkon!</h1>
  </div>
<div class="main">
                <a href="{{ url('dashboard') }}">
                    <p>dashboard</p>
                </a>
                
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                
</div>
</body>
</html>
@endsection
