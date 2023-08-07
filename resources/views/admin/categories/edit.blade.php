@extends('admin.layouts.master')

@section('content')

<div class="container-fluid">

<div class="row justify-content-center">
   <div class="col-12">
    <h2 class="mb-4">Update Category</h2>

   @include('admin.layouts.errors')        

    <form action="{{ route('categories.update', $category->id)}}" method="POST">
        @csrf
        @method('PUT')
    
        <div class="mb-3">
            <input type="text" name="name" class="form-control" value="{{ $category->name }}" placeholder="Category Name">
        </div>
        <button class="btn btn-warning">Update</button>
        </form>
   </div>
</div>
</div>

@endsection