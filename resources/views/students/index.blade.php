@extends('students.layout')

@section('content')
    <h1>Student List</h1>
    <a href="{{route('students.create')}}" class='btn btn-primary mb-2'>Create Student</a>

    <table class='table'>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">School</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <th scope='row'>{{$student->id}}</th>
                <td>{{$student->FirstName}}</td>
                <td>{{$student->LastName}}</td>
                <td>{{$student->School}}</td>
                <td>
                    <a href="">View</a>
                    <a href="">Edit</a>
                </td>
            </tr>
            @endforeach
        </tobdy>
    </table>

@endsection