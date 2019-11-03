<?php

namespace App\Http\Controllers;

use App\Word;

use Illuminate\Http\Request;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //For learning purpose only - users shouldn't be creating new japanese words!
        $word = new Word();
        return view('words/edit', compact('word'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //skipping validation since this is just a testbed.

        $word = new Word();
        $word->keb=$request->keb;
        $word->reb=$request->reb;
        $word->gloss=$request->gloss;
        $word->save();
        return view('words.show',compact('word'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Word $word)
    {
        //$word = Word::findOrFail($ent_seq);
        //print_r( $word);
        return view('words.show',compact('word')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Word $word)
    {
        //
        return view('words/edit', compact('word'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ent_seq)
    {
        //
        $word = Word::findOrFail($ent_seq);
        $word->keb=$request->keb;
        $word->reb=$request->reb;
        $word->gloss=$request->gloss;
        $word->save();
        return view('words.show',compact('word'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
