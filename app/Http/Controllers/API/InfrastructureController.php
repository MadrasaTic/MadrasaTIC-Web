<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Annexe;
use App\Models\Bloc;
use App\Models\Room;

class InfrastructureController extends Controller
{
    /**
     * @OA\Get(
     *      path="/infrastructure",
     *      operationId="infrastructureIndex",
     *      tags={"Infrastructure"},
     *      summary="Get the infrastructure",
     *      description="Returns all the infrastructure available",
     *      @OA\Response(response=200, description="Successful operation",),
     *      @OA\Response(response=401, description="Unauthenticated",),
     *      @OA\Response(response=403, description="Forbidden",),
     *)
     */
    public function index()
    {
        return Annexe::with('blocs.rooms')->get();
    }
}
