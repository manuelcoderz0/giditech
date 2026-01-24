<?php

namespace App\Models;

use App\Traits\GlobalStatus;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use GlobalStatus;

    protected $appends = ['status_badge'];
    protected $casts = [
        'seo_content' => 'object'
    ];

    public function news()
    {
        return $this->hasMany(News::class)->active()->approved();
    }
}
