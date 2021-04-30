<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CobaController extends Controller
{
    public function print()
    {
        $conv = new \Anam\PhantomMagick\Converter();
        $conv->source('http://google.com')
            ->toPdf()
            ->save('google.pdf');
    }
}
