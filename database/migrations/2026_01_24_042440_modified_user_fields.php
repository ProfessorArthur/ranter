<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'username')) {
                $table->string('username', 30)->unique()->after('name');
            }

            if (!Schema::hasColumn('users', 'display_name')) {
                $table->string('display_name', 60)->nullable()->after('username');
            }

            if (!Schema::hasColumn('users', 'bio')) {
                $table->string('bio', 160)->nullable()->after('display_name');
            }

            if (!Schema::hasColumn('users', 'avatar_path')) {
                $table->string('avatar_path')->nullable()->after('bio');
            }

            if (!Schema::hasColumn('users', 'banner_path')) {
                $table->string('banner_path')->nullable()->after('avatar_path');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $columns = [];

            if (Schema::hasColumn('users', 'username')) {
                $columns[] = 'username';
            }

            if (Schema::hasColumn('users', 'display_name')) {
                $columns[] = 'display_name';
            }

            if (Schema::hasColumn('users', 'bio')) {
                $columns[] = 'bio';
            }

            if (Schema::hasColumn('users', 'avatar_path')) {
                $columns[] = 'avatar_path';
            }

            if (Schema::hasColumn('users', 'banner_path')) {
                $columns[] = 'banner_path';
            }

            if (count($columns)) {
                $table->dropColumn($columns);
            }
        });
    }
};
