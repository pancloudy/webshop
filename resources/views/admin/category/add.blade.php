@extends ('layouts.admin')

@section('content')
    <div class="card-header">
        <h4>Add categories</h4>
    </div>
            <form action="{{ url('insert-categories') }}" method="POST" enctype="multipart/form-data"
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                        <select class="form-select" name="category-id" aria-label="Default select example">
                            <option value>Select a Category</option>
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Name</label>
                    <input type="text" class="form-control" nmae="name"
                </div>
                <div>
                    <button type="submit">Submit</button>
                </div>
            </div>
@endsection