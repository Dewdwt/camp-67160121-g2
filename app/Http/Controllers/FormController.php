<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function result(Request $request)
    {
        $photoPath = $request->file('photo')->store('photos', 'public');

        return view('form_result', [
            'data' => $request,
            'photo' => $photoPath
        ]);
    }
}
