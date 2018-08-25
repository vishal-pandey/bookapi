<?php

namespace App\Http\Controllers;

use App\Mail\DonationMailer;
use Validator;
use Illuminate\Support\Facades\Mail;

use App\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $donation = new Donation();
        $rules = array (
            'location' => 'required',
            'school' => 'required',
            'theclass' => 'required',
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'no_of_books' => 'required',
            'address' => 'required',
            'pickup_time' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator-> fails()){
            return $validator->errors();
        }else{
            $donation->location = $request->location;
            $donation->school = $request->school;
            $donation->theclass = $request->theclass;
            $donation->name = $request->name;
            $donation->email = $request->email;
            $donation->mobile = $request->mobile;
            $donation->no_of_books = $request->no_of_books;
            $donation->address = $request->address;
            $donation->pickup_time = $request->pickup_time;
            $donation->save();

            Mail::to("pandeyvishal64742@gmail.com")->send(new DonationMailer($donation));
            return json_encode("{
                            'status': 'success',
                            'message': 'Thank You For Your Support We Would Contact You Soon'
                        }");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function show(Donation $donation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function edit(Donation $donation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donation $donation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donation $donation)
    {
        //
    }
}
