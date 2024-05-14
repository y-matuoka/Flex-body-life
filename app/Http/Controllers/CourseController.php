<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('courses/index');
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
        $user = Auth::user();
        $courseSelection = new Course;
        $courseSelection->user_id = $user->id;

        //$button1を押していたらtrue
        if($request->has('button1') ){
            // トレーニングmixが表示
            $courseSelection->course = 1;
            //登録してから１週間後の日付を登録
            $courseSelection->Achievement_date = Carbon::now()->addDay(7);

        } else if($request->has('button2')){
            // 筋トレメニューを表示
            $courseSelection->course = 2;
            $courseSelection->Achievement_date = Carbon::now()->addDay(7);
        } else if($request->has('button3')){
            // ストレッチメニューを表示
            $courseSelection->course = 3;
            $courseSelection->Achievement_date = Carbon::now()->addDay(7);
        } else {
            // もし選択しなかった時のメッセージ
            $message = 'トレーニングを選択してください。';
            return redirect()->back()->with('error',$message);
        }

        $user->courses()->save($courseSelection);

        // トレーニング表示画面に遷移
        return redirect()->route('training.index');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
