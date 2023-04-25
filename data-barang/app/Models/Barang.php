<?php

namespace App\Models;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['kategori'];

   
        /**
         * Get the user that owns the Barang
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function kategori()
        {
            return $this->belongsTo(Kategori::class);
        }
    
}
