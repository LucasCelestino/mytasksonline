<?php

namespace App\Models;

class NoteModel extends Model
{
    /**
     * @var array
     */
    protected static array $safe = ['id', 'created_at', 'updated_at'];

    /**
     * @var string
     */
    private static string $entity = 'notes';

    /**
     * @param String $user_id
     * @param String $category_id
     * @param String $title
     * @param String $note_text
     * @param int $public
     *
     * @return NoteModel
     */
    public function bootstrap(String $user_id, String $category_id, String $title, String $note_text, String $public): NoteModel
    {
        $this->user_id = $user_id;
        $this->category_id = $category_id;
        $this->title = $title;
        $this->note_text = $note_text;
        $this->public = $public;
        return $this;
    }

    /**
     * @param int $id
     * @param string $columns
     *
     * @return NoteModel|null
     */
    public function load(int $id, string $columns = '*'): ?NoteModel
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
     * @return NoteModel|null
     */
    public function findAllByUserId(int $user_id, string $columns = '*')
    {
        $find = $this->read("SELECT {$columns} FROM ".self::$entity." WHERE user_id = :user_id", "user_id={$user_id}");

        if($this->fail() || !$find->rowCount())
        {
            return null;
        }

        return $find->fetchObject(__CLASS__);
    }

    /**
     * @param int $category_id
     * @param string $columns
     *
     * @return NoteModel|null
     */
    public function findAllByCategoryId(int $category_id, string $columns = '*')
    {
        $find = $this->read("SELECT {$columns} FROM ".self::$entity." WHERE category_id = :category_id", "category_id={$category_id}");

        if($this->fail() || !$find->rowCount())
        {
            return null;
        }

        return $find->fetchObject(__CLASS__);
    }

    /**
     * @return NoteModel|null
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
            $noteId = $this->id;

            $this->update(self::$entity, $this->safe(), "id=:id", "id={$noteId}");

            if($this->fail())
            {
                return null;
            }
        }
        // CREATE NOTE
        else
        {
            $taskId = $this->create("INSERT INTO ".self::$entity." (user_id,category_id,title,note_text,public) VALUES (:user_id,:category_id,:title,:note_text,:public)", $this->safe());
        }

        // $this->data = $this->read("SELECT * FROM ".self::$entity." WHERE id = :id", "id={$userId}")->fetchObject(__CLASS__);
        // return $this;
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
        if(!$this->user_id || !$this->category_id || !$this->title || !$this->note_text || !$this->public)
        {
            return false;
        }

        return true;
    }
}