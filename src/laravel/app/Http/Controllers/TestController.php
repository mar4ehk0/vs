<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function __invoke(Request $request)
    {
        \rr\dump($request);

        return 1;
    }
}
