<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'balance'];

    public function locationDetails()
    {
        return $this->hasMany(LocationDetail::class);
    }

    public function locationServices()
    {
        return $this->hasMany(LocationService::class);
    }

    public function locationIsp()
    {
        return $this->hasMany(LocationIsp::class);
    }

    public function locationPartners()
    {
        return $this->hasMany(LocationPartner::class);
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }

    public function complaintHistory()
    {
        return $this->hasMany(ComplaintHistory::class);
    }

    public function dailySales()
    {
        return $this->hasMany(DailySales::class);
    }

    public function monthlySales()
    {
        return $this->hasMany(MonthlySales::class);
    }

    public function salesHistory()
    {
        return $this->hasMany(SalesHistory::class);
    }

        // Define the relationship to PostpaidProvider
    public function postpaidProviders()
    {
        return $this->hasMany(PostpaidProvider::class);
    }
    
    public function prepaidProviders()
    {
        return $this->hasMany(PrepaidProvider::class);
    }

    public function metroProviders()
    {
        return $this->hasMany(PrepaidProvider::class);
    }

    public function satelliteProviders()
    {
        return $this->hasMany(PrepaidProvider::class);
    }


}
