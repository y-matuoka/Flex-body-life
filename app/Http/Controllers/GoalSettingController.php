<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\GoalSetting;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\GoalSettingRequest;

class GoalSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $user = Auth::user();

        $goalSetting = GoalSetting::where('user_id', $user->id)->first();
        
        return view('goal_setting.index',['goalSetting' => $goalSetting]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GoalSettingRequest $request)
    {
        // ログインしているユーザー
        $user = Auth::user();

        $goalSetting = new GoalSetting();
        $goalSetting->user_id = $user->id;
        $goalSetting->goal_content = $request->goal_content;

        $user->goalSettings()->save($goalSetting);

        // ストレッチコースに遷移するように記述を変更する
        return redirect()->route('course.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $goalSetting = GoalSetting::where('user_id', $id)->first();
        // dd($goalSetting);

        return view('goal_setting/edit',[
            'goalSetting' => $goalSetting,
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
    public function update(GoalSettingRequest $request, int $id)
    {
        // $test = new GoalSetting();
        //GoalSettingモデルのuser_idとログインしているユーザーのidがあっているか
        $goalSetting = GoalSetting::where('user_id', $id)->first();
        
        if (!$request) {
            abort(404);
        }
        // dd($goalSetting);

        $goalSetting->goal_content = $request->goal_content;
        $goalSetting->save();
    
       
        //
        return view('mypage');
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
