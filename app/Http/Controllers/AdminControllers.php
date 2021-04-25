<?php

namespace App\Http\Controllers;

use App\Advert;
use App\Advertcomment;
use App\Param;
use App\Productcomment;
use App\Sessionchat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hekmatinasser\Verta\Verta;

use App\User;

use App\Category;

use App\Product;

use App\Imageproduct;

use  App\Veblog;

use App\Chat;

use App\Events\TestEvent;

use Illuminate\Support\Facades\Session;


class AdminControllers extends Controller
{

    public function index()
    {

        return view('admin.index');

    }


    /***here is just for category manage start***/

    public function getallcategory()
    {

        $categorys = Category::orderBy('created_at', 'desc')->get();

        foreach ($categorys as $key => $row) {

            $date = $row->created_at;

            $shamsidate = \verta($date);

            $x = $shamsidate->format('%d %B %y');

            $categorys[$key]['date'] = $x;

        }

        return $categorys;

    }

    public function deletcategory(Request $request)
    {

        $result = Category::where('id', $request->id)->delete();

        return $result;

    }

    public function addcategory(Request $request)
    {

        $category = new Category();

        $category->name = $request->name;

        $category->parent = $request->id;

        if ($category->save()) {

            $result = 1;

        } else {

            $result = 0;

        }


        return $result;

    }

    /***here is just for category manage end***/


    /***here is just for products manage start ***/

    public function getallproduct()
    {

        $result = Product::with(['user', 'category'])->get();

        foreach ($result as $key => $row) {

            $date = $row->created_at;

            $shamsidate = \verta($date);

            $x = $shamsidate->format('%d %B %y');

            $result[$key]['date'] = $x;

        }

        return $result;

    }

    public function deletproduct(Request $request)
    {

        $result = Product::where('id', $request->id)->delete();

        return $result;

    }

    public function getalluser()
    {

        $result = User::get();

        return $result;

    }

    public function saveimageproduct(Request $request)
    {

        $image = $request->file('file');

        $name = $image->getClientOriginalName();

        $type = $image->getClientOriginalExtension();

        $format = $image->getClientMimeType();

        $permisionformat = ['image/jpg', 'image/gif', 'image/png', 'image/jpeg'];

        $finalname = time() . $name;

        if (in_array($format, $permisionformat)) {

            $move = $image->move('images/imageproducts', $finalname);

            if ($move) {

                return $finalname;

            } else {

                return -1;
            }


        } else {

            return 0;

        }


    }

    public function finalsaveproduct(Request $request)
    {


        $product = new Product();
        $product->name = $request->name;
        $product->describtion = $request->productdescribtion;
        $product->price = $request->productprice;
        $product->user_id = $request->productuser;
        $product->category_id = $request->productcategory;


        if ($product->save()) {

            $imageproduct = new Imageproduct();

            if (count($request->images) > 0) {

                $imageproduct->images = $request->images;

            } else {

                $imageproduct->images = '';

            }

            $imageproduct->product_id = $product->id;

            if ($imageproduct->save()) {

                return '1';

            }
            return '0';


        } else {

            return '0';

        }


    }

    public function getproduct(Request $request)
    {

        $result = Product::with(['imageproduct', 'params'])->find($request->id);


        return $result;


    }

    public function saveimageproductedit(Request $request)
    {

        $image = $request->file('file');

        $name = $image->getClientOriginalName();

        $type = $image->getClientOriginalExtension();

        $format = $image->getClientMimeType();

        $permisionformat = ['image/jpg', 'image/gif', 'image/png', 'image/jpeg'];

        $finalname = time() . $name;

        if (in_array($format, $permisionformat)) {

            $move = $image->move('images/imageproducts', $finalname);

            if ($move) {

                $images = Imageproduct::where('product_id', $request->id)->get()[0]['images'];

                $images = $images . ',' . $finalname;

                $images2 = Imageproduct::where('product_id', $request->id)->update([

                    'images' => $images,

                ]);

                if ($images2) {

                    return '22';
                }


            } else {

                return -1;
            }


        } else {

            return 0;

        }


    }

