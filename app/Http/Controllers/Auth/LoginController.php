<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Socialite;
use App\User;
use Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest:web')->except('logout');
    }

    public function logout(Request $request)
    {


        $this->guard()->logout();

       // $request->session()->invalidate();

        return redirect('/');
    }


    public function redirectToProvider()
    {
       // return Socialite::driver('google')->redirect();
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        //$user = Socialite::driver('google')->user();
         $user = Socialite::driver('facebook')->user();
          dd($user);
          exit;
       if($user)
       {
        $authUser = $this->findOrCreateUser($user);
        Auth::login($authUser, true);
        return redirect()->route('home');
       }
    }


    private function findOrCreateUser($googleuser)
    {
        $authUser = User::where('google_id', $googleuser->id)->first();

        if ($authUser){
            return $authUser;
        }

        return User::create([
            'name' => $googleuser->name,
            'email' => $googleuser->email,
            'google_id' => $googleuser->id,
            'password' =>bcrypt('1234')
        ]);
    }



}
