<?php

use App\Enum\FrequencyEnum;
use App\Models\User;
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
        Schema::create('chores', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
//            $table->unsignedInteger('created_by');
            $table->foreignId('created_by')->constrained('users');
            $table->integer('reward_points');
            $table->enum('frequency', array_map(fn(FrequencyEnum $f) => $f->value,FrequencyEnum::cases()));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chores');
    }
};
