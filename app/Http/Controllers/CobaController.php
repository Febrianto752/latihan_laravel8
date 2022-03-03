<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CobaController extends Controller {
    public function index(Request $request) {
        // dump($request);
        return $request->file('images')->store('coba');
    }
}