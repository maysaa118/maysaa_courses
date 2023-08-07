@extends('admin.layouts.master')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2 class="mb-4">All Courses</h2>
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success')}}
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>

                @forelse ($courses as $course )
                <tr>
                    <th>{{ $course->id }}</th>
                    <th><img width="100" src="{{asset('uploads/' . $course->image) }}" alt=""></th>
                    <th>{{ $course->name }}</th>
                    <th>{{ $course->price }}</th>
                    <th>{{ $course->category->name }}</th>
                    <th>{{ $course->created_at->format('d - m - y') }}</th>
                    <th>
                        <a class=" btn btn-sm btn-primary" href="{{ route('courses.edit', $course->id)}}"><i class="fas fa-edit"></i></a>
                        <form class="d-inline" action="{{ route('courses.destroy', $course->id)}}" method="POST">
                        @csrf
                            @method('DELETE')
                            <button onclick confirm="('Are You Sure ? ')" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></button>
                        </form>
                    </th>
                </tr>
                    
                @empty
                    
                @endforelse
            </table>

            {{ $courses->links() }}
        
        </div>
    </div>
</div>

@endsection