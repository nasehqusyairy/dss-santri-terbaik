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
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <th>#</th>
                                <th>Name</th>
                                @foreach ($criterias->sortByDesc('weight') as $criteria)
                                    <th>{{ $criteria->name }}</th>
                                @endforeach
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    @if ($student->criterias->count() === $criterias->count())
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $student->name }}</td>
                                            @foreach ($student->criterias->sortByDesc('weight') as $criteria)
                                                @php
                                                    // if ($criteria->name == 'Kepribadian') {
                                                    //     dd($criteria->pivot->score, $dividing[$criteria->name], $criteria->pivot->score / $dividing[$criteria->name]);
                                                    // }
                                                @endphp
                                                <td>{{ $criteria->pivot->score / $dividing[$criteria->name] }}
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
