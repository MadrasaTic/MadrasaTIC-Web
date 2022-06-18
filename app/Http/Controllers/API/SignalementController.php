<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Http\Controllers\Controller;

use App\Models\Signalement;
use App\Models\SignalementVersionControl;

use App\Models\State;
use App\Models\Category;

class SignalementController extends Controller
{
    /**
     * @OA\Get(
     *      path="/signalement",
     *      operationId="signalementIndex",
     *      tags={"Signalement"},
     *      summary="Get list of signalements",
     *      description="Returns list of signalements",
     *      security={{"bearer_token":{}}},
     *      @OA\Response(response=200, description="Successful operation",),
     *      @OA\Response(response=401, description="Unauthenticated",),
     *      @OA\Response(response=403, description="Forbidden",),
     *     )
     */
    public function index(Request $request) {
        $user_id = $request->user()->id;
        $signalements = Signalement::with(['annexe', 'bloc', 'room', 'creator', 'lastSignalementVC'])->get();
        foreach ($signalements as $key => $value) {
            $value->isSaved = ($value->isSaved()->where('users.id', $user_id)->first()) ? true : false;

            if ($value->isReacted()->where('users.id', $user_id)->first()) {
                $value->isReacted = $value->isReacted()->where('users.id', $user_id)->first()->pivot->reaction_type;
            } else {
                $value->isReacted = null;
            }
        }
        return $signalements;
    }

    /**
     * @OA\Post(
     *      path="/signalement",
     *      operationId="signalementStore",
     *      tags={"Signalement"},
     *      summary="Create new signalement",
     *      description="Create new signalement",
     *      security={{"bearer_token":{}}},
     *      @OA\RequestBody(
     *          request="Request",
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  @OA\Property(property="title", type="string"),
     *                  @OA\Property(property="description", type="string"),
     *                  @OA\Property(property="annexe_id", type="string"),
     *                  @OA\Property(property="bloc_id", type="string"),
     *                  @OA\Property(property="room_id", type="string"),
     *                  @OA\Property(property="infrastructure_type", type="string", enum={"annexe", "bloc", "room"}),
     *                  @OA\Property(property="published", type="int"),
     *                  @OA\Property(property="category_id", type="string"),
     *                  @OA\Property(property="attachement", type="file", description="file to upload"),
     *                  required={"title", "description", "annexe_id", "infrastructure_type", "published", "category_id", "attachement"}
     *              ),
     *          ),
     *      ),
     *      @OA\Response(response=200, description="Successful operation",),
     *      @OA\Response(response=401, description="Unauthenticated",),
     *      @OA\Response(response=403, description="Forbidden",),
     *)
     */
    public function store(Request $request) {
        $signalement = new Signalement();
        $signalement->title = $request->get('title');
        $signalement->description = $request->get('description');

        $signalement->annexe_id = $request->get('annexe_id');
        $signalement->bloc_id = $request->get('bloc_id');
        $signalement->room_id = $request->get('room_id');
        $signalement->infrastructure_type = $request->get('infrastructure_type');

        $signalement->creator_id = $request->user()->id;

        $signalement->published = $request->get('published');
        $signalement->save();

        $signalementVersionControl = new SignalementVersionControl();
        $signalementVersionControl->signalement_id = $signalement->id;
        $signalementVersionControl->state_id = State::first()->id;
        $signalementVersionControl->category_id = $request->get('category_id');

        if ($request->hasFile('attachement')) {
            $path = $request->file('attachement')->store('images/signalements', 'public');
            $signalementVersionControl->attachement = $path;
        } else {
            $signalementVersionControl->attachement = "";
        }
        $signalementVersionControl->service_id = Category::find($request->get('category_id'))->services->id;
        $signalementVersionControl->priority_id = Category::find($request->get('category_id'))->priority->id;
        $signalementVersionControl->updated_by = $request->user()->id;
        $signalementVersionControl->save();

        $user_id = $request->user()->id;

        $signalement->isSaved = ($signalement->isSaved()->where('users.id', $user_id)->first()) ? true : false;
        if ($signalement->isReacted()->where('users.id', $user_id)->first()) {
            $signalement->isReacted = $signalement->isReacted()->where('users.id', $user_id)->first()->pivot->reaction_type;
        } else {
            $signalement->isReacted = null;
        }
        return $signalement;
    }

