<?php
namespace Project\Domain\DataTables;

final class Controller extends \Project\AbstractController
{
    public function __construct()
    {
        parent::__construct(__NAMESPACE__);

        $this->repository = new Repository($this->outputLoader);
    }

    public function database()
    {
        $this->init(__FUNCTION__);

        return $this->outputHtml($this->getData(), $this->getView(__FUNCTION__));
    }

    public function datatables($type)
    {
        $this->init(__FUNCTION__);

        $this->requirePostMethod();

        try {
            $request = \WebServCo\Framework\DataTables\RequestHelper::init(
                $this->request()->getData()
            ); // \WebServCo\Framework\DataTables\Request
            switch ($type) {
                case 'database':
                    $dataTables = new DataTablesDatabase($this->db());
                    break;
                case 'simple':
                default:
                    $dataTables = new DataTablesSimple();
                    break;
            }
            $response = $dataTables->getResponse($request); // \\WebServCo\Framework\DataTables\Response
        } catch (\InvalidArgumentException $e) {
            // log etc
            throw new \WebServCo\Framework\Exceptions\ApplicationException($e->getMessage());
        }

        return new \WebServCo\Framework\Json\Response($response);
    }

    public function details($id)
    {
        $this->init(__FUNCTION__);

        $this->setData('item', $this->repository->getitem($id));

        return $this->outputHtml($this->getData(), $this->getView(__FUNCTION__));
    }

    public function simple()
    {
        $this->init(__FUNCTION__);

        return $this->outputHtml($this->getData(), $this->getView(__FUNCTION__));
    }
}
