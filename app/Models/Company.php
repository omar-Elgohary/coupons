<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function coupons()
    {
        return $this->hasMany(Coupon::class);
    }

    public function country()
    {
        return $this->belongsToMany(Country::class);
    }

    public function getNameArAttribute()
    {
        return json_decode($this->attributes['name'])->ar;
    }

    public function getNameEnAttribute()
    {
        return json_decode($this->attributes['name'])->en;
    }
}
