@extends ('layouts.app')

@section('content')
    <div class="card-header">
        <h4>Add products</h4>
    </div>
    <form action="{{ route("products.save") }}" enctype="multipart/form-data">


        category_id: <input type="number" name="category_id" value="">
        <br>
        Name: <input type="text" name="name" value="">
        <br>
        small description: <input type="text" name="small_description" value="">
        <br>
        description: <input type="text" name="description" value="">
        <br>
        original price: <input type="text" name="original_price" value="">
        <br>
        selling_price: <input type="text" name="selling_price" value="">
        <br>
            
            Select image to upload:
            <input type="file" name="image" value="">

        <br>
        quantity: <input type="text" name="quantity" value="">
        <br>
        status:
        <select name="status">
            <option value="null"></option>
            <option value="out_of_stock">out of stock</option>
            <option value="in_stock">in stock</option>
        </select>
        <br>
    
        <button type="submit">Submit</button>
    </form>
@endsection