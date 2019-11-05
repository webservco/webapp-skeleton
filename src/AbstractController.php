<?php
namespace Project;

abstract class AbstractController extends \WebServCo\Framework\AbstractController
{
    protected $repository;

    use \Project\Traits\ControllerDomainTrait;
    use \Project\Traits\ControllerI18nTrait;
    use \Project\Traits\ControllerMetaDomainTrait;
    use \Project\Traits\ControllerMetaTrait;
    use \Project\Traits\ControllerTrait;
    use \Project\Traits\ControllerViewTrait;

    use \Project\Traits\DatabaseTrait;

    public function __construct($namespace)
    {
        // no library code before calling the parent constructor
        $outputLoader = new OutputLoader($this->config()->get('app/path/project'));
        parent::__construct($outputLoader);

        $this->setupPaths();

        $this->session()->start($this->data('path/project') . 'var/sessions');

        $this->initViews($namespace);
        $this->initI18n();
    }
}
