<?php

namespace App\Http\Controllers;

use App\Constants\InvoiceConstants;
use App\Constants\SettingsConstants;
use App\Models\Company;
use App\Models\InvoiceSetting;
use App\Models\Site;
use Illuminate\Http\JsonResponse;
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

        if (InvoiceSetting::all()->count() != 0) {
            $invoiceSetting = InvoiceSetting::all()->first();
//            if($invoiceSetting->prefix_id == $request->prefix_id && $invoiceSetting->initial_count == $request->initial_count &&
//                $invoiceSetting->thanks_message == $request->noise)
//            {
//                return response()->json(
//                    [
//                        "status" => 'error',
//                        "message" => "Les donnees entrants sont similaire avec les anciennes donnees",
//                        "redirect" => route('settings')
//                    ],
//                    201
//                );
//            }
            $invoiceSetting->prefix_id = $request->prefix_id;
            $invoiceSetting->initial_count = $request->initial_count;
            $invoiceSetting->thanks_message = $request->noise;
            $invoiceSetting->save();
            return redirect()->route('settings');
//            return response()->json(
//                [
//                    "status" => 'success',
//                    "message" => InvoiceConstants::STORE,
//                    "redirect" => route('settings')
//                ],
//                201
//            );
        }
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function storeInvoice(Request $request)
    {
        if (InvoiceSetting::all()->count() == 0) {

            $invoiceSetting = new InvoiceSetting();
            $invoiceSetting->prefix_id = $request->prefix_id;
            $invoiceSetting->initial_count = $request->initial_count;
            $invoiceSetting->thanks_message = $request->noise;
            $invoiceSetting->save();
            return redirect()->route('settings');
//            return response()->json(
//                [
//                    "status" => 'success',
//                    "message" => InvoiceConstants::STORE,
//                    "redirect" => route('settings')
//                ],
//                201
//            );
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
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:40048',
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
            return response()->json(
                [
                    "status" => 'success',
                    "message" => SettingsConstants::STORE,
                    "redirect" => route('settings')
                ],
                201
            );
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
            $company = Company::all()->first();
            if ($request->name == $company->name && $request->phone == $company->phone
                && $request->address == $company->address && $request->email == $company->email &&
                $company->site == $request->site && $request->imageTest == $company->logo) {
                return response()->json(
                    [
                        "status" => 'error',
                        "message" => "Les donnees entrants sont similaire avec les anciennes donnees",
                        "redirect" => route('settings')
                    ],
                    201
                );
            }
                request()->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:40048',
            ]);
            if(request()->image!= null){
                $logo = request()->image->getClientOriginalName();
                if (!file_exists(storage_path('app/public' . '/' . $logo))) {
                    request()->validate([
                        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:40048',
                    ]);
                    $imageName = request()->image->getClientOriginalName();
                    request()->image->move(storage_path('app/public'), $imageName);

                }
                $company->logo = $logo;
            }
            $company->name = $request->name;
            $company->phone = $request->phone;
            $company->address = $request->address;
            $company->email = $request->email;
            $company->site = $request->site;
            $company->vat_number = $request->vat_number;
            $company->save();
            return response()->json(
                [
                    "status" => 'success',
                    "message" => SettingsConstants::STORE,
                    "redirect" => route('settings')
                ],
                201
            );
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
