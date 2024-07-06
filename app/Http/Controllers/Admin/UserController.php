<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Division;
use App\Models\Profession;
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
    public function registration(Request $request)
    {

        $request->validate([
            'division' => 'nullable|numeric',
            'district' => 'nullable|numeric',
            'upazila' => 'nullable|numeric',
            'union' => 'nullable|numeric',
        ]);
        $query = User::where(['registration_status' => 'Applied', 'role' => 1]);

        if ($request->division) {
            $query->where('per_division_id', $request->division);
        }
        if ($request->district) {
            $query->where('per_district_id', $request->district);
        }
        if ($request->upazila) {
            $query->where('per_sub_district_id', $request->upazila);
        }
        if ($request->union) {
            $query->where('per_union_id', $request->union);
        }


        $datas = $query->paginate();
        $divisions = Division::all();
        return view('admin.application.index', compact('datas', 'divisions'));
    }
    public function approvedUser(Request $request)
    {

        $request->validate([
            'division' => 'nullable|numeric',
            'district' => 'nullable|numeric',
            'upazila' => 'nullable|numeric',
            'union' => 'nullable|numeric',
        ]);


        $query = User::where(['registration_status' => 'Approved', 'role' => 1]);

        if ($request->division) {
            $query->where('per_division_id', $request->division);
        }
        if ($request->district) {
            $query->where('per_district_id', $request->district);
        }
        if ($request->upazila) {
            $query->where('per_sub_district_id', $request->upazila);
        }
        if ($request->union) {
            $query->where('per_union_id', $request->union);
        }

        $datas = $query->paginate();

        $divisions = Division::all();
        return view('admin.application.index', compact('datas', 'divisions'));
    }
    public function userView($id)
    {
        $user = User::findOrFail($id);

        return view('admin.application.view', compact('user'));
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
        $user->phone = $request->phone;
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
    public function userProfile()
    {

        $user = auth()->user();
        $divisions = Division::all();
        $professions = Profession::all();
        return view('front.my_profile', compact('user', 'divisions', 'professions'));
    }
    public function registrationUserStatusChange(Request $request)
    {

        $request->validate([
            'user_id' => 'required|numeric',
            'status' => 'string|max:255'
        ]);


        $user = User::findOrFail($request->user_id);
        $user->registration_status = $request->status;
        if ($user->update()) {
            return redirect()->back()->with('success', 'Status change successfully.');
        } else {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }
    public function userProfileUpdate(Request $request)
    {

        $request->validate([
            "name" => 'required|string|max:255',
            "father_name" => 'required|string|max:255',
            "email" => 'required|string|email|max:255',
            "phone" => 'required|numeric',
            "date_of_birth" => 'required|date|max:255',
            "nid" => 'required|string|max:255',
            "permanent_division" => 'required|numeric',
            "permanent_district" => 'required|numeric',
            "permanent_upazila" => 'required|numeric',
            "permanent_union" => 'required|numeric',
            "permanent_ward" => 'required|numeric',
            "permanent_address" => 'required|string|max:255',
            "profession" => 'required|string|max:255',
            "designation" => 'required|string|max:255',
            "office_phone" => 'required|numeric',
            "office_division" => 'required|numeric',
            "office_district" => 'required|numeric',
            "office_address" => 'required|string|max:255',
            "image" => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',

        ]);
        // dd($request->all());

        $user = User::find(auth()->id());
        $user->name = $request->name;
        $user->father_name = $request->father_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->date_of_birth = $request->date_of_birth;
        $user->nid = $request->nid;
        $user->per_division_id = $request->permanent_division;
        $user->per_district_id = $request->permanent_district;
        $user->per_sub_district_id = $request->permanent_upazila;
        $user->per_union_id = $request->permanent_union;
        $user->per_ward_no = $request->permanent_ward;
        $user->per_address = $request->permanent_address;

        $user->designation = $request->designation;
        $user->profession_id = $request->profession;
        $user->off_phone = $request->office_phone;
        $user->off_division_id = $request->office_division;
        $user->off_district_id = $request->office_district;
        $user->off_address = $request->office_address;

        if ($request->hasFile('image')) {
            $dest = 'profile_photo';
            $path = saveImage($dest, $request->image, 200, 200);
            $user->profile_photo_path = $path;
        }


        if ($user->update()) {
            return redirect()->back()->with('success', 'Your profile updated successfully.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Something went wrong.');
        }
    }

    public function apiAdminLogin(Request $request)
    {

        $rules = [
            'email' => 'required',
            'password' => 'required'
        ];

        $validation = Validator::make($request->all(), $rules);

        if ($validation->fails()) {
            return response([
                'status' => false,
                'message' => $validation->messages()->first(),
            ]);
        }
        // if (Auth::attempt($credentials)) {
        //     $token = $request->user()->createToken('user-access-token')->plainTextToken;
        //     return response()->json(['token' => $token]);
        // } else {
        //     return response()->json(['message' => 'Unauthorized'], 401);
        // }

        if (
            !Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 2])
            && !Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 3])
        ) {

            return response([
                'status' => false,
                'message' => "Email or password dose not match.",
            ]);
        } else {
            $token = $request->user()->createToken('admin-access-token', ['admin'])->plainTextToken;
            return response()->json([
                'status' => true,
                'user' => new UserResource($request->user()),
                'token' => $token
            ]);
        }
    }
    public function apiUserLogin(Request $request)
    {
        dd('user');
    }
    public function apiUserInfo(Request $request)
    {
        return new UserResource($request->user());
    }
}
