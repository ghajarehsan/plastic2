<?php

namespace App\Http\Controllers;

use App\User;
use App\Veblog;
use Illuminate\Http\Request;

use App\Maingalleryindex;

use App\Category;

use App\Product;

use App\Advert;

use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Parent_;

class IndexControllers extends Controller
{

    public function index()
    {


        $chepestprice = Product::with('imageproduct')->where('status', '1')->orderBy('price', 'asc')->take(10)->get();


        $userfactory = User::with(['detailfactory'])
            ->where('position', '1')
            ->get();


        $veblogvideos = Veblog::where('indexstatus', '1')
            ->take(10)->get();

        foreach ($veblogvideos as $key2 => $row2) {

            if ($row2->parent != 0) {

                $parent = Veblog::find($row2->parent);

                $veblogvideos[$key2]['parent'] = $parent;

                $date = $parent->created_at;

                $shamsidate2 = \verta($date);

                $x = $shamsidate2->format('%d %B %y');
                $y = $shamsidate2->format('%H:%M');

                $veblogvideos[$key2]['parent']['date'] = $x;
                $veblogvideos[$key2]['parent']['hour'] = $y;


            }

            $date = $row2->created_at;

            $shamsidate = \verta($date);

            $x = $shamsidate->format('%d %B %y');
            $y = $shamsidate->format('%H:%M');

            $veblogvideos[$key2]['date'] = $x;
            $veblogvideos[$key2]['hour'] = $y;

        }


        $data = ['chepestprice' => $chepestprice, 'userfactory' => $userfactory, 'veblogvideos' => $veblogvideos];


       // return $veblogvideos;

        return view('index/index', $data);
    }

    public function getmaingalleryindexs()
    {


        $result = Maingalleryindex::where('status', '1')->get();

        return $result;


    }

    public function opratefilter(Request $request)
    {

        $product = Product::with('user', 'imageproduct')->where('status', '1');

        if ($request->number != 0) {


            $category_id = array_values($request->firstfilter);

            $product = $product->whereIn('category_id', $category_id);


        }

        return $product->inRandomOrder()->paginate(9);

    }

    public function getadvert()
    {

        $getadvert = Advert::where('status', '1')->take(10)->get();

        return $getadvert;

    }

    public function test()
    {

        $chepestprice = Product::with('imageproduct')->where('status', '1')->orderBy('price', 'asc')->take(10)->get();

        return $chepestprice;

    }

}
