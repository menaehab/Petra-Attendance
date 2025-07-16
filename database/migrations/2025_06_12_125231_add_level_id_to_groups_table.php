<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasColumn('groups', 'level_id')) {
            Schema::table('groups', function (Blueprint $table) {
                $table->unsignedBigInteger('level_id')->after('name')->nullable();
            });

            $defaultLevelId = DB::table('levels')->value('id');

            if ($defaultLevelId) {
                DB::table('groups')->whereNull('level_id')->update(['level_id' => $defaultLevelId]);
            }

            Schema::table('groups', function (Blueprint $table) {
                $table->unsignedBigInteger('level_id')->nullable(false)->change();
                $table->foreign('level_id')->references('id')->on('levels')->cascadeOnDelete();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('groups', function (Blueprint $table) {
            $table->dropForeign(['level_id']);
            $table->dropColumn('level_id');
        });
    }
};
