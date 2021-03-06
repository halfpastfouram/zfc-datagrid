<?php

namespace ZfcDatagrid\Column\Formatter;

use ZfcDatagrid\Column\AbstractColumn;

/**
 * Class AbstractFormatter
 *
 * @package ZfcDatagrid\Column\Formatter
 */
abstract class AbstractFormatter
{
    /**
     * @var array
     */
    private $data = [];

    /**
     * @var string
     */
    private $rendererName;

    /**
     * @var array
     */
    protected $validRenderers = [];

    /**
     * @param array $data
     *
     * @return $this
     */
    public function setRowData(array $data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return array
     */
    public function getRowData()
    {
        return $this->data;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setRendererName($name = null)
    {
        $this->rendererName = $name;

        return $this;
    }

    /**
     * @return string null
     */
    public function getRendererName()
    {
        return $this->rendererName;
    }

    /**
     * @param array $validRendrerers
     *
     * @return $this
     */
    public function setValidRendererNames(array $validRendrerers)
    {
        $this->validRenderers = $validRendrerers;

        return $this;
    }

    /**
     * @return array
     */
    public function getValidRendererNames()
    {
        return $this->validRenderers;
    }

    /**
     * @return bool
     */
    public function isApply()
    {
        if (in_array($this->getRendererName(), $this->validRenderers)) {
            return true;
        }

        return false;
    }

    /**
     * @param AbstractColumn $column
     *
     * @return string
     */
    public function format(AbstractColumn $column)
    {
        $data = $this->getRowData();
        if ($this->isApply() === true) {
            return $this->getFormattedValue($column);
        }

        return $data[$column->getUniqueId()];
    }

    /**
     * @param AbstractColumn $column
     *
     * @return string
     */
    abstract public function getFormattedValue(AbstractColumn $column);
}
