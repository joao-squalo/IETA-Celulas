<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Register extends Model
{
    use SoftDeletes;
    protected $fillable = ['cell_date', 'totPeople', 'namePeople', 'totVisitors', 'nameVisitors', 'offer', 'obs'];

    protected $casts = [
        'cell_date' => 'date',
    ];

    public function cell()
    {
        return $this->belongsTo(Cell::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
