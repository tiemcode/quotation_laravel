<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    use HasFactory;
    protected $table = 'roles';
    protected $fillable = ['name'];

    public function company()
    {
        return $this->hasMany(CompanyUser::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'company_users');
    }
}
