<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Link;

class SubdomainsController extends Controller
{
    public function index($subdomain)
    {
        $link = Link::whereSubdomain($subdomain)->firstOrFail();

        $link->no_of_clicks++;
        $link->save();

        return redirect()->away($link->wa_redirect_url);
    }
}
