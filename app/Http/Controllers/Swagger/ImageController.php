<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Post(
 *      path="/api/v1/notebook/photo",
 *      summary="Upload photo",
 *      tags={"Notebook"},
 *
 *      @OA\MediaType(
 *          mediaType="multipart/form-data",
 *          @OA\Schema(
 *              required={"photo"},
 *              @OA\Property(
 *                  property="photo",
 *                  description="Photo file to be uploaded",
 *                  type="file",
 *              ),
 *          ),
 *      ),
 *
 *      @OA\Response(
 *           response=201,
 *           description="Photo uploaded successfully",
 *           @OA\JsonContent(
 *               type="object",
 *               @OA\Property(property="id", type="integer"),
 *               @OA\Property(property="path", type="string")
 *           )
 *       ),
 *       @OA\Response(
 *           response=500,
 *           description="An error occurred while uploading the photo",
 *           @OA\JsonContent(
 *               @OA\Property(property="error", type="string")
 *           )
 *       )
 *  ),
 */

class ImageController extends Controller
{
    //
}
