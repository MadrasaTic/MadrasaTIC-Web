<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckController extends Controller
{
    public function index()
    {
      return 'Index Page Example!';
    }
  
    public function create()
    {
      return 'Create Page Example';
    }
}