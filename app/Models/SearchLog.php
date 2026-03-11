<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SearchLog extends Model
{
    protected $table = 'search_logs';

    protected $fillable = [
        'search_query',
        'is_found',
        'ip_address'
    ];

    protected $casts = [
        'is_found' => 'boolean'
    ];

    /**
     * ------------------------------------------------------
     * Helper Methods
     *
     * @return boolean
     * ------------------------------------------------------
     */
    public function isFound()
    {
        return $this->is_found;
    }
}
