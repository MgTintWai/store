@extends('template.master')
@section('title','Edit Product')
@section('heading','Edit Product')

@section('content')

<div class="row justify-content-center">
<div class="col-6">
    <form action="{{ url('product/'. $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="" class="form-label"> Name</label>
            <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
        </div>
        <div class="form-group">
            <label for="" class="form-label"> Category</label>
            <select name="categories_id" id="" class="form-control">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="" class="form-label"> Price</label>
            <input type="number" name="price" class="form-control" value="{{ $product->price }}">
        </div>
        <div class="form-group">
            <label for="" class="form-label"> Qty</label>
            <input type="number" name="qty" class="form-control" value="{{ $product->qty }}">
        </div>
        <div class="form-group">
            <label for="" class="form-label"> Image</label>
            <input type="file" name="img" class="form-control" value="{{ $product->img }}">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Update</button>
    </form>
</div>
</div>
@endsection