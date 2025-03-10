<?php

namespace App\Http\Controllers;

use App\Models\Firm;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //dd(Auth::user()->hasRole('client'));
        dd(Auth::user()->getRoleNames());
        return "Hello Schedule index";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if($firm_id=request('firm_id')){
            $firm=Firm::find($firm_id); //firm ka data uthane k liye
            return view("firm.schedule",compact('firm'));
        }
        return abort('404');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        //
    }
}
