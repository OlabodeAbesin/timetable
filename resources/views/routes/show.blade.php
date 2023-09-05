<!-- resources/views/routes/show.blade.php -->

@extends('layouts.app') <!-- I have not added a layout file -->

@section('content')
<div class="container">
    <h1>Route Details: {{ $route->description }}</h1>

    <!-- Interactive Map -->
    <div id="map" style="height: 400px;"></div>

    <!-- Optional Table of Stops and Times -->
    @if ($route->stops)
    <h2>Bus Stops and Times</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Stop Name</th>
                <th>Arrival Time</th>
                <!-- Add more columns as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach ($route->stops as $stop)
            <tr>
                <td>{{ $stop->stop_name }}</td>
                <td>{{ $stop->arrival_time }}</td>
                <!-- Display other stop properties as needed -->
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>

<!-- Include JavaScript for initializing the map -->
<script src="{{ asset('js/map.js') }}"></script>
@endsection
