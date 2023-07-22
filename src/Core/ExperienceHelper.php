<?php

namespace App\Core;

use App\Core\Session;
use App\Models\LevelSystemModel;

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
                return self::$midLevelExperience[array_rand(self::$midLevelExperience, 1)];
                break;

            case $actual_nv > 30:
                return self::$highLevelExperience[array_rand(self::$highLevelExperience, 1)];
                break;
        }
    }

    public static function setExperienceBar($actual_nv)
    {
        switch ($actual_nv)
        {
            case $actual_nv <= 10:
                return self::$lowLevelExperienceBar;
                break;

            case $actual_nv > 10 && $actual_nv < 50:
                return self::$midLevelExperienceBar;
                break;

            case $actual_nv > 50:
                return self::$highLevelExperienceBar;
                break;
        }
    }

    private static function fullExperienceBar($experienceBar, $experienceGauge)
    {
        return $experienceGauge >= $experienceBar ? true : false;
    }

    public static function upForNextLevel($experienceBar, $experienceGauge, LevelSystemModel $levelSystemUser, $experience)
    {
        if(self::fullExperienceBar($experienceBar, $experienceGauge))
        {
            $levelSystemUser->actual_level += 1;
            $levelSystemUser->experience_gauge = 0;

            $newExperienceBar = self::setExperienceBar($levelSystemUser->actual_level);

            $levelSystemUser->experience_bar = $newExperienceBar;
        }
        else
        {
            $levelSystemUser->experience_gauge += $experience;
        }

        $levelSystemUser->save();
    }
}