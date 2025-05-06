@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Students List</h5>
        <a href="{{ route('students.create') }}" class="btn btn-primary">Add Student</a>
    </div>
    <div class="card-body">
        <form action="{{ route('students.index') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search by name or class..." value="{{ $search }}">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-striped table-hover" id="students-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Student Name</th>
                        <th>Class</th>
                        <th>Class Teacher</th>
                        <th>Admission Date</th>
                        <th>Yearly Fees</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->student_name }}</td>
                        <td>{{ $student->class }}</td>
                        <td>{{ $student->teacher->teacher_name }}</td>
                        <td>{{ $student->admission_date }}</td>
                        <td>{{ number_format($student->yearly_fees, 2) }}</td>
                        <td>
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $students->links() }}
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#students-table').DataTable({
            paging: false,
            searching: false,
            info: false
        });
    });
</script>
@endpush
