<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PqrsController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function create()
    {
        return view('pqrs.create');
    }

    public function consult()
    {
        return view('pqrs.consult');
    }
}
