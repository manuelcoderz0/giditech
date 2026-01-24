<?php

namespace App\Models;

use App\Constants\Status;
use App\Traits\GlobalStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Post extends Model
{
    use GlobalStatus;

    public $casts = ['tags' => 'array'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    
}
