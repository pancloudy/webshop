@extends ('layouts.topbar')

@section('content')
    <div class="card-header">
        
    </div>
    <form action="{{ route("order.save") }}" method="post" enctype="multipart/form-data">
        @csrf

        Vezetéknév: <input type="text" name="surname" value="">
        <br>
        Keresztnév: <input type="text" name="forename" value="">
        <br>
        Ország: <input type="text" name="country" value="">
        <br>
        Irányítószám: <input type="text" name="zip" value="">
        <br>
        Város: <input type="text" name="city" value="">
        <br>
        utca: <input type="text" name="address1" value="">
        <br>
        házszám: <input type="text" name="address2" value="">
        <br>
        Telefonszám: <input type="text" name="phone" value="">
        <br>
        <input type="hidden" name="price" value="{{ $price }}">
        <button type="submit">Submit</button>
    </form>
@endsection