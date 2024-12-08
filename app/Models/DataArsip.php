<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class DataArsip extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_file',
        'uploaded_file',
        'status',
        'kategori_id',
        'file_type',
        'description',  
    ];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if (request()->hasFile('uploaded_file')) {
                $file = request()->file('uploaded_file');               
                $path = $file->store('arsip', 'public');
                $model->uploaded_file = $path;
            }
        });
    }
}