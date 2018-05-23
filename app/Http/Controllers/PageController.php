<?php

namespace App\Http\Controllers; //must namespace all your controllers

class PageController extends Controller {

	public function getIndex(){
		return view('Pages.dashboard');
	}
	
	public function getRegister(){
		
		return view('Pages.register');
	}

	public function getLogin(){
		return view('Pages.login');
	}

	public function getDasboard(){
		return view('Pages.dashboard');
	}

	public function getSearch(){
		return view('Pages.search');
	}

	public function getSorry(){
		return view('Pages.sorry');
	}
	public function getSorryCredit(){
		return view('Pages.sorryCredit');
	}
	public function getSorryIdentity(){
		return view('Pages.sorryIdentity');
	}


}