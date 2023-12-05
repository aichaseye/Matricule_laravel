<?php

namespace App\Http\Controllers;

use App\Http\Requests\matiere\CreateMatiereRequest;
use App\Http\Requests\matiere\EditMatRequest;

use App\Models\Matiere;
use App\Models\Parametre;
use Illuminate\Http\Request;

class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matieres=Matiere::latest()->paginate(5);
       return view('matieres.index', compact('matieres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('matieres.create');
           
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateMatiereRequest $request)
    {
        $matiere=new Matiere();
        $matiere->nom=$request->nom;
        $matiere->categorie=$request->categorie;
        $matiere->codeIA=$request->codeIA;
        $matiere->structureCible=$request->structureCible;
        $matiere->image=$request->image;
        
        $codeIA=substr($request->codeIA, -2);
        $ordre= str_pad(Parametre::where('id',1)->value("codeMat") ,5, '0', STR_PAD_LEFT) ;
        $structureCible=$request->structureCible;

        $matiere->matricule=$codeIA.$ordre."FTP"."/".$structureCible;

        $matiere->save();

        $param=Parametre::find(1);
        $param->codeMat++; 
        $param->save();

        return redirect()->route('matieres.index')
        ->with('success', 'matiere créée.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Matiere $matiere)
    {
        return view('matieres.show', compact('matiere'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Matiere $matiere)
    {
        return view('matieres.edit', compact('matiere'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditMatRequest $request, Matiere $matiere)
    {
        // if ($request->genre =='M') { 

        //     $newMatricule = substr_replace($apprenant->matricule, "1", 2, 1);
        //     $apprenant->matricule=$newMatricule;
        // }
        // elseif ($request->genre =='F') { 

        //     $newMatricule = substr_replace($apprenant->matricule, "2", 2, 1);
        //     $apprenant->matricule=$newMatricule;
        // }
        
        

    $matiere->update($request->all());
    
    return redirect()->route('matieres.index')
                    ->with('success','mise à jour réussit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matiere $matiere)
    {
        $matiere->delete();
        return redirect()->route('matieres.index')  ->with('success','suppression réussit');
    }
}
