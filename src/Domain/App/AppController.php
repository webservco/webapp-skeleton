<?php
namespace Project\Domain\App;

final class AppController extends \Project\AbstractController
{
    public function __construct()
    {
        parent::__construct(__NAMESPACE__);

        $this->repository = new AppRepository($this->outputLoader);
    }

    public function home()
    {
        $this->init(__FUNCTION__);

        return $this->outputHtml($this->getData(), $this->getView(__FUNCTION__));
    }
}
