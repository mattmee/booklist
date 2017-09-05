<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;

class HomeController extends Controller
{
	public function index() 
	{
		$mobile = user::find(1)->mobile;
		return view('welcome', compact(mobiles));
	}
}