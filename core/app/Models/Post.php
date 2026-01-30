<?php

namespace App\Models;

use App\Constants\Status;
use App\Traits\GlobalStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Post extends Model
{
    use GlobalStatus;

    protected $appends = ['status_badge'];
    
    public $casts = ['tags' => 'array'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class)->withDefault();
    }

    public function scopePending($query)
    {
        return $query->where('admin_check', Status::POST_PENDING);
    }

    public function scopeApproved($query)
    {
        return $query->where('admin_check', Status::POST_APPROVED);
    }

    public function scopeRejected($query)
    {
        return $query->where('admin_check', Status::POST_REJECTED);
    }

    public function scopeTrending($query)
    {
        return $query->where('trending', Status::YES);
    }

    public function scopeMustRead($query)
    {
        return $query->where('must_read', Status::YES);
    }
}
