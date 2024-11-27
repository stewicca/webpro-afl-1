@extends('layouts.app')

@section('content')
    <h1>{{ isset($product) ? 'Edit Product' : 'Add Product' }}</h1>
    <form action="{{ $action }}" method="POST">
        @csrf
        @if(isset($product))
            @method('POST')
        @endif
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $product['name'] ?? '' }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description" required>{{ $product['description'] ?? '' }}</textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" class="form-control" id="price" value="{{ $product['price'] ?? '' }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
