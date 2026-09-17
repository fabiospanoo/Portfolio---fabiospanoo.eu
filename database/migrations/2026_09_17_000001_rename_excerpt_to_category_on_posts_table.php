<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Rename the posts.excerpt column to posts.category, keeping existing
     * values. Raw statements are used because doctrine/dbal is not installed
     * (required by renameColumn on MySQL).
     */
    public function up(): void
    {
        if (Schema::getConnection()->getDriverName() === 'sqlite') {
            DB::statement('ALTER TABLE posts RENAME COLUMN excerpt TO category');
        } else {
            DB::statement('ALTER TABLE posts CHANGE excerpt category VARCHAR(255) NULL');
        }
    }

    public function down(): void
    {
        if (Schema::getConnection()->getDriverName() === 'sqlite') {
            DB::statement('ALTER TABLE posts RENAME COLUMN category TO excerpt');
        } else {
            DB::statement('ALTER TABLE posts CHANGE category excerpt VARCHAR(255) NULL');
        }
    }
};