    /**
     * @OA\Get(
     *      path="/signalement/{id}",
     *      operationId="signalementShow",
     *      tags={"Signalement"},
     *      summary="Show existing signalement",
     *      description="Show existing signalement",
     *      security={{"bearer_token":{}}},
     *      @OA\Parameter(
     *         description="ID of Signalement",
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
    public function show(Request $request, $id)
    {
        $user_id = $request->user()->id;

        $signalement = Signalement::findOrFail($id);

        $signalement->isSaved = ($signalement->isSaved()->where('users.id', $user_id)->first()) ? true : false;
        if ($signalement->isReacted()->where('users.id', $user_id)->first()) {
            $signalement->isReacted = $signalement->isReacted()->where('users.id', $user_id)->first()->pivot->reaction_type;
        } else {
            $signalement->isReacted = null;
        }
        return $signalement;
    }

    /**
     * @OA\Post(
     *      path="/signalement/{id}",
     *      operationId="signalementUpdate",
     *      tags={"Signalement"},
     *      summary="Update existing signalement",
     *      description="Update existing signalement",
     *      security={{"bearer_token":{}}},
     *      @OA\RequestBody(
     *          request="Request",
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  @OA\Property(property="published", type="string"),
     *                  @OA\Property(property="category_id", type="string"),
     *                  @OA\Property(property="attachement", type="file", description="file to upload"),
     *              ),
     *          ),
     *      ),
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
     *      @OA\Response(response=404, description="Not found",),
     *)
     */
    public function update(Request $request, $id) {
        $signalement = Signalement::find($id);
        if ($signalement == null) {
            abort(404);
        }
        $signalement->load(['lastSignalementVC']);
        $signalementVersionControl = $signalement->lastSignalementVC;
        $newVC = $signalementVersionControl->replicate();
        if ($request->has('published') && $request->get('published') != null) {
            $signalement->published = $request->get('published');
            $signalement->save();
        }

        if ($request->has('category_id') && $request->get('category_id') != null
            && $newVC->category_id != $request->get('category_id')) {
            $newVC->category_id = $request->get('category_id');
            $newVC->service_id = Category::find($request->get('category_id'))->services->id;
            $newVC->priority_id = Category::find($request->get('category_id'))->priority->id;
            $newVC->updated_by = $request->user()->id;
            $newVC->save();
        }
        if ($request->hasFile('attachement')) {
            $path = $request->file('attachement')->store('images/signalements', 'public');
            $newVC->attachement = $path;
            $newVC->updated_by = $request->user()->id;
            $newVC->save();
        }
        $signalement = Signalement::find($id)->load(['lastSignalementVC']);
        $user_id = $request->user()->id;


        $signalement->isSaved = ($signalement->isSaved()->where('users.id', $user_id)->first()) ? true : false;
        if ($signalement->isReacted()->where('users.id', $user_id)->first()) {
            $signalement->isReacted = $signalement->isReacted()->where('users.id', $user_id)->first()->pivot->reaction_type;
        } else {
            $signalement->isReacted = null;
        }
        return $signalement;
    }

    /**
     * @OA\Delete(
     *      path="/signalement/delete/{id}",
     *      operationId="signalementDelete",
     *      tags={"Signalement"},
     *      summary="Delete existing signalement",
     *      description="Delete existing signalement",
     *      security={{"bearer_token":{}}},
     *      @OA\Parameter(
     *         description="ID of Signalement",
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
    public function delete($id)
    {
        $signalement = Signalement::find($id);
        $deleted = $signalement->delete();
        return $deleted;
    }



    /**
     * @OA\Post(
     *      path="/signalement/{id}/react/{reaction}",
     *      operationId="signalementVoting",
     *      tags={"Signalement"},
     *      summary="Up/Down vote existing signalement",
     *      description="Up/Down vote existing signalement",
     *      security={{"bearer_token":{}}},
     *      @OA\Parameter(
     *         description="ID of signalement",
     *         in="path",
     *         name="id",
     *         required=true,
     *         example="1",
     *         @OA\Schema(
     *            type="integer",
     *            format="int64"
     *         )
     *      ),
     *      @OA\Parameter(
     *         description="reaction type",
     *         in="path",
     *         name="reaction",
     *         required=true,
     *         example="up",
     *         @OA\Schema(
     *            type="string",
     *            enum={"up", "down"}
     *         )
     *      ),
     *      @OA\Response(response=200, description="Successful operation",),
     *      @OA\Response(response=401, description="Unauthenticated",),
     *      @OA\Response(response=403, description="Forbidden",),
     *      @OA\Response(response=404, description="Not found",),
     *)
     */
    public function react(Request $request, $id, $reaction) {
        $reactions = ["up", "down"];
        if (!in_array($reaction, $reactions)) {
            abort(404);
        }
        $signalement = Signalement::find($id);
        if ($signalement == null) {
            abort(404);
        }
        $user_id = $request->user()->id;
        if ($signalement->reactedBy->contains($user_id)) {
            $current_reaction = $signalement->reactedBy()->where('users.id', $user_id)->first()->pivot;
            if ($current_reaction->reaction_type == $reaction) {
                if ($reaction == "up") {
                    $signalement->up_votes -= 1;
                } else {
                    $signalement->down_votes -= 1;
                }
                $signalement->save();
                $signalement->reactedBy()->detach($user_id);
                return response()->json([
                    'message' => 'reaction removed',
                    'reaction' => null,
                ]);
            } else {
                if ($reaction == "up") {
                    $signalement->up_votes += 1;
                    $signalement->down_votes -= 1;
                } else {
                    $signalement->up_votes -= 1;
                    $signalement->down_votes += 1;
                }
                $signalement->save();
                $signalement->reactedBy()->updateExistingPivot($user_id, ["reaction_type" => $reaction]);
                return response()->json([
                    'message' => 'reaction updated to '.$reaction,
                    'reaction' => $reaction,
                ]);
            }
        } else {
            if ($reaction == "up") {
                $signalement->up_votes += 1;
            } else {
                $signalement->down_votes += 1;
            }
            $signalement->save();
            $signalement->reactedBy()->attach($user_id, ['reaction_type' => $reaction]);
            return response()->json([
                'message' => 'reaction added',
                'reaction' => $reaction,
            ]);
        }
    }

    /**
     * @OA\Post(
     *      path="/signalement/{id}/save",
     *      operationId="signalementSaving",
     *      tags={"Signalement"},
     *      summary="Save existing signalement",
     *      description="Save existing signalement",
     *      security={{"bearer_token":{}}},
     *      @OA\Parameter(
     *         description="ID of signalement",
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
     *      @OA\Response(response=404, description="Not found",),
     *)
     */
    public function save(Request $request, $id) {
        $signalement = Signalement::find($id);
        if ($signalement == null) {
            abort(404);
        }
        $user_id = $request->user()->id;
        if ($signalement->savedBy->contains($user_id)) {
            $signalement->savedBy()->detach($user_id);
            return response()->json([
                'message' => 'signalement unsaved',
            ]);
        } else {
            $signalement->savedBy()->attach($user_id);
            return response()->json([
                'message' => 'signalement saved',
            ]);
        }
    }
}
