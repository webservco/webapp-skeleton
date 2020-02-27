<?php
namespace Project\Traits;

use WebServCo\Framework\Exceptions\ApplicationException;

trait ControllerDomainTrait
{
    abstract protected function config();
    abstract public function data($key, $defaultValue = false);
    abstract protected function request();
    abstract protected function setData($key, $value);

    protected function initDomain()
    {
        /* custom configuration settings */
        $this->config()->add(
            'app',
            $this->config()->load(
                'App',
                $this->data('path/project')
            )
        );

        $this->setData('location/current', $this->request()->getTarget());
    }
}
