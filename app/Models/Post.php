<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Notifications\Notifiable;

class Post extends Model
{
    use HasFactory;
    use Sluggable;
    use Notifiable;
    
    protected $fillable = ['title', 'more', 'description', 'image_path', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sluggable(): array
    {
        return [
            'more' => [
                'source' => 'title'
            ]
        ];
    }
}
