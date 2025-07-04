<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'order_details';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'order_id',
        'invoice_id',
        'payment_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'images',
        'sizes',
        'colors',
        'street',
        'city',
        'state',
        'country',
        'postal_code',
        'billing_address',
        'shipping_address',
        'description',
        'cgst',
        'sgst',
        'igst',
        'total_price',
        'status',
        'product_ids',
        'product_names',
        'quantities',
        'prices',
        'created_at',
        'created_by',
    ];
    
}
