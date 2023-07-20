<?php

namespace App\Models;

class UserModel extends Model
{
    /**
     * @var array
     */
    protected static array $safe = ['id', 'created_at', 'updated_at'];

    /**
     * @var string
     */
    private static string $entity = 'users';

    /**
     * @param String $name
     * @param String $email
     * @param String $password
     * @param String $slug
     * @param String $pictureUrl
     *
     * @return UserModel
     */
    public function bootstrap(String $name, String $email, String $password, String $slug, String $pictureUrl = null): UserModel
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->slug = $slug;
        $this->picture_url = $pictureUrl;
        return $this;
    }

    /**
     * @param int $id
     * @param string $columns
     *
     * @return UserModel|null
     */
    public function load(int $id, string $columns = '*'): ?UserModel
    {
        $load = $this->read("SELECT {$columns} FROM ".self::$entity." WHERE id = :id", "id={$id}");

        if($this->fail() || !$load->rowCount())
        {
            return null;
        }

        return $load->fetchObject(__CLASS__);
    }

    /**
     * @param string $email
     * @param string $columns
     *
     * @return UserModel|null
     */
    public function find(string $email, string $columns = '*')
    {
        $find = $this->read("SELECT {$columns} FROM ".self::$entity." WHERE email = :email", "email={$email}");

        if($this->fail() || !$find->rowCount())
        {
            return null;
        }

        return $find->fetchObject(__CLASS__);
    }

    /**
     * @param int $limit
     * @param int $offset
     * @param string $columns
     *
     * @return UserModel|null
     */
    public function all(int $limit = 30, int $offset = 0, string $columns = '*'): ?UserModel
    {
        $all = $this->read("SELECT {$columns} FROM ".self::$entity." LIMIT :limit OFFSET :offset", "limit={$limit}&offset={$offset}");

        if($this->fail() || !$all->rowCount())
        {
            return null;
        }

        return $all->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
    }

    /**
     * @return UserModel|null
     */
    public function save()
    {

        if(!$this->required())
        {
            return null;
        }

        // UPDATE USER
        if(!empty($this->id))
        {
            $userId = $this->id;

            $email = $this->read("SELECT id FROM ".self::$entity." WHERE email = :email AND id != :id", "email={$this->email}&id={$userId}");

            if($email->rowCount())
            {
                return null;
            }

            $this->update(self::$entity, $this->safe(), "id=:id", "id={$userId}");

            if($this->fail())
            {
                return null;
            }
        }
        // CREATE USER
        else
        {
            if($this->find($this->email))
            {
                return 1;
            }
            else
            {
                $userId = $this->create("INSERT INTO ".self::$entity." (name,email,password,picture_url,slug) VALUES (:name,:email,:password,:picture_url,:slug)", $this->safe());
            }
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
        if(!$this->name || !$this->email || !$this->password)
        {
            return false;
        }

        return true;
    }
}