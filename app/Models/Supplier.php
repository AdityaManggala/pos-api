<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'suppliers';
    protected $primaryKey = 'SupplierId';
    protected $fillable = ['SupplierName', 'ContactName', 'AddressName', 'City', 'PostalCode', 'Country', 'Phone'];
    public static function getAvailableAttributes()
    {
        return (new static)->getFillable();
    }
}
