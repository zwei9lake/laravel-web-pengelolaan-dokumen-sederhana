<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'kode', 'namadoc', 'dokumen', 'keterangan','status_id','bidang_id'];
    protected $dates = ['created_at', 'updated_at'];

    protected $appends = ['status_label'];

    public function bidang()
    {
        return $this->belongsTo(Bidang::class);
    }

    public function getStatusLabelAttribute()
    {
        if($this->status_id == 2){
            return'Diterima';
        }

        else{
        	return'Belum Diterima';
        }

    }
}
