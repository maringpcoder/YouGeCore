<?php
/**
 * Created by PhpStorm.
 * User: marin
 * Date: 2020/6/28
 * Time: 上午10:12
 */

namespace YouGeCore\Mongo\Eloquent;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use YouGeCore\Mongo\Query\Builder as QueryBuilder;


abstract class Model extends Eloquent
{
    /**
     * @inheritdoc
     */
    protected function newBaseQueryBuilder()
    {
        $connection = $this->getConnection();
        return new QueryBuilder($connection, $connection->getPostProcessor());
    }
}