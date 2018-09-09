<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;
use DB;
use App\Groupe;
Use App\User;
use App\Qcm;
use App\Test;
use App\Proposition;
use App\Question;
use Auth;

class UserController extends Controller
{
	//middleware auth
    public function __construct()
    {
        return $this->middleware('auth');
    }

    //enregistrer un Groupe at l'attach avec  qcms
    public function index(){
    	
    	if (Gate::allows('isUser')){
        $listgroupe= Groupe::all();
        return  view('InscriptionView.index',['groupes'=>$listgroupe]);
        }

    }

    //enregistrer un Groupe at l'attach avec  qcms
    public function indexQcm(){
        
        if (Gate::allows('isUser')){
        $listqcm= Qcm::all();
        return  view('QuizView.index',['qcms'=>$listqcm]);
        }

    }

    public function show($id1,$id2)
    {
        if (Gate::allows('isUser')) {

        $qcm = Qcm::findOrFail($id1);
        $questions = $qcm->questions;
        foreach ($questions as $key => $value) {
            if($key==($id2)-1){
                
                $id2++;
                $Total=(count($questions));
                return view('QuizView.show',['qcm'=>$qcm ,'Total'=>$Total,'question'=>$value,'iteration'=>$id2]);
            }
        }
        
        }
        else
        {
            abort(403,"You're Not allowed to do that");
        } 
    }

    public function NextQuestion(Request $request,$id1,$id2)
    {
        $user= Auth::user();

        if (Gate::allows('isUser')) {
        $listqcm= Qcm::all();
        $qcm = Qcm::findOrFail($id1);
        $questions = $qcm->questions;
        foreach ($questions as $key => $value) {
            if($key==($id2)-1){
                $id2++;
                $Total=(count($questions));
                foreach ($request->propositions as $key => $value1) {
                    $proposition = Proposition::findOrFail($value1);
                    $user->propositions()->sync($proposition->id,false);
                }
                return view('QuizView.show',['qcm'=>$qcm ,'Total'=>$Total,'question'=>$value,'iteration'=>$id2]);
            }
        }
        foreach ($request->propositions as $key => $value1) {
                    $proposition = Proposition::findOrFail($value1);
                    $user->propositions()->sync($proposition->id,false);
                }
        return view('QcmView.Resultat',['qcm'=>$qcm ,'question'=>$value,'iteration'=>$id2]);
        
        }
        else
        {
            abort(403,"You're Not allowed to do that");
        }
                
    }



	 
    public function store(Request $request){

        $newgroupe = Groupe::find($request->id);
        $newgroupe->users()->sync(Auth::user()->id,false);
        session()->flash('success','Votre demande d\'invitation a étè bien enregistré !');
        return redirect('Joindre');//route Groupe
    }

    public function UserChoix(Request $request){

        
        foreach ($request->propositions as $key => $value) {
            $proposition = Proposition::findOrFail($value);
            if ($key == 0) {
              
                $question = $proposition->question;
                $qcm = $question->qcm;
            }
            
           $user->propositions()->sync($proposition->id,false);
        }
        //utilisation de la relation belongsToMany "qcms()"
        // affichage de message flash apres l'ajout
        return View('QcmView.Resultat',['propositions'=>$request->propositions,'qcm'=>$qcm]);//route Groupe
        
    }
    



}
