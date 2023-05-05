@extends ('layouts.topbar')

@section('content')
<style>
    .container{
        display: flex;
        justify-content: center;
    }
    h4{
        justify-content: center;
        display: flex;
    }
</style>
    <h4>Rendelés</h4>
    <div class="container">
    <form action="{{ route("order.save") }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row-md-6">
        <table class="table table-bordered table-striped">  
            <tr>
                <th>Vezetéknév:  <td><input type="text" name="surname" placeholder="Vezetéknév" required></td></th>
            </tr>
            <tr>
                <th>Keresztnév:  <td><input type="text" name="forename" placeholder="Keresztnév" required></td></th>
            </tr>
            <tr>
                <th>Ország:  <td><input type="text" name="country" placeholder="Magyarország" required></td></th>
            </tr>
            <tr>
                <th>Irányítószám:  <td><input type="text" name="zip" placeholder="1000" required></td></th>
            </tr>
            <tr>
                <th>Város:  <td><input type="text" name="city" placeholder="Város" required></td></th>
            </tr>
            <tr>
                <th>Utca:  <td><input type="text" name="address1" placeholder="utca" required></td></th>
            </tr>
            <tr>
                <th>Házszám:  <td><input type="text" name="address2" placeholder="1" required></td></th>
            </tr>
            <tr>
                <th>Telefonszám:  <td><input type="tel" name="phone" maxlength="15"
                     placeholder="0670123456" required></td></th>
            </tr>
            <tr>
                <th>
                <input type="hidden" name="price" value="{{ $price }}">
                <button class="btn btn-primary" type="submit">Megrendelés</button>
                </th>
            </tr> 
        </table>
    </div>
    </form>
</div>
@endsection