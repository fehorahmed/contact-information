<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //    public function __construct()
    //    {
    //        $this->middleware(function ($request, $next) {
    //            $this->project = Auth::user()->role;
    //
    //            if ($this->project!=3){
    //                return redirect()->back()->with('error','You are not authorized.');
    //            }else{
    //                return $next($request);
    //            }
    //
    //        });
    //    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $datas = User::where('role', '!=', 1)->get();
        return view('admin.user.index', compact('datas'));
    }
    public function registration()
    {

        $datas = User::where(['registration_status' => 'Applied', 'role' => 1])->paginate();
        $divisions = Division::all();
        return view('admin.application.index', compact('datas', 'divisions'));
    }
    public function approvedUser()
    {

        $datas = User::where(['registration_status' => 'Approved', 'role' => 1])->paginate();
        $divisions = Division::all();
        return view('admin.application.index', compact('datas', 'divisions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions = Division::all();
        return view('admin.user.create', compact('divisions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|max:20|confirmed',
            'phone' => 'required|string|max:20',
            'role' => 'required|numeric',
            'division' => 'required|numeric',
            'district' => 'required|numeric',
            'sub_district' => 'required|numeric',
        ];



        $validate = Validator::make($request->all(), $rules);

        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }


        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->phone = $request->phone;
        $data->role = $request->role;
        $data->division_id = $request->division;
        $data->district_id = $request->district;
        $data->sub_district_id = $request->sub_district;
        $data->status = 1;

        $data->save();

        return redirect()->route('admin.user.index')->with('success', 'User Successfully added.');
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
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
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

    public function changeStatus(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'id' => 'required|numeric'
        ]);
        if ($validate->fails()) {
            return response([
                'success' => false,
                'message' => $validate->errors()->first(),
            ]);
        }
        $data = User::find($request->id);
        if ($data->status == 1) {
            $data->status = 0;
        } elseif ($data->status == 0) {
            $data->status = 1;
        }
        $data->save();
        return response([
            'success' => true,
            'message' => 'Status change successful.',
        ]);
    }

    public function userRegistration(Request $request)
    {

        $request->validate([
            "name" => 'required|string|max:255',
            "father_name" => 'required|string|max:255',
            "email" => 'required|email|unique:users,email',
            "phone" => 'required|numeric|unique:users,phone',
            "password" => 'required|string|min:8|confirmed',
            "date_of_birth" => 'required|date',
            "nid" => 'required|string|max:255',
        ]);
        // dd($request->all());
        $user = new User();
        $user->name = $request->name;
        $user->father_name = $request->father_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->date_of_birth = $request->date_of_birth;
        $user->nid = $request->nid;
        $user->registration_status = 'Applied';
        if ($user->save()) {
            return redirect()->route('login')->with('success', 'Registration Successfull. Please Login');
        } else {
            return redirect()->back()->withInput()->with('error', 'Something went wrong.');
        }
    }
}
