<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\monk;
class book extends Model
{
    use HasFactory;
    protected $table = "tb_book";

    public function userpost()
    {
        return $this->belongsTo(monk::class, 'user_id');
    }
}
