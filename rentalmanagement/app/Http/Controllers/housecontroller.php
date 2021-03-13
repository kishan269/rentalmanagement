<?php

namespace App\Http\Controllers;

use App\Model\House;
use App\Model\Landlord;
use Illuminate\Http\Request;

class housecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $houses = House::all();
        return view('admin.house.index',compact('houses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $landlords=Landlord::all();
        return view('admin.house.create',compact('landlords'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $this->validate($request, [
                'house_name' => 'required|min:2| max:18',
                'house_based' => 'required|min:1',
                'address' => 'required| min:5 |max:18',
                'house_desc' => 'required| min:1 |max:200',
                'landlord_id' => 'required|min:1',
            ]);

            $credentials = [
                'house_name' => trim($request->house_name),
                'house_based' => trim($request->house_based),
                'address' => trim($request->address),
                'house_desc' => trim($request->house_desc),
                'landlord_id' => trim($request->landlord_id),
            ];

            $house=House::create($credentials);
            $house->save();


            return response()->json("$house->address $house->name ", 200);

        } else {
            abort(404);
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
        $house = House::findorfail($id);
        $landlords = Landlord::all();
        return view('admin.house.view',compact('house','landlords'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $house = House::findorfail($id);
        $landlords = Landlord::all();
        return view('admin.house.edit',compact('house','landlords'));
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
        $credentials = [
            'house_name' => trim($request->house_name),
            'house_based' => trim($request->house_based),
            'address' => trim($request->address),
            'house_desc' => trim($request->house_desc),
            'landlord_id' => trim($request->landlord_id),
        ];

        $house =House::where('id',$id)
            ->update($credentials);
        if($house){
            return redirect('/house')->with('success','House Updated Successfully');
        }
        return redirect()->back()->with('errors', 'House Update Failed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $house = House::findOrFail($request->id);
        $house->delete();
        if($house){
            return redirect()->back()->with('success','House Deleted Successfully');
        }
        return redirect()->back()->with('errors', 'House Delete Failed');
    }
}
