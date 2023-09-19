<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ivent extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'title',
        'ivent_overview',
        'photo',
        'user_id',
    ];
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
