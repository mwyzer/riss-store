<?php

namespace App\Http\Controllers\Account;

use App\Models\VoucherProfile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VoucherProfileController extends Controller
{
    public function index()
    {
        $vouchers = VoucherProfile::latest()->paginate(10);
        
        return inertia('Account/VoucherProfiles/Index', [
            'vouchers' => $vouchers
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:voucher_profiles',
            'discount_amount' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'max_uses' => 'required|integer'
        ]);

        VoucherProfile::create($request->all());

        return redirect()->route('account.voucher-profiles.index');
    }
}
