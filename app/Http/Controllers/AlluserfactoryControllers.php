<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\DB;

use App\Userfactorycomment;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;

class AlluserfactoryControllers extends Controller
{

    public function index()
    {

        return view('alluserfactory.index');

    }

    public function getalluserfactory(Request $request)
    {

        $alluserfactory = DB::table('users')->where([

            ['status', 1],
            ['position', 1]

        ]);


        if ($request->city != 0) {

            $alluserfactory = $alluserfactory->join('detailsfactorys', function ($join) {

                $join->on('detailsfactorys.user_id', '=', 'users.id')
                    ->where('detailsfactorys.city', \request('city'));

            });

        } else {

            $alluserfactory = $alluserfactory->leftJoin('detailsfactorys', 'detailsfactorys.user_id', '=', 'users.id');

        }

        return $alluserfactory->paginate(9);

    }

    public function singleuserfactory($id)
    {

        $userfactory = User::where('position', '1')
            ->where('id', $id)
            ->where('status', '1')
            ->with('detailfactory')
            ->get()[0];

        $params = ['id' => $id, 'userfactory' => $userfactory];

        return view('alluserfactory.singleuserfactory', $params);

    }

    public function sendcommentuserfactory(Request $request)
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

        $userfactorycomments = new Userfactorycomment();

        $userfactorycomments->title = $subject;

        $userfactorycomments->user_id = $userid;

        $userfactorycomments->userfactory_id = $request->userfactory_id;

        $userfactorycomments->name = $name;

        $userfactorycomments->text = $text;

        $result = $userfactorycomments->save();

        return 1;


    }

    public function getallcommentuserfactory(Request $request)
    {

        $comments = Userfactorycomment::where('status', '1')
            ->where('parent', '0')
            ->where('userfactory_id', $request->id)
            ->OrderBy('created_at', 'desc')
            ->get();


        foreach ($comments as $key => $row) {

            $answers = Userfactorycomment::where('status', '1')
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

    public function addlikecommentuserfactory(Request $request)
    {


        if (Session::has('userfactorycommentid' . $request->id)) {

            return '0';

        } else {

            Session::put('userfactorycommentid' . $request->id, '1');

            $addlike = userfactorycomment::find($request->id);

            $addlike->like++;

            $addlike->save();

            return 1;

        }


    }

    public function sendanswercommentuserfactory(Request $request)
    {

        $text = $request->text;

        if (Auth::check()) {

            $userid = Auth::id();

            $name = Auth::user()->name;

        } else {

            $userid = 0;

            $name = $request->name;

        }

        $userfactorycomments = new userfactorycomment();

        $userfactorycomments->user_id = $userid;

        $userfactorycomments->userfactory_id = $request->userfactory_id;

        $userfactorycomments->parent = $request->id;

        $userfactorycomments->name = $name;

        $userfactorycomments->text = $request->text;

        $result = $userfactorycomments->save();

        return 1;


    }

}
