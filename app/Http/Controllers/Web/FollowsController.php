<?php

namespace App\Http\Controllers\Web;

use Exception;
use DB;
use Log;
use Storage;
use Auth;
use App\Models\User;
use App\Models\Relationship;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FollowsController extends Controller
{
    public function follow($id)
    {
        DB::beginTransaction();
        
        try {
            $user = User::findOrFail($id);

            if ($user) {
                $follow = new Relationship;
                $follow->following_id = $id;
                $follow->follower_id = Auth::user()->id;
                $follow->save();
                //tao ban ghi activity follow
                $activity = new Activity;
                $activity->user_id = Auth::user()->id;
                $activity->type = config('user.relationship-type.follow');
                $activity->target_id = $id;
                $activity->save();

                DB::commit();

                return redirect()->action('Web\ProfilesController@show', ['id' => $id]);
            }            
        } catch (Exception $e) {
            DB::rollback();
            Log::debug($e);

            return redirect()->action('Web\ProfilesController@show', ['id' => $id])
                ->withErrors(trans('users.follow-error'));
        }
    }

    public function unfollow($id)
    {
        DB::beginTransaction();

        try {
            $user = User::findOrFail($id);
            if ($user) {
                $unfollow = Relationship::where([
                    ['follower_id', '=', Auth::user()->id],
                    ['following_id', '=', $id],
                ])->delete();
                //tao ban ghi activity unfollow
                $activity = new Activity;
                $activity->user_id = Auth::user()->id;
                $activity->target_id = $id;
                $activity->type = config('user.relationship-type.unfollow');
                $activity->save();

                DB::commit();

                return redirect()->action('Web\ProfilesController@show', ['id' => $id]);
            }
        } catch (Exception $e) {
            DB::rollback();
            Log::debug($e);
            
            return redirect()->action('Admin\UsersController@show', ['id' => $id])
                ->withErrors(trans('users.unfollow-error'));
        }
    }
}
