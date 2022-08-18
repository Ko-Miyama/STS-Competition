<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submit extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_path',
        'manner',
        'comment',
        'score',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getSelectedPaginateByLimit(int $id, int $limit_count = 5)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this::with('user')->where('user_id', $id)->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }

    public function getOrderedByScore()
    {
        return $this::with('user')->orderBy('score', 'DESC')->get();
    }
}
