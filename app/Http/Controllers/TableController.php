<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Services\Table\TableService;

class TableController extends Controller
{
    //
    protected $tableService;
    use ApiResponseTrait;
    public function __construct(tableService $tableService)
    {
        $this->tableService = $tableService;
    }
    public function index()
    {
        return response()->json(['message' => 'Table index'], 200);
    }
    public function show($id)
    {
        return response()->json(['message' => "Showing table with ID: $id"], 200);
    }
    public function all()
    {
        $tables = $this->tableService->getAll();
        return $this->successResponse($tables, null, 200);
    }
}
