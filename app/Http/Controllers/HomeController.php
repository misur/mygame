<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Auth;
use Redirect;
use Input;
use Validator;


class HomeController extends Controller  {


    public function __construct(){
          $this->middleware('auth',array('only' => array('getLogout')));
      
    }

	public function getIndex(){
		return view('welcome');
	}

	public function getLogin(){

		// $creds = ['username' => 'misur' , 'password' => '123456'];
		// // $val = Auth::validate($creds) ;
		// // if($val) return 'Match!';
		// // return  'No match...' ;
		// Auth::attempt($creds);
		// return Redirect::to('/');
		return view('login');
		
	}

	public function postLogin(){

		$rules = array(
                'username' => 'required',
                'password' => 'required|min:6',
               

            );

            $validator =Validator::make(Input::all(), $rules);

            if($validator->fails()){
                return Redirect::to('login')->withInput()->withErrors($validator->messages());
            }else{
		$creds = ['username' => Input::get('username') ,
				  'password' => Input::get('password') ];

		if(Auth::attempt($creds)){
			return Redirect::intended('/');
		}else{
			return Redirect::to('login')->withInput()->withErrors('Bad username or password');
		}}
	}

	public function getLogout(){
		Auth::logout();
		return Redirect::to('/');
	}
}