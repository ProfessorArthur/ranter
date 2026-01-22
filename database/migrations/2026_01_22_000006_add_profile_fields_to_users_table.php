<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->nullable()->unique()->after('name');
            $table->string('display_name')->nullable()->after('username');
            $table->string('avatar_path')->nullable()->after('remember_token');
            $table->string('banner_path')->nullable()->after('avatar_path');
            $table->text('bio')->nullable()->after('banner_path');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique(['username']);
            $table->dropColumn(['username', 'display_name', 'avatar_path', 'banner_path', 'bio']);
        });
    }
};
