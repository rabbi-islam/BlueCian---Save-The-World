<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Rescue extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'location', 'user_id', 'vehicle_id', 'order_id'];

    protected $appends = ['human_created_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function getHumanCreatedAtAttribute()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }
}
