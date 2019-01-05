<?php
namespace Project\Traits;

trait DatabaseTrait
{
    final protected function db()
    {
        return $this->mysqlPdoDb();
    }
}
