<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Veblog;

use Hekmatinasser\Verta\Verta;

use App\Veblogcomment;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;

class VeblogControllers extends Controller
{

    public function index()
    {

        return view('veblog.index');

    }

    public function getallveblog(Request $request)
    {


        $allveblog = Veblog::with('user')->where([

            ['status', '1'],
            ['parent', '0'],

        ])
            ->paginate(9);


        foreach ($allveblog as $key => $row) {


            $y = \verta($row->created_at);

            $x = $y->format('%d %B %y');

            $allveblog[$key]['day'] = $x;


        }


        return $allveblog;

    }

    public function veblogdetailindex($id)
    {

        $result = Veblog::with('user')->find($id);

        $date = $result->created_at;

        $shamsidate = \verta($date);

        $x11 = $shamsidate->format('%d %B %y');
        $y11 = $shamsidate->format('%H:%M');

        $result['date'] = $x11;
        $result['hour'] = $y11;

        $resultchild = Veblog::where('parent', $result['id'])->OrderBy('priority', 'asc')->get();

        foreach ($resultchild as $key => $row) {

            $date = $row->created_at;

            $shamsidate = \verta($date);

            $x22 = $shamsidate->format('%d %B %y');
            $y22 = $shamsidate->format('%H:%M');

            $resultchild[$key]['date'] = $x22;
            $resultchild[$key]['hour'] = $y22;

        }


        $result['child'] = $resultchild;


        $mostviewer = Veblog::where('parent', '0')->with('user')->OrderBy('viewnumber', 'desc')->take(5)->get();

        foreach ($mostviewer as $key2 => $row2) {

            $date = $row2->created_at;

            $shamsidate = \verta($date);

            $x2 = $shamsidate->format('%d %B %y');
            $y2 = $shamsidate->format('%H:%M');

            $mostviewer[$key2]['date'] = $x2;
            $mostviewer[$key2]['hour'] = $y2;

        }


        $params = ['veblog' => $result, 'mostviewer' => $mostviewer, 'id' => $id];

        return view('veblog.singleveblog', $params);

    }

    public function sendcommentveblog(Request $request)
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

        $veblogcomments = new Veblogcomment();

        $veblogcomments->title = $subject;

        $veblogcomments->user_id = $userid;

        $veblogcomments->veblog_id = $request->id;

        $veblogcomments->name = $name;

        $veblogcomments->text = $request->text;

        $result = $veblogcomments->save();

        return 1;


    }

    public function getallcommentveblog(Request $request)
    {

        $comments = Veblogcomment::where('status', '1')
            ->where('parent', '0')
            ->where('veblog_id', $request->id)
            ->OrderBy('created_at', 'desc')
            ->get();


        foreach ($comments as $key => $row) {

            $answers = Veblogcomment::where('status', '1')
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

    public function addlikecommentveblog(Request $request)
    {


        if (Session::has('veblogcommentid' . $request->id)) {

            return '0';

        } else {

            Session::put('veblogcommentid' . $request->id, '1');

            $addlike = Veblogcomment::find($request->id);

            $addlike->like++;

            $addlike->save();

            return 1;

        }


    }

    public function sendanswercommentveblog(Request $request)
    {

        $text = $request->text;

        if (Auth::check()) {

            $userid = Auth::id();

            $name = Auth::user()->name;

        } else {

            $userid = 0;

            $name = $request->name;

        }

        $veblogcomments = new Veblogcomment();

        $veblogcomments->user_id = $userid;

        $veblogcomments->veblog_id = $request->veblog_id;

        $veblogcomments->parent = $request->id;

        $veblogcomments->name = $name;

        $veblogcomments->text = $request->text;

        $result = $veblogcomments->save();

        return 1;


    }


}
