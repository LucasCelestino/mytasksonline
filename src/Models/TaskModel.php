<?php

namespace App\Models;

use PDO;

class TaskModel extends Model
{
    /**
     * @var array
     */
    protected static array $safe = ['id', 'created_at', 'updated_at'];

    /**
     * @var string
     */
    private static string $entity = 'tasks';

    /**
     * @param String $user_id
     * @param String $category_id
     * @param String $title
     * @param String $public
     * @param int $experience
     * @param int $status
     *
     * @return TaskModel
     */
    public function bootstrap(String $user_id, String $category_id, String $title, String $public, int $experience, int $status): TaskModel
    {
        $this->user_id = $user_id;
        $this->category_id = $category_id;
        $this->title = $title;
        $this->public = $public;
        $this->experience = $experience;
        $this->status = $status;
        return $this;
    }

    /**
     * @param int $id
     * @param string $columns
     *
     * @return TaskModel|null
     */
    public function load(int $id, string $columns = '*'): ?TaskModel
    {
        $load = $this->read("SELECT {$columns} FROM ".self::$entity." WHERE id = :id", "id={$id}");

        if($this->fail() || !$load->rowCount())
        {
            return null;
        }

        return $load->fetchObject(__CLASS__);
    }

    /**
     * @param int $email
     * @param string $columns
     *
     * @return TaskModel|null
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

    public function findByUserIdAndTaskId(int $user_id, int $id, string $columns = '*')
    {
        $find = $this->read("SELECT {$columns} FROM ".self::$entity." WHERE user_id = :user_id AND id = :id", "user_id={$user_id}&id={$id}");

        if($this->fail() || !$find->rowCount())
        {
            return null;
        }

        return $find->fetchObject(__CLASS__);
    }

    public function findByUserIdAndPublic(int $user_id, int $public, string $columns = '*')
    {
        $find = $this->read("SELECT {$columns} FROM ".self::$entity." WHERE user_id = :user_id AND public = :public ORDER BY id DESC LIMIT 3", "user_id={$user_id}&public={$public}");

        if($this->fail() || !$find->rowCount())
        {
            return null;
        }

        return $find->fetchAll(PDO::FETCH_CLASS);
    }

    /**
     * @param int $category_id
     * @param string $columns
     *
     * @return TaskModel|null
     */
    public function findByCategoryId(int $category_id, string $columns = '*')
    {
        $find = $this->read("SELECT {$columns} FROM ".self::$entity." WHERE category_id = :category_id", "category_id={$category_id}");

        if($this->fail() || !$find->rowCount())
        {
            return null;
        }

        return $find->fetchObject(__CLASS__);
    }

    public function findAllByUserId(int $user_id, string $columns = '*')
    {
        $find = $this->read("SELECT {$columns} FROM ".self::$entity." WHERE user_id = :user_id", "user_id={$user_id}");

        if($this->fail() || !$find->rowCount())
        {
            return null;
        }

        return $find->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findAllByUserIdAndStatus(int $user_id, int $status, string $columns = '*')
    {
        $find = $this->read("SELECT {$columns} FROM ".self::$entity." WHERE user_id = :user_id AND status = :status", "user_id={$user_id}&status={$status}");

        if($this->fail() || !$find->rowCount())
        {
            return null;
        }

        return $find->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param int $limit
     * @param int $offset
     * @param string $columns
     *
     * @return TaskModel|null
     */
    public function all(int $limit = 30, int $offset = 0, string $columns = '*'): ?TaskModel
    {
        $all = $this->read("SELECT {$columns} FROM ".self::$entity." LIMIT :limit OFFSET :offset", "limit={$limit}&offset={$offset}");

        if($this->fail() || !$all->rowCount())
        {
            return null;
        }

        return $all->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
    }

    /**
     * @return TaskModel|null
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
            $taskId = $this->id;

            $this->update(self::$entity, $this->safe(), "id=:id", "id={$taskId}");

            if($this->fail())
            {
                return null;
            }
        }
        // CREATE TASK
        else
        {
            $taskId = $this->create("INSERT INTO ".self::$entity." (user_id,category_id,title,public,experience,status) VALUES (:user_id,:category_id,:title,:public,:experience,:status)", $this->safe());
        }

        return $taskId;
    }

    /**
     * @return bool
     */
    public function destroy(): bool
    {
        $destroy = $this->delete(self::$entity, "id = :id", ['id'=>$this->id]);

        if($this->fail() || $destroy == null)
        {
            return null;
        }

        return true;
    }

    /**
     * @return bool
     */
    public function required(): bool
    {
        if(!$this->user_id || !$this->category_id || !$this->title || !$this->experience)
        {
            return false;
        }

        return true;
    }
}