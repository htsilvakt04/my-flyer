<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFlyerRequest;
use Illuminate\Http\Request;
use App\Flyer;
use Auth;
class FlyerController extends Controller
{
    public function __construct()
    {
      $this->middleware("auth")->except("show");
    }
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
      return view("flyers.home");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFlyerRequest $request)
    {
        $flyer = new Flyer($request->all());

        Auth::user()->addFlyer($flyer);

        flash()->success("Success","Your flyer created successfuly");

        return redirect("{$flyer->zip}/{$flyer->street}");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($zip, $street,Request $request)
    {
        $flyer = Flyer::locatedAt($zip, $street);
        return view("flyers.show", compact("flyer"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
