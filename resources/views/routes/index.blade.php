<!-- resources/views/routes/index.blade.php -->

@extends('layouts.app') <!-- No layout file yet/ Paused work here -->

@section('content')
<div class="container">
    <h1>List of Routes</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($routes as $route)
            <tr>
                <td>{{ $route->id }}</td>
                <td>{{ $route->description }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
