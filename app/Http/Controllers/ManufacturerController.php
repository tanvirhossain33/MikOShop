<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manufacturer;
use DB;

class ManufacturerController extends Controller
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
    public function createManufacturer()
    {
       return view('admin.manufacturer.createManufacturer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeManufacturer(Request $request)
    {
         $this->validate($request,[
            'manufacturerName'=>'required',
            'manufacturerDescription'=>'required',
                ]);
        DB::table('manufacturers')->insert([
            'manufacturerName' => $request->manufacturerName,
            'manufacturerDescription' => $request->manufacturerDescription,
            'publicationStatus' => $request->publicationStatus,
        ]);
        return redirect('/manufacturer/add')->with('message','Manufacturer Info Save Successfully');
    }
    
    public function manageManufacturer(){
        $manufacturers = Manufacturer::all();
        return view('admin.manufacturer.manageManufacturer',['manufacturers'=>$manufacturers]);
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
    public function editManufacturer($id)
    {
        $manufacturerById = Manufacturer::where('id',$id)->first();
        return view('admin.manufacturer.editmanufacturer',['manufacturerById'=>$manufacturerById]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateManufacturer(Request $request)
    {
        $manufacturer =  Manufacturer::find($request->manufacturerId);
        $manufacturer->manufacturerName = $request->manufacturerName;
        $manufacturer->manufacturerDescription = $request->manufacturerDescription;
        $manufacturer->publicationStatus = $request->publicationStatus;
        $manufacturer->save();
        return redirect('/manufacturer/manage')->with('message','Manufacturer Info update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteManufacturer($id)
    {
        $manufacturer = Manufacturer::find($id);
        $manufacturer->delete();
        return redirect('/manufacturer/manage')->with('message','Manufacturer Info delete Successfully');
    }
}
