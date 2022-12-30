<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Tools API",
 *      description="BossaBox Tools Swagger",
 *      @OA\Contact(
 *          email="arraisarrays@gmail.com"
 *      ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="https://www.apache.org/licenses/LICENSE-2.0.html"
 *     ),
 *          
 * ),
 * @OA\SecurityScheme(type="http", scheme="bearer", securityScheme="bearerAuth",),
 */
class Controller extends BaseController
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
