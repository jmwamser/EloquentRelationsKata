<?php

use App\Enum\AssignmentStatusEnum;
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
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->integer('chore_id');
            $table->foreign('chore_id')->references('id')->on('chores');
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamp('assigned_at');
            $table->timestamp('completed_at')->nullable();
            $table->enum('status', array_map(fn(AssignmentStatusEnum $as) => $as->value,AssignmentStatusEnum::cases()))->default(AssignmentStatusEnum::TODO->value);
            $table->integer('confirmed_by')->nullable();
            $table->foreign('confirmed_by')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};
