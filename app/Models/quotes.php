<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quotes extends Model
{
    use HasFactory;
    protected $table = "quotes";
    protected $fillable = [
        "company_id",
        "quotes_number",
        "description",
        "accepted_date",
        "file",
    ];
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
