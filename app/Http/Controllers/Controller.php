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
    *     name="Signalements",
    *     description="API Endpoints of Signalements"
    * )
    */

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
