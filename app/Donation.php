<?php

namespace App;

use App\Campaign;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $guarded = [];

    public function campaign() {
        return $this->belongsTo(Campaign::class, 'campaignId');
    }
}
