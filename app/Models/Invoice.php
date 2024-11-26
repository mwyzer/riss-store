<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    //
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'totalAmount',
        'amountPaid',
        'amountDue',
        'statusid',
        'customerId',
    ];

    // Relationship with the Payment model
    public function payments()
    {
        return $this->hasMany(Payment::class, 'invoiceId');
    }

    // Relationship with the Customer model
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customerId');
    }
}
