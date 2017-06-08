<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 17-6-1
 * Time: 下午3:26
 */

namespace app\service\product\service;


use app\service\product\models\ProductMod;

class ProductUpdateService
{
    public function update($input)
    {
        if (empty($input['name']) || empty($input['image'])||empty($input['main_image']) || empty($input['price']) || empty($input['status'])) {
            throw new \Exception("缺少参数");
        }
        if (!is_numeric($input['price'])) {
            throw new \Exception("价格不正确");
        }
        if(is_array($input['image'])){
            $input['image']=json_encode($input['image']);
        }
        if(empty($input['id'])){
            $input['id']=0;
        }
        if(empty($input['store'])){
            $input['store']=0;
        }
        $product=ProductMod::find()->where(['id'=>$input['id']])->one();
        if($product==null){
            $product=new ProductMod();
        }
        $product->name=$input['name'];
        $product->image=$input['image'];
        $product->main_image=$input['main_image'];
        $product->price=$input['price'];
        $product->status=$input['status'];
        $product->store=$input['store'];
        $product->short_description=$input['short_description'];
        if($product->isNewRecord){
            $product->create_date=time();
        }
        $product->update_date=time();
        $product->save();
        return $product->toArray();
    }
}