<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Word;
use Input;

class WordsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->viewData['title'] = trans('category.category');
    }

    public function __invoke(Request $request)
    {
        $keyword = $request->input('keyword');

        $this->viewData['keyword'] = $keyword;

        $this->viewData['words'] = Word::search($keyword)->paginate(config('word.limit.list_in_web'));

        return view('web.word.index', $this->viewData);
    }
}
