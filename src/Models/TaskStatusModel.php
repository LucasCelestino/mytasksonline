<?php

namespace App\Models;

use PDO;

class TaskStatusModel extends Model
{
    /**
     * @var array
     */
    protected static array $safe = ['id', 'created_at', 'updated_at'];

    /**
     * @var string
     */
    private static string $entity = 'tasks_status';

    /**
     * @param  $task_id
     * @param  $status
     *
     * @return TaskStatusModel
     */
    public function bootstrap($task_id, $user_id, $status): TaskStatusModel
    {
        $this->task_id = $task_id;
        $this->user_id = $user_id;
        $this->status = $status;
        return $this;
    }

    /**
     * @param int $id
     * @param string $columns
     *
     * @return TaskStatusModel|null
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
     * @param int $task_id
     * @param string $columns
     *
     * @return TaskStatusModel|null
     */
    public function findByTaskId(int $task_id, string $columns = '*')
    {
        $find = $this->read("SELECT {$columns} FROM ".self::$entity." WHERE task_id = :task_id", "task_id={$task_id}");

        if($this->fail() || !$find->rowCount())
        {
            return null;
        }

        return $find->fetchObject(__CLASS__);
    }

    public function findByUserId(int $user_id, string $columns = '*')
    {
        $find = $this->read("SELECT {$columns} FROM ".self::$entity." WHERE user_id = :user_id", "user_id={$user_id}");

        if($this->fail() || !$find->rowCount())
        {
            return null;
        }

        return $find->fetchObject(__CLASS__);
    }

    public function findByTaskStatus(int $user_id, int $status,string $columns = '*')
    {
        $find = $this->read("SELECT {$columns} FROM ".self::$entity." WHERE user_id = :user_id AND status = :status", "user_id={$user_id}&status={$status}");

        if($this->fail() || !$find->rowCount())
        {
            return null;
        }

        return $find->fetchAll(PDO::FETCH_CLASS);
    }

    /**
     * @return TaskStatusModel|null
     */
    public function save()
    {

        if(!$this->required())
        {
            return 'REQUIRED';
        }

        // UPDATE TASK
        if(!empty($this->id))
        {
            $taskStatusId = $this->id;

            $this->update(self::$entity, $this->safe(), "id=:id", "id={$taskStatusId}");

            if($this->fail())
            {
                return 'FAIL';
            }
        }
        // CREATE TASK
        else
        {
            $taskStatusId = $this->create("INSERT INTO ".self::$entity." (task_id,user_id,status) VALUES (:task_id,:user_id,:status)", $this->safe());
        }

        // $this->data = $this->read("SELECT * FROM ".self::$entity." WHERE id = :id", "id={$userId}")->fetchObject(__CLASS__);
    }

    /**
     * @return bool
     */
    public function required(): bool
    {
        if(!$this->task_id)
        {
            return false;
        }

        return true;
    }
}