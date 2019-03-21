<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Novel extends Model
{

    //链接数据表
    protected $table = "novel";

    /**
     * @desc 获取列表
     * @return mixed
     */
    public function getLists()
    {

        return self::select('novel.id','c_name','author_name','c_id','a_id','name','image_url','status')
                   ->join('category','novel.c_id','=','category.id')//  连接分类表
                   ->join('author','novel.a_id','=','author.id')
                   ->orderBy('novel.id','desc')
                   ->paginate(2);
    }


    /**
     * @desc 小说添加
     * @param $data
     * @return bool
     */
    public function addRecord($data)
    {
        return self::insert($data);
    }

    /**
     * @desc 小说删除
     * @param $id
     */
    public function delRecord($id)
    {
        return self::where('id',$id)->delete();
    }


    /**
     * @desc 获取小说详情
     * @param $id
     */
    public function getNovelInfo($id)
    {
        return self::where('id',$id)->first();
    }


    /**
     * @desc 小说编辑
     * @param $id
     */
    public function editRecord($data, $id)
    {
        return self::where('id',$id)->update($data);
    }


}
