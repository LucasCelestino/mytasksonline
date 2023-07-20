<?php

namespace App\Models;

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
     * @param int $task_id
     * @param int $status
     *
     * @return TaskStatusModel
     */
    public function bootstrap(int $task_id, int $status): TaskStatusModel
    {
        $this->task_id = $task_id;
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

    /**
     * @return TaskStatusModel|null
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
            $taskStatusId = $this->id;

            $this->update(self::$entity, $this->safe(), "id=:id", "id={$taskStatusId}");

            if($this->fail())
            {
                return null;
            }
        }
        // CREATE TASK
        else
        {
            $taskStatusId = $this->create("INSERT INTO ".self::$entity." (task_id,status) VALUES (:task_id,:status)", $this->safe());
        }

        // $this->data = $this->read("SELECT * FROM ".self::$entity." WHERE id = :id", "id={$userId}")->fetchObject(__CLASS__);
        // return $this;
    }

    /**
     * @return bool
     */
    public function required(): bool
    {
        if(!$this->task_id || !$this->status)
        {
            return false;
        }

        return true;
    }
}