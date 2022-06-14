<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


/**
    * @OA\Info(
    *      version="1.0.0",
    *      title="MadrasaTic API Documentation",
    *      description="MadrasaTic API Documentation built with L5 Swagger OpenApi",
    *      @OA\Contact(
    *          email="contact@madrasatic.tech"
    *      ),
    *      @OA\License(
    *          name="Apache 2.0",
    *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
    *      )
    * )
    *
    * @OA\Server(
    *      url=L5_SWAGGER_CONST_HOST,
    *      description="API server"
    * )

    *
    * @OA\Tag(
    *     name="Signalement",
    *     description="API Endpoints of Signalements"
    * )
    * @OA\Tag(
    *     name="Annexe",
    *     description="API Endpoints of Annexes"
    * )
    * @OA\Tag(
    *     name="Category",
    *     description="API Endpoints of Categories"
    * )
    * @OA\Tag(
    *     name="Infrastructure",
    *     description="API Endpoints of Infrastructures"
    * )
    * @OA\Tag(
    *     name="State",
    *     description="API Endpoints of States"
    * )
    * @OA\Tag(
    *     name="User",
    *     description="API Endpoints of User"
    * )
    *
    * @OAS\SecurityScheme(
    *      securityScheme="bearer_token",
    *      type="http",
    *      scheme="bearer"
    * )
    */

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
