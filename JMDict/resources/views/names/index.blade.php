@extends('layouts.master')

@section('title')
    Name Search Results
@stop

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th ><h3>kanji</h3></th>
            <th ><h3>kana</h3></th>
            <th ><h3>type</h3></th>
            <th ><h3>romaji</h3></th>
            <th ><h3>Translation</h3></th>
        </tr>
        </thead>
        <tbody>
        @foreach($names as $name)
            <tr>
                <td>{!! str_replace(";","<br/>",$name->keb) !!}</td>
                <td>{{$name->reb}}</td>
                <td>{!! str_replace(";","<br/>",$name->name_type) !!}</td>
                <td>{{$name->rebRomaji}}</td>
                <td>{!!str_replace(array("\r\n","\r","\n","\\r","\\n","\\r\\n"),"<br/>",$name->trans_det)!!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
