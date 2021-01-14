<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Link;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        return Link::where('user_id', $user_id)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $link = new Link;
        $link->subdomain = $request->subdomain;
        $link->mobile_no = $request->mobile_no;
        $link->custom_msg = $request->custom_message;
        $link->no_of_clicks = 0;        

        $strCustomUrl = "";
        $strCustomUrl = "https://" . $request->subdomain . '.' . config('app.short_url');
        $link->custom_url = $strCustomUrl;
        $link->wa_redirect_url = "https://api.whatsapp.com/send?phone=" . $request->mobile_no . "&text=" . urlencode($request->custom_message);

        $link->user_id = Auth::user()->id;
        $link->save();

        return response()->json($link, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Link $link)
    {
        return $link;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
