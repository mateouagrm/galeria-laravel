<?php

namespace App\Http\Controllers\Auth;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use App\HTTP\Requests;

use App\User;
use App\Galeria;
use DB;
use Hash;

class AuthController extends Controller
{

    public function __construct(Guard $auth)
    {
         $this->auth = $auth;
         $this->middleware('guest', ['except' => 'getLogout']);
      
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
   
//login

    protected function getLogin()
    {
        return view('auth.login');
    }

        public function postLogin(Request $request)
          {
            $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
             ]
            );
                $credentials = $request->only('email', 'password');
                   if ($this->auth->attempt($credentials, $request->has('remember')))
                         { 
                               return redirect('/');
                         }else{
                             return redirect('/')->with('msjs',"email o contraseña incorrectos");
                        } 
           
          }

          // Register
          public function register(){
           return view('auth.register');
          }

          public function postRegister(Request $request){
          //      dd($request);  //este metodo es para saber que datos estan llegando al controlador

            $user=new User;
            $user->nombre     =$request->get('nombre');
            $user->apellido   =$request->get('apellido');
            $user->email      =$request->get('email');
            $user->password   =bcrypt($request->get('password'));
             if ($request->hasFile('foto')) {
                $dir          = 'uploads/';
                $extension    = strtolower($request->file('foto')->getClientOriginalExtension()); // get image extension
                $fileName     = str_random() . '.' . $extension; // rename image
                $request->file('foto')->move($dir, $fileName);
                $user->foto   = $fileName;
            }else{
            return redirect('register')->with('msjs',"No se guardaron los datos");              
            }
            
            if ($user->save()) {
              $this->crearGaleria($user->id , $user->nombre);
              return redirect('register')->with('msjs',"Se registro correctamente");
            }
          }

          public function crearGaleria($id , $nombre){
            $nombreGaleria=$nombre.$id;
            $galeria=new Galeria;
            $galeria->nombre=$nombreGaleria;
            $galeria->id_usuario=$id;
            $galeria->save(); 
          }






//salir

protected function getLogout()
    {
          $this->auth->logout();
        return redirect('/');  
    }

}
