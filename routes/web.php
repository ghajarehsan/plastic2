<?php


Route::get('/', 'IndexControllers@index')->name('home');


/***  here is just for index start ****/

Route::post('/getmaingalleryindexs', 'IndexControllers@getmaingalleryindexs');

Route::any('/opratefilter', 'IndexControllers@opratefilter');

Route::post('/getadvert', 'IndexControllers@getadvert');

/***  here is just for index end ****/


/*** here is just for more products start****/

Route::get('/moreproduct', 'MoreproductControllers@index');

Route::post('/getallproducts', 'MoreproductControllers@getallproducts');


//single product

Route::get('/product/detail/{id?}', 'MoreproductControllers@singleindex');

Route::get('/test', 'MoreproductControllers@test');

Route::post('/sendcommentproduct', 'MoreproductControllers@sendcommentproduct');

Route::post('/getallcommentproduct', 'MoreproductControllers@getallcommentproduct');

Route::post('/addlikecommentproduct', 'MoreproductControllers@addlikecommentproduct');

Route::post('/sendanswercommentproduct', 'MoreproductControllers@sendanswercommentproduct');


/*** here is just for more products end****/


/*** here is just for all user factory start ***/

Route::get('/alluserfactory', 'AlluserfactoryControllers@index');

Route::post('/getalluserfactory', 'AlluserfactoryControllers@getalluserfactory');

Route::get('/userfactory/detail/{id?}', 'AlluserfactoryControllers@singleuserfactory');

Route::post('/sendcommentuserfactory', 'AlluserfactoryControllers@sendcommentuserfactory');

Route::post('/getallcommentuserfactory', 'AlluserfactoryControllers@getallcommentuserfactory');

Route::post('/addlikecommentuserfactory', 'AlluserfactoryControllers@addlikecommentuserfactory');

Route::post('/sendanswercommentuserfactory', 'AlluserfactoryControllers@sendanswercommentuserfactory');

/*** here is just for all user factory end ***/


/*** here is just for all advert start ***/

Route::get('/alladvert', 'AdvertControllers@index');

Route::post('/getalladvert', 'AdvertControllers@getalladvert');

//single advert

Route::get('/advert/detail/{id?}', 'AdvertControllers@singleadvert');

Route::post('/sendcommentadvert', 'AdvertControllers@sendcommentadvert');

Route::post('/getallcommentadvert', 'AdvertControllers@getallcommentadvert');

Route::post('/addlikecommentadvert', 'AdvertControllers@addlikecommentadvert');

Route::post('/sendanswercommentadvert', 'AdvertControllers@sendanswercommentadvert');


/*** here is just for all advert end ***/


/*** here is just for  veblog start ***/

Route::get('/veblog', 'VeblogControllers@index');

Route::match(['post', 'get'], '/getallveblog', 'VeblogControllers@getallveblog');

//single veblog

Route::get('/veblog/detail/{id?}', 'VeblogControllers@veblogdetailindex');

Route::post('/sendcommentveblog', 'VeblogControllers@sendcommentveblog');

Route::post('/getallcommentveblog', 'VeblogControllers@getallcommentveblog');

Route::post('/addlikecommentveblog', 'VeblogControllers@addlikecommentveblog');

Route::post('/sendanswercommentveblog', 'VeblogControllers@sendanswercommentveblog');


/*** here is just for  veblog end ***/


/*** here is just for login and register start ***/


Route::namespace('Auth')->group(function () {

    Route::get('register', 'RegisterController@registerform')->name('registerform');

    Route::post('register', 'RegisterController@register')->name('register');

    Route::get('sendverifyurl', 'VerificationController@send')->name('sendverifyurl');

    Route::get('verifycodeee', 'VerificationController@verify')->name('verifycodeee');

    Route::get('logout', 'LoginController@logout')->name('logout');

    Route::post('login', 'LoginController@login')->name('login');


});

/*** here is just for login and register end ***/


/*** here is just for admin start ***/

