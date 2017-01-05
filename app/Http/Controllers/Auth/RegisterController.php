<?php

namespace App\Http\Controllers\Auth;

use App\Models\profile;
use App\Models\User;
use App\Models\Institution;
use App\Models\Course;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    //Função de Registo onde se mostra e efecutam as querys com os campos selecionaveis pelos utilizadores
    public function showRegistrationForm()
    {
      
          $escola  = Institution::pluck('inst_name','id');
          $curso  =  Course::pluck('Course_name','id');
          $perfil= Profile::pluck('name','id');
        
       return view('auth.register',compact('escola','curso','perfil'));

    }





    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'instituicao'  => 'required',
            'curso'  => 'required',
            'g-recaptcha-response' => 'required',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
			'inst_id' => $data['instituicao'],
			'course_id'=> $data['curso'],
            'profile_id'=>$data['perfil'],
           
			
        ]);
    }
}
