<?php

namespace HistoriaOcupacional\Http\Controllers\admin;

use Illuminate\Http\Request;
use HistoriaOcupacional\Http\Controllers\Controller;
use HistoriaOcupacional\Http\Requests;


class AdminController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}
    //
    public function index(){
    	return view("layout.layout");
    }
    public function show($id)
    {
        
    }
    
}