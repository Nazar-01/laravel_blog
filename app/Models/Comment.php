<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    const IS_PUBLISHED = 1;
    const IS_HIDE = 0;

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function publish()
    {
        $this->status = Comment::IS_PUBLISHED;
        $this->save();
    }

    public function hide()
    {
        $this->status = Comment::IS_HIDE;
        $this->save();
    }

    public function toggleStatus()
    {
        if(!$this->status) {
            return $this->publish();
        }

        return $this->hide();
    }

    public function remove()
    {
        $this->delete();
    }
}
