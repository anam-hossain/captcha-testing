<?php

namespace App\Http\Controllers;

use Anam\Captcha\Captcha;
use Illuminate\Http\Request;

class CaptchaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('captcha');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Captcha $captcha)
    {
        $response = $captcha->check($request);

        if (! $response->isVerified()) {
            dd($response->errors());
        }
        
        dd($response->hostname());
    }
}
