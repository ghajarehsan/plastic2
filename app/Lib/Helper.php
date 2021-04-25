<?php

namespace App\Lib;

use App\Advert;
use App\Setting;

use App\Category;

use App\User;
use App\Veblog;


class Helper
{

    public static $email;

    public static $mobile;

    public static $headernotification;

    public static $slideradvert;

    public static $veblogfirst;

    public static $veblogsecond;

    public static $veblogthird;

    public static function getsetting()
    {

        $getsetting = Setting::get();

        foreach ($getsetting as $key => $row) {

            if ($row['option'] == 'email') {

                self::$email = $row;

            }
            if ($row['option'] == 'mobile') {

                self::$mobile = $row;

            }

            if ($row['option'] == 'headernotification') {

                self::$headernotification = $row;

            }

            if ($row['option'] == 'slideradvert') {

                self::$slideradvert = $row;

            }

            if ($row['option'] == 'veblogfirst') {

                self::$veblogfirst = $row;

            }

            if ($row['option'] == 'veblogsecond') {

                self::$veblogsecond = $row;

            }

            if ($row['option'] == 'veblogthird') {

                self::$veblogthird = $row;

            }


        }

    }

    public static function getcategory()
    {

        $categorys = Category::where('parent', '!=', '0')->get();

        return $categorys;
    }

    public static function getmaker()
    {

        $user = User::where([

            ['position', '1'],

            ['status', '1']

        ])->get();

        return $user;

    }

    public static function getlastveblog()
    {

        $lastveblog = Veblog::where('parent', '0')->where('status', '1')->OrderBy('id', 'desc')->take(5)->with('user')->get();

        foreach ($lastveblog as $key => $row) {

            $date = $row->created_at;

            $shamsidate = \verta($date);

            $x22 = $shamsidate->format('%d %B %y');
            $y22 = $shamsidate->format('%H:%M');

            $lastveblog[$key]['date'] = $x22;
            $lastveblog[$key]['hour'] = $y22;

        }

        return $lastveblog;

    }

    public static function getadvertslider()
    {

        $advertslider = Advert::where('status', '1')->OrderBy('id', 'desc')->take(5)->get();

        foreach ($advertslider as $key => $row) {

            $date = $row->created_at;

            $shamsidate = \verta($date);

            $x22 = $shamsidate->format('%d %B %y');
            $y22 = $shamsidate->format('%H:%M');

            $advertslider[$key]['date'] = $x22;
            $advertslider[$key]['hour'] = $y22;

        }

        return $advertslider;


    }


}


?>