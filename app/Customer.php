<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Helper\DataViewer;

class Customer extends Model
{
    use DataViewer;

    public static $columns = [
        'id',
        'name',
        'email',
        'phome',
        'created_at',
        'updated_at'
    ];
}
