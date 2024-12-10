<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;
use Inertia\Inertia;

class IncomeController extends Controller
{
    public function index()
    {
        $incomes = Income::with(['customer', 'location'])
            ->latest('transaction_date')
            ->paginate(15);

        return Inertia::render('Income/Index', [
            'incomes' => $incomes
        ]);
    }

    public function create()
    {
        return Inertia::render('Income/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0',
            'type' => 'required|in:voucher,broadband,dedicated',
            'customer_id' => 'required|exists:customers,id',
            'location_id' => 'required|exists:locations,id',
            'payment_method' => 'required|string',
            'transaction_date' => 'required|date',
        ]);

        Income::create($validated);

        return redirect()->route('incomes.index')->with('success', 'Income record created successfully.');
    }

    public function show(Income $income)
    {
        return Inertia::render('Income/Show', [
            'income' => $income->load(['customer', 'location'])
        ]);
    }

    public function edit(Income $income)
    {
        return Inertia::render('Income/Edit', [
            'income' => $income
        ]);
    }

    public function update(Request $request, Income $income)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0',
            'type' => 'required|in:voucher,broadband,dedicated',
            'customer_id' => 'required|exists:customers,id',
            'location_id' => 'required|exists:locations,id',
            'payment_method' => 'required|string',
            'transaction_date' => 'required|date',
        ]);

        $income->update($validated);

        return redirect()->route('incomes.index')->with('success', 'Income record updated successfully.');
    }

    public function destroy(Income $income)
    {
        $income->delete();

        return redirect()->route('incomes.index')->with('success', 'Income record deleted successfully.');
    }
}

