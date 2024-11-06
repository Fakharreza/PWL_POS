<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Arr;
use App\Models\LevelModel;

use Illuminate\Foundation\Auth\User as Authenticatable;

class UserModel extends Authenticatable
{   
    use HasFactory;
    public function getJWTIdentifier(){
        return $this->getKey();
    }

    public function getJWTCustomClaims(){
        return [];
    }
    protected $table = 'm_user';
    protected $primaryKey = 'user_id';
    protected $fillable = ['level_id', 'username', 'nama', 'password', 'profile_pic'];

    protected $hidden = ['password'];

    protected $casts = ['password' => 'hashed'];
    public function stok(): BelongsTo{
        return $this->belongsTo(StokModel::class, 'stok_id', 'stok_id');
    }
    
    public function level(): BelongsTo{
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }
    
    public function getRoleName(): string
    {
        return $this->level->level_nama;
    }

    public function hasRole($role): bool
    {
        return $this->level->level_kode == $role;
    }
    
    public function getRole()
    {
        return $this->level->level_kode;
    } 
}