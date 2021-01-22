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
use Phone;
use DB;

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

        $mobile_numbers = DB::table('mobile_numbers')
            ->select('mobile_no_without_plus')
            ->whereUserId(Auth::user()->id)
            ->get();

        return view('admin.links.create')->with('mobile_numbers', $mobile_numbers);
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

        try {

            if( $link_rows > 6 ) {
                return redirect()->route('admin.links.index')->with([
                    'status' => 'danger',
                    'message' => 'Please upgrade to Pro'
                ]);
            } 

            $calling_code = $request->calling_code;
            $mobile_no = $request->mobile_no_without_plus;
            $full_mobile_no = $calling_code . $mobile_no;

            if (! $phone = Phone::getPhone($full_mobile_no)) {
                return back()->with([
                    'status' => 'danger',
                    'message' => 'The mobile number you entered is not valid. Please enter a valid mobile number.']);
            }

            $link = new Link;
            $link->subdomain = $slugStrUCWords;
            $link->mobile_no_without_plus = $full_mobile_no;
            $link->custom_msg = $request->custom_msg;
            $link->no_of_clicks = 0;
            $link->slug = $slugStrUCWords;
            $link->custom_url = 'https://' . config('app.short_url') . '/' . $slugStrUCWords;
            $link->wa_redirect_url = "https://api.whatsapp.com/send?phone=" . $link->mobile_no_without_plus . "&text=" . urlencode($request->custom_msg);
            $link->user_id = Auth::user()->id;
            $link->save();

            return redirect()->route('admin.links.index')->with([
                'status' => 'success',
                'message' => 'Congratulations. You have created your custom WhatsApp link.']);
             
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062') {
                return redirect()->route('admin.links.index')->with([
                    'status' => 'danger',
                    'message' => 'You have an existing custom name. Please create another.']);
            }
        }
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
        
        $mobile_numbers = DB::table('mobile_numbers')
            ->select('mobile_no_without_plus')
            ->whereUserId(Auth::user()->id)
            ->get();

        return view('admin.links.edit', compact('link', 'mobile_numbers'));
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

        $calling_code = $request->calling_code;
        $mobile_no = $request->mobile_no_without_plus;
        $full_mobile_no = $calling_code . $mobile_no;

        if (! $phone = Phone::getPhone($full_mobile_no)) {
            return back()->with([
                'status' => 'danger',
                'message' => 'The mobile number you entered is not valid. Please enter a valid mobile number.']);
        }

        $link->mobile_no_without_plus = $full_mobile_no;
        $link->custom_msg = $request->custom_msg;
        $link->slug = $slugStrUCWords;
        $link->custom_url = 'https://' . config('app.short_url') . '/' . $slugStrUCWords;
        $link->wa_redirect_url = "https://api.whatsapp.com/send?phone=" . $link->mobile_no_without_plus . "&text=" . urlencode($request->custom_msg);
        $link->user_id = Auth::user()->id;
        $link->save();

        return redirect()->route('admin.links.index')->with([
            'status' => 'success',
            'message' => 'Link have been updated.'
        ]);
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
