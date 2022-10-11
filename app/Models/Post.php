<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'user_id',
        'category_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function getPaginateByLimit(int $limit_count=5)
    {
        return $this::with(['user', 'category'])->withCount('messages')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }

    public function getMessages()
    {
        return $this->messages()->with(['user'])->orderBy('created_at', 'ASC')->get();
    }
}
