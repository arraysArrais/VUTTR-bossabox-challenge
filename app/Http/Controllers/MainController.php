<?php

namespace App\Http\Controllers;

use App\Http\Requests\ToolValidateRequest;
use App\Models\Tool;
use Illuminate\Http\Request;
use Throwable;

class MainController extends Controller
{
 /**
     * @OA\Get(
     *     path="/api/tools/",
     *     security={{"bearerAuth": {}}},
     *     tags={"tools"},
     *     summary="return tools",
     *     operationId="getTools",
     *     @OA\Parameter(
     *         name="tag",
     *         in="query",
     *         description="filter tools by tag",
     *         required=false,
     *         @OA\Schema(
     *             type="string",
     *         ),
     *         
     *     ),
     *     
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *     ),
     *      @OA\Response(
     *         response=401,
     *         description="Unathenticated", 
     *     ),
     *      @OA\Response(
     *         response=500,
     *         description="Error while fetching data in database"
     *     ),
     * )
     * 
     * @return ToolCollection
     */
    public function getTools(Request $r)
    {

        //verifica se há query params na url para filtrar as tools
        if ($r->exists('tag')) {
            $requestTag = strtolower($r->tag);

            try {
                $tools = Tool::query()->whereJsoncontains('tags', $requestTag)->get();
                return $tools;
            } catch (Throwable $e) {
                return response()->json([
                    'error' => 'Error while fetching data in database',
                    'message' => $e->getMessage()
                ], 500);
            }
        }

        //retorna todas as tools
        try {
            $tools = Tool::all();
            return $tools;
        } catch (Throwable $e) {
            return response()->json([
                'error' => 'Error while fetching data in database',
                'message' => $e->getMessage()
            ], 500);
        }
    }


    /**
     * @OA\Post(
     *     path="/api/tools/",
     *     security={{"bearerAuth": {}}},
     *     operationId="createTool",
     *     tags={"tools"},
     *     summary="create a tool record on database",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *      type="object",
     *      @OA\Property(property="title", type="string", example="My Tool Title"),
     *      @OA\Property(property="link", example="https://mytoolwebsite.com.br"),
     *      @OA\Property(property="description", type="string", example="A cool description for my tool"),
     *      @OA\Property(property="tags", description="tool tags", type="array", example={"Tag 1","Tag 2"}, @OA\Items(type="string")),
     *   ),
     * ),
     *     @OA\Response(
     *         response=201,
     *         description="Successful operation",
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unathenticated", 
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Error while fetching data in database"
     *     ),
     *     
     * 
     * ),
     */
    public function createTool(ToolValidateRequest $r)
    {
        try {
            $tool = new Tool($r->validated());

            if ($tool->save()) {
                return response()->json([$tool], 201);
            }
        } catch (Throwable $e) {
            return response()->json([
                'error' => 'Error while creating records in the database',
                'message' => $e->getMessage()
            ], 500);
        }
    }


    /**
     * @OA\Delete(
     *     path="/api/tools/{id}",
     *     security={{"bearerAuth": {}}},
     *     tags={"tools"},
     *     summary="delete a tool record",
     *     operationId="deleteTool",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Tool id to delete",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unathenticated", 
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Tool id not found", 
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Error while fetching data in database"
     *     ),
     * )
     */
    public function deleteTool(Request $r)
    {

        try {
            $tool = Tool::find($r->id);

            if (empty($tool)) {
                return response()->json([
                    'error' => 'Tool id not found'
                ], 404);
            }

            $tool->delete();

            return response()->json([
                'success' => 'Tool id: ' . $r->id . ' deleted'
            ], 200);
        } catch (Throwable $e) {
            return response()->json([
                'error' => 'Error while deleting records in the database',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * 
     *
     * @OA\Patch(
     *     path="/api/tools/{id}",
     *     security={{"bearerAuth": {}}},
     *     tags={"tools"},
     *     summary="update a tool record",
     *     operationId="updateTool",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Tool id to update",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *         ),
     *     ),
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *      type="object",
     *      @OA\Property(property="title", type="string", example="My Tool Title"),
     *      @OA\Property(property="link", type="string", example="https://mytoolwebsite.com.br"),
     *      @OA\Property(property="description", type="string", example="A cool description for my tool"),
     *      @OA\Property(property="tags", description="tool tags", type="array", example={"Tag 1","Tag 2"}, @OA\Items(type="string")),
     *   ),
     * ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unathenticated", 
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Tool id not found", 
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Error while fetching data in database"
     *     ),
     * )
     */
    public function updateTool(Request $r)
    {

        try {
            $tool = Tool::find($r->id);

            if (empty($tool)) {
                return response()->json([
                    'error' => 'Tool id not found'
                ], 404);
            }

            if ($r->title == null) {
                $r->title = $tool->title;
            }
            if ($r->link == null) {
                $r->link = $tool->link;
            }
            if ($r->description == null) {
                $r->description = $tool->description;
            }
            if ($r->tags == null) {
                $r->tags = $tool->tags;
            }


            $tool->title = $r->title;
            $tool->link = $r->link;
            $tool->description = $r->description;
            $tool->tags = $r->tags;
            $tool->save();

            return response()->json([$tool], 200);
        } catch (Throwable $e) {
            return response()->json([
                'error' => 'Error while updating data in database',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function teste(Request $r){
        return "oie";
    }
}
