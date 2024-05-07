<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\InvoiceSetting;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company = Company::all()->first();
        $invoice = InvoiceSetting::all()->first();
       return view('pages.setting')->with('items', [$company, $invoice]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

    }

    public function editInvoice(Request $request)
    {

        if(InvoiceSetting::all()->count()!=0) {

            $invoiceSetting = InvoiceSetting::all()->first();
            $invoiceSetting->prefix_id = $request->prefix_id;
            $invoiceSetting->initial_count = $request->initial_count;
            $invoiceSetting->thanks_message = $request->noise;
            $invoiceSetting->save();
            return redirect()->route('settings');
        }
    }
    /**
     *@return RedirectResponse
     *@param Request $request
    */
    public function storeInvoice(Request $request): RedirectResponse
    {
        if(InvoiceSetting::all()->count()==0) {

            $invoiceSetting = new InvoiceSetting();
            $invoiceSetting->prefix_id = $request->prefix_id;
            $invoiceSetting->initial_count = $request->initial_count;
            $invoiceSetting->thanks_message = $request->noise;
            $invoiceSetting->save();

            return redirect()->route('settings');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if(Company::all()->count()==0) {
            request()->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $logo = '';
            if(request()->image != null){
                $logo = request()->image->getClientOriginalName();
                Storage::put('app/public', $logo);
                Storage::setVisibility('public/' . $logo, 'public');
            }
            $logo = request()->image->getClientOriginalName();
            Storage::put('app/public', $logo);
            Storage::setVisibility('public/' . $logo, 'public');
            $company = new Company();
            $company->name = $request->name;
            $company->phone = $request->phone;
            $company->address = $request->address;
            $company->email = $request->email;
            $company->logo = $logo;
            $company->site = $request->site;
            $company->vat_number = $request->vat_number;
            $company->save();
            return redirect()->route('settings');
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
    public function edit(Request $request)
    {
        if(Company::all()->count()!=0) {
            request()->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $logo = '';
            $company = Company::all()->first();
            if(request()->image!= null){
                $logo = request()->image->getClientOriginalName();
            }
            if (file_exists(storage_path('app/public' . '/' . $request->imageTest))) {
            $company->logo = $logo;
            } else {
                request()->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $imageName = request()->image->getClientOriginalName();
                request()->image->move(storage_path('app/public'), $imageName);
                $company->logo = $logo;

            }
            $company->name = $request->name;
            $company->phone = $request->phone;
            $company->address = $request->address;
            $company->email = $request->email;
            $company->site = $request->site;
            $company->vat_number = $request->vat_number;
            $company->save();
            return redirect()->route('settings');
        }
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