    public function deleteimageproduct(Request $request)
    {

        $images = new Imageproduct();

        $images1 = $images->where('product_id', $request->id)->get()[0]['images'];

        $images1 = explode(',', $images1);

        unset($images1[$request->index]);

        $images1 = join(',', $images1);

        $x = $images->where('product_id', $request->id)->update([

            'images' => $images1,

        ]);

        if ($x) {

            return '1';

        } else {

            return '0';

        }

    }

    public function savedataproductedit(Request $request)
    {


        $product = Product::find($request->id);

        $product->name = $request->name;
        $product->describtion = $request->productdescribtion;
        $product->price = $request->productprice;
        $product->user_id = $request->productuser;
        $product->category_id = $request->productcategory;


        if ($product->save()) {

            return 1;

        } else {

            return 0;

        }


    }

    public function deletparam(Request $request)
    {

        $product = Product::find($request->id);

        $result = $product->params()->detach($request->paramid);

        return 1;

    }

    public function getallparam()
    {

        return Param::get();

    }

    public function saveparam(Request $request)
    {

        $product = Product::find($request->id);

        $result = $product->params()->attach($request->selectedparam, ['value' => $request->paramvalue]);

        return 1;

    }

    /***here is just for products manage end ***/


    /***here is just for products manage start ***/

    public function getalladverts()
    {

        $adverts = Advert::orderBy('created_at', 'desc')->get();

        foreach ($adverts as $key => $row) {

            $date = $row->created_at;

            $shamsidate = \verta($date);

            $x = $shamsidate->format('%d %B %y');

            $adverts[$key]['date'] = $x;

        }


        return $adverts;

    }

    public function deleteadvert(Request $request)
    {

        $result = Advert::where('id', $request->id)->delete();

        return $result;

    }

    public function getadvert(Request $request)
    {

        $result = Advert::find($request->id);

        return $result;

    }

    public function savedataadvertedit(Request $request)
    {

        $advert = Advert::find($request->id);

        $advert->name = $request->advertname;
        $advert->describtion = $request->advertdescribtion;
        $advert->price = $request->advertprice;
        $advert->user_id = $request->advertuser;
        $advert->status = $request->status;

        if ($advert->save()) {

            return 1;

        } else {

            return 0;

        }


    }

    public function deleteimageadvert(Request $request)
    {

        $advert = new Advert();

        $images1 = $advert->find($request->id)['images'];

        $images1 = explode(',', $images1);

        unset($images1[$request->index]);

        $images1 = join(',', $images1);

        $x = $advert->where('id', $request->id)->update([

            'images' => $images1,

        ]);

        if ($x) {

            return '1';

        } else {

            return '0';

        }


    }

    public function saveimageadvertedit(Request $request)
    {

        $image = $request->file('file');

        $name = $image->getClientOriginalName();

        $type = $image->getClientOriginalExtension();

        $format = $image->getClientMimeType();

        $permisionformat = ['image/jpg', 'image/gif', 'image/png', 'image/jpeg'];

        $finalname = time() . $name;

        if (in_array($format, $permisionformat)) {

            $move = $image->move('images/imageadvert', $finalname);

            if ($move) {

                $advert = new Advert();

                $images = $advert->find($request->id)['images'];

                $images = $images . ',' . $finalname;

                $images2 = $advert->where('id', $request->id)->update([

                    'images' => $images,

                ]);

                if ($images2) {

                    return '22';
                }


            } else {

                return -1;
            }


        } else {

            return 0;

        }


    }


    /***here is just for products manage end ***/


    /***here is just for productcomments manage start ***/

    public function getallproductcomment()
    {

        $productcomments = Productcomment::with('user', 'product')->orderBy('created_at', 'desc')->get();

        foreach ($productcomments as $key => $row) {

            $date = $row->created_at;

            $shamsidate = \verta($date);

            $x = $shamsidate->format('%d %B %y');
            $y = $shamsidate->format('%H:%M');

            $productcomments[$key]['date'] = $x;
            $productcomments[$key]['hour'] = $y;

        }


        return $productcomments;

    }

