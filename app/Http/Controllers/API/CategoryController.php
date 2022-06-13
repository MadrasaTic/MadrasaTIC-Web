<?php

namespace App\Http\Controllers\API;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * @OA\Get(
     *      path="/category",
     *      operationId="categoryIndex",
     *      tags={"Category"},
     *      summary="Get list of categories",
     *      description="Returns list of categories",
     *      @OA\Response(response=200, description="Successful operation",),
     *      @OA\Response(response=401, description="Unauthenticated",),
     *      @OA\Response(response=403, description="Forbidden",),
     *)
     */
    public function index()
    {
        return Category::all();
    }
}
