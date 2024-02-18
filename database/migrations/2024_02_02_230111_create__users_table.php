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
        Schema::create('_users', function (Blueprint $table) {
            $table->id();
            $table->string('fullName',50);
            $table->string('userName',15);
            $table->string('email',50);
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('active');
            $table->string('password');
            $table->string('verification_token', 60)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_users');
    }
};
