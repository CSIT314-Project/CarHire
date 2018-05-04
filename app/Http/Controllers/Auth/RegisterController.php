<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $message = array(
            'licenceNum.required' => 'Please enter a valid licence number'
        );
        return Validator::make($data, [
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'licenceNum' => 'string|max:255',
            'phone' => 'string|max:10',
            'acctNum' => 'string|max:255',
            'bsb' => 'string|max:255',
            'cardNum' => 'string|max:255',
            'ccv' => 'string|max:255',
            'address' => 'string|max:255',
            'city' => 'string|max:255',
            'postCode' => 'string|max:255',
            'state' => 'string|max:255',
            'country' => 'string|max:255',
        ], $message);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'licenceNum' => $data['licenceNum'],
            'phone' => $data['phone'],
            'acctNum' => $data['acctNum'],
            'bsb' => $data['bsb'],
            'cardNum' => $data['cardNum'],
            'ccv' => $data['ccv'],
            'address' => $data['address'],
            'city' => $data['city'],
            'postCode' => $data['postCode'],
            'state' => $data['state'],
            'country' => $data['country'],
        ]);
    }
}
