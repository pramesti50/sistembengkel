<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Owner extends Authenticatable
{
    use HasFactory;
    protected $guarded = ['id', 'status'];
    protected $fillable = ['nama', 'email', 'telp','password', 'alamat'];

    public function service()
    {
        return $this->hasMany(Service::class);
    }
}
