@extends('template.master')
@section('title','Categories Data')
@section('heading','Categories')

@section('content')

<a href="{{url('create-category')}}" class="btn btn-primary float-right mb-5"> New Category</a>


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
            <th>description</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @forelse($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>
                    <a href="{{url('edit-category/' .$category->id)}}" class="btn btn-success">Edit</a>
                </td>
                
                <td>
                    <a href="{{url('delete-category/' .$category->id)}}" class="btn btn-danger" onclick="confirm('Are you sure to delete !')">Delete</a>
                </td>
                
            </tr>
        @empty
            <tr>
            <td colspan="5"> No Data </td>
            </tr>
        @endforelse
    </tbody>
</table>


    
@endsection