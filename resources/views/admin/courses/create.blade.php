@extends('admin.layouts.master')

@section('content')

<div class="container-fluid">

<div class="row justify-content-center">
   <div class="col-12">
    <h2 class="mb-4">Add New Course</h2>

   @include('admin.layouts.errors')
        

    <form action="{{ route('courses.store')}}" method="POST" 
    enctype="multipart/form-data">
        @csrf
   
    
        <div class="mb-3">
            <input type="text" name="name" class="form-control" 
            value="{{ old('name')}}" placeholder="Name">
        </div>

        <div class="mb-3">
            <input type="text" name="price" class="form-control"
             value="{{ old('price')}}" placeholder="Course Price">
        </div>

        <div class="mb-3">
            <textarea name="content" rows="7" class="form-control"
            placeholder="Content">{{ old('content')}}</textarea>
        </div>

        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control">            
        </div>

        <div class="mb-3">
            <select name="category_id" class="form-control">
                <option value="" selected disabled >Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id}}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-info px-5">Add</button>
        </form>
   </div>
</div>
</div>

@endsection