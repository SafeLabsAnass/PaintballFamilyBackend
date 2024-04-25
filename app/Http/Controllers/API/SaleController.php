<?php

namespace App\Http\Controllers\API;

use App\Constants\SaleConstants;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaleRequest;
use App\Http\Resources\SaleResource;
use App\Http\Traits\Access;
use App\Http\Traits\HttpResponses;
use App\Models\Payment;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    use Access;
    use HttpResponses;

    /**
     * @return JsonResponse
     */
    public function index():JsonResponse
    {
        return $this->success(
            SaleResource::collection(Sale::all())
        );
    }

    /**
     * @param SaleRequest $request
     * * @return JsonResponse
     */
    public function store(Request $request):JsonResponse
    {
        $user = Auth::user()->id;
        $payment_type = $request->payment_type;
        $payment = Payment::where('type',$payment_type)->first();
        $sale = new Sale();
        $sale->name = $request->name;
        $sale->user_id = $user;
        $sale->client_name = $request->client_name;
        $sale->payment_id = $payment->id;
        $sale->save() ;



        return $this->success(
            new SaleResource($sale),
            SaleConstants::STORE
        );
    }

    /**
     * @param int $id
     * * @return JsonResponse
     */
    public function show(int $id):JsonResponse
    {
        $sale = Sale::where('id',$id)->first();
//        if (!$this->canAccess($user)) {
//            return $this->error([], AuthConstants::PERMISSION);
//        }

        return $this->success(new SaleResource($sale));
    }

    /**
     * @param SaleRequest $request
     * * @param int $id
     * * @return JsonResponse
     */
    public function update(Request $request, int $id):JsonResponse
    {
        if ($request->user) {
            return $this->error([], 'Cannot change the user of this sale, you can just change (client, amount and payment_type)');
        }        $sale = Sale::where('id',$id)->first();

        $sale->update($request->all());

        return $this->success(
            new SaleResource($sale),
            SaleConstants::UPDATE
        );
    }

    /**
     * @param int $id
     * * @return JsonResponse
     */
    public function destroy(int $id):JsonResponse
    {
//        if (!$this->canAccess($user)) {
//            return $this->error([], AuthConstants::PERMISSION);
//        }
        $sale = Sale::where('id',$id)->first();

        $sale->delete();

        return $this->success([], SaleConstants::DESTROY);
    }
}
