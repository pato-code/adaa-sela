<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class GlobalModel extends Model
{
    //
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('branch', function (Builder $builder) {
            // $builder->where('branch_id',  '1'); //Session::get('branch_id')
            // $builder->where('organization_id',  '2'); //Session::get('organization_id')
        });
    }
}
