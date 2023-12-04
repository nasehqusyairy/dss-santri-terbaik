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
                                            <a href="/students/{{ $student->id }}/edit" class="btn btn-warning">Edit</a>
                                            <a href="/students/{{ $student->id }}/delete"
                                                class="btn btn-danger delete-button">Delete</a>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-info dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown">
                                                    Assessment
                                                </button>
                                                <ul class="dropdown-menu">
                                                    @foreach ($criterias as $criteria)
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="/students/{{ $student->id }}/assessment/{{ $criteria->id }}">{{ $criteria->name }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
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
