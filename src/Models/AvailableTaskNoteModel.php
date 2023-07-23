<?php

namespace App\Models;

class AvailableTaskNoteModel extends Model
{
    /**
     * @var array
     */
    protected static array $safe = ['id', 'created_at', 'updated_at'];

    /**
     * @var string
     */
    private static string $entity = 'available_tasks_notes';

    /**
     * @param String $user_id
     * @param int $available
     * @param int $total
     *
     * @return NoteModel
     */
    public function bootstrap(String $user_id, int $available, int $total): AvailableTaskNoteModel
    {
        $this->user_id = $user_id;
        $this->available = $available;
        $this->total = $total;
        return $this;
    }

    /**
     * @param int $id
     * @param string $columns
     *
     * @return AvailableTaskNoteModel|null
     */
    public function load(int $id, string $columns = '*'): ?AvailableTaskNoteModel
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
     * @return AvailableTaskNoteModel|null
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

    public function findAvailableTasksByUserId(int $user_id)
    {
        $find = $this->read("SELECT available FROM ".self::$entity." WHERE user_id = :user_id", "user_id={$user_id}");

        if($this->fail() || !$find->rowCount())
        {
            return null;
        }

        return $find->fetchObject(__CLASS__);
    }

    /**
     * @return AvailableTaskNoteModel|null
     */
    public function save()
    {

        if(!$this->required())
        {
            return null;
        }

        // UPDATE NOTE
        if(!empty($this->id))
        {
            $availableTaskNoteModel = $this->id;

            $this->update(self::$entity, $this->safe(), "id=:id", "id={$availableTaskNoteModel}");

            if($this->fail())
            {
                return null;
            }
        }
        // CREATE NOTE
        else
        {
            $availableTaskNoteModel = $this->create("INSERT INTO ".self::$entity." (user_id,available,total) VALUES (:user_id,:available,:total)", $this->safe());
        }

        // $this->data = $this->read("SELECT * FROM ".self::$entity." WHERE id = :id", "id={$userId}")->fetchObject(__CLASS__);
        // return $this;
    }

    /**
     * @return bool
     */
    public function required(): bool
    {
        if(!$this->user_id || !$this->available || !$this->total)
        {
            return false;
        }

        return true;
    }
}