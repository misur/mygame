<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use Input;
use Redirect;
use Hash;

class UsersController extends Controller
{

    public function __construct(){
         $this->middleware('auth',array('only' => array('index','show','edit', 'update', 'destroy')));
        $this->middleware('owner',array('only' => array('edit', 'update', 'destroy')));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('users')->withUsers(User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
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
                'username' => 'required|unique:users',
                'password' => 'required|min:6',
                'password-repeat' => 'required|same:password',
                'email' => 'required|unique:users|email'

            );

            $validator =Validator::make(Input::all(), $rules);

            if($validator->fails()){
                return Redirect::to('users/create')->withInput()->withErrors($validator->messages());
            }
            User::create(array(
                'username' => Input::get('username'),
                'password' => Hash::make(Input::get('password')),
                'email' => Input::get('email'),
                'sex' => Input::get('sex'),
                'year' => Input::get('year'),
                'type' => 'user'
            ));
            return Redirect::to('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        if($user == null){
            return Redirect::to('users');
        }
        return view('profile')->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $user = User::find($id);

        if($user == null){
            return Redirect::to('users');
        }
        return view('edit')->with('id',$id);
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
        $rules = array(
                'username' => 'required|unique:users',
                'password' => 'required|min:6',
                'password-repeat' => 'required|same:password',
                'email' => 'required|unique:users|email'

            );
            $validator =Validator::make(Input::all(), $rules);

            if($validator->fails()){
                return Redirect::to('users/'.$id.'/edit')
                ->withInput()
                ->withErrors($validator->messages());
            }
            $user = User::find($id);
            if(Input::has('username')) $user->username = Input::get('username');
            if(Input::has('password')) $user->password = Input::get('password');
            if(Input::has('email')) $user->email = Input::get('email');
            if(Input::has('sex')) $user->sex = Input::get('sex');
            if(Input::has('year')) $user->year = Input::get('year');

            $user->save();
            return Redirect::to('users/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $falleoOne = User::find($id);

        $falleoOne->delete();

        return Redirect::to('users');
    }
}
