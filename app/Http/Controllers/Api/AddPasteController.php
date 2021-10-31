<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AddPasteRequest;
use App\Models\Paste;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class AddPasteController extends Controller
{
    public function index(AddPasteRequest $request): JsonResponse
    {
        $paste = Paste::create([
            'user_id' => 0,
            'paste' => $request->input('paste'),
            'token' => Str::random('64'),
            'password' => '',
            'expires' => date('Y-m-d H:i:s', time() + (86400 * 100)),
        ]);

        return response()->json([
            'success' => true,
            'id' => $paste->id,
            'token' => $paste->token, // Used to manage your pastes.
            'expires' => $paste->expires, // Paste expires after this timestamp (soft delete)
        ]);
    }
}
