<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Get(
 *     path="/api/v1/notebook",
 *     summary="Get all notebooks",
 *     tags={"Notebook"},
 *
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(
 *                 type="object",
 *                 @OA\Property(property="id", type="integer"),
 *                 @OA\Property(property="last_name", type="string"),
 *                 @OA\Property(property="first_name", type="string"),
 *                 @OA\Property(property="middle_name", type="string"),
 *                 @OA\Property(property="company_name", type="string", nullable=true),
 *                 @OA\Property(property="phone", type="string", nullable=true),
 *                 @OA\Property(property="email", type="string"),
 *                 @OA\Property(property="birth_date", type="date", format="date", nullable=true),
 *                 @OA\Property(property="image_id", type="integer", nullable=true),
 *                 @OA\Property(property="created_at", type="string", format="date-time"),
 *                 @OA\Property(property="updated_at", type="string", format="date-time"),
 *             )
 *         ),
 *     ),
 * ),
 *
 * @OA\Post(
 *      path="/api/v1/notebook",
 *      summary="Create a notebook",
 *      tags={"Notebook"},
 *
 *     @OA\RequestBody(
 *           required=true,
 *           description="Notebook data",
 *           @OA\JsonContent(
 *               type="object",
 *               @OA\Property(property="last_name", type="string", example="Doe"),
 *               @OA\Property(property="first_name", type="string", example="John"),
 *               @OA\Property(property="middle_name", type="string", example="Smith"),
 *               @OA\Property(property="company_name", type="string", nullable=true, example="ABC Inc."),
 *               @OA\Property(property="phone", type="string", nullable=true, example="1234567890"),
 *               @OA\Property(property="email", type="string", example="john.doe@example.com"),
 *               @OA\Property(property="birth_date", type="date", format="date", nullable=true, example="1990-01-01"),
 *               @OA\Property(property="image_id", type="integer", example=null, nullable=true),
 *           ),
 *      ),
 *
 *      @OA\Response(
 *          response=200,
 *          description="Notebook created successfully",
 *          @OA\JsonContent(
 *              type="object",
 *              @OA\Property(property="id", type="integer"),
 *              @OA\Property(property="last_name", type="string"),
 *              @OA\Property(property="first_name", type="string"),
 *              @OA\Property(property="middle_name", type="string"),
 *              @OA\Property(property="company_name", type="string", nullable=true),
 *              @OA\Property(property="phone", type="string", nullable=true),
 *              @OA\Property(property="email", type="string"),
 *              @OA\Property(property="birth_date", type="date", format="date", nullable=true),
 *              @OA\Property(property="image_id", type="integer", nullable=true),
 *              @OA\Property(property="created_at", type="string", format="date-time"),
 *              @OA\Property(property="updated_at", type="string", format="date-time"),
 *          ),
 *      ),
 *
 *     @OA\Response(
 *         response=400,
 *         description="An error occurred while creating the notebook",
 *         @OA\JsonContent(
 *             @OA\Property(property="error", type="string"),
 *             @OA\Property(property="message", type="string"),
 *         ),
 *     ),
 *  ),
 *
 * @OA\Get(
 *      path="/api/v1/notebook/{id}",
 *      summary="Get a notebook by id",
 *      tags={"Notebook"},
 *
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="id of the notebook",
 *         required=true,
 *         @OA\Schema(type="integer"),
 *     ),
 *
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(
 *              type="object",
 *              @OA\Property(property="id", type="integer"),
 *              @OA\Property(property="last_name", type="string"),
 *              @OA\Property(property="first_name", type="string"),
 *              @OA\Property(property="middle_name", type="string"),
 *              @OA\Property(property="company_name", type="string", nullable=true),
 *              @OA\Property(property="phone", type="string", nullable=true),
 *              @OA\Property(property="email", type="string"),
 *              @OA\Property(property="birth_date", type="date", format="date", nullable=true),
 *              @OA\Property(property="image_id", type="integer", nullable=true),
 *              @OA\Property(property="created_at", type="string", format="date-time"),
 *              @OA\Property(property="updated_at", type="string", format="date-time"),
 *          ),
 *      ),
 *
 *     @OA\Response(
 *         response=404,
 *         description="Notebook not found",
 *         @OA\JsonContent(
 *             @OA\Property(property="error", type="string"),
 *         ),
 *     ),
 *  ),
 *
 * @OA\Post(
 *     path="/api/v1/notebook/{id}",
 *     summary="Update a notebook",
 *     tags={"Notebook"},
 *
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="id of the notebook",
 *         @OA\Schema(type="integer")
 *     ),
 *
 *     @OA\RequestBody(
 *          required=true,
 *          description="Data to update the notebook",
 *          @OA\JsonContent(
 *              type="object",
 *              @OA\Property(property="last_name", type="string", example="Doe"),
 *              @OA\Property(property="first_name", type="string", example="John"),
 *              @OA\Property(property="middle_name", type="string", example="Alex"),
 *              @OA\Property(property="company_name", type="string", nullable=true, example="CDA"),
 *              @OA\Property(property="phone", type="string", nullable=true, example="+7 962 713 9111"),
 *              @OA\Property(property="email", type="string", example="john@example.com"),
 *              @OA\Property(property="birth_date", type="date", format="date", example="1990-01-01", nullable=true),
 *         ),
 *      ),
 *
 *     @OA\Response(
 *          response=200,
 *          description="Notebook updated successfully",
 *          @OA\JsonContent(
 *              type="object",
 *              @OA\Property(property="id", type="integer"),
 *              @OA\Property(property="last_name", type="string"),
 *              @OA\Property(property="first_name", type="string"),
 *              @OA\Property(property="middle_name", type="string"),
 *              @OA\Property(property="company_name", type="string", nullable=true),
 *              @OA\Property(property="phone", type="string", nullable=true),
 *              @OA\Property(property="email", type="string", format="email"),
 *              @OA\Property(property="birth_date", type="string", format="date", nullable=true),
 *              @OA\Property(property="created_at", type="string", format="date-time"),
 *              @OA\Property(property="updated_at", type="string", format="date-time"),
 *          )
 *      ),
 *
 *      @OA\Response(
 *          response=404,
 *          description="Notebook not found",
 *          @OA\JsonContent(
 *              @OA\Property(property="error", type="string")
 *          )
 *      )
 * ),
 *
 * @OA\Delete(
 *     path="/api/v1/notebook/{id}",
 *     summary="Delete a notebook",
 *     tags={"Notebook"},
 *     description="Delete a notebook by ID",
 *
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID of the notebook to delete",
 *         @OA\Schema(type="integer")
 *     ),
 *
 *     @OA\Response(
 *         response=204,
 *         description="Notebook deleted successfully",
 *     ),
 *
 *     @OA\Response(
 *         response=404,
 *         description="Notebook not found",
 *         @OA\JsonContent(
 *             @OA\Property(property="error", type="string")
 *         )
 *     )
 * ),
 */
class NotebookController extends Controller
{
    //
}
