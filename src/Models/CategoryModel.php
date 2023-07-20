<?php

namespace App\Models;

use PDO;

class CategoryModel extends Model
{
    /**
     * @var array
     */
    protected static array $safe = ['id', 'created_at', 'updated_at'];

    /**
     * @var string
     */
    private static string $entity = 'categories';

    /**
     * @param String $title
     *
     * @return NoteModel
     */
    public function bootstrap(String $title): CategoryModel
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param int $id
     * @param string $columns
     *
     * @return NoteModel|null
     */
    public function load(int $id, string $columns = '*'): ?CategoryModel
    {
        $load = $this->read("SELECT {$columns} FROM ".self::$entity." WHERE id = :id", "id={$id}");

        if($this->fail() || !$load->rowCount())
        {
            return null;
        }

        return $load->fetchObject(__CLASS__);
    }

    /**
     * @return CategoryModel|null
     */
    public function findAll(string $columns = '*')
    {
        $find = $this->read("SELECT {$columns} FROM ".self::$entity);

        if($this->fail() || !$find->rowCount())
        {
            return null;
        }

        return $find->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * @return CategoryModel|null
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
            $categoryId = $this->id;

            $this->update(self::$entity, $this->safe(), "id=:id", "id={$categoryId}");

            if($this->fail())
            {
                return null;
            }
        }
        // CREATE NOTE
        else
        {
            $categoryId = $this->create("INSERT INTO ".self::$entity." (title) VALUES (:title)", $this->safe());
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
        if(!$this->title)
        {
            return false;
        }

        return true;
    }
}