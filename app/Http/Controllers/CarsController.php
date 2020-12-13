<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\CarItem;
use App\Models\MaintenanceItem;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index(CarItem $carItems, Request $request)
    {


                //$carItems = CarItem::all();
                $carItems = CarItem::orderBy('created_at', 'desc')
                    ->where('title', 'LIKE', '%' . $request->post('term') . '%')
                    ->get();

                return view('Cars/index', [
                    'carItems' => $carItems
                ]);



//                $carItems = CarItem::where([
//                    [function ($query) use ($request) {
//                        if (($term = $request->term)) {
//                            $query->orWhere('title', 'LIKE', '%' . $term . '%')->get();
//                        }
//                    }]
//                ])
//                ->orderBy("id", "desc");
//
//                    return view('Cars.index', compact('carItems'))
//                        ->with('i', (request()->input('page', 1) -1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('Cars/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        request()->validate([
           'title' => 'required',
           'image' => 'required'
        ]);

        $carItems = new CarItem();
        $carItems->title = $request->get('title');
        $carItems->image = $request->get('image');
        $carItems->user_id = Auth::user()->id;

        $carItems->save();
        return redirect('cars')->with('success', 'Car has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show($id)
    {
        $carItems = CarItem::find($id);
        $maintenanceItems = MaintenanceItem::where("car_items_id", "=", $id)->get(); //Aan Antwan vragen hoe ik de MainItems van 1 CarItem id kan opvragen

        if (Gate::allows('view-car',$carItems)) {
           // if($user = 'isUser') {

                if ($carItems === null) {
                    abort(404, 'Car not found');
                }

                return view('Cars/show', [
                    'carItems' => $carItems,
                    'maintenanceItems' => $maintenanceItems,
                ]);
           // }
        }else{
            abort(404, 'Car not found');
        }
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
