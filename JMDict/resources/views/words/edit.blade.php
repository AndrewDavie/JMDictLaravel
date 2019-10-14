{{-- //ASD 300919 Use same form for both create an edit views. --}}

@extends('layouts.master')

@section('title')
{{ $word->ent_seq==null ? 'Create Word' : 'Edit Word' }}
@stop

@section('content')
<form method="post" action="{{ $word->ent_seq==null ? '/word' : '/word/'.$word->ent_seq }}">
    @csrf
    @isset($word->exists)
        {{ method_field('PATCH') }}
    @endisset
    <div>
        <input type="text" name="keb" placeholder="Word using Kanji" value="{{ $word->keb }}">
    </div>
    <div>
        <input type="text" name="reb" placeholder="Word using Romaji only" value="{{ $word->reb }}">
    </div>
    <div>
        <textarea name="gloss" placeholder="Word meaning">{{ $word->gloss }}</textarea>
    </div>
    <div>
        <button type="submit">{{ $word->ent_seq==null ? 'Create' : 'Save' }} Word</button>
    </div>

</form>
@stop
