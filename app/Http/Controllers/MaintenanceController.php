<?php

namespace App\Http\Controllers;

use App\Models\CarItem;
use App\Models\MaintenanceItem;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
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
        request()->validate([
            'title' => 'required',
            'image' => 'required'
        ]);

        $maintenanceItem = new MaintenanceItem();
        $maintenanceItem->title = $request->get('title');
        $maintenanceItem->description = $request->get('description');
        $maintenanceItem->odometer = $request->get('mileage');
        $maintenanceItem->caritem_id = CarItem::find($id); // Aan Antwan vragen hoe ik de ID van de show CarItem kan opvragen
        //$maintenanceItem->caritem_id = Auth::user()->id;

        $maintenanceItem->save();
        //return redirect('cars/$id')->with('success', 'Car has been added successfully');
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
