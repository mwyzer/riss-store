<?

namespace App\Http\Controllers;

use App\Models\ProviderBill;
use Illuminate\Http\Request;

class ProviderBillController extends Controller
{
    /**
     * Display a listing of provider bills.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $query = ProviderBill::query();

        // Filtering based on request parameters
        if ($request->has('provider_type')) {
            $query->where('provider_type', $request->provider_type);
        }

        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        if ($request->has('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('number', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('provider_name', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('location', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('holder_name', 'LIKE', '%' . $request->search . '%');
            });
        }

        $providerBills = $query->paginate(10); // Paginate results

        return response()->json($providerBills);
    }

    /**
     * Store a newly created provider bill in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'number' => 'required|max:255|unique:provider_bills,number',
            'provider_type' => 'required|in:Postpaid,Prepaid,Metro,Satellite',
            'provider_name' => 'required|max:255',
            'location' => 'required|max:255',
            'holder_name' => 'required|max:255',
            'status' => 'required|in:Terpasang,Stand By,Bermasalah',
            'daily_bill' => 'required|numeric|min:0',
            'monthly_bill' => 'required|numeric|min:0',
        ]);

        $providerBill = ProviderBill::create($validated);

        return response()->json($providerBill, 201);
    }

    /**
     * Update the specified provider bill in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProviderBill  $providerBill
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, ProviderBill $providerBill)
    {
        $validated = $request->validate([
            'number' => 'required|max:255|unique:provider_bills,number,' . $providerBill->id,
            'provider_type' => 'required|in:Postpaid,Prepaid,Metro,Satellite',
            'provider_name' => 'required|max:255',
            'location' => 'required|max:255',
            'holder_name' => 'required|max:255',
            'status' => 'required|in:Terpasang,Stand By,Bermasalah',
            'daily_bill' => 'required|numeric|min:0',
            'monthly_bill' => 'required|numeric|min:0',
        ]);

        $providerBill->update($validated);

        return response()->json($providerBill);
    }

    /**
     * Remove the specified provider bill from storage.
     *
     * @param  \App\Models\ProviderBill  $providerBill
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(ProviderBill $providerBill)
    {
        $providerBill->delete();
        return response()->json(null, 204);
    }
}
