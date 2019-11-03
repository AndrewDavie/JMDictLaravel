@extends('layouts.master')

@section('title')
    Word Search Results
@stop

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th ><h3>literal</h3></th>
            <th ><h3>On</h3></th>
            <th ><h3>Kun</h3></th>
            <th ><h3>skip</h3></th>
            <th ><h3>grade</h3></th>
            <th ><h3>classical</h3></th>
            <th ><h3>meaning</h3></th>
        </tr>
        </thead>
        <tbody>
        @foreach($characters as $char)
            <tr>
                <td>{{ $char->literal }}</td>
                <td>{{ $char->ja_on }}</td>
                <td>{{ $char->ja_kun }}</td>
                <td>{{ $char->skip }}</td>
                <td>{{ $char->grade }}</td>
                <td>{{ $char->classical }}</td>
                <td>{!!str_replace(array("\r\n","\r","\n","\\r","\\n","\\r\\n"),"<br/>",$char->meaning)!!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
