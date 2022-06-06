<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $fillable = ['nama'];
    protected $appends = ['status_label'];

    public function getStatusLabelAttribute()
    {
        if($this->id == 2){
            echo '<span class = "text-green-500">Diterima</span>';
        }

        else{
        	echo '<span class = "text-red-500">Belum Diterima</span>';
        }
       
    }
}
