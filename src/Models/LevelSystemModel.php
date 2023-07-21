<?php

namespace App\Models;

class LevelSystemModel extends Model
{
    /**
     * @var array
     */
    protected static array $safe = ['id', 'created_at', 'updated_at'];

    /**
     * @var string
     */
    private static string $entity = 'level_system';

    /**
     * @param int $user_id
     * @param int $actual_level
     * @param int $experience_bar
     * @param int $experience_gauge
     *
     * @return LevelSystemModel
     */
    public function bootstrap(int $user_id, int $actual_level, int $experience_bar, int $experience_gauge): LevelSystemModel
    {
        $this->user_id = $user_id;
        $this->actual_level = $actual_level;
        $this->experience_bar = $experience_bar;
        $this->experience_gauge = $experience_gauge;
        return $this;
    }

    /**
     * @param int $id
     * @param string $columns
     *
     * @return LevelSystemModel|null
     */
    public function load(int $id, string $columns = '*'): ?TaskStatusModel
    {
        $load = $this->read("SELECT {$columns} FROM ".self::$entity." WHERE id = :id", "id={$id}");

        if($this->fail() || !$load->rowCount())
        {
            return null;
        }

        return $load->fetchObject(__CLASS__);
    }

    /**
     * @param int $user_id
     * @param string $columns
     *
     * @return LevelSystemModel|null
     */
    public function findByUserId(int $user_id, string $columns = '*')
    {
        $find = $this->read("SELECT {$columns} FROM ".self::$entity." WHERE user_id = :user_id", "user_id={$user_id}");

        if($this->fail() || !$find->rowCount())
        {
            return null;
        }

        return $find->fetchObject(__CLASS__);
    }

    /**
     * @return LevelSystemModel|null
     */
    public function save()
    {

        if(!$this->required())
        {
            return null;
        }

        // UPDATE TASK
        if(!empty($this->id))
        {
            $levelSystemId = $this->id;

            $this->update(self::$entity, $this->safe(), "id=:id", "id={$levelSystemId}");

            if($this->fail())
            {
                return null;
            }
        }
        // CREATE TASK
        else
        {
            $levelSystemId = $this->create("INSERT INTO ".self::$entity." (user_id,actual_level,experience_bar,experience_gauge) VALUES (:user_id,:actual_level,:experience_bar,:experience_gauge)", $this->safe());
        }

        // $this->data = $this->read("SELECT * FROM ".self::$entity." WHERE id = :id", "id={$userId}")->fetchObject(__CLASS__);
        // return $this;
    }

    /**
     * @return bool
     */
    public function required(): bool
    {
        if(!$this->user_id)
        {
            return false;
        }

        return true;
    }
}