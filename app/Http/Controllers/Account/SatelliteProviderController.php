<?php

namespace App\Http\Controllers;

use App\Repositories\SateliteProviderRepository;
use Illuminate\Http\Request;

class SateliteProviderController extends Controller
{
    private $repository;

    public function __construct(SateliteProviderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $filters = $request->only(['status', 'provider', 'search']);
        $providers = $this->repository->getAll($filters);

        return response()->json($providers);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'number' => 'required|unique:satelite_providers,number',
            'provider' => 'required|string',
            'location_id' => 'required|exists:locations,id',
            'position' => 'nullable|string',
            'holder' => 'required|string',
            'status' => 'required|in:Terpasang,Stand By,Bermasalah',
        ]);

        $provider = $this->repository->create($validatedData);

        return response()->json($provider, 201);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'number' => 'sometimes|unique:satelite_providers,number,' . $id,
            'provider' => 'sometimes|string',
            'location_id' => 'sometimes|exists:locations,id',
            'position' => 'nullable|string',
            'holder' => 'sometimes|string',
            'status' => 'sometimes|in:Terpasang,Stand By,Bermasalah',
        ]);

        $provider = $this->repository->update($id, $validatedData);

        return response()->json($provider);
    }

    public function destroy($id)
    {
        $this->repository->delete($id);

        return response()->json(['message' => 'Satellite provider deleted successfully']);
    }
}
