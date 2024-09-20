<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\monk;
class festival extends Model
{
    use HasFactory;
    protected $table = "td_festival";

    public function userpost()
    {
        return $this->belongsTo(monk::class, 'user_id');
    }
}
