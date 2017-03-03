<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    protected $fillable = ['title', 'type', 'amount', 'date', 'usd'];

    public function setDateAttribute($date)
    {
    	$this->attributes['date'] = Carbon::parse($date);
    }

    public function getDateAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }
}
