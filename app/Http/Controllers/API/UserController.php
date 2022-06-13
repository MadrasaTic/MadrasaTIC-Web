<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Http\Controllers\Controller;

use App\Models\Signalement;
use App\Models\SignalementVersionControl;

use App\Models\State;
use App\Models\Category;

use App\Models\User;

class UserController extends Controller
{
    /**
     * @OA\Get(
     *      path="/user/saved",
     *      operationId="savedSignalement",
     *      tags={"User"},
     *      summary="Saved signalement",
     *      description="Get saved signalement",
     *      security={{"bearer_token":{}}},
     *      @OA\Response(response=200, description="Successful operation",),
     *      @OA\Response(response=401, description="Unauthenticated",),
     *      @OA\Response(response=403, description="Forbidden",),
     *      @OA\Response(response=404, description="Not found",),
     *)
     */
    public function saved(Request $request) {
        $user_id = $request->user()->id;
        return $request->user()->savedSignalements()->get();
    }

    /**
     * @OA\Get(
     *      path="/user/upvoted",
     *      operationId="upVotedSignalement",
     *      tags={"User"},
     *      summary="UpVoted signalement",
     *      description="Get UpVoted signalement",
     *      security={{"bearer_token":{}}},
     *      @OA\Response(response=200, description="Successful operation",),
     *      @OA\Response(response=401, description="Unauthenticated",),
     *      @OA\Response(response=403, description="Forbidden",),
     *      @OA\Response(response=404, description="Not found",),
     *)
     */
    public function upvoted(Request $request) {
        $user_id = $request->user()->id;
        return $request->user()->reactedSignalements()->wherePivot('reaction_type', "up")->get();
    }


    /**
     * @OA\Get(
     *      path="/user/downvoted",
     *      operationId="downVotedSignalement",
     *      tags={"User"},
     *      summary="DownVoted signalement",
     *      description="Get DownVoted signalement",
     *      security={{"bearer_token":{}}},
     *      @OA\Response(response=200, description="Successful operation",),
     *      @OA\Response(response=401, description="Unauthenticated",),
     *      @OA\Response(response=403, description="Forbidden",),
     *      @OA\Response(response=404, description="Not found",),
     *)
     */
    public function downvoted(Request $request) {
        $user_id = $request->user()->id;
        return $request->user()->reactedSignalements()->wherePivot('reaction_type', "down")->get();
    }
}
