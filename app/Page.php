<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function detail()
    {
        return $this->hasOne('App\PageDetail', 'page_id');
    }
}
