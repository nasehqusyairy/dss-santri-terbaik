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
                        <a href="/subcriterias/create" class="btn btn-primary">Add</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <th>#</th>
                                <th>Criteria</th>
                                <th>Sub Criteria</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                @foreach ($subcriterias as $subcriteria)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $subcriteria->criteria->name }}</td>
                                        <td>{{ $subcriteria->name }}</td>
                                        <td>
                                            <a href="/subcriterias/{{ $subcriteria->id }}/edit"
                                                class="btn btn-sm mb-3 btn-warning">Edit</a>
                                            <a href="/subcriterias/{{ $subcriteria->id }}/delete"
                                                class="btn btn-sm mb-3 btn-danger delete-button">Delete</a>
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
