<?php

namespace App\Http\Controllers\Account;

use App\Models\Warna;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class WarnaController extends Controller
{
    public function index()
    {
        $warnas = Warna::when(request()->q, function ($query) {
                $query->where('name', 'like', '%' . request()->q . '%');
            })
            ->latest()
            ->paginate(5);

        $warnas->appends(['q' => request()->q]);

        return inertia('Account/Warnas/Index', [
            'warnas' => $warnas,
        ]);
    }

    public function create()
    {
        return inertia('Account/Warnas/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|string|unique:warnas,name',
            'image' => 'nullable|mimes:png,jpg|max:2048',
        ], [
            'name.required' => 'The warna name is required.',
            'name.unique'   => 'The warna name must be unique.',
            'image.mimes'   => 'The image must be a file of type: png, jpg.',
        ]);

        $image = null;
        if ($request->file('image')) {
            $image = $request->file('image')->storeAs('public/warnas', $request->file('image')->hashName());
        }

        Warna::create([
            'name'  => $validated['name'],
            'image' => $image ? basename($image) : null,
        ]);

        return redirect()->route('account.warnas.index')->with('success', 'Warna created successfully.');
    }

    public function edit($id)
    {
        $warna = Warna::findOrFail($id);

        return inertia('Account/Warnas/Edit', [
            'warna' => $warna,
        ]);
    }

    public function update(Request $request, Warna $warna)
    {
        $validated = $request->validate([
            'name'  => 'required|string|unique:warnas,name,' . $warna->id,
            'image' => 'nullable|mimes:png,jpg|max:2048',
        ]);

        if ($request->file('image')) {
            if ($warna->image) {
                Storage::disk('local')->delete('public/warnas/' . $warna->image);
            }

            $image = $request->file('image')->storeAs('public/warnas', $request->file('image')->hashName());
            $warna->update([
                'image' => basename($image),
            ]);
        }

        $warna->update([
            'name' => $validated['name'],
        ]);

        return redirect()->route('account.warnas.index')->with('success', 'Warna updated successfully.');
    }

    public function destroy($id)
    {
        $warna = Warna::findOrFail($id);

        if ($warna->image) {
            Storage::disk('local')->delete('public/warnas/' . $warna->image);
        }

        $warna->delete();

        return redirect()->route('account.warnas.index')->with('success', 'Warna deleted successfully.');
    }
}