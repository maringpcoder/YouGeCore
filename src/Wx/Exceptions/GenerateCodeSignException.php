<?php
/**
 * Created by PhpStorm.
 * User: marin
 * Date: 2020/6/16
 * Time: 上午11:22
 */

namespace YouGeCore\Wx\Exceptions;


use Throwable;

class GenerateCodeSignException extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function errorMessage()
    {
        return $this->getMessage();
    }
}