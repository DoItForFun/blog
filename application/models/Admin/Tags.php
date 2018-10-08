<?php
/**
 * User: lizhe
 * Date: 2018/9/27
 * Time: 11:41
 */
use Illuminate\Database\Capsule\Manager as DB;
class Admin_TagsModel extends \Illuminate\Database\Eloquent\Model{
    const table = 'tags';
    public function getData($column,$operator,$option,$fields)
    {
        try{
            $info = DB::table(self::table)->where($column,$operator,$option)->get($fields)->map(function($value){
                return (array)$value;}
            )->toArray();
            return $info;
        }catch (Exception $e){
            echo $e->getMessage();
        }
    }

    public function insertData($data)
    {
        try{
            return DB::table(self::table)->insertGetId($data);
        }catch (Exception $e){
            echo $e->getMessage();
        }
    }
}