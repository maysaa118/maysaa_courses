@extends('admin.layouts.master')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2 class="mb-4">All Registrations</h2>
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Student Name</th>
                    <th>Course Name</th>
                    <th>Status</th>
                    <th>Register At</th>
                    <th>Actions</th>
                </tr>

                @forelse ($data as $record )
                <tr>
                    <th>{{ $record->id }}</th>
                    <th>{{ $record->user->name }}</th>
                    <th>{{ $record->course->name }}</th>
                    <th>{!! $record->status ? '<span class="badge badge-success">Completed</span>' : '<span class="badge badge-warning">Not Completed</span>' !!}</th>
                    <th>{{ $record->created_at->format('d - m - y') }}</th>
                    <th>
                        <form class= "d-inline" action="{{ route('registrations.destroy', $record->id)}}" method="POST">
                        @csrf
                            @method('DELETE')
                            <button onclick confirm="('Are You Sure ? ')" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></button>
                        </form>
                    </th>
                </tr>
                    
                @empty
                    
                @endforelse
            </table>

            {{ $data->links() }}
        
        </div>
    </div>
</div>

@endsection