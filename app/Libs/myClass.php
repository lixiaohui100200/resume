<?php

class myClass
{
    static function random_string($length = 8)
    {
// 密码字符集，可任意添加你需要的字符
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $str = '';
        for ($i = 0; $i < $length; $i++) {
            $str .= $chars[mt_rand(0, strlen($chars) - 1)];
        }
        return $str;
    }

    static function encode($str)
    {
        $encode = base64_encode($str);
        $left = substr($encode, 0, 3);
        $right = substr($encode, 2);
        $ag = self::random_string();
        $str = $left . $ag . $right;
        return $str;
    }

    static function decode($str)
    {
        $str = substr($str, 0, 3) . substr($str, 12);
        $str = base64_decode($str);
        return $str;
    }

    //封装处理文件ueditor的方法
    static function ueditor_image(&$content)
    {
        if (!empty($content)) {
            //正则表达式匹配查找图片路径
            $pattern = '/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.jpeg|\.png]))[\'|\"].*?[\/]?>/i';
            preg_match_all($pattern, $content, $res);
            $num = count($res[1]);
            for ($i = 0; $i < $num; $i++) {
                $ueditor_img = $res[1][$i];
                $dis = strrev(explode('.', strrev($ueditor_img))[0]);
                $new_name = uniqid() . mt_rand(1, 1000) . '.' . $dis;
                $image = substr($ueditor_img, 1);
                $new_path = 'imagesInterview/' . $new_name;
                copy($image, $new_path);
                $content = str_replace($ueditor_img, '/imagesInterview/' . $new_name, $content);
            }
        }

    }

    //递归删除文件
    static function delFile($dir, $file_type = '')
    {
        if (is_dir($dir)) {
            $files = scandir($dir);
            //打开目录 //列出目录中的所有文件并去掉 . 和 ..
            foreach ($files as $filename) {
                if ($filename != '.' && $filename != '..') {
                    if (!is_dir($dir . '/' . $filename)) {
                        if (empty($file_type)) {
                            unlink($dir . '/' . $filename);
                        } else {
                            if (is_array($file_type)) {
                                //正则匹配指定文件
                                if (preg_match($file_type[0], $filename)) {
                                    unlink($dir . '/' . $filename);
                                }
                            } else {
                                //指定包含某些字符串的文件
                                if (false != stristr($filename, $file_type)) {
                                    unlink($dir . '/' . $filename);
                                }
                            }
                        }
                    } else {
                        self::delFile($dir . '/' . $filename);
                        rmdir($dir . '/' . $filename);
                    }
                }
            }
        } else {
            if (file_exists($dir)) unlink($dir);
        }
    }
 //3天内的时间修改为多少时间前
    static function time_tran($the_time) {
        date_default_timezone_set("Asia/Shanghai");
        //$now_time = date("Y-m-d H:i:s", time());
        //echo $now_time;
        $now_time = time();
        $show_time = strtotime($the_time);
        $dur = $now_time - $show_time;
        if ($dur < 0) {
            return $the_time;
        } else {
            if ($dur < 60) {
                return $dur . '秒前';
            } else {
                if ($dur < 3600) {
                    return floor($dur / 60) . '分钟前';
                } else {
                    if ($dur < 86400) {
                        return floor($dur / 3600) . '小时前';
                    } else {
                        if ($dur < 2592000) {//3天内
                            return floor($dur / 86400) . '天前';
                        } else {
                            return $the_time;
                        }
                    }
                }
            }
        }
    }
}