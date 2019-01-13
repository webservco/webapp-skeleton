<?php
namespace Project\Domain\DataTables;

class DataTablesSimple extends \WebServCo\Framework\DataTables\AbstractDataTables
{
    protected $data;

    public function __construct()
    {
        for ($i = 1; $i<= 10000; $i++) {
            $this->data[] = [
                'id' => $i,
                'name' => sprintf('Name %s', $i),
                'value' => sprintf('Value %s', $i),
            ];
        }
    }

    protected function getData(\WebServCo\Framework\DataTables\Request $request)
    {
        $data = $this->data;

        /* @TODO: implement search, filter */

        $length = $request->getLength();
        if (-1 != $length) {
            $data = array_slice($data, $request->getStart(), $length);
        }

        return $data;
    }

    protected function getRecordsFiltered()
    {
        return count($this->data);
    }

    protected function getRecordsTotal()
    {
        return count($this->data);
    }
}
