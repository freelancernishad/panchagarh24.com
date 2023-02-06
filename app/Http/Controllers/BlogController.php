<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Remls\HijriDate\HijriDate;
use Carbon\Carbon;

class BlogController extends Controller
{



    public function dateTime()
    {




        $EnDate = date('d');
        $EnMonth = date('F');
        $EnYear = date('Y');
        $cureentdate =  date('Y-m-d');
        $input = Carbon::parse($cureentdate);

        $previosDate =  date('Y-m-d');
        $timedate =   strtotime($previosDate);


        $banglaDate =  bangla_date($timedate);

        $date =  HijriDate::getEstimateFromGregorian($input);
        $date->setLocale('bn');
        $date->format("d F Y", true);         // "رمضان ١٤٤٣"
      $ArDate = $date->format("d", true);
      $ArMonth = $date->format("F", true);
      $ArYear = $date->format("Y", true);


        return int_en_to_bn($EnDate)."ই ".month_en_to_bn($EnMonth).", ".int_en_to_bn($EnYear)." খ্রিস্টাব্দ | $banglaDate বঙ্গাব্দ | ".$ArDate ."ই $ArMonth, $ArYear হিজরি";
    }


    public function getblog(Request $request)
    {
        $featured_post = $request->featured_post;
        if($featured_post){
            return Blog::orderBy('id','desc')->get();
        }


        $allpost = $request->allpost;
        $page = 20;
        if($allpost){
            $page = $allpost;
            $category = $request->category;
            $cat_id = Category::where('slug',$category)->first()->id;
             $subcatCount = Category::where('cat_id',$cat_id)->count();
             if($subcatCount>0){
                $subcat = Category::where('cat_id',$cat_id)->get();
                $blogs = Blog::orderBy('id','desc')->where(['cat_id'=>$cat_id]);
                foreach ($subcat as $value) {
                    $blogs->orwhere('cat_id',$value->id);
                    // array_push($filter,['cat_id'=>$value->id]);
                }
                return $blogs->paginate($page);
             }


            return Blog::where('cat_id',$cat_id)->orderBy('id','desc')->paginate($page);
        }


        return Blog::orderBy('id','desc')->paginate($page);
    }


    public function setFiPost(Request $request)
    {
        $featured_post =  $request->all();
        $allpost = Blog::where('featured_post',1)->get();
        foreach ($allpost as $value) {
            $post = Blog::find($value->id);
            $post->update(['featured_post'=>0]);

        }

        foreach ($featured_post as $value) {
            // return $value['id'];
            $post = Blog::find($value['id']);
            $post->update(['featured_post'=>1]);

        }
    }


    public function latestNews()
    {


        $categoriesCount = Category::where('name','ভিডিও গ্যালারি')->count();
        if($categoriesCount>0){
              $categories = Category::where('name','ভিডিও গ্যালারি')->first();
            $latestPost = Blog::where('cat_id','!=',$categories->id)->orderBy('id','desc')->latest()->limit(8)->get();

        }else{
            $latestPost = Blog::orderBy('id','desc')->latest()->limit(8)->get();
        }



        $featured_post = Blog::where('featured_post',1)->orderBy('id','desc')->latest()->limit(4)->get();



        $data = [
            'latestPost'=>$latestPost,
            'featured_post'=>$featured_post,
        ];
        $categories = Category::all();
        foreach ($categories as $value) {
            $catCount = Category::where(['slug'=>$value->name])->count();
            // print_r(BanglaToEnglish($value->name)); echo "<br>";
            if($catCount>0){
                 $subcatCount = Category::where(['cat_id'=>$value->id,'type'=>'sub'])->count();
                if($subcatCount>0){
                    $subcat = Category::where(['cat_id'=>$value->id,'type'=>'sub'])->get();
                   $blogs = Blog::orderBy('id','desc')->where(['cat_id'=>$value->id]);
                   foreach ($subcat as $value2) {
                       $blogs->orwhere('cat_id',$value2->id);
                    }


                    if($value->name=='জাতীয়'){
                        $data[BanglaToEnglish($value->name)]  = $blogs->latest()->limit(8)->get();
                    }else{
                        $data[BanglaToEnglish($value->name)]  = $blogs->latest()->limit(6)->get();
                    }


                }else{


                    if($value->name=='জাতীয়'){
                        // return  $value->name;
                        $data[BanglaToEnglish($value->name)] = Blog::where(['cat_id'=>$value->id])->orderBy('id','desc')->latest()->limit(8)->get();
                    }else{
                        $data[BanglaToEnglish($value->name)] = Blog::where(['cat_id'=>$value->id])->orderBy('id','desc')->latest()->limit(6)->get();
                    }
                    // $data[BanglaToEnglish($value->name)] = Blog::where(['cat_id'=>$value->id])->orderBy('id','desc')->latest()->limit(6)->get();
                }
            }else{
                $data[BanglaToEnglish($value->name)] = [];

            }


        }


        return $data;
    }




    public function updateblog(Request $request)
    {

        $id = $request->id;
        $data = $request->except(['Images']);

        $ImagesCount =  count(explode(';',$request->Images));


            if($ImagesCount>1){
                $data['fiture'] =  fileupload($request->Images,"blogs/",300,165);
            }

        if($id){
            $blog = Blog::find($id);
            return $blog->update($data);
        }
        return Blog::create($data);


    }
        public function getblogEdit(Request $request,$id)
        {
           $blogs =  Blog::find($id);
           $data = $blogs;
           $data['Images'] =  asset($data->Images);

           return $data;
        }


        public function getPostBy(Request $request,$id)
        {
            $blogs =  Blog::find($id);
            $cat_id = $blogs->cat_id;
            $relatedPosts = Blog::where(['cat_id'=>$cat_id])->orderBy('updated_at','desc')->latest()->limit(5)->get();
            $latestPost = Blog::orderBy('updated_at','desc')->latest()->limit(5)->get();
            $latestPost2 = Blog::orderBy('updated_at','desc')->latest()->limit(3)->get();
            $categories =  Category::find($blogs->cat_id);


         $data = [
            'category'=>$categories,
            'relatedPosts'=>$relatedPosts,
            'latestPost'=>$latestPost,
            'latestPost2'=>$latestPost2,
         ];
         return $data;


        }
        public function deleteblog(Request $request,$id)
        {
           $blog =  Blog::find($id);
           return $blog->delete();
        }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
