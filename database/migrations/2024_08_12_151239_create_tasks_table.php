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
        // columns to "Task" table
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('task', 255);
            $table->longText('description');
            $table->char('status',1);
            $table->char('priority',1);
            $table->date('deadline')->nullable();
            $table->foreignId('user_session');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
