@extends('layouts.master')

@section('title')
    Word Search Results
@stop

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th ><h3>kanji</h3></th>
            <th ><h3>kana</h3></th>
            <th ><h3>type</h3></th>
            <th ><h3>romaji</h3></th>
            <th ><h3>meaning</h3></th>
        </tr>
        </thead>
        <tbody>
        @foreach($words as $word)
            <tr>
                <td>{!! str_replace(";","<br/>",$word->keb) !!}</td>
                <td>{{$word->reb}}</td>
                <td>{!! str_replace(";","<br/>",$word->re_pri) !!}</td>
                <td>{{$word->rebRomaji}}</td>
                <td>{!!str_replace(array("\r\n","\r","\n","\\r","\\n","\\r\\n"),"<br/>",$word->gloss)!!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
