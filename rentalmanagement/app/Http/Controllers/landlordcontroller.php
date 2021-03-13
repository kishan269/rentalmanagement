<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Landlord;

class landlordcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $landlords = Landlord::all();
        return view('admin.landlord.index',compact('landlords'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.landlord.create');
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
                'first_name' => 'required|min:2| max:18',
                'last_name' => 'required|min:2| max:18',
                'email' => 'email|required|unique:landlords,email',
                'password' => 'confirmed|required| min:5 |max:30',
                'password_confirmation' => 'required| min:5 |max:30',
                'phone_number' => 'required|numeric|min:9',
                'address' => 'required',
                'id_type' => 'required',
                'id_number' => 'required',
            ]);

            $credentials = [
                'first_name' => trim($request->first_name),
                'middle_name' => trim($request->middle_name),
                'last_name' => trim($request->last_name),
                'email' => trim($request->email),
                'password' => bcrypt(trim($request->password)),
                'phone_number' => trim($request->phone_number),
                'address' => trim($request->address),
                'id_type' => trim($request->id_type),
                'id_number' => trim($request->id_number),
            ];

            $landlord=Landlord::create($credentials);
            $landlord->save();


            return response()->json("$landlord->first_name   $landlord->last_name", 200);

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
        $landlord = Landlord::findOrFail($id);
        return view('admin.landlord.view',compact('landlord'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $landlord = Landlord::findOrFail($id);
        return view('admin.landlord.edit',compact('landlord'));
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
        if($request->password == '') {
            $credentials = [
                'first_name' => trim($request->first_name),
                'middle_name' => trim($request->middle_name),
                'last_name' => trim($request->last_name),
                'email' => trim($request->email),
                'phone_number' => trim($request->phone_number),
                'address' => trim($request->address),
                'id_type' => trim($request->id_type),
                'id_number' => trim($request->id_number),
            ];
        }
        else
        {
            $credentials = [
                'first_name' => trim($request->first_name),
                'middle_name' => trim($request->middle_name),
                'last_name' => trim($request->last_name),
                'email' => trim($request->email),
                'password' => bcrypt(trim($request->password)),
                'phone_number' => trim($request->phone_number),
                'address' => trim($request->address),
                'id_type' => trim($request->id_type),
                'id_number' => trim($request->id_number),
            ];
        }

        $landlord =Landlord::where('id',$id)
                             ->update($credentials);
        if($landlord){
            return redirect('/landlord')->with('success','landlord Updated Successfully');
        }
        return redirect()->back()->with('errors', 'Landlord Update Failed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $landlord = Landlord::findOrFail($request->id);
        $landlord->delete();
        if($landlord){
            return redirect()->back()->with('success','landlord Deleted Successfully');
        }
        return redirect()->back()->with('errors', 'Landlord Delete Failed');
    }
}
