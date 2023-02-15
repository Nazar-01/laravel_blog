<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Category;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    const IS_FEATURED = 1;
    const IS_STANDART = 0;

    const IS_DRAFT = 1;
    const IS_PUBLIC = 0;

    protected $fillable = ['title', 'content', 'date', 'description'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function add($fields)
    {
        $post = new static;
        $post->fill($fields);
        $post->user_id = \Auth::user()->id;
        $post->save();

        return $post;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function remove()
    {
        $this->removeImage();
        $this->delete();
    }

    public function uploadImage($image)
    {
        if ($image == null) {return;}
        $this->removeImage();
        $filename = rand(1, 99999999999) . '.' . $image->extension();
        $image->storeAs('uploads', $filename);
        $this->image = $filename;
        $this->save();
    }

    public function setCategory($id)
    {
        if ($id == null) {return;}

        $this->category_id = $id;
        $this->save();
    }

    public function setTags($ids)
    {
        if ($ids == null) {return;}

        $this->tags()->sync($ids);
    }

    public function setDraft()
    {
        $this->status = Post::IS_DRAFT;
        $this->save();
    }

    public function setPublic()
    {
        $this->status = Post::IS_PUBLIC;
        $this->save();
    }

    public function toggleStatus($value)
    {
        if ($value) {    
            return $this->setDraft();
        }

        return $this->setPublic();

    }

    public function setFeatured()
    {
        $this->is_featured = Post::IS_FEATURED;
        $this->save();
    }

    public function setStandart()
    {
        $this->is_featured = Post::IS_STANDART;
        $this->save();
    }

    public function toggleFeatured($value)
    {
        if($value) {
            return $this->setFeatured();
        }
        
        return $this->setStandart();
    }

    public function getImage()
    {
        if ($this->image == null) {
            return '/img/no-image.png';
        }

        return '/uploads/' . $this->image;
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value;
    }

    public function removeImage()
    {
        if($this->image) {
            Storage::delete('uploads/' . $this->image);
        }
    }

    public function getCategoryTitle()
    {
        if($this->category) {
            return $this->category->title;
        }

        return 'Нет категории';
    }

    public function getTagsTitles()
    {
        $array_titles = $this->tags->pluck('title')->all();
        if($array_titles) {
            return implode(', ', $array_titles);
        }
        
        return 'Нет тегов';
    }

    public function getDateAttribute($value)
    {
        $date = Carbon::createFromFormat('Y-m-d', $value)->format('d/m/y');
        return $date;
    }

    public function getCategoryId()
    {
        if($this->category) {
            return $this->category->id;
        }
    }

    public function getDate()
    {
        return Carbon::createFromFormat('d/m/y', $this->date)->format('F d, y');
    }

    public function hasPrevious()
    {
        return self::where('id', '<', $this->id)->max('id');
    }

    public function getPrevious()
    {
        $post_id = $this->hasPrevious();
        return self::find($post_id);
    }

    public function hasNext()
    {
        return self::where('id', '>', $this->id)->min('id');   
    }

    public function getNext()
    {
        $post_id = $this->hasNext();
        return self::find($post_id);
    }

    public function related()
    {
        return self::all()->except($this->id);
    }

    public static function getPopularPosts()
    {
        return self::orderBy('views', 'desc')->take(3)->get();
    }

    public static function getFeaturedPosts()
    {
        return self::where('is_featured', 1)->take(3)->get();
    }

    public static function getRecentPosts()
    {
        return self::orderBy('date', 'desc')->take(4)->get();
    }

    public function getComments()
    {
        return $this->comments->where('status', 1);
    }
}
