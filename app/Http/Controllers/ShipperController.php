<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShipperRequest;
use App\Http\Resources\ShipperResource;
use App\Models\Shipper;

class ShipperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ShipperResource::collection(Shipper::paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ShipperRequest $request)
    {
        $data = $request->validated();
        $shipper = Shipper::create($data);
        return (new ShipperResource($shipper))->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if (!Shipper::where('ShipperId', $id)->exists()) {
            return response()->json([
                'message' => 'Shipper not found',
            ])->setStatusCode(404);
        }
        return new ShipperResource(Shipper::findOrfail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ShipperRequest $request, $id)
    {
        $data = $request->validated();
        if (!Shipper::where('ShipperId', $id)->exists()) {
            return response()->json([
                'message' => 'Shipper not found',
            ])->setStatusCode(404);
        }
        $shipper = Shipper::findOrfail($id);
        $shipper->update($data);
        return (new ShipperResource($shipper))->response()->setStatusCode(200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (!Shipper::where('ShipperId', $id)->exists()) {
            return response()->json([
                'message' => 'Shipper not found',
            ])->setStatusCode(404);
        }
        $Shipper = Shipper::findOrfail($id);
        $Shipper->delete();
        return response()->json([
            'messsage' => 'Shipper deleted successfully',
        ])->setStatusCode(200);
    }
}
