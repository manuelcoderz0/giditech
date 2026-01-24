<?php

namespace App\Traits;

use App\Constants\Status;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait GlobalStatus
{
    public static function change_status($id, $column = 'status')
    {
        $modelName = get_class();
        $query     = $modelName::findOrFail($id);
        if ($query->$column == Status::ENABLE) {
            $query->$column = Status::DISABLE;
        } else {
            $query->$column = Status::ENABLE;
        }
        $message       = key_to_title($column). ' changed successfully';

        $query->save();
        $notify[] = ['success', $message];
        return back()->withNotify($notify);
    }


    public function statusBadge(): Attribute
    {
        return new Attribute(
            get: fn () => $this->badge_data(),
        );
    }

    public function badge_data()
    {
        $html = '';
        if ($this->status == Status::ENABLE) {
            $html = '<span class="inline-flex items-center px-1.5 py-0 rounded text-xs font-medium border border-green-300 bg-green-200 text-green-400">' . trans('Enabled') . '</span>';
        } else {
            $html = '<span class="inline-flex items-center px-1.5 py-0 rounded text-xs font-medium border border-red-300 bg-red-200 text-red-400">' . trans('Disabled') . '</span>';
        }
        return $html;
    }

    public function scopeActive($query)
    {
        return $query->where('status', Status::ENABLE);
    }

    public function scopeInactive($query)
    {
        return $query->where('status', Status::DISABLE);
    }
}
