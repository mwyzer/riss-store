<?php

namespace App\Http\Controllers;

use App\Models\KtpDataCategory;
use Illuminate\Http\Request;
use Inertia\Inertia;

class KtpDataCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = KtpDataCategory::all();

        return Inertia::render('KtpDataCategories/Index', [
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('KtpDataCategories/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:ktp_data_categories,name',
            'description' => 'nullable|string',
            'is_active' => 'required|boolean',
        ]);

        KtpDataCategory::create($request->all());

        return redirect()->route('ktp_data_categories.index')->with('success', 'Category created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KtpDataCategory $ktpDataCategory)
    {
        return Inertia::render('KtpDataCategories/Edit', [
            'category' => $ktpDataCategory,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KtpDataCategory $ktpDataCategory)
    {
        $request->validate([
            'name' => 'required|unique:ktp_data_categories,name,' . $ktpDataCategory->id,
            'description' => 'nullable|string',
            'is_active' => 'required|boolean',
        ]);

        $ktpDataCategory->update($request->all());

        return redirect()->route('ktp_data_categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KtpDataCategory $ktpDataCategory)
    {
        $ktpDataCategory->delete();

        return redirect()->route('ktp_data_categories.index')->with('success', 'Category deleted successfully.');
    }
}
