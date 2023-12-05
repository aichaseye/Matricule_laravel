<?php

namespace App\Http\Controllers;

use App\Http\Requests\apprenant\CreateAppRequest;
use App\Http\Requests\apprenant\EditAppRequest;
use App\Models\Apprenant;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ApprenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // avec ressources
    public function index():view

    {
        $apprenants = Apprenant::latest()->paginate(5);
        
        return view('apprenants.index',compact('apprenants'));
                   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view('apprenants.create');
    }

    public function genererMatricule($request ){
        
        $annee=  (string) date('Y');
        $annee1=substr($annee, -2);
        // equivalant
        // $sexe = ($req->genre == 'M') ? '1' : '2';
        if ($request->genre== 'M') {
            $sexe='1';
         }
        if ($request->genre  =='F') {
            $sexe='2';
         }
        //  Recuperation du dernier ID de l'utilisateur depuis la base de données.
        $lastID= Apprenant::max("id");
        // $idUpdate=Apprenant::get("id");
         // Incrementation du dernier ID pour obtenir le prochain
         $ordre=str_pad($lastID+1 , 5,'0', STR_PAD_LEFT);
        //  $ordreUpdate=str_pad($idUpdate , 5,'0', STR_PAD_LEFT);

         $concat=$annee1.$sexe.$ordre;
        //  $concatupdate=$annee1.$sexe.$ordreUpdate;
        //  recuperation de valeur pair et impaire
         $valPair=[];
         $valImpair=[];
         foreach (str_split($concat) as $i => $chiffre) {
            $chiffre= (int)$chiffre;
            if ($i %2 ==0 ) {
                $valPair[]=$chiffre;
            }else {
                $valImpair[]= $chiffre;
            }

         }
        //  somme paire et impair d'un tableau array
        $sommePair=array_sum($valPair);
        $sommeImpair=array_sum($valImpair);
        echo "Le résultat de la somme paire est : $sommePair";
        echo "Le résultat de la somme impaire est : $sommeImpair";

        $checksum = $sommePair - $sommeImpair;
        echo "Le résultat du checksum est : $checksum";
     
        $lettresAlphabet = range('A', 'Z');
        
        if ($checksum<0) {
            $checksumLettre = $lettresAlphabet[abs($checksum)];
        }
        elseif ($checksum>=26) {
            $checksumLettre = 'z';
        }
        else
        $checksumLettre = $lettresAlphabet[$checksum];
        
        return $concat.$checksumLettre;
      
    }


    /**
     * Store a newly created resource in storage.
     */
    // le store se charge de faire les tritements quand on clic sur save formulaire 
    public function store(CreateAppRequest $request):RedirectResponse
    {
        
           
        // Utilisez $request->all() pour obtenir les données du formulaire
        $apprenant=Apprenant::create($request->all());
        $apprenant->matricule = $this->genererMatricule($request);
        $apprenant->save();
        // $apprenants->$mat;
         
        return redirect()->route('apprenants.index')
                        ->with('success', 'apprenant created successfully.');
    
    }

    /**
     * Display the specified resource.
     */
   
    public function show(Apprenant $apprenant)
    {
        return view('apprenants.show', compact('apprenant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    
    public function edit(Apprenant $apprenant):view
  {
    // $apprenant = Apprenant::find($id);
    return view('apprenants.edit', compact('apprenant'));
  }
  
    /**
     * Update the specified resource in storage.
     */
   
 
// methode 1 plus pratique
    public function update(EditAppRequest $request, Apprenant $apprenant): RedirectResponse
    {
            if ($request->genre =='M') { 

                $newMatricule = substr_replace($apprenant->matricule, "1", 2, 1);
                $apprenant->matricule=$newMatricule;
            }
            elseif ($request->genre =='F') { 

                $newMatricule = substr_replace($apprenant->matricule, "2", 2, 1);
                $apprenant->matricule=$newMatricule;
            }
            // echo $newMatricule;
            

        $apprenant->update($request->all());
        
        return redirect()->route('apprenants.index')
                        ->with('success','mise à jour réussit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Apprenant $apprenant): RedirectResponse
    {
        $apprenant->delete();
         
        return redirect()->route('apprenants.index')
                        ->with('success','apprenant supprimer avec succes');
    }
}