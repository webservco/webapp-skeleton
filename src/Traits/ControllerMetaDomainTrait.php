<?php
namespace Project\Traits;

trait ControllerMetaDomainTrait
{
    protected function getMeta($action)
    {
        switch ($action) {
            default:
                return $this->getDefaultMeta();
        }
    }

    protected function getDefaultMeta()
    {
        return [
            'title' => 'App',
            'description' => __('Application description'),
        ];
    }
}
