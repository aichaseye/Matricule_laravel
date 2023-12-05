<?php

namespace App\Http\Controllers;

use App\Http\Requests\etablissement\CreateEtabRequest;
use App\Http\Requests\etablissement\EditEtabRequest;
use App\Models\Etablissement;
use App\Models\Parametre;
use Exception;
use Illuminate\Http\Request;

class EtablissementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etablissements = Etablissement::latest()->paginate(5);
        
        return view('etablissements.index',compact('etablissements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('etablissements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateEtabRequest $request)
    {
            $etablissement=new Etablissement( );
            $etablissement->nomEtab=$request->nomEtab;
            $etablissement->emailEtab=$request->emailEtab;
            $etablissement->typeEtab=$request->typeEtab;
            $etablissement->statusEtab=$request->statusEtab;
            $etablissement->dateCreation=$request->dateCreation;
            $etablissement->codeIA=$request->codeIA;
           

            // $etablissement->user_id=auth()->user()->id;
            
            if($request->statusEtab=="Public" || $request->statusEtab=="PUBLIC" || 
                $request->statusEtab=="public" ){
                $status="1";

            }
            if($request->statusEtab=="Prive" || $request->statusEtab=="PRIVE" || 
                $request->statusEtab=="prive" ){
                $status="2";

            }
            if($request->statusEtab=="Mixt"){
                $status="3";

            }

            $annee= substr($request->dateCreation, -2);
            $newCodeIA=substr($request->codeIA, -2);
            // recupere la valeur de numMatriculeEtab qui est dans la 
            // table Parametre ou l'id est tjour egal à 1
            $newcodeEtab=Parametre::where("id", 1)->value("codeEtab");
            $newcodeEtab=str_pad($newcodeEtab , 3,'0', STR_PAD_LEFT);

            if($request->typeEtab=="CFP" ){
                $type="C";
            }
            if($request->typeEtab=="LT" ){
                    $type="L";
            }
            
            $etablissement->matriculeEtab=$status.$annee.$newCodeIA.$newcodeEtab.$type;
            
           $etablissement->save();
            $param=Parametre::find(1);
            $param->codeEtab++; 
            $param->save();

            return redirect()->route('etablissements.index')
            ->with('success', 'etablissement crée.');
            // return response()->json([
            //     'status_code'=>'200',
            //     'status_message'=>'l etablissement a ete ajouté',
            //     'data'=>$etablissement
            // ]);
     
        
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Etablissement $etablissement)
    {
        return view('etablissements.show', compact('etablissement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etablissement $etablissement)
    {
        return view('etablissements.edit', compact('etablissement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditEtabRequest $request, Etablissement $etablissement)
    {
        $etablissement->update($request->all());
        
        return redirect()->route('etablissements.index')
                        ->with('success','mise à jour réussit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etablissement $etablissement)
    {
        $etablissement->delete();
         
        return redirect()->route('etablissements.index')
                        ->with('success','etablissement supprimer avec succes');
    }
}
