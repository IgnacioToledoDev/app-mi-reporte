@extends('layouts.app')

@section('content')
    <h1>Products</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Create Product</a>
    <form action="{{ route('products.report') }}" method="GET" class="mt-3">
        <div class="row">
            <div class="col-md-4">
                <input type="date" name="start_date" class="form-control" required>
            </div>
            <div class="col-md-4">
                <input type="date" name="end_date" class="form-control" required>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-success">Generate Report</button>
            </div>
        </div>
    </form>
    <table class="table mt-4">
        <thead>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
