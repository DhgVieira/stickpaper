<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    /**
     * Get the phone record associated with the user.
     */
    public function client()
    {
        return $this->hasOne('App\Repositories\client', 'id', 'client_id');
    }
    public function product()
    {
        return $this->hasOne('App\Repositories\products', 'id', 'product_id');
    }
    public function status()
    {
        return $this->hasOne('App\Repositories\status', 'id', 'status_id');
    }
}
