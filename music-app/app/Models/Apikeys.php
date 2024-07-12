<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ApiKey extends Model {
    protected $fillable = ['user_id', 'uuid', 'name', 'key'];

    public static function boot() {
        parent::boot();

        // Generate UUID and random key before creating the ApiKey
        static::creating(function ($apiKey) {
            $apiKey->uuid = (string) Str::uuid();
            $apiKey->key = Str::random(40); // Generate a random string for the key
        });
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
