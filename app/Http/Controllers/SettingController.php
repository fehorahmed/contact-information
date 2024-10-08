<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $setting = Setting::first();
        return view('admin.setting.create', compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            "name" => 'required|string|max:255',
            "phone" => 'nullable|string|max:255',
            "email" => 'nullable|string|max:255',
            "address" => 'nullable|string|max:255',
            "logo" => 'nullable|image',
        ]);
        // dd($request->all());
        $setting = Setting::first();
        if (!$setting) {
            $setting = new Setting();
        }

        $setting->name = $request->name;
        $setting->phone = $request->phone;
        $setting->email = $request->email;
        $setting->address = $request->address;
        if ($request->logo) {
            $setting->logo =  saveImage('logo', $request->logo, 200, 80);
        }

        if ($setting->save()) {
            return redirect()->back()->with('success', 'Setting update successfully.');
        } else {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
    public function apiSetting()
    {

        $setting = Setting::first();
        return response([
            'setting' => $setting
        ]);
    }
    public function apiSettingUpdate(Request $request)
    {

        $rules = [
            "name" => 'required|string|max:255',
            "phone" => 'nullable|string|max:255',
            "email" => 'nullable|string|max:255',
            "address" => 'nullable|string|max:255',
            "logo" => 'nullable|image',
        ];
        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {

            return response([
                'status' => false,
                'message' =>  $validate->errors()->first()
            ]);
        }

        $setting = Setting::first();
        if (!$setting) {
            $setting = new Setting();
        }

        $setting->name = $request->name;
        $setting->phone = $request->phone;
        $setting->email = $request->email;
        $setting->address = $request->address;
        if ($request->logo) {
            $setting->logo =  saveImage('logo', $request->logo, 200, 80);
        }

        if ($setting->save()) {
            return response([
                'status' => true,
                'message' => 'Setting update successfully.'
            ]);
        } else {
            return response([
                'status' => false,
                'message' => 'Something went wrong.'
            ]);
        }
    }
}