    public function deletproductcomment(Request $request)
    {

        $result = Productcomment::where('id', $request->id)->delete();

        return $result;


    }

    public function getproductcomment(Request $request)
    {

        $productcomment = Productcomment::with('product', 'user')->find($request->id);


        $date = $productcomment->created_at;

        $shamsidate = \verta($date);

        $x = $shamsidate->format('%d %B %y');
        $y = $shamsidate->format('%H:%M');

        $productcomment['date'] = $x;
        $productcomment['hour'] = $y;


        if ($productcomment->parent != 0) {

            $productcommentchild = Productcomment::with('product', 'user')->where('id', $productcomment->parent)->get();

            foreach ($productcommentchild as $key => $row) {

                $date = $row->created_at;

                $shamsidate = \verta($date);

                $x = $shamsidate->format('%d %B %y');
                $y = $shamsidate->format('%H:%M');

                $productcommentchild[$key]['date'] = $x;
                $productcommentchild[$key]['hour'] = $y;

            }

            $productcomment['child'] = $productcommentchild;


            return $productcomment;


        } else {

            $productcommentchild = Productcomment::with('product', 'user')->where('parent', $productcomment->id)->get();


            foreach ($productcommentchild as $key => $row) {

                $date = $row->created_at;

                $shamsidate = \verta($date);

                $x = $shamsidate->format('%d %B %y');
                $y = $shamsidate->format('%H:%M');

                $productcommentchild[$key]['date'] = $x;
                $productcommentchild[$key]['hour'] = $y;

            }


            $productcomment['child'] = $productcommentchild;

            return $productcomment;

        }


    }

    public function savedataproductcomment(Request $request)
    {

        $productcomment = new Productcomment();

        $productcomment = $productcomment->where('id', $request->id)->update([

            'title' => $request->title,

            'like' => $request->like,

            'text' => $request->text,

            'status' => $request->status,

            'user_id' => $request->user,


        ]);

        if ($productcomment) {

            return '1';

        } else {

            return '0';
        }


    }

    /***here is just for productcomments manage end ***/


    /***here is just for advertcomment manage start ***/

    public function getalladvertcomment()
    {

        $advertcomments = Advertcomment::with('user', 'advert')->orderBy('created_at', 'desc')->get();

        foreach ($advertcomments as $key => $row) {

            $date = $row->created_at;

            $shamsidate = \verta($date);

            $x = $shamsidate->format('%d %B %y');
            $y = $shamsidate->format('%H:%M');

            $advertcomments[$key]['date'] = $x;
            $advertcomments[$key]['hour'] = $y;

        }


        return $advertcomments;

    }

    public function deletadvertcomment(Request $request)
    {

        $result = advertcomment::where('id', $request->id)->delete();

        return $result;


    }

    public function getadvertcomment(Request $request)
    {

        $advertcomment = advertcomment::with('advert', 'user')->find($request->id);


        $date = $advertcomment->created_at;

        $shamsidate = \verta($date);

        $x = $shamsidate->format('%d %B %y');
        $y = $shamsidate->format('%H:%M');

        $advertcomment['date'] = $x;
        $advertcomment['hour'] = $y;


        if ($advertcomment->parent != 0) {

            $advertcommentchild = advertcomment::with('advert', 'user')->where('id', $advertcomment->parent)->get();

            foreach ($advertcommentchild as $key => $row) {

                $date = $row->created_at;

                $shamsidate = \verta($date);

                $x = $shamsidate->format('%d %B %y');
                $y = $shamsidate->format('%H:%M');

                $advertcommentchild[$key]['date'] = $x;
                $advertcommentchild[$key]['hour'] = $y;

            }

            $advertcomment['child'] = $advertcommentchild;


            return $advertcomment;


        } else {

            $advertcommentchild = advertcomment::with('advert', 'user')->where('parent', $advertcomment->id)->get();


            foreach ($advertcommentchild as $key => $row) {

                $date = $row->created_at;

                $shamsidate = \verta($date);

                $x = $shamsidate->format('%d %B %y');
                $y = $shamsidate->format('%H:%M');

                $advertcommentchild[$key]['date'] = $x;
                $advertcommentchild[$key]['hour'] = $y;

            }


            $advertcomment['child'] = $advertcommentchild;

            return $advertcomment;

        }


    }

