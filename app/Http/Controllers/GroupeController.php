<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;
use DB;
use App\Quotation;
use App\Groupe;
use App\Qcm;
use Auth;

class GroupeController extends Controller
{

    //middleware auth
    public function __construct()
    {
        return $this->middleware('auth');
    }

    //lister tous les groupes
    public function index(){

        if (Gate::allows('isTeacher')) {            
            $listgroupe= Auth::user()->teachergroupes;
            return  view('GroupeView.index',['groupes'=>$listgroupe]);
        }
        elseif (Gate::allows('isAdmin')) {
            $listgroupe= Groupe::all();
            return  view('GroupeView.index',['groupes'=>$listgroupe]);
        }
        else
        { 
            abort(403,"You're Not allowed to do that");
        }
        

    }
    //afficher details sur le groupe
    public function show($id){

        if (Gate::allows('isTeacher') || Gate::allows('isAdmin')) {
            
        $groupe = Groupe::findOrFail($id);
        $listqcm= Auth::user()->qcms;
        return view('GroupeView.show',['groupes'=>$groupe,'qcms'=>$listqcm]);
        }
        else
        {
            abort(403,"You're Not allowed to do that");
        } 

    }
    
    //creation de Groupe: formulaire d'enregistrement
    public function create(){

        if (Gate::allows('isTeacher')) {
            $listqcm= Auth::user()->qcms;
            return view('GroupeView.create',['qcms'=>$listqcm]);
        }
        else{
            abort(403,"You're Not allowed to do that");
    	}
    }

   
    

    public function store(Request $request)
    {
       //dd($request);
        $newgroupe = new Groupe();
        $newgroupe->name = $request->input('name');
        $newgroupe->user_id =Auth::user()->id;
        $newgroupe->save();
        $newgroupe->qcms()->sync($request->qcms,false);//utilisation de la relation belongsToMany "qcms()"
        // affichage de message flash apres l'ajout
        session()->flash('success','le groupe a étè bien enregistré !');
        return redirect('Groupe');//route Groupe
    }
    //permet de recuperer un Groupe puis le mettre dans un formulaire
    public function edit($id){
       
     
        if (Gate::allows('isTeacher')) {
            
        $groupeamodifier = Groupe::findOrFail($id);
        $listqcm= Auth::user()->qcms;
        $this->authorize('update',$groupeamodifier);// erreur 403 automatique (get view from file errors/403)
        return view('GroupeView.edit',['groupes'=>$groupeamodifier,'qcms'=>$listqcm]);
        }
        else
        {
            abort(403,"You're Not allowed to do that");
        } 
       
    }

  
     //persister la modification dans la base de donnees

    public function update(Request $request,$id){
        
        
        $gr = Groupe::findOrFail($id);
        $gr->name = $request->input('name');
        $gr->qcms()->sync($request->qcms,false);
    	$gr->save();

        $list =Auth::user()->teachergroupes;
        return  view('GroupeView.index',['groupes'=> $list]);
        
    }

    //permet de supprimer un Qcm
    public function destroy(Request $request){
        
        $groupe = Groupe::findOrFail($request->id);
        $groupe->delete();

        return back();
    }

    
}
