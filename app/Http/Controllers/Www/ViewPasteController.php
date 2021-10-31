<?php

namespace App\Http\Controllers\Www;

use App\Http\Controllers\Controller;
use App\Models\Paste;
use Illuminate\Http\Request;

class ViewPasteController extends Controller
{

    public function index(Request $request, $id)
    {
        $paste = Paste::find($id);
        if($paste) {
            print nl2br(e($paste->paste));
        }
        else print 'Paste not found..';
    }
}
