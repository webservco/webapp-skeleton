<?php
namespace Project\Domain\App;

final class AppCommand extends \Project\AbstractController
{
    public function __construct()
    {
        parent::__construct(__NAMESPACE__);

        $this->repository = new AppRepository($this->outputLoader);
    }
}
