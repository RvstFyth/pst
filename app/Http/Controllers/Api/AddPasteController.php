<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class AddPasteController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'success' => true,
            'id' => 1,
            'token' => 'asdasdas', // Used to manage your pastes.
            'expires' => time() + 86400, // Paste expires after this timestamp (soft delete)
            'accessToken' => '', // Acts like a password to read the file.
        ]);
    }
}
