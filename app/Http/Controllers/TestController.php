<?php

namespace App\Http\Controllers;

use OpenApi\Annotations as OA;

class TestController extends Controller {
    /**
     * @OA\Get(
     *      path="/test",
     *      operationId="getProjectsList",
     *      tags={"Projects"},
     *      summary="Get list of projects",
     *      description="Returns list of projects",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *     )
     */
    public function get() {
        return response("getWorks");

    }

}
