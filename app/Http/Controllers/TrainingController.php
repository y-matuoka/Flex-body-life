<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Course;
use App\TrainingMix;
use App\TrainingMuscle;
use Carbon\Carbon;

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

        //training_level(登録日0,1日目1,2日目2,初級)(3日目3,4日目4,5日目5,1中級)(6日目6,7日目7,上級)
        $currentDate = Carbon::now();

        $startDate = $userCourse->created_at;

        $date = $currentDate->diffInDays($startDate);

        //dd($date);

        $level = 0;

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
            $training = TrainingMuscle::where('training_level', $level)->inRandomOrder()->first();
        } else {
            $message = 'トレーニングが選択されていません。';
            return redirect()->route('mypage')->with('error',$message);
        }
       
        //dd($training);
        return view('training.index',[
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

        if($userCourse){
            if($request->has('complete-btn')){
                //ボタンが押されているか。押されてたら１、その他０
                $userCourse->completed = 1;
                //ボタンが押されたら＋１。
                $userCourse->status_count += 1;
            } else {
                $userCourse->completed = 0;
            }
        }
        

        //status_countを1週間後にリセット 
        //greaterThanOrEqualToメソッド日付が同じかそれ以降かチェック
        if (Carbon::now()->greaterThanOrEqualTo($userCourse->Achievement_date) || $userCourse->status_count >= 8) {
            $userCourse->status_count = 0;
            // Achievement_dateを1週間後に更新
            $userCourse->Achievement_date = Carbon::parse($userCourse->Achievement_date)->addWeek();
        }

        //dd($userCourse);

        $user->courses()->save($userCourse);
     
        return redirect()->route('mypage',[
            'user' => $user,
        ]);
    }

}