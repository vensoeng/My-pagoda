<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\videocreator;
use App\Models\monk;
class video extends Model
{
    use HasFactory;
    protected $table = "tb_video";
    public function userCreator()
    {
        return $this->belongsTo(videocreator::class, 'creator_id');
    }

    public function userpost()
    {
        return $this->belongsTo(monk::class, 'user_id');
    }
}
