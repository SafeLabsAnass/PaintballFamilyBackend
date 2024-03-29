<?php

namespace App\Http\Controllers\API;

use App\Constants\SiteConstants;
use App\Http\Controllers\Controller;
use App\Http\Requests\SiteRequest;
use App\Http\Resources\SiteResource;
use App\Http\Traits\Access;
use App\Http\Traits\HttpResponses;
use App\Models\Site;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    use Access;
    use HttpResponses;

    /**
     * @return JsonResponse
     */
    public function index():JsonResponse
    {
        return $this->success(SiteResource::collection(Site::all()));
    }

    /**
     * @param SiteRequest $request
     * @return JsonResponse
     */
    public function store(SiteRequest $request):JsonResponse
    {
        try {

//        $user_email = $request->user_email;
//        $user = User::where('email',$user_email)->first();
        $site = new Site();
        $site->name = $request->name;
        $site->phone = $request->phone;
        $site->address = $request->address;
//        $site->user_id = $user->id;
        $site->save() ;

        return $this->success(new SiteResource($site), SiteConstants::STORE);
        } catch (QueryException $e) {
            return $this->error([
                'Unique' => 'Cannot insert a duplicate site name please enter another',
            ]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): JsonResponse
    {
        $site = Site::where('id',$id)->first();
        return $this->success(new SiteResource($site));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id): JsonResponse
    {
//        if ($request->user_email) {
//            return $this->error([], 'Cannot change the user of this site');
//        }
        $site = Site::where('id',$id)->first();

        $site->update($request->all());

        return $this->success(
            new SiteResource($site),
            SiteConstants::UPDATE
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        $site = Site::where('id',$id)->first();

        $site->delete();

        return $this->success([], SiteConstants::DESTROY);
    }
}
