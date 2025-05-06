@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Edit Student</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('students.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('students.form')
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
