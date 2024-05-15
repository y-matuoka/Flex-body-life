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
        
        return view('goal_setting/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
        $user = Auth::User();

        $goalSetting = new GoalSetting();
        $goalSetting->user_id = $user->id;
        $goalSetting->goal_content = $request->goal_content;

        $user->GoalSetting()->save($goalSetting);

        // ストレッチコースに遷移するように記述を変更する
        return redirect()->route('goal.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $goalSetting = GoalSetting::find($id);

        $this->authorize('update', $goalSetting);

        return view('goal.update',[
            'id' => $goalSetting->id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GoalSettingRequest $request, $id)
    {
        //GoalSettingモデルのuser_idとログインしているユーザーのidが
        $goalSetting = GoalSetting::where('user_id', Auth::id())->find($id);

        if (!$goalSetting) {
            abort(404);
        }
        $this->authorize('update', $goalSetting);

        $goalSetting->goal_content = $request->goal_content;
        GoalSetting()->save($goalSetting);
    
        //マイページに遷移するように変更
        return redirect()->route('goal.index');
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
