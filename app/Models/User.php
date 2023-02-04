<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use \Storage;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public static function add($fields)
    {
        $user = new static;
        $user->fill($fields);
        $user->save();

        return $user;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function remove()
    {
        Storage::delete('uploads/' . $this->avatar);
        $this->delete();
    }

    public function makeAdmin()
    {
        $this->is_admin = 1;
    }

    public function uploadAvatar($image)
    {
        if ($image == null) {return;}

        Storage::delete('uploads/' . $this->avatar);

        $filename = rand(1, 99999999999) . '.' . $image->extension();
        $image->storeAs('uploads', $filename);
        $this->avatar = $filename;
        $this->save();
    }

    public function getAvatar()
    {
        if ($this->avatar == null) {
            return '/img/no-image.png';
        }

        return '/uploads/' . $this->avatar;
    }

    // public function makeAdmin()
    // {
    //     $this->user_id = 1;
    //     $this->save();
    // }

    public function makeReader()
    {
        $this->user_id = 0;
        $this->save();
    }

    public function generatePassword($password)
    {
        if ($password) {
            $this->password = bcrypt($password);
            $this->save();  
        }
    }

}
