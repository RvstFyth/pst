<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Paste;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class GetPasteController extends Controller
{

    public function index($id, $raw = false)
    {
        $paste = Paste::find($id);
        if($paste) {
            if($raw === 'raw') {
                print html_entity_decode($paste->paste);
            }
            else {
                return new JsonResponse([
                    'success' => false,
                    'response' => $paste->toArray(),
                    'errors' => [],
                ], Response::HTTP_OK);
            }
        }
        else {
            return new JsonResponse([
                'success' => false,
                'response' => [],
                'errors' => [],
            ], Response::HTTP_NOT_FOUND);
        }
    }
}