    public function savedataadvertcomment(Request $request)
    {

        $advertcomment = new advertcomment();

        $advertcomment = $advertcomment->where('id', $request->id)->update([

            'title' => $request->title,

            'answer' => $request->answer,

            'like' => $request->like,

            'status' => $request->status,

            'user_id' => $request->user,


        ]);

        if ($advertcomment) {

            return '1';

        } else {

            return '0';
        }


    }

    /***here is just for advertcomment manage end ***/


    /***here is just for veblog manage start ***/

    public function getallveblogs()
    {

        $veblog = Veblog::where('parent', '0')->get();

        return $veblog;

    }

    public function deleteveblog(Request $request)
    {

        $result = Veblog::where('id', $request->id)->delete();

        return $result;


    }

    public function getveblog(Request $request)
    {

        $result = Veblog::with('user')->find($request->id);

        $date = $result->created_at;

        $shamsidate = \verta($date);

        $x = $shamsidate->format('%d %B %y');
        $y = $shamsidate->format('%H:%M');

        $result['date'] = $x;
        $result['hour'] = $y;

        $resultchild = Veblog::where('parent', $result['id'])->OrderBy('priority', 'asc')->get();

        foreach ($resultchild as $key => $row) {

            $date = $row->created_at;

            $shamsidate = \verta($date);

            $x = $shamsidate->format('%d %B %y');
            $y = $shamsidate->format('%H:%M');

            $resultchild[$key]['date'] = $x;
            $resultchild[$key]['hour'] = $y;

        }


        $result['child'] = $resultchild;

        return $result;


    }

    public function deleteveblogchild(Request $request)
    {

        $result = Veblog::where('id', $request->id)->delete();

        return $result;


    }

    public function getveblogsingledata(Request $request)
    {

        $result = Veblog::find($request->id);

        return $result;

    }

    public function savesingleveblog(Request $request)
    {

        $result = Veblog::where('id', $request->id)->update([

            'title' => $request->title,
            'likenumber' => $request->likenumber,
            'viewnumber' => $request->viewnumber,
            'priority' => $request->priority,
            'imageorvideo' => $request->imageorvideo,
            'status' => $request->status,
            'description' => $request->description,

        ]);

        if ($result) {

            return '1';

        } else {

            return '0';

        }


    }

    public function deleteimageveblog(Request $request)
    {

        $veblog = new Veblog();

        $image = $veblog->find($request->id)['images'];

        $image = explode(',', $image);

        unset($image[$request->index]);

        $image = join(',', $image);

        $result = $veblog->find($request->id);

        $result->images = $image;

        if ($result->save()) {

            return '1';

        } else {

            return '0';

        }


    }

    public function saveimageveblogedit(Request $request)
    {

        if ($request->imageorvideo == '1') {

            $image = $request->file('file');

            $name = $image->getClientOriginalName();

            $type = $image->getClientOriginalExtension();

            $format = $image->getClientMimeType();

            $permisionformat = ['image/jpg', 'image/gif', 'image/png', 'image/jpeg'];

            $finalname = time() . $name;

            if (in_array($format, $permisionformat)) {

                $move = $image->move('images/imageveblog', $finalname);

                if ($move) {

                    $veblog = new Veblog();

                    $images = $veblog->find($request->id)['images'];

                    $images = $images . ',' . $finalname;

                    $images2 = $veblog->where('id', $request->id)->update([

                        'images' => $images,

                    ]);

                    if ($images2) {

                        return '22';
                    }


                } else {

                    return -1;
                }


            } else {

                return 0;

            }


        } else {

            $video = $request->file('file');

            $name = $video->getClientOriginalName();

            $type = $video->getClientOriginalExtension();

            $format = $video->getClientMimeType();

            $permisionformat = ['image/mp3', 'image/mp4', 'image/png', 'image/jpeg'];

            $finalname = time() . $name;

            if (in_array($format, $permisionformat)) {

                $move = $video->move('images/imageveblog', $finalname);

                if ($move) {

                    $veblog = new Veblog();

                    $video = $veblog->find($request->id)['videos'];

                    $video = $video . ',' . $finalname;

                    $video2 = $veblog->where('id', $request->id)->update([

                        'videos' => $video,

                    ]);

                    if ($video2) {

                        return '22';
                    }


                } else {

                    return -1;
                }


            } else {

                return 0;

            }

        }


    }

