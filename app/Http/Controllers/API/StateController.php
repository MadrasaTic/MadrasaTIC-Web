<?php

namespace App\Http\Controllers\API;

use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StateController extends Controller
{
    /**
     * @OA\Get(
     *      path="/states",
     *      operationId="stateIndex",
     *      tags={"State"},
     *      summary="Get list of states",
     *      description="Returns list of states",
     *      @OA\Response(response=200, description="Successful operation",),
     *      @OA\Response(response=401, description="Unauthenticated",),
     *      @OA\Response(response=403, description="Forbidden",),
     *)
     */
    public function index()
    {
        return State::all();
    }
}
