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
        //dd($userCourse);

        //training_level(登録日19日0,1日目20日,1,２日目21,2,初級)(3日目２２,4日目２３,5日目２４,1中級)(6日目２５,7日目２６,上級)
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
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function complete()
    {
        return redirect()->route('mypage');
    }

}