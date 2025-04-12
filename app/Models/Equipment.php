<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $table = 'equipment';  // Specify the table name if it's not plural of the model name
    // Equipment.php (model)
    protected $fillable = [
        'equipment_id',
        'equipment_name',
        'quantity',
        'room',
        'status',
    ];    
}