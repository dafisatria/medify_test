<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KategoriItems extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'kode',
        'nama'
    ];

    public function masterItems()
    {
        return $this->belongsToMany(MasterItem::class);
    }
}