    public function deletevideoveblog(Request $request)
    {

        $veblog = new Veblog();

        $video = $veblog->find($request->id)['videos'];

        $video = explode(',', $video);

        unset($video[$request->index]);

        $video = join(',', $video);

        $result = $veblog->find($request->id);

        $result->videos = $video;

        if ($result->save()) {

            return '1';

        } else {

            return '0';

        }


    }


    /***here is just for veblog manage end ***/


    /***here is just for online chat start ***/

    public function getallusers()
    {

        $auth = Auth::id();

        $users = User::where('id', '!=', $auth)
            ->where('status', '1')
            ->get();

        foreach ($users as $key => $user) {

            $chatunread = Chat::where('from', $user->id)
                ->where('to', $auth)
                ->where('unread', '0')
                ->get();

            $number = count($chatunread);

            $users[$key]['unread'] = $number;

        }


        return $users;

    }

    public function getmessages(Request $request)
    {

        $id = $request->selected;

        if (Auth::check()) {

            $auth = Auth::id();

        } else {

            $auth = Session::get('usering');

        }

        $result = Chat::where(function ($query) use ($id, $auth) {

            $query->where('from', $id)->where('to', $auth);
        })
            ->orwhere(function ($query) use ($id, $auth) {

                $query->where('to', $id)->where('from', $auth);

            })
            ->OrderBy('created_at', 'desc')
            ->get();

        return $result;

    }

    public function sendmessage(Request $request)
    {

        $auth = Auth::user();

        $to = $request->selectedid;

        $chat = new Chat();

        $chat->from = $auth->id;

        $chat->message = $request->message;

        $chat->to = $to;

        $chat->save();

        event(new TestEvent($auth->id, $to));

    }

    public function getauth()
    {

        $auth = Auth::user();

        return $auth;

    }

    public function getadmin()
    {

        $session = 38;

        return $session;

    }

    public function sendsession(Request $request)
    {

        if (Auth::check()) {

            $auth = Auth::user();

            $to = $this->getadmin();

            $chat = new Chat();

            $chat->from = $auth->id;

            $chat->message = $request->message;

            $chat->to = $to;

            $chat->save();

            event(new TestEvent($auth->id, $to));


        } else {

            if (Session::has('usering')) {

                $session = Session::get('usering');


            } else {

                $time = time();

                $sessionchat = new Sessionchat();

                $sessionchat->session = $time;

                $sessionchat->save();

                Session::put('usering', $time);

            }

            $chat = new Chat();

            $chat->from = Session::get('usering');

            $chat->to = $this->getadmin();

            $chat->message = $request->message;

            $chat->save();

            event(new TestEvent(Session::get('usering'), $this->getadmin()));

        }


    }

    public function getsession()
    {

        if (Auth::check()) {

            $session = Auth::id();

        } else {

            $session = Session::get('usering');

        }

        return $session;

    }

    public function getsessionuser()
    {

        $session = Sessionchat::OrderBy('created_at','desc')->get();

        foreach ($session as $key => $user) {

            $chatunread = Chat::where('from', $user->session)
                ->where('to', Auth::id())
                ->where('unread', '0')
                ->get();

            $number = count($chatunread);

            $session[$key]['unread'] = $number;

        }

        return $session;

    }

    public function updateunread(Request $request)
    {

        $selectedid = $request->selectedid;

        $auth = Auth::id();

        $result = Chat::where('from', $selectedid)
            ->where('to', $auth)
            ->update([

                'unread' => '1',

            ]);

        return $result;

    }


    /***here is just for online chat end ***/


}
