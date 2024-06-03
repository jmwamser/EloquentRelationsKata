<?php

namespace App\Enum;

enum FrequencyEnum: string
{
    case ONETIME = 'onetime';
    case DAILY = 'daily';
    case WEEKLY = 'weekly';
    case MONTHLY = 'monthly';

    public static function selectOptions(): array
    {
        // option 1
//        // Initialize an empty array to hold the results
//        $enumValues = [];
//
//        // Loop through the enum cases
//        foreach (self::cases() as $case) {
//            // Set the array key to the enum value and the value to the case name
//            $enumValues[$case->value] = $case->name;
//        }

        // option 2
        return (collect(self::cases()))->mapWithKeys(function (FrequencyEnum $enum, $key) {
            return [$enum->value => $enum->name];
        })->toArray();
    }
}
