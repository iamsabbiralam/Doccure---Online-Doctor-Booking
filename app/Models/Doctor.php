<?php

namespace App\Models;

use App\Http\Controllers\DoctorController;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'specialist',
        'chamber',
        'cost',
        'cat_id',
    ];

    public function categories() {

        return $this->belongsTo(Category::class, 'cat_id');
    }
}
