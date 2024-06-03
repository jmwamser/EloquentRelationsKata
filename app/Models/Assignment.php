<?php

namespace App\Models;

use App\Enum\AssignmentStatusEnum;
use App\Enum\FrequencyEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Assignment extends Model
{
    use HasFactory;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'status' => AssignmentStatusEnum::class,
        ];
    }

    public function chore(): HasOne
    {
        return $this->hasOne(Chore::class);
    }

    public function assignee(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function approver(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
