<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\CreditCheckBlackList;
use App\IdentityCheckBlackList;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected function redirectTo()
    {
        $licence = DB::table('users')->where('id', Auth::id())->value('licenceNum');
        $creditCheck = DB::table('CreditCheckBlackList')->where('licence', $licence)->value('licence');
        $identityCheck = DB::table('IdentityCheckBlackList')->where('licence', $licence)->value('licence');
        //$blacklistLicence = CreditCheckBlackList::find( 'licence', $userLicence);
        if($creditCheck != null || $identityCheck != null)
        {
            Auth::logout();
            //return redirect()->route('messages.index');
            return '/sorry';
        }
        return '/';

    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
