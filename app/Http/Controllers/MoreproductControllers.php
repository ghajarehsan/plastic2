<?php

namespace App\Http\Controllers;

use App\Productcomment;
use Illuminate\Http\Request;

use App\Product;
use Illuminate\Support\Facades\Auth;

use Hekmatinasser\Verta\Verta;

use Illuminate\Support\Facades\Session;

class MoreproductControllers extends Controller
{

    public function index()
    {

        return view('/moreproducts/index');

    }

    public function getallproducts(Request $request)
    {

        $product = Product::with('user', 'imageproduct')->where('status', '1');

        if ($request->number != 0) {

            $category_id = array_values($request->firstfilter);

            $product = $product->whereIn('category_id', $category_id);

        }

        $product = $product->where([

            ['price', '>', $request->pricestart],

            ['price', '<', $request->priceend],

        ]);

        if ($request->numberformaker != 0) {

            $makerid = array_values($request->maker);

            $product = $product->whereIn('user_id', $makerid);

        }


        return $product->paginate(9);

    }


    //singleproduct

    public function singleindex($id)
    {

        $product = Product::with('params', 'userinfo', 'user', 'imageproduct')->find($id);

        //return $product;

        return view('moreproducts.singleproduct', ['product' => $product, 'id' => $id]);

    }

    public function sendcommentproduct(Request $request)
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

        $productcomments = new Productcomment();

        $productcomments->title = $subject;

        $productcomments->user_id = $userid;

        $productcomments->product_id = $request->id;

        $productcomments->name = $name;

        $productcomments->text = $request->text;

        $result = $productcomments->save();

        return 1;


    }

    public function getallcommentproduct(Request $request)
    {

        $comments = Productcomment::where('status', '1')
            ->where('parent', '0')
            ->where('product_id', $request->id)
            ->OrderBy('created_at', 'desc')
            ->get();


        foreach ($comments as $key => $row) {

            $answers = Productcomment::where('status', '1')
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

    public function addlikecommentproduct(Request $request)
    {


        if (Session::has('productcommentid' . $request->id)) {

            return '0';

        } else {

            Session::put('productcommentid' . $request->id, '1');

            $addlike = Productcomment::find($request->id);

            $addlike->like++;

            $addlike->save();

            return 1;

        }


    }

    public function sendanswercommentproduct(Request $request)
    {

        $text = $request->text;

        if (Auth::check()) {

            $userid = Auth::id();

            $name = Auth::user()->name;

        } else {

            $userid = 0;

            $name = $request->name;

        }

        $productcomments = new Productcomment();

        $productcomments->user_id = $userid;

        $productcomments->product_id = $request->product_id;

        $productcomments->parent = $request->id;

        $productcomments->name = $name;

        $productcomments->text = $request->text;

        $result = $productcomments->save();

        return 1;


    }

    public function test()
    {

        $product = Product::with('params', 'userinfo', 'imageproduct')->find(3);


        return $product;


    }

}
