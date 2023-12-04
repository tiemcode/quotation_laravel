<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyUser extends Model
{
    use HasFactory;
    protected $table = "company_users";
    protected $fillable = ['company_id', 'user_id', 'rol_id'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    

}
