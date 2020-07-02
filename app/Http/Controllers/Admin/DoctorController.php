<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Doctor;

class DoctorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
		$doctors = Doctor::paginate(2);
		return view('admin.doctors.index', ['doctors' => $doctors]);
	}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $doctors = new Doctor();
        if(isset($request->image) && $request->image->getClientOriginalName()){
            $ext = $request->image->getClientOriginalExtension();
            $file = rand(1,999)."."."$ext";
            $request->image->storeAs('public/images', $file);
        }else{
            if(!$doctors->image){
                $file = '';
            }else{
                $file = $doctors->image;
            }
        }

        $doctors->full_name = $request->full_name;
        $doctors->position= $request->position;
        $doctors->email= $request->email;
        $doctors->phone_number = $request->phone_number;
        $doctors->image = $file;
        $doctors->save();
		return redirect()->route('admin.doctors.index');
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
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctors = Doctor::find($id);
        return response()->view('admin.doctors.edit', ['doctors'=> $doctors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request,$id)
    {
        $doctors = new Doctor();
        if(isset($request->image) && $request->image->getClientOriginalName()){
            $ext = $request->image->getClientOriginalExtension();
            $file = rand(1,999)."."."$ext";
            $request->image->storeAs('public/images', $file);
        }else{
            if(!$doctors->image){
                $file = '';
            }else{
                $file = $doctors->image;
            }
        }
        Doctor::where('id', $id)->update([

            'full_name'=> $request->full_name,
            'position'=> $request->position,
            'email'=> $request->email,
            'phone_number'=> $request->phone_number,
            'image'=> $file,
        ]);


		return redirect()->route('admin.doctors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function destroy($id)
    {
        Doctor::destroy($id);
		return redirect()->route('admin.doctors.index');
    }


}
