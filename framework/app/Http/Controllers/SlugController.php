<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Link;

class SlugController extends Controller
{
    public function index($slug)
    {
        $link = Link::whereSlug($slug)->firstOrFail();

        $link->no_of_clicks++;
        $link->save();

        return redirect()->away($link->wa_redirect_url);
    }
}
