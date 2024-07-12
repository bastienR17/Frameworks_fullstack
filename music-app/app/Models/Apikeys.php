<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ApiKeys extends Model {
    protected $fillable = ['user_id', 'uuid', 'name', 'key'];

    public static function boot() {
        parent::boot();


        static::creating(function ($apiKey) {
            $apiKey->uuid = (string) Str::uuid();
            $apiKey->key = Str::random(40); // Generate a random string for the key
        });
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

}
