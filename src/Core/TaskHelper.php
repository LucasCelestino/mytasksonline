<?php

namespace App\Core;

use App\Core\Session;
use App\Models\AvailableTaskNoteModel;
use App\Models\LevelSystemModel;

class TaskHelper
{
    private static array $upgradeLevels = [
        5,
        10,
        15,
        20,
        25,
        30,
        35,
        40,
        45,
        50
    ];

    public static function upgradeAvailableTasks(AvailableTaskNoteModel $availableTaskNoteModel, LevelSystemModel $levelSystemModel)
    {
        for ($i=0; $i < count(self::$upgradeLevels); $i++)
        {
            if($levelSystemModel->actual_level == self::$upgradeLevels[$i])
            {
                $availableTaskNoteModel->available += 2;

                $availableTaskNoteModel->total += 2;

                $availableTaskNoteModel->save();
            }
        }
    }
}