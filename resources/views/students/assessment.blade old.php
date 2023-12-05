@extends('layouts.admin')
@section('content')
    <main>
        <div class="container">
            <h1>{{ $title }}</h1>
            <p class="text-muted">Last Score : <span class="badge text-bg-primary">{{ $score }}</span></p>
            <hr>
            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="alert alert-info mb-3">
                <h5>Description</h5>
                <table>
                    @foreach ($scale as $s)
                        <tr>
                            <td>{{ $s['name'] }}</td>
                            <td width="50" class="text-center">:</td>
                            <td>{{ $s['description'] }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="/assessments" method="POST">
                        <button class="btn btn-primary mb-3">Submit</button>
                        @csrf
                        <input type="hidden" name="student_id" value="{{ $student->id }}">
                        <input type="hidden" name="criteria_id" value="{{ $criteria->id }}">
                        <table class="table table-striped table-hover">
                            <thead>
                                <th>#</th>
                                <th>Sub Criteria</th>
                                <th>Value</th>
                            </thead>
                            <tbody>
                                @foreach ($criteria->subCriterias as $subCriteria)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $subCriteria->name }}</td>
                                        <td>
                                            <select class="form-select" name="values[]">
                                                @foreach ($scale as $s)
                                                    <option value="{{ $s['value'] }}">{{ $s['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
