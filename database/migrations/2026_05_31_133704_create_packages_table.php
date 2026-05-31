<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');                            // e.g. "Without Materials"
            $table->string('type')->default('hourly');         // hourly | weekly | monthly
            $table->decimal('price', 10, 2)->default(0);
            $table->string('unit_label')->nullable();          // e.g. "per hour", "per session / cleaner"
            $table->string('schedule_visits')->nullable();     // e.g. "3 visits per week"
            $table->string('schedule_hours')->nullable();      // e.g. "3 hours each visit"
            $table->json('features')->nullable();
            $table->string('badge_text')->nullable();          // e.g. "Popular", "Recommended"
            $table->boolean('is_highlighted')->default(false);
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->index(['type', 'is_active', 'sort_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
