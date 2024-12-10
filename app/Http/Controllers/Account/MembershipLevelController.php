<?php

namespace App\Http\Controllers;

use App\Models\MembershipReward;
use App\Models\MembershipLevel;
use App\Models\RewardType;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MembershipRewardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rewards = MembershipReward::with(['membership', 'rewardType'])->get();

        return Inertia::render('MembershipRewards/Index', [
            'rewards' => $rewards,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $membershipLevels = MembershipLevel::all();
        $rewardTypes = RewardType::all();

        return Inertia::render('MembershipRewards/Create', [
            'membershipLevels' => $membershipLevels,
            'rewardTypes' => $rewardTypes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'membership_level_id' => 'required|exists:membership_levels,id',
            'reward_type_id' => 'required|exists:reward_types,id',
            'is_enabled' => 'required|boolean',
            'bonus_points' => 'required|integer|min:0',
            'nominal_threshold' => 'required|numeric|min:0',
            'multiplier_type' => 'required|string|max:255',
            'extra_config' => 'nullable|json',
        ]);

        MembershipReward::create($request->all());

        return redirect()->route('membership_rewards.index')->with('success', 'Reward created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MembershipReward $membershipReward)
    {
        $membershipLevels = MembershipLevel::all();
        $rewardTypes = RewardType::all();

        return Inertia::render('MembershipRewards/Edit', [
            'reward' => $membershipReward,
            'membershipLevels' => $membershipLevels,
            'rewardTypes' => $rewardTypes,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MembershipReward $membershipReward)
    {
        $request->validate([
            'membership_level_id' => 'required|exists:membership_levels,id',
            'reward_type_id' => 'required|exists:reward_types,id',
            'is_enabled' => 'required|boolean',
            'bonus_points' => 'required|integer|min:0',
            'nominal_threshold' => 'required|numeric|min:0',
            'multiplier_type' => 'required|string|max:255',
            'extra_config' => 'nullable|json',
        ]);

        $membershipReward->update($request->all());

        return redirect()->route('membership_rewards.index')->with('success', 'Reward updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MembershipReward $membershipReward)
    {
        $membershipReward->delete();

        return redirect()->route('membership_rewards.index')->with('success', 'Reward deleted successfully.');
    }
}
