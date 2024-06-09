<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    public function coupons()
    {
        return $this->hasMany(Coupon::class);
    }
}
