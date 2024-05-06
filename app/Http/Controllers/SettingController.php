<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Site;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company = Company::all()->first();
       return view('pages.setting')->with('company', $company);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if(Company::all()->count()==0) {
            request()->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $logo = request()->image->getClientOriginalName();
            request()->image->move(storage_path('app/public'), $logo);
            $company = new Company();
            $company->name = $request->name;
            $company->phone = $request->phone;
            $company->address = $request->address;
            $company->email = $request->email;
            $company->logo = $logo;
            $company->site = $request->site;
            $company->vat_number = $request->vat_number;
            $company->save();
            return redirect('/settings');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Site $site)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Site $site)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Site $site)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Site $site)
    {
        //
    }
}
