<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLinkRequest;
use Symfony\Component\HttpFoundation\Response;

use Cviebrock\EloquentSluggable\Services\SlugService;

use App\Link;
use Auth;
use Gate;

class LinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('link_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $links = Link::whereUserId(Auth::user()->id)->get();

        return view('admin.links.index', compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('link_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.links.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLinkRequest $request)
    {
        $link_rows = Link::whereUserId(Auth::user()->id)->count();

        $slugStr = SlugService::createSlug(Link::class, 'slug', $request->subdomain);
        $slugStrUCWords = implode('-', array_map('ucfirst', explode('-', $slugStr)));

        if($link_rows < 7 ) {

            $link = new Link;
            $link->subdomain = $slugStrUCWords;
            $link->mobile_no = preg_replace('/^\s+/', '+', $request->mobile_no);
            $link->custom_msg = $request->custom_msg;
            $link->no_of_clicks = 0;
            $link->slug = $slugStrUCWords;
            
            $strCustomUrl = "";
            $strCustomUrl = 'https://' . config('app.short_url') . '/' . $slugStrUCWords;
            $link->custom_url = $strCustomUrl;
            $link->wa_redirect_url = "https://api.whatsapp.com/send?phone=" . $request->mobile_no . "&text=" . urlencode($request->custom_msg);

            $link->user_id = Auth::user()->id;
            $link->save();

            return redirect()->route('admin.links.index');
        }

            
        return redirect()->route('admin.links.index')->with(['message' => 'Please upgrade to Pro']);
        
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
    public function edit(Link $link)
    {
        abort_if(Gate::denies('link_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.links.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Link $link)
    {
        $slugStr = SlugService::createSlug(Link::class, 'slug', $request->subdomain);
        $slugStrUCWords = implode('-', array_map('ucfirst', explode('-', $slugStr)));
        
        $link->subdomain = $slugStrUCWords;
        $link->mobile_no = preg_replace('/^\s+/', '+', $request->mobile_no);
        $link->custom_msg = $request->custom_msg;
        $link->slug = $slugStrUCWords;
        
        $strCustomUrl = "";
        $strCustomUrl = 'https://' . config('app.short_url') . '/' . $slugStrUCWords;
        $link->custom_url = $strCustomUrl;
        $link->wa_redirect_url = "https://api.whatsapp.com/send?phone=" . $request->mobile_no . "&text=" . urlencode($request->custom_msg);

        $link->user_id = Auth::user()->id;
        $link->save();

        return redirect()->route('admin.links.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $link)
    {
        abort_if(Gate::denies('link_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $link->delete();

        return back();
    }

    public function massDestroy(MassDestroyLinkRequest $request)
    {
        Link::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
