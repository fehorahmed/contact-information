<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\Division;
use App\Models\Profession;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function home(Request $request)
    {

        $request->validate([
            'division' => 'nullable|numeric',
            'district' => 'nullable|numeric',
            'profession' => 'nullable|numeric',
            'name' => 'nullable|string|max:255',
        ]);
        $contacts = [];


        $query = User::where('role', 1)->where('registration_status', 'Approved');
        if ($request->division) {
            $query->where('off_division_id', $request->division);
        }
        if ($request->district) {
            $query->where('off_district_id', $request->district);
        }
        if ($request->profession) {
            $query->where('profession_id', $request->profession);
        }
        if ($request->name) {
            $query->where('name', 'LIKE', "%{$request->name}%");
        }

        $contacts = $query->paginate();


        // dd($contacts);
        $divisions = Division::all();
        $professions = Profession::all();

        return view('front.home', compact('contacts', 'divisions', 'professions'));
    }

    public function addressSearch(Request $request)
    {
        $request->validate([
            'division' => 'nullable|numeric',
            'district' => 'nullable|numeric',
            'upazila' => 'nullable|numeric',
            'profession' => 'nullable|numeric',
            'name' => 'nullable|string|max:255',
        ]);


        $query = User::where('role', 1)->where('registration_status', 'Approved');
        if ($request->division) {
            $query->where('per_division_id', $request->division);
        }
        if ($request->district) {
            $query->where('per_district_id', $request->district);
        }
        if ($request->upazila) {
            $query->where('per_sub_district_id', $request->sub_district);
        }
        if ($request->profession) {
            $query->where('profession_id', $request->profession);
        }
        if ($request->name) {
            $query->where('name', 'LIKE', "%{$request->name}%");
        }

        $contacts = $query->paginate();


        $divisions = Division::all();
        $professions = Profession::all();
        return view('front.address_search', compact('divisions', 'professions', 'contacts'));
    }


    public function apiHomeSearch(Request $request)
    {
        $rules = [
            'division' => 'nullable|numeric',
            'district' => 'nullable|numeric',
            'profession' => 'nullable|numeric',
            'name' => 'nullable|string|max:255',
        ];
        $validation = Validator::make($request->all(), $rules);
        if ($validation->fails()) {
            return response([
                'message' => $validation->errors()->first()
            ]);
        }
        $contacts = [];

        $query = User::where('role', 1)->where('registration_status', 'Approved');
        if ($request->division) {
            $query->where('off_division_id', $request->division);
        }
        if ($request->district) {
            $query->where('off_district_id', $request->district);
        }
        if ($request->profession) {
            $query->where('profession_id', $request->profession);
        }
        if ($request->name) {
            $query->where('name', 'LIKE', "%{$request->name}%");
        }

        $contacts = $query->paginate();


        return response(UserResource::collection($contacts));
    }
    public function apiAddressSearch(Request $request)
    {
        $rules = [
            'division' => 'nullable|numeric',
            'district' => 'nullable|numeric',
            'profession' => 'nullable|numeric',
            'name' => 'nullable|string|max:255',
        ];
        $validation = Validator::make($request->all(), $rules);
        if ($validation->fails()) {
            return response([
                'message' => $validation->errors()->first()
            ]);
        }


        $query = User::where('role', 1)->where('registration_status', 'Approved');
        if ($request->division) {
            $query->where('per_division_id', $request->division);
        }
        if ($request->district) {
            $query->where('per_district_id', $request->district);
        }
        if ($request->upazila) {
            $query->where('per_sub_district_id', $request->sub_district);
        }
        if ($request->profession) {
            $query->where('profession_id', $request->profession);
        }
        if ($request->name) {
            $query->where('name', 'LIKE', "%{$request->name}%");
        }

        $contacts = $query->paginate();


        return response(UserResource::collection($contacts));
    }
    public function getDivision()
    {
        $datas = Division::all();
        return response($datas);
    }
}
