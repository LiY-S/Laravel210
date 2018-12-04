<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //
     /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'shop_user';

    protected $primaryKey = 'uid';

    function index()
    {
        return $this->get();
    }

    /**
     * 该模型是否被自动维护时间戳
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * 不可被批量赋值的属性。
     *
     * @var array
     */
    protected $guarded = [];
}
