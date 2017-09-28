<?php

namespace App\Helper;

trait DataViewer 
{
    public function scopeSearchPaginateAndOrder($query)
    {
        return $query->paginate(10);
    }
}