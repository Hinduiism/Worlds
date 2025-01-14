<?php
/**
 * Worlds | defaults processing file
 */

namespace surva\worlds\types;

class Defaults extends World
{

    /**
     * Get value from config
     *
     * @param  string  $name
     *
     * @return mixed|null
     */
    public function getValue(string $name)
    {
        if (!$this->getConfig()->exists($name)) {
            return null;
        }

        return match ($this->getConfig()->get($name)) {
            "true" => true,
            "false" => false,
            default => $this->getConfig()->get($name),
        };
    }

    /**
     * Load value from config
     *
     * @param  string  $name
     *
     * @return mixed|null
     */
    public function loadValue(string $name)
    {
        if (!$this->getConfig()->exists($name)) {
            $this->$name = null;
            return null;
        }

        $val = match ($this->getConfig()->get($name)) {
            "true" => true,
            "false" => false,
            default => $this->getConfig()->get($name),
        };

        $this->$name = $val;
        return $val;
    }

}
