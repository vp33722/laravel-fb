<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use App\Http\Requests\Validate_data;


class mycontroller extends Controller
{
  public function index()
  {
	return view('reg');
  }

  public function check_data(Validate_data $request)
  {
	return $data=$request->get('hobby');
  }
}
