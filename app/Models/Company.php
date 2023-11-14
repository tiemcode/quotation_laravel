<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = 'companys';
    protected $fillable = [
        'company_name',
        'contact_person',
        'address',
        'postal_code',
        'city',
        'email',
        'phone',
        'logo'
    ];
}
