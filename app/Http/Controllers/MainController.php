<?php

namespace App\Http\Controllers;

use App\Http\Requests\ToolValidateRequest;
use App\Models\Tool;
use Illuminate\Http\Request;
use Throwable;

class MainController extends Controller
{
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
}
