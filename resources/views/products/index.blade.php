@extends('template.master')
@section('title','Products Data')
@section('heading','Products')

@section('content')

<a href="{{ url('product/create') }}" class="btn btn-primary float-right mb-5"> New Product</a>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table" id="myTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>name</th>
            <th>category</th>
            <th>Details</th>
            <th colspan="2" class="text-center">Options</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name }}</td>
                <td>
                    <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary">Detail</a>
                </td>
                <td class="text-center">
                    <a href="{{ url('product/' . $product->id . '/edit') }}" class="btn btn-success">Edit</a>
                </td>
                <td class="text-center">
                    <form action="{{ url('/product/'.$product->id) }}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">No Data</td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection