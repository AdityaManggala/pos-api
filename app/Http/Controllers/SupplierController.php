<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierRequest;
use App\Http\Resources\SupplierResource;
use App\Models\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return SupplierResource::collection(Supplier::paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SupplierRequest $request)
    {
        $data = $request->validated();
        $supplier = Supplier::create($data);
        return (new SupplierResource($supplier))->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if (!Supplier::where('SupplierId', $id)->exists()) {
            return response()->json([
                'message' => 'Supplier not found',
            ])->setStatusCode(404);
        }
        return new SupplierResource(Supplier::findOrfail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SupplierRequest $request, $id)
    {

        $data = $request->validated();
        if (!Supplier::where('SupplierId', $id)->exists()) {
            return response()->json([
                'message' => 'Supplier not found',
            ])->setStatusCode(404);
        }
        $supplier = Supplier::findOrfail($id);
        $supplier->update($data);
        return (new SupplierResource($supplier))->response()->setStatusCode(200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        if (!Supplier::where('SupplierId', $id)->exists()) {
            return response()->json([
                'message' => 'Supplier not found',
            ])->setStatusCode(404);
        }
        $supplier = Supplier::findOrfail($id);
        $supplier->delete();
        return response()->json([
            'messsage' => 'Supplier deleted successfully',
        ])->setStatusCode(200);
    }
}
