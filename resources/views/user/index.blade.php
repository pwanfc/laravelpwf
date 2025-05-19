@extends('layouts.app')
<!-- @section('title', 'User List') -->
@section('content')   
    @if(session('success'))
        <div class="alert alert-success">{{ session('success')}}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error')}}</div>
    @endif
    <div class="container mt-5" style="width:100%;">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="mb-0">User Management</h2>
            <!-- <a href="{{ route('user.create') }}" class="btn btn-success">Add New User</a> -->
        </div>
        
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">User List</h3>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>S.No.</th>
                            <th>User Name</th>     
                            <th>Email</th>
                            <th>Password</th>  
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                         @forelse($users as $user)
                         <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->password}}</td>
                                <td>
                                    <!-- @if($user->user_image) -->
                                        <!-- <img src="{{ asset('storage/' . $user->user_image) }}" class="img-fluid rounded w-25" alt="User Image"> -->
                                    <!-- @else -->
                                        <!-- <span class="text-muted">No image</span> -->
                                    <!-- @endif -->
                                </td>
                                <td>
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                             
                         @empty
                             <tr>
                                 <td colspan="9" class="text-center">No farmers found</td>
                             </tr>
                         @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection