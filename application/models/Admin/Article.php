<?php
/**
 * User: lizhe
 * Date: 2018/9/27
 * Time: 11:37
 */

use Illuminate\Database\Capsule\Manager as DB;

class Admin_ArticleModel extends \Illuminate\Database\Eloquent\Model
{
    const table = 'article';

    public function getOneData($where, $fields)
    {
        try {
            $info = DB::table(self::table)->where($where)->take(1)->first($fields);
            return @get_object_vars($info);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getDataList($offset = 0,$limit = 3,$order = 'id',$direction = 'desc')
    {
        try {
                $info = DB::table(self::table)->offset($offset)->limit($limit)->orderBy($order,$direction)->get()->map(function($value){return (array)$value;})->toArray();
            return $info;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function insertInfo($data)
    {
        try {
            return DB::table(self::table)->insertGetId($data);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}