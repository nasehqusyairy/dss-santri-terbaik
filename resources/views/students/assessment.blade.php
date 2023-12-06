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
                    <form action="/assessments" method="POST">
                        <button class="btn btn-primary mb-3">Submit</button>
                        @csrf
                        <input type="hidden" name="student_id" value="{{ $student->id }}">
                        <table class="table table-striped table-hover">
                            <thead>
                                <th>Sub Criteria</th>
                                <th>Value</th>
                            </thead>
                            <tbody>
                                @foreach ($criterias->sortByDesc('weight') as $criteria)
                                    <input type="hidden" name="criteria_id[]" value="{{ $criteria->id }}">
                                    <tr>
                                        <td>{{ $criteria->name }}</td>
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
