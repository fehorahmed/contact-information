<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request)
    {

        $request->validate([
            'division' => 'nullable|numeric',
            'district' => 'nullable|numeric',
            'name' => 'nullable|string|max:255',
        ]);
        $contacts = [];
        if ($request->division || $request->district || $request->name) {

            $query = User::where('role', 1)->where('registration_status', 'Approved');
            if ($request->division) {
                $query->where('off_division_id', $request->division);
            }
            if ($request->district) {
                $query->where('off_district_id', $request->district);
            }
            if ($request->name) {
                $query->where('name', 'LIKE', "%{$request->name}%");
            }

            $contacts = $query->paginate();
        }

        // dd($contacts);
        $divisions = Division::all();

        return view('front.home', compact('contacts', 'divisions'));
    }
}
