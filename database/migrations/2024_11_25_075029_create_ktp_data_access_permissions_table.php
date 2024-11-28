<?php

namespace App\Http\Controllers;

use App\Models\KtpDataAccessPermission;
use App\Models\PartnerType;
use App\Models\KtpDataCategory;
use App\Models\AccessLevel;
use Illuminate\Http\Request;
use Inertia\Inertia;

class KtpDataAccessPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = KtpDataAccessPermission::with(['partnerType', 'ktpDataCategory', 'accessLevel'])->get();

        return Inertia::render('KtpDataAccessPermissions/Index', [
            'permissions' => $permissions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $partnerTypes = PartnerType::all();
        $ktpDataCategories = KtpDataCategory::all();
        $accessLevels = AccessLevel::all();

        return Inertia::render('KtpDataAccessPermissions/Create', [
            'partnerTypes' => $partnerTypes,
            'ktpDataCategories' => $ktpDataCategories,
            'accessLevels' => $accessLevels,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'partner_type_id' => 'required|exists:partner_types,id',
            'ktp_data_category_id' => 'required|exists:ktp_data_categories,id',
            'access_level_id' => 'required|exists:access_levels,id',
        ]);

        KtpDataAccessPermission::create($request->all());

        return redirect()->route('ktp_data_access_permissions.index')->with('success', 'Permission created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KtpDataAccessPermission $ktpDataAccessPermission)
    {
        $partnerTypes = PartnerType::all();
        $ktpDataCategories = KtpDataCategory::all();
        $accessLevels = AccessLevel::all();

        return Inertia::render('KtpDataAccessPermissions/Edit', [
            'permission' => $ktpDataAccessPermission,
            'partnerTypes' => $partnerTypes,
            'ktpDataCategories' => $ktpDataCategories,
            'accessLevels' => $accessLevels,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KtpDataAccessPermission $ktpDataAccessPermission)
    {
        $request->validate([
            'partner_type_id' => 'required|exists:partner_types,id',
            'ktp_data_category_id' => 'required|exists:ktp_data_categories,id',
            'access_level_id' => 'required|exists:access_levels,id',
        ]);

        $ktpDataAccessPermission->update($request->all());

        return redirect()->route('ktp_data_access_permissions.index')->with('success', 'Permission updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KtpDataAccessPermission $ktpDataAccessPermission)
    {
        $ktpDataAccessPermission->delete();

        return redirect()->route('ktp_data_access_permissions.index')->with('success', 'Permission deleted successfully.');
    }
}
