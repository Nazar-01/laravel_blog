<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = ['email'];

    public static function add($email)
    {

        $sub = new static;
        $sub->email = $email;
        $sub->save();

        return $sub;
    }

    public function remove()
    {
        $this->delete();
    }

    public function generateToken($length = 64) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        
        $this->token = $randomString;
        $this->save();
    }
}
