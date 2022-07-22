<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TugasAkhir extends Model
{
    use HasFactory;

    protected $table = 'tugas_akhir';

    protected $fillable = [
        'user_id',
        'judul',
        'slug',
        'abstrak',
        'cover',
        'file',
        'status',
    ];

    public function scopeFilter($query)
    {
        if (request('q')) {
            $query->whereHas('user', function ($query) {
                $query->where('name', 'like', '%' . request('q') . '%')
                    ->orWhere('NIM', 'like', '%' . request('q') . '%')
                    ->orWhere('email', 'like', '%' . request('q') . '%')
                    ->orWhere('jurusan', 'like', '%' . request('q') . '%');
            })->orWhere('judul', 'like', '%' . request('q') . '%')
                ->orWhere('abstrak', 'like', '%' . request('q') . '%');
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
