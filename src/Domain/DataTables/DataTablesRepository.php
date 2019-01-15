<?php
namespace Project\Domain\DataTables;

final class DataTablesRepository extends \Project\AbstractRepository
{
    public function getItem($id)
    {
        return $this->db()->getRow(
            "SELECT id, name, value FROM ws_test_data WHERE id  = ? LIMIT 1",
            [$id]
        );
    }
}
