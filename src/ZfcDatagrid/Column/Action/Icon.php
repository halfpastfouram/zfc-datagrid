<?php

namespace ZfcDatagrid\Column\Action;

/**
 * Class Icon
 *
 * @package ZfcDatagrid\Column\Action
 */
class Icon extends AbstractAction
{
    /**
     * @var string
     */
    protected $iconClass;

    /**
     * @var string
     */
    protected $iconLink;

    /**
     * Set the icon class (CSS)
     * - used for HTML if provided, overwise the iconLink is used.
     *
     * @param string $name
     *
     * @return $this
     */
    public function setIconClass($name)
    {
        $this->iconClass = (string) $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getIconClass()
    {
        return $this->iconClass;
    }

    /**
     * @return bool
     */
    public function hasIconClass()
    {
        if ($this->getIconClass() != '') {
            return true;
        }

        return false;
    }

    /**
     * Set the icon link (is used, if no icon class is provided).
     *
     * @param string $httpLink
     *
     * @return $this
     */
    public function setIconLink($httpLink)
    {
        $this->iconLink = (string) $httpLink;

        return $this;
    }

    /**
     * Get the icon link.
     *
     * @return string
     */
    public function getIconLink()
    {
        return $this->iconLink;
    }

    /**
     * @return bool
     */
    public function hasIconLink()
    {
        if ($this->getIconLink() != '') {
            return true;
        }

        return false;
    }

    /**
     * @return string
     */
    protected function getHtmlType()
    {
        if ($this->hasIconClass() === true) {
            // a css class is provided, so use it
            return '<i class="'.$this->getIconClass().'"></i>';
        } elseif ($this->hasIconLink() === true) {
            // no css class -> use the icon link instead
            return '<img src="'.$this->getIconLink().'" />';
        }

        throw new \InvalidArgumentException('Either a link or a class for the icon is required');
    }
}
