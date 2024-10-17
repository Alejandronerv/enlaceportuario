<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryYardFile extends Model
{
    use HasFactory;
    protected $fillable = ['file_name','file_path', 'agency_code', 'create_user'];
}
