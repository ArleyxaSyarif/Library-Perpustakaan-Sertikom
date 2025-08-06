<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class books extends Model
{
    protected $fillable = [
    
        'judul',
        'penulis',
        'kategori',
        'tahun_terbit',
        'jumlah_stock',
        'status',
        'loan_status',
        'deskripsi'
        ];




        public function loans()
        {
            return $this->hasMany(pinjamBukus::class);
        }


      
    
}
