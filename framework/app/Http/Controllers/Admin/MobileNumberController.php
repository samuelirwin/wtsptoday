<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Http\Requests\StoreMobileNumberRequest;

use App\MobileNumber;
use App\Link;
use Gate;
use Auth;
use DB;
use Phone;

class MobileNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('mobile_number_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mobile_numbers = MobileNumber::whereUserId(Auth::user()->id)->get();

        return view('admin.mobile_numbers.index')->with('mobile_numbers', $mobile_numbers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('mobile_number_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $countries = DB::table('countries')->select('calling_code', 'name')->get();

        return view('admin.mobile_numbers.create')->with('countries', $countries);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $mobileNumber = new MobileNumber;

        $calling_code = $request->calling_code;
        $mobile_no_without_plus = $request->mobile_no;
        $full_mobile_no = $calling_code . $mobile_no_without_plus;

        if (! $phone = Phone::getPhone($full_mobile_no)) {
            return back()->with([
                'status' => 'danger',
                'message' => 'The mobile number you entered is not valid. Please enter a valid mobile number.']);
        }

        try {

            $mobileNumber->mobile_no_without_plus = $full_mobile_no;
            $mobileNumber->mobile_no_with_plus = $phone->getNumber();
            $mobileNumber->national_number = $phone->getNationalNumber();
            $mobileNumber->formatted_number = $phone->getFormattedNumber();
            $mobileNumber->country = $phone->getCountry();
            $mobileNumber->calling_code = $calling_code;

            $mobileNumber->user_id = Auth::user()->id;
            $mobileNumber->save();

            return redirect()->route('admin.mobile_numbers.index')->with([
                'status' => 'success',
                'message' => 'New mobile number saved.'
            ]);
        
        } catch(\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062') {
                return redirect()->route('admin.mobile_numbers.index')->with([
                    'status' => 'danger',
                    'message' => 'You already have this number saved. Please add a different number.']);
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
    public function edit(MobileNumber $mobileNumber)
    {
        abort_if(Gate::denies('mobile_number_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $countries = DB::table('countries')->select('calling_code', 'name')->get();

        $mobile_numbers = DB::table('mobile_numbers')
            ->whereUserId(Auth::user()->id)
            ->get();

        return view('admin.mobile_numbers.edit', compact('mobileNumber','mobile_numbers', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MobileNumber $mobileNumber)
    {
        $calling_code = $request->calling_code;
        $mobile_no_without_plus = $request->mobile_no_without_plus;
        $full_mobile_no = $calling_code . $mobile_no_without_plus;

        if (! $phone = Phone::getPhone($full_mobile_no)) {
            return back()->with([
                'status' => 'danger',
                'message' => 'The mobile number you entered is not valid. Please enter a valid mobile number.']);
        }

        $mobileNumber->mobile_no_without_plus = $full_mobile_no;
        $mobileNumber->mobile_no_with_plus = $phone->getNumber();
        $mobileNumber->national_number = $phone->getNationalNumber();
        $mobileNumber->formatted_number = $phone->getFormattedNumber();
        $mobileNumber->country = $phone->getCountry();
        $mobileNumber->calling_code = $calling_code;
        $mobileNumber->user_id = Auth::user()->id;

        // $mobileNumber->links->sync($mobileNumber->mobile_no_without_plus)->save();

        return redirect()->route('admin.mobile_numbers.index')->with([
            'status' => 'success',
            'message' => 'Mobile number updated and mobile number attached to link is updated.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MobileNumber $mobile_number)
    {
        abort_if(Gate::denies('mobile_number_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mobile_number->delete();

        return back();
    }
}
