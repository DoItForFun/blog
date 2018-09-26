<?php
/**
 * User: lizhe
 * Date: 2018/9/23
 * Time: 15:14
 */
use Illuminate\Database\Capsule\Manager as DB;
class Admin_UserModel extends \Illuminate\Database\Eloquent\Model{
    const table = 'users';
    static public function insertData($data)
    {
        try{
            return DB::table(self::table)->insertGetId($data);
        }catch (Exception $e){
            echo $e->getMessage();
        }
    }
    static public function getOneData($where,$fields)
    {
        try{
            $info = DB::table('users')->where($where)->take(1)->first($fields);
            return @get_object_vars($info);
        }catch (Exception $e){
            echo $e->getMessage();
        }
    }
}