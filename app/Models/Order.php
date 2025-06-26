<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'plan_id',
        'app_id',
        'subscription_years', // 👈 لازم يكون هنا
        'subscription_price',
        'total_price',
        'transfer_number',
        'receipt',
        'web_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function app()
    {
        return $this->belongsTo(App::class);
    }

    public function web()
    {
        return $this->belongsTo(Web::class);
    }
}
