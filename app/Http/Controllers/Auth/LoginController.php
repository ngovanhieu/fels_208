<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Socialite;
use App\Models\Social;
use App\Models\User;
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

    protected $user;

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Redirect the user to the provider authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from provider.
     *
     * @return Response
     */
    public function handleProviderCallback($provider, Request $request)
    {
        //Manually set state to session
        $state = $request->get('state');
        $request->session()->put('state', $state);

        //Bind data from social provider to variables
        $socialUser = Socialite::driver($provider)->user();
        $providerId = $socialUser->getId();

        //If user social  account already link to user account
        $user = Social::where('provider_id', $providerId)->first();

        if (!empty($user)) {
            Auth::login(Social::where('provider_id', $providerId)->first()->user);
            return redirect('/home');
        }

        //If user account already exists
        $userAccount = User::where('email', $socialUser->email)->first();

        if (!empty($userAccount)) {
            $userAccount->socials()->create([
                'provider_id' => $providerId,
                'provider' => $provider,
            ]);
            Auth::login($userAccount);
            return redirect('/home');
        }

        //If user account does not exist
        $user = User::create([
            'name' => $socialUser->name,
            'email' => isset($socialUser->email) ? $socialUser->email : null ,
            'avatar' => config('fels.default-avatar'),
        ]);

        $user->socials()->create([
            'provider_id' => $providerId,
            'provider' => $provider,
        ]);

        Auth::login($user);

        return redirect('/home');
    }
}
