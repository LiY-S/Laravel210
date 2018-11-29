<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    //
     //
     /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'shop_goods';

    protected $primaryKey = 'id';

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

	/**
     * 获得此商品的颜色。
     */
    public function color()
    {
        return $this->hasMany('App\Model\Admin\Color','goods_id');
    }

    /**
     * 获得此商品的展示图片。
     */
    public function photo()
    {
        return $this->hasMany('App\Model\Admin\Photo','goods_id');
    }

    /**
     * 获得此商品的详情图片。
     */
    public function repertory()
    {
        return $this->hasMany('App\Model\Admin\Repertory','goods_id');
    }
}
