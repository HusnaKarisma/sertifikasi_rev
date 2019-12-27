<?php 

namespace App\Http\Controllers;

use Request;
use DB;
use CRUDbooster;

class FrontController extends \crocodicstudio\crudbooster\controllers\CBController {

    /**
     * Show home page
     *
     * @return Response
     */
    public function home()
    {
        
        return view('frontpage.home', ['page' => $slug]);
    }


    /**
     * Show pages
     *
     * @param  slug  $varchar
     * @return Response
     */
    public function pages()
    {
        return view('frontpage.posts');
    }

    /**
     * Show page
     *
     * @param  slug  $varchar
     * @return Response
     */
    public function page($slug)
    {
        $page = DB::table('pages')->where('slug', $slug)->first();
        return view('frontpage.post', ['page' => $page]);
        
    }

    /**
     * Search page
     *
     * @param  keyword  $varchar
     * @return Response
     */
    public function search($keyword)
    {
        return view('search', ['keyword' => $keyword]);
    }
}