<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('api_keys', function (Blueprint $table) {
            $table->uuid('uuid')->after('id');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('key')->unique();
        });
    }

    public function down(): void {
        Schema::table('api_keys', function (Blueprint $table) {
            $table->dropColumn(['uuid', 'user_id', 'name', 'key']);
        });
    }
};
