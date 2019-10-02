<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $guarded = [];

    public function donations()  {
        return $this->hasMany(Donation::class, 'campaignId');
    }
}
