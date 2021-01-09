<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;
use Auth;

class LinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($subdomain)
    {

        $url = Link::with('links')->whereSubdomain($subdomain)->firstOrFail();
        dd($url);

        return redirect()->away('https://www.google.com');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('links.create');
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

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $link = Link::whereId($id)->firstOrFail();
        return view('links.edit')->with('link', $link);
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
        $link = Link::whereId($id)->firstOrFail();
        $link->subdomain = $request->subdomain;
        $link->mobile_no = $request->mobile_no;
        $link->custom_msg = $request->custom_message;
        $link->save();
        return redirect()->route('home');
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

    function remove_http($url) {
       $disallowed = array('http://', 'https://');
       foreach($disallowed as $d) {
          if(strpos($url, $d) === 0) {
             return str_replace($d, '', $url);
          }
       }
       return $url;
    }
}
