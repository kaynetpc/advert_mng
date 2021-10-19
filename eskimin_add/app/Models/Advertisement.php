<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;
    protected $fillable = ['addId', 'name', 'dateFrom', 'dateTo', 'totalBudget', 'dailyBudget', 'description', 'bannerImage'];
}
