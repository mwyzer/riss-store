<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    /**
     * Display a listing of the memberships.
     */
    public function index(Request $request)
    {
        $filters = $request->only(['status_level', 'membership_level', 'search']);
        $query = Membership::query();

        if (!empty($filters['status_level'])) {
            $query->where('status_level', $filters['status_level']);
        }

        if (!empty($filters['membership_level'])) {
            $query->where('membership_level', $filters['membership_level']);
        }

        if (!empty($filters['search'])) {
            $query->where('name', 'like', "%{$filters['search']}%")
                  ->orWhere('customer_id', 'like', "%{$filters['search']}%")
                  ->orWhere('location', 'like', "%{$filters['search']}%");
        }

        $memberships = $query->paginate(10);

        return response()->json($memberships);
    }

    /**
     * Store a newly created membership in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'customer_id' => 'required|string|unique:memberships,customer_id',
            'location' => 'required|string',
            'status_level' => 'required|string|in:Verifikasi Level,Aman,Tolak Verifikasi,Blokir Member',
            'membership_level' => 'required|string|in:Silver,Gold,Platinum',
            'balance' => 'required|numeric|min:0',
            'total_transactions' => 'required|integer|min:0',
        ]);

        $membership = Membership::create($validatedData);

        return response()->json($membership, 201);
    }

    /**
     * Update the specified membership.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'sometimes|string|max:255',
            'customer_id' => 'sometimes|string|unique:memberships,customer_id,' . $id,
            'location' => 'sometimes|string',
            'status_level' => 'sometimes|string|in:Verifikasi Level,Aman,Tolak Verifikasi,Blokir Member',
            'membership_level' => 'sometimes|string|in:Silver,Gold,Platinum',
            'balance' => 'sometimes|numeric|min:0',
            'total_transactions' => 'sometimes|integer|min:0',
        ]);

        $membership = Membership::findOrFail($id);
        $membership->update($validatedData);

        return response()->json($membership);
    }

    /**
     * Remove the specified membership from storage.
     */
    public function destroy($id)
    {
        $membership = Membership::findOrFail($id);
        $membership->delete();

        return response()->json(['message' => 'Membership deleted successfully']);
    }
}
