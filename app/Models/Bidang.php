<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    use HasFactory;

    protected $table = "bidang";
    protected $primarykey = "id";
    protected $fillable = ['id', 'bidang'];

    public function document()
    {
        return $this->hasMany(Bidang::class);
    }

}
