<?php

namespace App\Http\Controllers\API;

use App\Constants\PaymentConstants;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Http\Resources\PaymentResource;
use App\Http\Traits\Access;
use App\Http\Traits\HttpResponses;
use App\Models\Payment;
use Illuminate\Http\JsonResponse;

class PaymentController extends Controller
{
    use Access;
    use HttpResponses;

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->success(
            PaymentResource::collection(Payment::all())
        );
    }

    /**
     * @param PaymentRequest $request
     * @return JsonResponse
     */
    public function store(PaymentRequest $request): JsonResponse
    {
        return $this->success(
            new PaymentResource(Payment::create($request->all())),
            PaymentConstants::STORE
        );
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $payment = Payment::where('id',$id)->first();
//        if (!$this->canAccess($category)) {
//            return $this->error([], AuthConstants::PERMISSION);
//        }

        return $this->success(new PaymentResource($payment));
    }

    /**
     * @param PaymentRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(PaymentRequest $request, int $id): JsonResponse
    {
//        if (!$this->canAccess($category)) {
//            return $this->error([], AuthConstants::PERMISSION);
//        }
        $payment = Payment::where('id',$id)->first();
        $payment->update($request->all());

        return $this->success(
            new PaymentResource($payment),
            PaymentConstants::UPDATE
        );
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
//        if (!$this->canAccess($category)) {
//            return $this->error([], AuthConstants::PERMISSION);
//        }
        $payment = Payment::where('id',$id)->first();

        $payment->delete();

        return $this->success([], PaymentConstants::DESTROY);
    }
}
