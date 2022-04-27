<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/indexx",
     *     @OA\Response(response="200", description="Display a listing of projects.")
     * )
     */
    public function index()
    {
      return 'Index Page Example!';
    }

    /**
     * @OA\Get(
     *     path="/api/create",
     *     @OA\Response(response="200", description="Display a listing of projects.")
     * )
     */
    public function create()
    {
      return 'Create Page Example';
    }
}
