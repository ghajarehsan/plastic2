<?php

namespace App\Http\Controllers;

use App\Advertcomment;
use Illuminate\Http\Request;

use App\User;

use App\Advert;

use Hekmatinasser\Verta\Verta;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;

class AdvertControllers extends Controller
{

    public function index()
    {

        return view('/advert/index');

    }

    public function getalladvert()
    {

        $alladvert = Advert::with('user')->OrderBy('created_at', 'desc')
            ->paginate(9);

        foreach ($alladvert as $key => $row) {

            $created_at = \verta($row->created_at);

            $x = $created_at->formatDifference();

            $y = $created_at->format('H:i');

            $alladvert[$key]['date'] = $x;

            $alladvert[$key]['time'] = $y;

        }

        return $alladvert;


    }

    //singlepage for advert

    public function singleadvert($id)
    {

        $advert = Advert::with('param', 'user')->find($id);

        $params = ['id' => $id, 'advert' => $advert];

        //return $advert;

        return view('advert.singleadvert', $params);
    }

    public function sendcommentadvert(Request $request)
    {

        $text = $request->text;

        $subject = $request->subject;

        if (Auth::check()) {

            $userid = Auth::id();

            $name = Auth::user()->name;

        } else {

            $userid = 0;

            $name = $request->name;

        }

        $advertcomments = new Advertcomment();

        $advertcomments->title = $subject;

        $advertcomments->user_id = $userid;

        $advertcomments->advert_id = $request->id;

        $advertcomments->name = $name;

        $advertcomments->text = $text;

        $result = $advertcomments->save();

        return 1;


    }

    public function getallcommentadvert(Request $request)
    {

        $comments = Advertcomment::where('status', '1')
            ->where('parent', '0')
            ->where('advert_id', $request->id)
            ->OrderBy('created_at', 'desc')
            ->get();


        foreach ($comments as $key => $row) {

            $answers = Advertcomment::where('status', '1')
                ->where('parent', $row->id)
                ->OrderBy('created_at', 'desc')
                ->get();

            $comments[$key]['answer'] = $answers;

            $date = $row->created_at;

            $shamsidate = \verta($date);

            $x = $shamsidate->format('%d %B %y');
            $y = $shamsidate->format('%H:%M');

            $comments[$key]['date'] = $x;
            $comments[$key]['hour'] = $y;

            foreach ($answers as $key2 => $row2) {

                $date2 = $row2->created_at;

                $shamsidate2 = \verta($date2);

                $x2 = $shamsidate2->format('%d %B %y');
                $y2 = $shamsidate2->format('%H:%M');

                $answers[$key2]['date'] = $x2;
                $answers[$key2]['hour'] = $y2;

            }


        }

        return $comments;

    }

    public function addlikecommentadvert(Request $request)
    {


        if (Session::has('advertcommentid' . $request->id)) {

            return '0';

        } else {

            Session::put('advertcommentid' . $request->id, '1');

            $addlike = Advertcomment::find($request->id);

            $addlike->like++;

            $addlike->save();

            return 1;

        }


    }

    public function sendanswercommentadvert(Request $request)
    {

        $text = $request->text;

        if (Auth::check()) {

            $userid = Auth::id();

            $name = Auth::user()->name;

        } else {

            $userid = 0;

            $name = $request->name;

        }

        $advertcomments = new Advertcomment();

        $advertcomments->user_id = $userid;

        $advertcomments->advert_id = $request->advert_id;

        $advertcomments->parent = $request->id;

        $advertcomments->name = $name;

        $advertcomments->text = $request->text;

        $result = $advertcomments->save();

        return 1;


    }

}

?>


