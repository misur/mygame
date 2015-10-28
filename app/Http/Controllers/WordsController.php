<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Word;
use App\MyWord;
use Validator;
use Input;
use Redirect;
use Auth;

class WordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('words')->withWords(Word::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('addword');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $rules = array(
                'type' => 'required',
                'text' => 'required|unique:words',
                'translation' => 'required',
            );

            $validator =Validator::make(Input::all(), $rules);

            if($validator->fails()){
                return Redirect::to('words')->withInput()->withErrors($validator->messages());
            }
            $word = Word::create(array(
                'type' => Input::get('type'),
                'text' => Input::get('text'),
                'translation' => Input::get('translation')
            ));
            $myword = MyWord::create(array(
                'user_id' => (int) Auth::user()->id,
                'word_id' =>(int) $word->id
            ));
            
             return Redirect::to('words');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $falleoOne = Word::find($id);

        $falleoOne->delete();

        return Redirect::to('words');
    }
}
