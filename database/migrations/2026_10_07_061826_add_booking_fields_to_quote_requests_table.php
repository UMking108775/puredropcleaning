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
        Schema::table('quote_requests', function (Blueprint $table) {
            $table->string('area')->nullable()->after('phone');
            $table->string('property_type')->nullable()->after('area');
            $table->string('bedrooms')->nullable()->after('property_type');
            $table->string('preferred_date')->nullable()->after('bedrooms');
            $table->string('preferred_time')->nullable()->after('preferred_date');
            $table->string('materials')->nullable()->after('preferred_time');
            $table->string('attachment_path')->nullable()->after('materials');
            $table->text('notes')->nullable()->after('attachment_path');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('quote_requests', function (Blueprint $table) {
            $table->dropColumn([
                'area',
                'property_type',
                'bedrooms',
                'preferred_date',
                'preferred_time',
                'materials',
                'attachment_path',
                'notes',
            ]);
        });
    }
};
