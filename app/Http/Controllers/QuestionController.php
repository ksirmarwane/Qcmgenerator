<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Gate;
use DB;
use App\Quotation;
use App\Qcm;
use App\Question;
use App\Groupe;
use App\Proposition;
use Auth;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('isTeacher')) {
            
            $question= Auth::user()->qcms;
            return  view('QcmView.proposition',['questions'=>$question]);
        }
        
        else
        { 
            abort(403,"You're Not allwed to do that");
        }
   
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Gate::allows('isTeacher')) {
            
        $questionachercher = Question::findOrFail($id);
        return view('QcmView.proposition',['question'=>$questionachercher]);
        }
        else
        {
            abort(403,"You're Not allowed to do that");
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    public function getProposition($id)
    {
        $question = Question::findOrFail($id);
        return $question->propositions()->orderBy('created_at','desc')->get();
    }
    public function getQuestionProposition($id1,$id2)
    {
        $question = Question::findOrFail($id2);
        return View('QuizView.quiz',['questions'=>$question]);
    }
    
    public function addPropositions(Request $request)
    {   
        $newproposition =new Proposition();
        $newproposition ->name = $request->name;
        $newproposition ->value = $request->value;
        $newproposition ->question_id =$request->question_id;
        $newproposition ->save();

        return response()->json(['etat' => true , 'id' =>$newproposition->id]);
    }
    
}
