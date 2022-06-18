<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Annonce;
use Carbon\Carbon;

class AnnonceController extends Controller
{

    /**
     * @OA\Get(
     *      path="/annonce",
     *      operationId="annonceIndex",
     *      tags={"Annonce"},
     *      summary="Get list of annonces",
     *      description="Returns list of annonces",
     *      security={{"bearer_token":{}}},
     *      @OA\Response(response=200, description="Successful operation",),
     *      @OA\Response(response=401, description="Unauthenticated",),
     *      @OA\Response(response=403, description="Forbidden",),
     *     )
     */
    public function index(){
        $dt = Carbon::now();
        $annonces= Annonce::whereRaw('"'.$dt.'" between `beginDate` and `endDate`')
                        ->get();
        return $annonces;
    }

    /**
     * @OA\Get(
     *      path="/annonce/{id}",
     *      operationId="annonceShow",
     *      tags={"Annonce"},
     *      summary="Show existing annonce",
     *      description="Show existing annonce",
     *      security={{"bearer_token":{}}},
     *      @OA\Parameter(
     *         description="ID of Annonce",
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
        $annonces= Annonce::findOrFail($id);
        return $annonces;
    }

    /**
     * @OA\Post(
     *      path="/annonce",
     *      operationId="annonceStore",
     *      tags={"Annonce"},
     *      summary="Create new annonce",
     *      description="Create new annonce",
     *      security={{"bearer_token":{}}},
     *      @OA\RequestBody(
     *          request="Request",
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  @OA\Property(property="title", type="string"),
     *                  @OA\Property(property="description", type="string"),
     *                  @OA\Property(property="beginDate", type="string", format="date-time", description="format YYYY-MM-DD: 2022-06-14"),
     *                  @OA\Property(property="endDate", type="string", format="date-time", description="format YYYY-MM-DD: 2022-06-14"),
     *                  @OA\Property(property="image", type="file", description="image to upload"),
     *                  required={"title", "description", "beginDate", "endDate", "image"}
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
        $annonce= new Annonce;
        $annonce->user_id = $request->user()->id;
        $annonce->title = $request->title;
        $annonce->description = $request->description;
        $annonce->beginDate = $request->beginDate;
        $annonce->endDate = $request->endDate;
        if ($request->hasfile('image')) {
            $path = $request->file('image')->store('images/annonces', 'public');
            $annonce->image = $path;
        } else {
            $annonce->image = "";
        }
        $annonce->save();
        return $annonce;
    }
}
