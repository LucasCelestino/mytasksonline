<?php

namespace App\Core;

use App\Core\Session;

class ExperienceHelper
{
    private static int $lowLevelExperience = 100;
    private static array $midLevelExperience = [100, 200];
    private static array $highLevelExperience = [100, 200];

    private static int $lowLevelExperienceBar = 100;
    private static int $midLevelExperienceBar = 300;
    private static int $highLevelExperienceBar = 500;

    public static function setTaskReceivedExperience($actual_nv)
    {

        switch ($actual_nv)
        {
            case $actual_nv <= 10:
                return self::$lowLevelExperience;
                break;

            case $actual_nv > 10 && $actual_nv <= 30:
                return array_rand(self::$midLevelExperience, 1);
                break;

            case $actual_nv > 30:
                return array_rand(self::$highLevelExperience, 1);
                break;
        }
    }

    public static function setExperienceBar($actual_nv)
    {
        switch ($actual_nv)
        {
            case $actual_nv <= 10:
                self::$lowLevelExperienceBar;
                break;

            case $actual_nv > 10 && $actual_nv < 50:
                self::$midLevelExperienceBar;
                break;

            case $actual_nv > 50:
                self::$highLevelExperienceBar;
                break;
        }
    }
}