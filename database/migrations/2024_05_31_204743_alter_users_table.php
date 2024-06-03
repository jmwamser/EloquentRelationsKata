<?php

use App\Enum\UserRoleEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\ColumnDefinition;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table
                ->enum('role',array_map(fn(UserRoleEnum $ur) => $ur->value,UserRoleEnum::cases()))
                ->default(UserRoleEnum::PARENT)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table
                ->enum('role',array_map(fn(UserRoleEnum $ur) => $ur->value,UserRoleEnum::cases()))
                ->default(null);
        });
    }
};
