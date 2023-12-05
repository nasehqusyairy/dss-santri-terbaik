@extends('layouts.admin')
@section('content')
    <main>
        <div class="container">
            <h1>Choose Method</h1>
            <hr>
            <div class="row">
                <div class="col-12 col-md">
                    <div class="card">
                        <div class="card-body">
                            <h3>SAW</h3>
                            <a href="/saw">view</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md">
                    <div class="card">
                        <div class="card-body">
                            <h3>TOPSIS</h3>
                            <a href="/topsis">view</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
