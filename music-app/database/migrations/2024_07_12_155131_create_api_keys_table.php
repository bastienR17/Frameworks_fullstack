<?php

namespace App\Models;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('api_keys', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->char('uuid', 36);
            $table->string('name');
            $table->string('key', 40);
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('api_keys');
    }
};
