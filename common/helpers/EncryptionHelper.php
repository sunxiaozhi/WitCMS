<?php
/**
 * 参数加密、解密
 * User: sunxiaozhi
 * Date: 2018/11/22 10:12
 */

namespace common\helpers;

use yii\web\UnprocessableEntityHttpException;

class EncryptionHelper
{
    /**
     * 创建参数(包括签名的处理)
     * @param $params
     * @param $appSecret
     * @param string $signName
     * @return bool|string
     */
    public static function createUrlParams($params, $appSecret, $signName = 'sign')
    {
        $paramsStr = "";
        ksort($params);
        foreach ($params as $key => $val) {
            if ($key != '' && $val != '') {
                $paramsStr .= $key . '=' . urlencode($val) . '&';
            }
        }

        // 去掉最后一个&
        $paramsStr = substr($paramsStr, 0, strlen($paramsStr) - 1);

        $signStr = $paramsStr . $appSecret;// 排好序的参数加上secret,进行md5
        $sign = strtolower(md5($signStr));

        $paramsStr .= '&';
        $paramsStr .= $signName . '=' . $sign;// 将md5后的值作为参数,便于服务器的效验

        return $paramsStr;
    }

    /**
     * 解密url
     * @param $params
     * @param $appSecret
     * @param string $signName
     * @return bool
     * @throws UnprocessableEntityHttpException
     */
    public static function decodeUrlParams($params, $appSecret, $signName = 'sign')
    {
        // 验证sign
        if (!isset($params[$signName])) {
            throw new UnprocessableEntityHttpException('校验sign缺失');
        }

        $sign = $params[$signName];
        unset($params[$signName]);

        ksort($params);
        $signStr = '';
        foreach ($params as $key => $val) {
            $signStr .= $key . '=' . urlencode($val) . '&';
        }

        // 去掉最后一个&
        $signStr = substr($signStr, 0, strlen($signStr) - 1);

        // 排好序的参数加上secret,进行md5
        $signStr .= $appSecret;
        if (strtolower(md5($signStr)) !== $sign) {
            throw new UnprocessableEntityHttpException('签名错误');
        }

        return true;
    }
}