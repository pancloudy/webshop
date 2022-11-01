<style>
    .nav {
  background-color: rgb(141, 137, 137);
  overflow: hidden;
}

/* Style the links inside the navigation bar */
.nav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

/* Change the color of links on hover */
.nav a:hover {
  background-color: rgb(52, 97, 221);
  color: black;
}

/* Add a color to the active/current link */
.nav a.active {
  background-color: #7831ca;
  color: white;
}


</style>
<link href="{{ asset('frontend/bootstrap5.csscss') }}" rel="stylesheet">
<link href="{{ asset('frontend/custom.css') }}" rel="stylesheet">
<script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" defer></script>
<div class="nav">
    <a class="active" href="#home">Home</a>
    <a href="#news">Products</a>
    <a href="#contact">Contact</a>
    <a href="#about">About</a>
    <a href="#cart">cart</a>
    <a href="login">login</a>
  </div>