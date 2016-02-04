<?php

class Input
{
    /**
     * Check if a given value was passed in the request
     *
     * @param string $key index to look for in request
     * @return boolean whether value exists in $_POST or $_GET
     */
    public static function has($key)
    {
        // TODO: Fill in this function
        $answer = (isset($_REQUEST[$key]) ? 'true' : 'false');
        return $answer;
    }

    /**
     * Get a requested value from either $_POST or $_GET
     *
     * @param string $key index to look for in index
     * @param mixed $default default value to return if key not found
     * @return mixed value passed in request
     */
    public static function get($key, $default = null)
    {
        // TODO: Fill in this function
        $answer = (isset($_REQUEST[$key]) ? $_REQUEST[$key] : $default);
        return $answer;
    }

    public static function getString($key) {
        $string = (static::has($key) ? static::get($key) : "");
        if (is_null($string)) {
          throw new Exception("{$key} does not exist", 1);
        }
        if (is_string($string)) {
          return $string;
        } else {
          throw new Exception("{$string} is not a string", 1);
        }
    }

    public static function getNumber($key) {
      $num = (static::has($key) ? static::get($key) : "");
      if (is_null($num)) {
        throw new Exception("{$key} does not exist", 1);
      }
      if (is_numeric($num)) {
        return (float)$num;
      } else {
        throw new Exception("{$num} is not a number", 1);
      }

    }

    public static function getDate($key) {
      $date = (static::has($key) ? static::get($key) : "");
      if (is_null($date)) {
        throw new Exception("{$key} does not exist", 1);
      }
      if ((bool)strtotime($date)) {
        $dt = new DateTime($date);
        return $dt;
      } else {
        throw new Exception("{$date} is not a date.", 1);
      }
    }

    ///////////////////////////////////////////////////////////////////////////
    //                      DO NOT EDIT ANYTHING BELOW!!                     //
    // The Input class should not ever be instantiated, so we prevent the    //
    // constructor method from being called. We will be covering private     //
    // later in the curriculum.                                              //
    ///////////////////////////////////////////////////////////////////////////
    private function __construct() {}
}
