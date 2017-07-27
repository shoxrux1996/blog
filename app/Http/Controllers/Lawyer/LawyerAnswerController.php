<?php

namespace yuridik\Http\Controllers\Lawyer;

    use yuridik\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use yuridik\Question;
    use yuridik\Answer;
    use Session;
    use Auth;
    use Validator;
    use yuridik\File;
class LawyerAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:lawyer');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $question_id)
    {

        $rules = array(
            'text' => 'required|min:5|max:2000'
        );
        $count = count($request->file('files')) - 1;

        foreach (range(0, $count) as $i) {
            $rules['files.' . $i] = 'mimes:doc,docx,pdf|max:3000';
        }
        Validator::make($request->all(), $rules)->validate();


        $question = Question::find($question_id);
        $lawyer = Auth::guard('lawyer')->user();

        $answer = new Answer;
        $answer->text = $request->text;
        $answer->lawyer_id = $lawyer->id;
        $question->answers()->save($answer);

        if ($request->file('files') != null) {
            $file = $request->file('files');
            foreach ($file as $key) {
                $fil = new File;
                $fil->file = $key->getClientOriginalName();
                $upload_folder = '/answers/' . time() . '/';
                $fil->path = $upload_folder;
                $answer->files()->save($fil);
                $key->move(public_path() . $upload_folder, $key->getClientOriginalName());
            }
        }
            // $comment->blog()->associate($blog);
            Session::flash('success', 'Answer was added');
            return redirect()->route('web.question.show', ['id' => $question_id]);

    }
}