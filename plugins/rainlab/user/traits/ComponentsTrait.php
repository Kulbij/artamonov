<?php namespace RainLab\User\Traits;

trait ComponentsTrait
{
    protected $dir = 'components/';

    /**
     * @param $partial
     * @param array $data
     * @return mixed
     */
    public function renderTemplate($partial, $data = [])
    {
        return $this->renderPartial($this->dir . $partial, $data);
    }

    /**
     * @return mixed
     */
    public function onRender()
    {
        return $this->renderTemplate($this->property('partial'), $this->getData());
    }
}