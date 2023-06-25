@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Students List</h1>
        <table class="student-list">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                        <td>{{ $student->student_id }}</td>
                        <td>{{ $student->email }}</td>
                        <td>
                            <a href="{{ route('students.show', $student->id) }}" class="btn btn-primary">Details</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
