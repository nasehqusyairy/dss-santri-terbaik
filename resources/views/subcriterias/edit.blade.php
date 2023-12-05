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
                    <form action="/subcriterias/{{ $subcriteria->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="criteria" class="form-label">Criteria</label>
                            <select class="form-select" name="criteria_id" id="criteria">
                                @foreach ($criterias->sortByDesc('weight') as $criteria)
                                    <option value="{{ $criteria->id }}"
                                        {{ $criteria->id == $subcriteria->criteria_id ? 'selected' : '' }}>
                                        {{ $criteria->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Sub Criteria</label>
                            <input type="text" value="{{ $subcriteria->name }}" class="form-control" id="name"
                                name="name">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="/subcriterias" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
