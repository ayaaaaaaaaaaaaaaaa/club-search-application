<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'comment',
        'user_id',
        'post_id',
        'ivent_id',
    ];
    
    /*
    public function getByLimit(int $limit_count = 10)
    {
        return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
    }
    */
    
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    
    public function ivent()
    {
        return $this->belongsTo(Ivent::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
