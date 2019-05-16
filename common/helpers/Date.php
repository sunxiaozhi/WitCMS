<?php
/**
 * 时间处理
 * User: sunxiaozhi
 * Date: 2018/12/5 10:05
 */

namespace common\helpers;

use \DateTime;

class Date extends DateTime
{
    /**
     * 计算时间间隔
     * @param $startDate
     * @param string $endDate
     * @return string
     * @throws \Exception
     */
    public static function diffDate($startDate, $endDate = '')
    {
        if (empty($endDate)) {
            $endDate = date('Y-m-d H:i:s');
        }

        $startDateTime = new \DateTime($startDate);
        $endDateTime = new \DateTime($endDate);
        $interval = $startDateTime->diff($endDateTime);

        $time = [
            'y' => $interval->format('%Y'),
            'm' => $interval->format('%m'),
            'd' => $interval->format('%d'),
            'h' => $interval->format('%H'),
            'i' => $interval->format('%i'),
            's' => $interval->format('%s'),
            'a' => $interval->format('%a'),  //两个时间相差总天数
        ];

        return self::formatTime($time);
    }

    /**
     * 格式化输出
     * @param array $time
     * @return string
     */
    public static function formatTime($time = [])
    {
        $formatString = '';

        foreach ($time as $key => $val) {
            switch ($key) {
                case 'y':
                    $formatString .= $val != 0 ? $val . ' 年 ' : '';
                    break;
                case 'm':
                    $formatString .= $val != 0 ? $val . ' 月 ' : '';
                    break;
                case 'd':
                    $formatString .= $val != 0 ? $val . ' 天 ' : '';
                    break;
                default:
                    break;
            }
        }

        return $formatString ? $formatString : '1 天';
    }
}