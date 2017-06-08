<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 17-6-2
 * Time: 下午3:35
 */

namespace app\service\product\service;


use app\service\product\models\ProductMod;

class ProductSelectService
{
    /**
     * 根据ID查商品
     * @param $input
     * @throws \Exception
     */
    public function selectOne($input)
    {
        if (empty($input['id'])) {
            throw new \Exception("商品ID为空");
        }
        $product = ProductMod::find()->where(['id' => $input['id']])->one();
        $res = $product->toArray();
        $res['image'] = json_decode($res['image'], 1);
        return $res;
    }

    public function selectList($input)
    {
        if (empty($input['start']) || !is_numeric($input['start'])) {
            $input['start'] = 0;
        }
        if (empty($input['length']) || !is_numeric($input['length'])) {
            $input['length'] = 10;
        }
        if (empty($input['orderby'])) {
            $input['orderby'] = 'id';
        }
        if (empty($input['ordersort'])) {
            $input['ordersort'] = 'asc';
        }
        $products = ProductMod::find();
        $wherecondition = [];
        if ($input['name']) {
            $products=$products->andWhere(['like', 'name', $input['name']]);
        }
        if ($input['id']) {
            $products=$products->andWhere(['id' => $input['id']]);
            $wherecondition[] = ['id' => $input['id']];
        }
        if ($input['status']) {
            $products=$products->andWhere(['status' => $input['status']]);
            $wherecondition[] = ['status' => $input['status']];
        }
        $products = $products->limit($input['length'])->offset($input['start']);
        $products = $products->orderBy($input['orderby'] . ' ' . $input['ordersort']);
        $products = $products->all();
        $productsRes = [];
        foreach ($products as $tmp) {
            $productsRes[] = $tmp->toArray();
        }
        unset($products);
        return $productsRes;
    }

    public function selectCount($input)
    {
        $products = ProductMod::find();
        if ($input['name']) {
            $products = $products->where(['like', 'name', $input['name']]);
        }
        if ($input['id']) {
            $products = $products->where(['id' => $input['id']]);
        }
        if (!is_null($input['status'])) {
            $products = $products->where(['status' => $input['status']]);
        }
        return $products->count();
    }
}