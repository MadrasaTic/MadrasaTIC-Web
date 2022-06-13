<?php

namespace App\Http\Controllers\API;

use App\Models\Annexe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnnexeController extends Controller
{
    /**
     * @OA\Get(
     *      path="/annexe",
     *      operationId="annexeIndex",
     *      tags={"Annexe"},
     *      summary="Get list of annexes",
     *      description="Returns list of annexes",
     *      @OA\Response(response=200, description="Successful operation",),
     *      @OA\Response(response=401, description="Unauthenticated",),
     *      @OA\Response(response=403, description="Forbidden",),
     *)
     */
    public function index()
    {
        return Annexe::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @OA\Post(
     *      path="/annexe",
     *      operationId="annexeStore",
     *      tags={"Annexe"},
     *      summary="Create new annexe",
     *      description="Create new annexe",
     *      @OA\RequestBody(
     *          request="Request",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="name",
     *                      type="string",
     *                  ),
     *              ),
     *          ),
     *      ),
     *      @OA\Response(response=200, description="Successful operation",),
     *      @OA\Response(response=401, description="Unauthenticated",),
     *      @OA\Response(response=403, description="Forbidden",),
     *)
     */
    public function store(Request $request)
    {
        $annexe = new Annexe();
        $annexe->name = $request->get('name');
        $annexe->save();
        return $annexe;
    }

    /**
     * @OA\Get(
     *      path="/annexe/{id}",
     *      operationId="annexeShow",
     *      tags={"Annexe"},
     *      summary="Get details of annexe",
     *      description="Returns annexe object",
     *      @OA\Parameter(
     *         description="ID of annexe",
     *         in="path",
     *         name="id",
     *         required=true,
     *         example="1",
     *         @OA\Schema(
     *            type="integer",
     *            format="int64"
     *         )
     *      ),
     *      @OA\Response(response=200, description="Successful operation",),
     *      @OA\Response(response=401, description="Unauthenticated",),
     *      @OA\Response(response=403, description="Forbidden",),
     *)
     */
    public function show($id)
    {
        $annexe = Annexe::find($id);
        return $annexe;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Annexe  $annexe
     * @return \Illuminate\Http\Response
     */
    public function edit(Annexe $annexe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Annexe  $annexe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $annexe = Annexe::find($id);
        if($annexe) {
            $annexe->name = $request->get('name');
            $annexe->save();
            return $annexe;
        } else {
            return "annexe not found";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Annexe  $annexe
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $annexe = Annexe::find($id);
        if($annexe) {
            $id= $annexe -> id;
            $annexe -> delete ();
            return json_encode(["id" => $id]);
        } else {
            return "annexe not found";
        }
    }
}
