<?php

namespace App\Http\Controllers\Www;

use App\Http\Controllers\Controller;
use App\Models\Paste;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class ViewPasteController extends Controller
{

    public function index(Request $request, $id, $raw = false)
    {
        $paste = Paste::find($id);

        if($paste) {
            if($raw === 'raw') {
                print nl2br(e($paste->paste));
            }
            else {
                return Inertia::render('Paste', [
                    'paste' => nl2br(e($paste->paste)),
                    'canLogin' => Route::has('login'),
                    'canRegister' => Route::has('register'),
                ]);
            }
        }
        else print 'Paste not found..';
    }
}
