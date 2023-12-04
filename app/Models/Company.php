<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = 'companies';
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
    public function users()
    {
        return $this->belongsToMany(User::class, 'company_users')
            ->withPivot('role_id')
            ->withTimestamps();;
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'company_users');
    }
    public function companyUsers()
    {
        return $this->hasMany(CompanyUser::class);
    }
    //quotes
    public function guotes()
    {
        return $this->hasMany(quotes::class);
    }
}
