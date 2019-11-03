{{-- ASD 141019 Display single word --}}
@extends('layouts.master')

@section('title')
    Word
@stop

@section('content')
	    <div class="kanji">{{$word->keb}}</div>
        <div >{{ $word->reb }}</div>
        <div>{{$word->gloss }}</div>
        <div><a href="/word/{{ $word->ent_seq }}/edit">Edit Word</a></div>
@stop
