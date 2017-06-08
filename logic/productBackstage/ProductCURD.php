<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 17-6-1
 * Time: 下午3:43
 */

namespace app\logic\productBackstage;


use app\service\product\service\ProductSelectService;
use app\service\product\service\ProductUpdateService;

class ProductCURD
{
    public function productSave($input){
        try{
            $productUpdateService=new ProductUpdateService();
            return $productUpdateService->update($input);
        }catch (\Exception $e){
            throw $e;
        }
    }

    /**
     * 选择一个商品
     * @param $input
     * @return array|null|\yii\db\ActiveRecord
     * @throws \Exception
     */
    public function productSelect($input){
        if(empty($input['id'])){
            return [
                'image'=>[]
            ];
        }
        try{
            $service=new ProductSelectService();
            return $service->selectOne($input);
        }catch (\Exception $e){
            throw $e;
        }
    }

    /**
     * 商品列表
     * @param $input
     * @return array
     */
    public function productSelectPage($input){
        if(!is_null($input['name'])){
            $input['name']=trim($input['name']);
        }
        if(!is_null($input['id'])){
            $input['id']=trim($input['id']);
        }
        if(!is_null($input['status'])){
            $input['status']=trim($input['status']);
        }
        $service=new ProductSelectService();
        $res['products']= $service->selectList($input);
        $res['count']=$service->selectCount($input);
        return $res;
    }

}