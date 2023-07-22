<?php

namespace App\Models;

use App\Core\Connection;
use PDOException;
use PDOStatement;
use stdClass;

abstract class Model
{
    /**
     * @var stdClass
     */
    protected stdClass $data;

    /**
     * @var PDOException|null
     */
    protected ?PDOException $fail = null;
    /**
     * @var string
     */
    protected string $message;

    /**
     * @param string $name
     * @param mixed $value
     */
    public function __set(string $name, $value)
    {
        if(empty($this->data))
        {
            $this->data = new \stdClass();
        }

        $this->data->$name = $value;
    }

    /**
     * @param string $name
     *
     * @return string|null
     */
    public function __get(string $name): ?string
    {
        if(!empty($this->data->$name))
        {
            return $this->data->$name;
        }

        return null;
    }

    /**
     * @param mixed $name
     *
     * @return bool
     */
    public function __isset($name): bool
    {
        return isset($this->data->$name);
    }


    /**
     * @return PDOException|null
     */
    protected function fail(): ?PDOException
    {
        return $this->fail;
    }

    /**
     * @return stdClass
     */
    protected function data(): stdClass
    {
        return $this->data;
    }

    /**
     * @param String $message
     */
    protected function setMessage(String $message)
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param String $sql
     * @param Array $data
     *
     * @return int|null
     */
    protected function create(String $sql, Array $data): ?int
    {
        try
        {
            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->execute($this->filter($data));

            return Connection::getConnection()->lastInsertId();
        }
        catch(\PDOException $ex)
        {
            var_dump($ex->getMessage());exit;
            return null;
        }
    }

    /**
     * @param string $sql
     * @param null $params
     *
     * @return PDOStatement|null
     */
    protected function read(string $sql, $params = null): ?PDOStatement
    {
        try
        {
            $stmt = Connection::getConnection()->prepare($sql);

            if($params)
            {
                parse_str($params, $params);

                foreach ($params as $key => $value)
                {
                    $type = (is_numeric($value) ? \PDO::PARAM_INT : \PDO::PARAM_STR);
                    $stmt->bindValue(":{$key}", $value, $type);
                }
            }

            $stmt->execute();
            return $stmt;
        }
        catch (\PDOException $th)
        {
            $this->fail = $th;
            return null;
        }
    }

    /**
     * @param string $entity
     * @param array $data
     * @param string $terms
     * @param string $params
     *
     * @return int|null
     */
    protected function update(string $entity, array $data, string $terms, string $params): ?int
    {
        try
        {
            $dateSet = [];

            foreach ($data as $key => $value)
            {
                $dateSet[] = "{$key} = :{$key}";
            }

            $dateSet = implode(",", $dateSet);

            $stmt = Connection::getConnection()->prepare("UPDATE {$entity} SET {$dateSet} WHERE {$terms}");

            parse_str($params, $params);

            $stmt->execute($this->filter(array_merge($data, $params)));

            return $stmt->rowCount();
        }
        catch (\PDOException $ex)
        {
            $this->fail = $ex;
            return null;
        }
    }

    /**
     * @param String $entity
     * @param String $terms
     * @param Array $params
     *
     * @return int|null
     */
    protected function delete(String $entity, String $terms, Array $params): ?int
    {
        try
        {
            $stmt = Connection::getConnection()->prepare("DELETE FROM {$entity} WHERE {$terms}");

            $stmt->execute($this->filter($params));

            return $stmt->rowCount();
        }
        catch (\PDOException $ex)
        {
            $this->fail = $ex;
            return null;
        }
    }

    /**
     * @return array
     */
    protected function safe(): array
    {
        $safe = (array) $this->data;

        foreach (static::$safe as $unset)
        {
            unset($safe[$unset]);
        }

        return $safe;
    }

    /**
     * @param array $data
     *
     * @return array
     */
    protected function filter(array $data): array
    {
        $filter = [];

        foreach ($data as $key => $value)
        {
            $filter[$key] = (is_null($value) ? null : filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS));
        }

        return $filter;
    }
}