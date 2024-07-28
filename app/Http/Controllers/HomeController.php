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
        if ($request->division || $request->district || $request->name || $request->profession) {

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
        }

        // dd($contacts);
        $divisions = Division::all();
        $professions = Profession::all();

        return view('front.home', compact('contacts', 'divisions', 'professions'));
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
        if ($request->division || $request->district || $request->name || $request->profession) {

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
        }

        return response(UserResource::collection($contacts));
    }
    public function getDivision()
    {
        $datas = Division::all();
        return response($datas);
    }
}
