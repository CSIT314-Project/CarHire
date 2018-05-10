<?php

namespace App\Http\Controllers; //must namespace all your controllers

class PageController extends Controller {

	public function getIndex(){
		return view('Pages.dashboard');
	}
	
	public function getDasboard(){
		return view('Pages.dashboard');
	}

	public function getSearch(){
		return view('Pages.search');
	}

	public function getSettings(){
		return view('Pages.settings');

	}

	public function getGarage(){
		return view('Pages.garage');
	}

}