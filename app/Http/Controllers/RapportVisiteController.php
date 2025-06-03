<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Session;
use App\dao\ServiceRapportVisite;
use App\Models\RapportVisite;

class RapportVisiteController extends Controller
{
    public function getRapportVisite()
    {
        $erreur = Session::get('erreur');
        Session::forget('erreur');
        try {
            $serviceRapport = new ServiceRapportVisite();
            $mesvisites = $serviceRapport->getVisite();
            return view('vues/listeVisites', compact('mesvisites', 'erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }
    public function getListeMed($id_med)
    {
        $erreur = Session::get('erreur');
        Session::forget('erreur');
        try {
            $serviceRapport = new ServiceRapportVisite();
            $mesMed = $serviceRapport->getMedByVisite($id_med);
            $titreVue = "Modification d'un medicament Offert";
            return view('vues/listeMedicament', compact('mesMed', 'titreVue'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }



    public function validateRapport(Request $request)
    {
        $erreur = "";
        try {
            $serviceRapportVisite = new ServiceRapportVisite();
            $id_rapport = $request->input('id_rapport');
            $id_praticien = $request->input('id_praticien');
            $id_visiteur= $request->input('id_visiteur');
            $date_rapport = $request->input('date_rapport');
            $bilan = $request->input('bilan');
            $motif = $request->input('motif');

            $serviceRapportVisite->insertRapportVisite($id_rapport, $id_praticien, $id_visiteur, $date_rapport, $bilan, $motif);

            return redirect('getListeVisites');
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }

    public function  addRapportVisite()
    {
        $erreur = "";
        try {
            $unRapportVisite = new RapportVisite();
            $unRapportVisite->RapportVisite = 0;
            $titreVue = "Ajout d'un rapport de visite";
            return view('vues/formRapportVisite', compact('unRapportVisite', 'titreVue'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }
    public function  formRapportVisite(){
        $titreVue = "Recherche d'un rapport de visite";
        return view('vues/formRecherche', compact('titreVue'));
    }

    public function searchRapportVisite(Request $request)
    {
        $search = $request->input('search');

        try {
            if ($search) {
                $serviceRapport = new ServiceRapportVisite();
                $mesvisites = $serviceRapport->recherche($search);


                return view('vues/listeVisites', compact('mesvisites', 'search'));
            } else {
                return redirect()->back()->with('message', 'Veuillez entrer un terme de recherche.');
            }
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues.error', compact('erreur'));
        }
    }
    public function updateMed($id_rapport)
    {
        $erreur = Session::get('erreur');

        try {
            $RapportVisite = new ServiceRapportVisite();
            $unMed = $RapportVisite->getUnMedicament($id_rapport);
            $titreVue = "Modification d'un médicament offert";
            return view('vues/formMedicament', compact('unMed', 'titreVue'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }

    public function removeMedicaments($id_med,$id_rapp)
    {
        $erreur = "";
        try {
            $serviceRapportVisite = new ServiceRapportVisite();
            $serviceRapportVisite->deleteMedicament($id_med, $id_rapp);

        } catch (Exception $e) {
            Session::put('erreur', $e->getMessage());
        }
        return redirect('getListeMed'($id_med));
    }

    public function validateMed(Request $request)
    {
        $erreur = "";

        try {
            $id_medicament = $request->input('id_medicament');
            $qte_offerte = $request->input('qteofferte');
            $id_rapport = $request->input('id_rapport');

            $serviceMedicament = new ServiceRapportVisite();

            if ($id_medicament && $id_rapport) {
                $serviceMedicament->updateMed($id_rapport, $id_medicament, $qte_offerte);
            }
            return redirect('getListeMed/' . $id_rapport);

        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }

}

