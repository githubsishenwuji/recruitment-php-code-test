<?php

namespace App\Service;

use Illuminate\Support\Collection;

class ProductHandler
{

    /**
     * 计算商品总价
     * @param array $products
     * @return int
     */
    public static function getTotalPrice(array $products) : int
    {
        /*
        //方法1：使用原生array_reduce函数实现
        return array_reduce($products, function ($v1, $v2) {
            if (!isset($v2['price']))
                return $v1;

            return $v1 + $v2['price'];
        }, 0);
        */

        //方法二：使用collect实现
        return Collection::make($products)->map(function (array $item){
            return $item['price'];
        })->sum();
    }

    /**
     * 根据商品类型和价格倒序筛选商品
     * @param array $products
     * @return array
     */
    public static function getProductsByType(array $products, string $type = 'dessert', bool $isDesc = true) : array
    {
        return Collection::make($products)
            ->sortBy('price', SORT_NUMERIC, $isDesc)
            ->filter(function ($item) use ($type) {
                return strtolower($item['type']) === strtolower($type);
            })->toArray();
    }

    /**
     * 把创建日期转化成unix timestamp
     * @param array $products
     * @return array
     */
    public static function resetProductTime(array $products) : array
    {
        return Collection::make($products)->map(function ($item) {
            $item['create_at'] = strtotime($item['create_at']);
            return $item;
        })->toArray();
    }


}