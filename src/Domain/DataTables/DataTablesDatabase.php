<?php
namespace Project\Domain\DataTables;

use WebServCo\Framework\DataTables\ColumnArrayObject;

class DataTablesDatabase extends \WebServCo\Framework\DataTables\AbstractDataTablesDatabase
{
    /* override */
    public function getData(
        ColumnArrayObject $columnArrayObject,
        \PDOStatement $pdoStatement
    ) {
        $data = [];
        while ($row = $pdoStatement->fetch(\PDO::FETCH_ASSOC)) {
            $item = [
                'DT_RowId' => $row['id'],
            ];
            foreach ($columnArrayObject as $column) {
                $name = $column->getData();
                $item[$name] = isset($row[$name]) ? $row[$name] : null;
            }
            $data[] = $item;
        }
        return $data;
    }

    /* abstract */
    protected function getQuery($searchQueryPart, $orderQueryPart, $limitQueryPart)
    {
        return sprintf(
            "SELECT SQL_CALC_FOUND_ROWS id, name, value FROM ws_test_data WHERE 1
            %s
            %s
            %s",
            $searchQueryPart,
            $orderQueryPart,
            $limitQueryPart
        );
    }

    /* abstract */
    protected function getRecordsTotalQuery()
    {
        return "SELECT COUNT(*) FROM ws_test_data WHERE 1";
    }

    /* override */
    protected function getSearchQueryPart(ColumnArrayObject $columnArrayObject)
    {
        $query = null;
        $params = [];
        foreach ($columnArrayObject as $column) {
            if ($column->getSearchable()) {
                $search = $column->getSearch();
                $searchValue = $search->getValue();
                if (!empty($searchValue)) {
                    $columnData = $column->getData();
                    switch ($columnData) {
                        case 'id':
                            $query .= sprintf(
                                " AND %s = ?",
                                $this->getDatabaseColumnName($columnData)
                            );
                            $params[] = $searchValue;
                            break;
                        case 'value':
                            $query .= sprintf(
                                " AND %s LIKE ?",
                                $this->getDatabaseColumnName($columnData)
                            );
                            $params[] = sprintf('%s%%', $searchValue);
                            break;
                        default:
                            $query .= sprintf(
                                " AND %s LIKE ?",
                                $this->getDatabaseColumnName($columnData)
                            );
                            $params[] = sprintf('%%%s%%', $searchValue);
                            break;
                    }
                }
            }
        }
        return [$query, $params];
    }
}
