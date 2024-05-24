<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        return view('courses.index');
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
        $courses = new Course;
        
        $courses->user_id = $user->id;
        
        //$button1を押していたらtrue
        if($request->has('button1') ){
            // トレーニングmixを1
            $courses->course = 1;
            //登録してから１週間後の日付を登録
            $courses->Achievement_date = Carbon::now()->addDay(7);

        } else if($request->has('button2')){
            // 筋トレメニューを2
            $courses->course = 2;
            $courses->Achievement_date = Carbon::now()->addDay(7);
        } else if($request->has('button3')){
            // ストレッチメニューを3
            $courses->course = 3;
            $courses->Achievement_date = Carbon::now()->addDay(7);
        } else {
            // もし選択しなかった時のメッセージ
            $message = 'トレーニングを選択してください。';
            return redirect()->back()->with('error',$message);
        }
        
        //user->courses()->save($courses);
        $courses->save();
        //dd($courses);
        // トレーニング表示画面に遷移
        return redirect()->route('training.index');

    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
     
        // $courses = Course::find($id);
        $courses = Course::where('user_id', $id)->first();
        
        //登録していなかったらコース選択に戻る
        if(!isset($courses->course)){
            return redirect()->route('home');
        }

        return view('courses/edit', [
            'courses' => $courses,
            'id' => $id,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        // $courses = new Course;
        $courses = Course::where('user_id', $id)->first();
        
        if (!$request) {
            abort(404);
        }
        

        if($request->has('button1')){
            // トレーニングmixを1
            $courses->course = 1;
            //変更してから１週間後の日付を登録
            $courses->Achievement_date = Carbon::now()->addDay(7);

        } else if($request->has('button2')){
            // 筋トレメニューを2
            $courses->course = 2;
            $courses->Achievement_date = Carbon::now()->addDay(7);
        } else if($request->has('button3')){
            // ストレッチメニューを3
            $courses->course = 3;
            $courses->Achievement_date = Carbon::now()->addDay(7);
        } else {
            // もし選択しなかった時のメッセージ
            $message = 'トレーニングを選択してください。';
            return redirect()->back()->with('error',$message);
        }

        $courses->save();

        return redirect()->route('mypage');
 
    }

 /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show(int $id)
    // {
    //     //$courses = Course::find($id);
    //     $courses = Course::where('user_id', $id)->first();
    //     // dd($courses);

    //     $courseSelect = [
    //         1 => 'トレーニングMIX',
    //         2 => '筋トレ',
    //         3 => 'ストレッチ',
    //     ];
        
    //     return view('courses/updated',[
    //         'id' => $id,
    //          'courses' => $courses->id,
    //         'courseSelect' => $courseSelect,
    //     ]);
    // }
}
