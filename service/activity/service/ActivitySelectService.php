<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 17-6-5
 * Time: 下午4:27
 */

namespace app\service\activity\service;


use app\service\activity\models\ActivityMod;

class ActivitySelectService
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
        $product = ActivityMod::find()->where(['id' => $input['id']])->one();
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
        $activitys = ActivityMod::find();
        if ($input['name']) {
            $activitys=$activitys->andWhere(['like', 'name', $input['name']]);
        }
        if ($input['id']) {
            $activitys=$activitys->andWhere(['id' => $input['id']]);
        }
        $activitys = $activitys->limit($input['length'])->offset($input['start']);
        $activitys = $activitys->orderBy($input['orderby'] . ' ' . $input['ordersort']);
        $activitys = $activitys->all();
        $activitysRes = [];
        foreach ($activitys as $tmp) {
            $activitysRes[] = $tmp->toArray();
        }
        unset($activitys);
        return $activitysRes;
    }

    public function selectCount($input)
    {
        $activitys = ActivityMod::find();
        if ($input['name']) {
            $activitys = $activitys->where(['like', 'name', $input['name']]);
        }
        if ($input['id']) {
            $activitys = $activitys->where(['id' => $input['id']]);
        }
        return $activitys->count();
    }
}