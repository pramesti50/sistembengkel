<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'status'];

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function teknisi()
    {
        return $this->belongsTo(Teknisi::class);
    }
}
