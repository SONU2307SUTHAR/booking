<?php

namespace App\Http\Controllers;

use App\Models\Firm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FirmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return "yeeeeeeeeee";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("firm.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $info=[
            'firm_name'=>$request->firm_name,
            'firm_mobile'=>$request->firm_mobile,
            'pincode'=>$request->pincode,
            'since'=>$request->since,
            'street'=>$request->street,
            'landmark'=>$request->landmark,
            'address'=>$request->address,
            'city'=>$request->city,
            'state'=>$request->state,
            'country'=>$request->country,
            'pan_no'=>$request->pan_no,
            // 'map'=>$request->map,
            'register_no'=>$request->register_no,
            'gst_no'=>$request->gst_no,
            // 'prpfilepic'=>$request->profilepic,
            'user_id'=>Auth::user()->id
        ];
        Firm::create($info);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Firm $firm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Firm $firm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Firm $firm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Firm $firm)
    {
        //
    }
}
