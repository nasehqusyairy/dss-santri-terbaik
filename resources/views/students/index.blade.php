@extends('layouts.admin')
@section('content')
    <main>
        <div class="container">
            <h1>{{ $title }}</h1>
            <hr>
            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <a href="/students/create" class="btn btn-primary">Add</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <th>#</th>
                                <th>Name</th>
                                <th>Group</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->group->name }}</td>
                                        <td>
                                            <a href="/students/{{ $student->id }}/edit"
                                                class="btn btn-sm mb-3 btn-warning">Edit</a>
                                            <a href="/students/{{ $student->id }}/delete"
                                                class="btn btn-sm mb-3 btn-danger delete-button">Delete</a>
                                            @if ($student->assessments->count() === 0)
                                                <a disabled href="/students/{{ $student->id }}/assessment/"
                                                    class="btn btn-sm btn-info mb-3">Assessment</a>
                                            @else
                                                <button disabled="disabled"
                                                    class="btn btn-sm btn-primary mb-3">Assessment</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
