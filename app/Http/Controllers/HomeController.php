<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Auth;
use Redirect;
use Input;
use Validator;
use App\User;
use Hash;
use App\Word;

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

//Mobile path request----------------------------------------------------

	

	public function postMobilelogin(){
		$username =  Input::get('username');
		$pass = Input::get('password');

		$user = User::where('username' , '=' , $username)->get()->first();
	

		if ($user == null) {
			return json_encode(array('satus' => 'user dont exists'));
		}else if (!Hash::check($pass , $user->password)){
			return json_encode(array('satus' => ' bad  pasword' ));
		}


        $arr = array($user);
        $json = json_encode($arr);
        return $json;
    }



    public function postMobilecreateuser(){
    	

    	$rules = array(
                'username' => 'required|unique:users',
                'password' => 'required|min:6',
                'password-repeat' => 'required|same:password',
                'email' => 'required|unique:users|email'

            );

            $validator =Validator::make($input, $rules);

            if($validator->fails()){
                return json_encode(array( 'status' => 'bad ' , 'message' => $validator->messages()));
            }

            $user =  User::create(array(
                'username' => Input::get('username'),
                'password' => Hash::make(Input::get('password')),
                'email' => Input::get('email'),
                'sex' => Input::get('sex'),
                'year' => Input::get('year'),
                'type' => 'user'
            ));
          

        $arr = array('status' => 'ok');
        $json = json_encode($arr);
        return $json;
    
    }


    public function postMobileedituser(){
    	 $rules = array(
                
                'password' => 'required|min:6',
                'password-repeat' => 'required|same:password',
                'email' => 'required|unique:users|email'

            );
            $validator =Validator::make(Input::all(), $rules);

            if($validator->fails()){
               return json_encode(array('status' => 'bad' ,'message' => $validator->messages()));
            }
            $user = User::find($id);
            if(Input::has('password')) $user->password = Input::get('password');
            if(Input::has('email')) $user->email = Input::get('email');
            if(Input::has('sex')) $user->sex = Input::get('sex');
            if(Input::has('year')) $user->year = Input::get('year');

            $user->save();
            return json_encode(array('status' => 'ok'));
    }

    public function  getMobileallwords(){
    	$id = Input::get('id');
    	$user = User::where('id', '=' , $id)->get()->first();
    	if($user==null){
    		return json_encode(array('messages' => 'user dont exists'));
    	}
    	$mywords  = $user->mywords;
    	return json_encode($mywords);
    }

    public function postMobilenewword(){
    	$id = Input::get('id');
    	$type = Input::get('type');
    	$text = Input::get('text');
    	$translation = Input::get('translation');
    	

    	$user = User::where('id', '=' , $id)->get()->first();

    	if($user == null){
    		return json_encode(array('status' => 'user dont exists'));
    	}

    	$rules = array(
    			'type' => 'required',
    			'text' => 'required|unique:words',
    			'translation' => 'required'

    	);
    	$validator =Validator::make(Input::all(), $rules);

        if($validator->fails()){
        	// if($validator->messages()->has('text')){
        	// 	if( $validator->messages()->first('text');

               return json_encode(array('status' => 'bad' ,'message' => $validator->messages()));
        
        }


    	$word = Word::create(array(
    		'type' => $type,
    		'text' => $text,
    		'translation' => $translation
    		));
    	$user->mywords()->attach($word->id);

    	return json_encode( array('status' => 'ok', 'message' => $user->mywords, 'add' => $word));
   
    }



   
}