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
		$arr['doctors'] = Doctor::paginate(2);
		return view('admin.doctors.index')->with($arr);
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
    public function store(Request $request, Doctor $doctors)
    {
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
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Doctor $doctors)
    {

        $arr['doctors'] = $doctors;
        return view('admin.doctors.edit')-> with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Doctor $doctors)
    {
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
        $doctors->position = $request->position;
        $doctors->email = $request->email;
        $doctors->phone_number = $request->phone_number;
        $doctors->image = $file;
        $doctors->save();
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
