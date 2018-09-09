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

class QcmController extends Controller
{

    //middleware auth
    public function __construct()
    {
        return $this->middleware('auth');
    }


    //lister mes qcms
    public function index(){

        if (Gate::allows('isTeacher')) {
            
            $listqcm= Auth::user()->qcms;
            return  view('QcmView.index',['qcms'=>$listqcm]);
        }
        elseif (Gate::allows('isAdmin')) {
            $listqcm= Qcm::all();
            return  view('QcmView.index',['qcms'=>$listqcm]);
        }
        else
        { 
            abort(403,"You're Not allwed to do that");
        }
   

    }

    //lister tous les Qcms partagee dans le catalogue
    public function indexAll(){

       
        if (Gate::allows('isAdmin')) {
            $listqcm= Qcm::all();
            return  view('QcmView.index',['qcms'=>$listqcm]);
        }
        elseif (Gate::allows('isTeacher')) {
           $listqcm= Qcm::all()->where('partagee',1);
           return  view('QcmView.index',['qcms'=>$listqcm]);
        }
        

    }
    public function show($id)
    {
        if (Gate::allows('isTeacher')) {
            
        $qcm = Qcm::findOrFail($id);
        return view('QcmView.show',['qcms'=>$qcm]);
        }
        else
        {
            abort(403,"You're Not allowed to do that");
        } 
    }
    
    //creation de Qcm: formulaire d'enregistrement
     public function create(){

        if (Gate::allows('isTeacher')) {
            return view('QcmView.create');
        }
        else{
            abort(403,"You're Not allwed to do that");
        }
    }

    //enregistrer un Qcm
     public function store( Request $request){
    	
        
        $newqcm = new Qcm();
        $newqcm->title = $request->input('title');
        $newqcm->description = $request->input('description');
        $newqcm->breponse = $request->input('bonnereponse');
        $newqcm->preponse = $request->input('pasdereponse');
        $newqcm->mreponse = $request->input('mauvaisereponse');
        $newqcm->bareme = $request->input('note');
        $newqcm->partagee =$request->get('partagee');
        $newqcm->user_id =Auth::user()->id;
        $newqcm->save();

        session()->flash('success','New Qcm a étè bien enregistré !');
        $list = Auth::user()->qcms;
        return  view('QcmView.index',['qcms'=> $list]);

    }
    
    //permet de recuperer un qcm puis le mettre dans un formulaire
     public function edit($id){
    
        if (Gate::allows('isTeacher')) {
            
        $qcmamodifier = Qcm::findOrFail($id);
        $this->authorize('update',$qcmamodifier);// erreur 403 automatique (get view from file errors/403)
        return view('QcmView.edit',['qcms'=>$qcmamodifier]);
        }
        else
        {
            abort(403,"You're Not allwed to do that");
            return redirect('Qcm');
        }
       
    }

    //persister la modification dans la base de donnees

     public function update(Request $request,$id){

        $qc = Qcm::findOrFail($id);
        $qc->title = $request->input('title');
        $qc->description = $request->input('description');
    	$qc->save();

        $list = Auth::user()->qcms;
        return  view('QcmView.index',['qcms'=> $list]);
        
    }

    //permet de supprimer un Qcm
     public function destroy(Request $request){
        
        $qcm = Qcm::findOrFail($request->id);
        $qcm->delete();

        return back();
    }
    

    public function getQuestions($id)
    {
        $qcm = Qcm::findOrFail($id);
        return $qcm->questions()->orderBy('created_at','desc')->get();
    }

    
    public function addQuestions(Request $request)
    {
        $newquestion =new Question();
        $newquestion->enonce = $request->enonce;
        $newquestion->qcm_id = $request->qcm_id;
        $newquestion->save();

        return response()->json(['etat' => true , 'id' =>$newquestion->id]);
    }

    public function updateQuestion(Request $request)
    {
        $newquestion = Question::findOrFail($request->id);
        $newquestion->enonce = $request->enonce;
        $newquestion->qcm_id = $request->qcm_id;

        $newquestion->save();

        return response()->json(['etat' => true ]);
    }

    public function deleteQuestion($id)
    {   
        $question = Question::findOrFail($id);
        $question->delete();

        return response()->json(['etat' => true ]);

    }

    public function getAllProposition()
    {
        $prop = Proposition::all();
        return $prop;
    }

    public function getProposition($id)
    {
        $question = Question::findOrFail($id);
        return $question->propositions;
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
