<div class="mb-3">
    <label for="student_name" class="form-label">Student Name</label>
    <input type="text" class="form-control" id="student_name" name="student_name" value="{{ old('student_name', $student->student_name ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="class_teacher_id" class="form-label">Class Teacher</label>
    <select class="form-select" id="class_teacher_id" name="class_teacher_id" required>
        <option value="">Select Teacher</option>
        @foreach($teachers as $teacher)
            <option value="{{ $teacher->id }}"
                {{ (old('class_teacher_id', $student->class_teacher_id ?? '') == $teacher->id) ? 'selected' : '' }}>
                {{ $teacher->teacher_name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="class" class="form-label">Class</label>
    <input type="text" class="form-control" id="class" name="class" value="{{ old('class', $student->class ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="admission_date" class="form-label">Admission Date</label>
    <input type="date" class="form-control" id="admission_date" name="admission_date" value="{{ old('admission_date', isset($student->admission_date) ? $student->admission_date : '') }}" required>
</div>

<div class="mb-3">
    <label for="yearly_fees" class="form-label">Yearly Fees</label>
    <input type="number" step="0.01" class="form-control" id="yearly_fees" name="yearly_fees" value="{{ old('yearly_fees', $student->yearly_fees ?? '') }}" required>
</div>
