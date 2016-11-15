<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\LessonWord;
use App\Models\Lesson;
use App\Models\User;
use DB;
use Auth;
use Log;
use Carbon\Carbon;

class LessonsController extends Controller
{
    public function __construct()
    {   
        parent::__construct();
        $this->viewData['title'] = trans('web/lesson.lesson');
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $lesson = new Lesson;
            $lesson->category_id = $request->input('category_id');
            $lesson->user_id = Auth::user()->id;

            $lesson->save();

            $lessonWords = [];

            foreach ($request->input('results') as $result) {
                $lessonWords[] = [
                    'lesson_id' => $lesson->id,
                    'word_id' => $result['word'],
                    'answer_id' => $result['answer'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
            }

            if (!empty($lessonWords)) {
                LessonWord::insert($lessonWords);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Log::debug($e);

            return back()->withErrors(trans('web/lesson.create.failed'));
        }

        return redirect()->action('Web\LessonsController@show', ['id' => $lesson->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lesson = Lesson::findOrFail($id);

        if (!User::findOrFail($lesson->user_id)->isCurrent()) {
            return redirect()->action('HomeController@index')->with('status', trans('web/lesson.forbidden'));
        }

        $this->viewData['results'] = $lesson->lessonWords;
        $this->viewData['examiner'] = $lesson->user;
        $this->viewData['category'] = $lesson->category;
        $this->viewData['score'] = $lesson->lessonWords()->whereHas('answer', function ($query) {
            $query->where('is_correct', config('lesson.correct'));
        })->get();

        return view('web.lesson.detail', $this->viewData);
    }

    public function doLesson($category_id)
    {
        $category = Category::findOrFail($category_id);
        $randomWords = $category->words()
            ->with('answers')
            ->inRandomOrder()
            ->limit(config('lesson.limit-words'))
            ->get();

        $this->viewData['questions'] = makeLesson($randomWords);
        $this->viewData['category'] = $category;

        return view('web.lesson.do', $this->viewData);
    }
}