Route::middleware('auth', 'levelofaccess')->group(function () {


    Route::get('/admin', 'AdminControllers@index')->name('admin');


///category

    Route::post('/getallcategory', 'AdminControllers@getallcategory');

    Route::post('/deletcategory', 'AdminControllers@deletcategory');

    Route::post('/addcategory', 'AdminControllers@addcategory');


///products

    Route::post('/getallproduct', 'AdminControllers@getalluserfactory');

    Route::post('/deletproduct', 'AdminControllers@deletproduct');

    Route::post('/getalluser', 'AdminControllers@getalluser');

    Route::post('/saveimageproduct', 'AdminControllers@saveimageproduct');

    Route::post('/finalsaveproduct', 'AdminControllers@finalsaveproduct');

    Route::post('/getproduct', 'AdminControllers@getproduct');

    Route::post('/saveimageproductedit', 'AdminControllers@saveimageproductedit');

    Route::post('/deleteimageproduct', 'AdminControllers@deleteimageproduct');

    Route::post('/savedataproductedit', 'AdminControllers@savedataproductedit');

    Route::post('/deletparam', 'AdminControllers@deletparam');

    Route::post('/getallparam', 'AdminControllers@getallparam');

    Route::post('/saveparam', 'AdminControllers@saveparam');


//adverts

    Route::post('/getalladverts', 'AdminControllers@getalladverts');

    Route::post('/deleteadvert', 'AdminControllers@deleteadvert');

    Route::post('/getadvert', 'AdminControllers@getadvert');

    Route::post('/savedataadvertedit', 'AdminControllers@savedataadvertedit');

    Route::post('/deleteimageadvert', 'AdminControllers@deleteimageadvert');

    Route::post('/saveimageadvertedit', 'AdminControllers@saveimageadvertedit');


//productcomments

    Route::post('/getallproductcomment', 'AdminControllers@getallproductcomment');

    Route::post('/deletproductcomment', 'AdminControllers@deletproductcomment');

    Route::post('/getproductcomment', 'AdminControllers@getproductcomment');

    Route::post('/savedataproductcomment', 'AdminControllers@savedataproductcomment');


//advertcomments

    Route::post('/getalladvertcomment', 'AdminControllers@getalladvertcomment');

    Route::post('/deletadvertcomment', 'AdminControllers@deletadvertcomment');

    Route::post('/getadvertcomment', 'AdminControllers@getadvertcomment');

    Route::post('/savedataadvertcomment', 'AdminControllers@savedataadvertcomment');


//veblogs

    Route::post('/getallveblogs', 'AdminControllers@getallveblogs');

    Route::post('/deleteveblog', 'AdminControllers@deleteveblog');

    Route::post('/getveblog', 'AdminControllers@getveblog');

    Route::post('/deleteveblogchild', 'AdminControllers@deleteveblogchild');

    Route::post('/getveblogsingledata', 'AdminControllers@getveblogsingledata');

    Route::post('/savesingleveblog', 'AdminControllers@savesingleveblog');

    Route::post('/deleteimageveblog', 'AdminControllers@deleteimageveblog');

    Route::post('/saveimageveblogedit', 'AdminControllers@saveimageveblogedit');

    Route::post('/deletevideoveblog', 'AdminControllers@deletevideoveblog');


    //online chat

    Route::post('/getallusers', 'AdminControllers@getallusers');

    Route::post('sendmessage', 'AdminControllers@sendmessage');

    Route::post('getauth', 'AdminControllers@getauth');

    Route::post('/getsessionuser', 'AdminControllers@getsessionuser');

    Route::post('/updateunread', 'AdminControllers@updateunread');

});


/*** here is just for admin end ***/


//onlinechat


Route::post('/getadmin', 'AdminControllers@getadmin');

Route::post('/getmessages', 'AdminControllers@getmessages');

Route::post('/sendsession', 'AdminControllers@sendsession');

Route::post('/getsession', 'AdminControllers@getsession');

//online chat


Route::fallback(function () {

    return redirect('/');

});



