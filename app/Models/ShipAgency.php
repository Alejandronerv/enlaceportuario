<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipAgency extends Model
{
    use HasFactory;

    protected $table = 'ship_agency_codes'; // Specify the table name

    protected $fillable = [
        'code',
        'name',
    ];
}
