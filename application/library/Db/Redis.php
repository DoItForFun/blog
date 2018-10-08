<?php
/**
 * User: lizhe
 * Date: 2018/9/27
 * Time: 10:28
 */
class Db_redis{
    private $redis;
    public function __construct(){
        $this->redis = new Redis();
        $host = \Yaf\Application::app()->getConfig()->toArray();
        $this->redis->connect($host['redis']['host'],$host['redis']['port']);
    }
    public function insertIntoRedis($key , $value)
    {
        $this->redis->set($key,$value);
    }
}