@extends('template.master')
@section('title','Edit Details')
@section('heading','Edit Details')

@section('content')

<div class="row justify-content-center">
    <div class="col-4">
        @if ($product->img)
            <img src="{{ asset('/upload/products/'.$product->img) }}" alt="Detail Image" class="img-fluid">
        @else
            <p class="mt-5">  No Image ... </p>
        @endif
    </div>
    <div class="col-4">
        <table class="table">
            <tr>
                <td>Name</td>
                <td>{{ $product->name }}</td>
            </tr>
            <tr>
                <td>Category</td>
                <td>{{ $product->category->name }}</td>
            </tr>
            <tr>
                <td>Price</td>
                <td>{{ $product->price }}</td>
            </tr>
            <tr>
                <td>Qty</td>
                <td>{{ $product->qty }}</td>
            </tr>
        </table>
        <a href="{{ url('product') }}" class="btn btn-warning float-right">Back</a>
    </div>
</div>
@endsection