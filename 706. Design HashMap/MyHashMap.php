
<?php

class MyHashMap
{
    private $map = [];

    /**
     */
    public function __construct()
    {
    }

    /**
     * @param Integer $key
     * @param Integer $value
     * @return NULL
     */
    public function put($key, $value)
    {
        $this->map[$key] = $value;
    }

    /**
     * @param Integer $key
     * @return Integer
     */
    public function get($key)
    {
        if (isset($this->map[$key])) {
            return $this->map[$key];
        }
        return -1;
    }

    /**
     * @param Integer $key
     * @return NULL
     */
    public function remove($key)
    {
        if (isset($this->map[$key])) {
            unset($this->map[$key]);
        }
    }
}

$obj = new MyHashMap();
$obj->put('foo', 'bar');
$ret_2 = $obj->get('foo');
$obj->remove('foo');
print_r($ret_2);
