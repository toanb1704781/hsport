<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\news;
use App\Models\employee;
use App\Models\order;

class NewsController extends Controller
{
    private $pathView = 'backend.contents.news.news_';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empSS = employee::where('empID', session()->get('empID'))->first();
        $news = News::orderBy('created_at', 'desc')->paginate(10);
        $countNewOrder = Order::where('cusID', '<>', null)
                            ->where('statusID', 1)
                            ->get()
                            ->count();
        return view($this->pathView .'index', [
            'empSS' => $empSS,
            'allnews' => $news,
             'i' => 1,
             'countNewOrder' => $countNewOrder,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empSS = employee::where('empID', session()->get('empID'))->first();
        $countNewOrder = Order::where('cusID', '<>', null)
                            ->where('statusID', 1)
                            ->get()
                            ->count();
        return view($this->pathView.'add', [
            'empSS' => $empSS,
            'countNewOrder' => $countNewOrder,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('newsIMG')){
            $name = $request->file('newsIMG')->getClientOriginalName();
            $fullname = time(). '_' .$name;
            $request->file('newsIMG')->storeAs(
                'public/uploads/news', $fullname
            );
            $newsIMG = 'storage/uploads/news/' .$fullname;
        }
        $news = new News;
        $news->newsTitle = $request->newsTitle;
        $news->newsIMG = $newsIMG ?? null;
        $news->news = $request->news;
        $news->empID = session()->get('empID');
        $news->save();
        return redirect()->route('tin-tuc.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($newsID)
    {
        $empSS = employee::where('empID', session()->get('empID'))->first();
        $news = News::where('newsID',$newsID )->first();
        $countNewOrder = Order::where('cusID', '<>', null)
                            ->where('statusID', 1)
                            ->get()
                            ->count();
        return view($this->pathView. 'edit', [
            'news' => $news,
            'empSS' => $empSS,
            'countNewOrder' => $countNewOrder,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $newsID)
    {
        if($request->hasFile('newsIMG')){
            $name = $request->file('newsIMG')->getClientOriginalName();
            $fullname = time(). '_' .$name;
            $request->file('newsIMG')->storeAs(
                'public/uploads/news', $fullname
            );
            $newsIMG = 'storage/uploads/news/' .$fullname;
        }else{
            $news = News::where('newsID', $newsID)->first();
            $newsIMG = $news->newsIMG;
        }
        News::where('newsID', $newsID)
                ->update([
                    'newsTitle' => $request->newsTitle,
                    'newsIMG' => $newsIMG,
                    'news' => $request->news,
                ]);
        return redirect()->route('tin-tuc.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($newsID)
    {
        $news = News::where('newsID', $newsID);
        $news->delete();
        return redirect()->route('tin-tuc.index');
    }
}
