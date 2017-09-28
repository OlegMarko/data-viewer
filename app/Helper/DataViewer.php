<?php

namespace App\Helper;

use Validator;

trait DataViewer 
{

    protected $operators = [
        'equal' => '=',
        'not_equal' => '<>',
        'less_than' => '<',
        'greater_than' => '>',
        'less_than_or_equal_to' => '<=',
        'greater_than_or_equal_to' => '>=',
        'in' => 'IN',
        'like' => 'LIKE'
    ];

    public function scopeSearchPaginateAndOrder($query)
    {
        $v = Validator::make(request()->all(), [
            'column' => 'required|alpha_dash|in:' . implode(',', self::$columns),
            'direction' => 'required|in:asc,desc',
            'per_page' => 'required|integer|min:1',
            'search_column' => 'required|alpha_dash|in:' . implode(',', self::$columns),
            'search_operator' => 'required|alpha_dash|in:' . implode(',', array_keys($this->operators)),
            'search_input' => 'max:255'
        ]);

        if ($v->fails()) {
            dd($v->messages());
        }

        return $query
            ->where(function ($query) {
                if (request('search_input')) {
                    
                    if (request('search_operator') == 'in') {
                        $query->whereIn(
                            request('search_column'),
                            explode(',', request('search_input'))
                        );
                    } elseif (request('search_operator') == 'like') {
                        $query->where(
                            request('search_column'),
                            $this->operators[request('search_operator')],
                            '%' . request('search_input') . '%'
                        );
                    } else {
                        $query->where(
                            request('search_column'),
                            $this->operators[request('search_operator')],
                            request('search_input')
                        );
                    }
                }
            })
            ->orderBy(
                request('column'), 
                request('direction')
            )
            ->paginate(request('per_page'));
    }
}