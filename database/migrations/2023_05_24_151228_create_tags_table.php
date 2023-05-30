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
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->timestamp('create_datetime')->nullable()->comment('Thời gian tạo tag');
            $table->string('create_user', 256)->nullable()->comment('Người tạo tag');
            $table->timestamp('update_datetime')->nullable()->comment('Thời gian update tag');
            $table->string('update_user', 256)->nullable()->comment('Người update tag');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
    }
};
