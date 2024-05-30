<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Course;
use App\TrainingMix;
use App\TrainingMuscle;
use App\TrainingStretch;
use Carbon\Carbon;

use function PHPUnit\Framework\isNull;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $user = Auth::user();

       $userCourse = $user->courses()->first();

        if(!isset($userCourse)){
            $message = 'コースが登録されていませんでした。コース選択をしましょう！';
            return redirect()->route('course.index')->with('error',$message);
        }
       
        //training_level(登録日0,1日目1,2日目2,初級)(3日目3,4日目4,5日目5,1中級)(6日目6,7日目7,上級)
        $currentDate = Carbon::now();
        //コース選択に登録した日を取得
        $startDate = $userCourse->created_at;
        //登録日と現在の時刻の差
        $date = $currentDate->diffInDays($startDate);
        //dd($date);
        //レベル0にする。
        $level = 0;
        //0~2はレベル0,3~5はレベル1,6~7はレベル2
        if($date >= 0 && $date < 2){
            $level = 0;
        } else if ($date >= 3 && $date < 5){
            $level = 1;
        } else if ($date >= 6 && $date < 7){
            $level = 2;
        }
        //コースに応じてトレーニングデータを取得
        //1=MIX,2=筋トレ,3=ストレッチ
        if($userCourse->course === 1){
            $training = TrainingMix::where('training_level',$level)->inRandomOrder()->first();
        } else if ($userCourse->course === 2){
            $training = TrainingMuscle::where('training_level', $level)->inRandomOrder()->first();
        } else if ($userCourse->course === 3){
            $training = TrainingStretch::where('training_level', $level)->inRandomOrder()->first();
        } else {
            $message = 'コースが選択されていません。';
            return redirect()->route('course')->with('error',$message);
        }
        
       
        //dd($training);
        return view('training/index',[
            'training' => $training,
             'userCourse' => $userCourse,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function complete(Request $request)
    {
        $user = Auth::user();
        $userCourse = $user->courses()->first();
        //dd($userCourse);
       
        

        //1日1回だけstatus_countを押せるようにする
        
            if($userCourse && $request->has('complete-btn')){
                //ボタンが押されているか。押されてたら１
                $userCourse->completed = 1;
                //ボタンが押されたら＋１。
                $userCourse->status_count += 1;
            } 


        //status_countを1週間後にリセット
        //greaterThanOrEqualToメソッド日付が同じかそれ以降かチェック
        if (Carbon::now()->greaterThanOrEqualTo($userCourse->Achievement_date) || $userCourse->status_count >= 8) {
            $userCourse->status_count = 0;
            // Achievement_dateを1週間後に更新
            // $userCourse->Achievement_date = Carbon::parse($userCourse->Achievement_date)->addWeek();
            $userCourse->Achievement_date = Carbon::parse($userCourse->Achievement_date)->addWeek();
        }

        //dd($userCourse);

        $user->courses()->save($userCourse);

        //二重送信防止
        $request->session()->regenerateToken();

        return redirect()->route('mypage');
    }

}