<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

use App\Models\role;
use App\Models\typemonk;
use App\Models\monkinfor;
use App\Models\position;

class monk extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait;
    protected $table = "tb_monk";
    protected $fillable = [
        'email',
        'password',
        'role_id',
    ];

    public function roleuser()
    {
        return $this->belongsTo(role::class, 'role_id');
    }

    public function typeuser()
    {
        return $this->belongsTo(typemonk::class, 'type_id');
    }

    public function positionuser()
    {
        return $this->belongsTo(position::class, 'position_id');
    }

    public function userinfor()
    {
        return $this->belongsTo(monkinfor::class, 'id');
    }
}
