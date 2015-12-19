<?php
class ArrayOptionNoSuchElementException extends \ErrorException {}
class ArrayOption
{
    private $v;

    public function __construct($v)
    {
        $this->v = $v;
    }

    public function __get($name)
    {
        if (is_array($this->v)) {
            $v = array_key_exists($name, $this->v) ? $this->v[$name] : null;
        }
        else {
            $v = $this->v;
        }
        return new self($v);
    }

    public function get()
    {
        if (is_null($this->v)) {
            throw new ArrayOptionNoSuchElementException();
        }
        return $this->v;
    }

    public function getOrElse($default)
    {
        if (is_null($this->v)) {
            return $default;
        }
        return $this->v;
    }

    public function isEmpty()
    {
        return is_null($this->v);
    }

    public function isDefined()
    {
        return ! is_null($this->v);
    }

    public function orNull()
    {
        return $this->v;
    }
}
