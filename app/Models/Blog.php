<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'author_id', 'date', 'photo'];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    public function getUrl()
    {
        if ($this->photo) {
            return asset('storage/images/' . $this->photo);
        } else {
            return asset('default.png');
        }
    }
}
