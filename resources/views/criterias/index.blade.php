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
                        <a href="/criterias/create" class="btn btn-primary">Add</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <th>#</th>
                                <th>Name</th>
                                <th>Weight</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                @foreach ($criterias as $criteria)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $criteria->name }}</td>
                                        <td>{{ $criteria->weight }}%</td>
                                        <td>
                                            <a href="/criterias/{{ $criteria->id }}/edit" class="btn btn-warning">Edit</a>
                                            <a href="/criterias/{{ $criteria->id }}/delete"
                                                class="btn btn-danger delete-button">Delete</a>
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
