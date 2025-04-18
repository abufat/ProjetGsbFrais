<?php

namespace App\Http\Controllers;

use App\Models\Frais;
use Illuminate\Http\Request;
use App\Models\Visiteur;
use Exception;
use Illuminate\Support\Facades\Session;
use App\dao\ServiceFrais;
use App\dao\ServiceHorsForfait;


class FraisController extends Controller
{
    public function getFraisVisiteur()
    {
        $erreur = Session::get('erreur');
        Session::forget('erreur');
        try {
            $id = Session::get('id');
            $serviceFrais = new ServiceFrais();
            $mesFrais = $serviceFrais->getFrais($id);
            return view('vues/listeFrais', compact('mesFrais', 'erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }

    public function updateFrais($id_frais)
    {
        $erreur = Session::get('erreur');

        try {
            $serviceFrais = new ServiceFrais();
            $unFrais = $serviceFrais->getById($id_frais);
            $titreVue = "Modification d'une fiche frais";
            return view('vues/formFrais', compact('unFrais', 'titreVue'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact( 'erreur'));
        }
    }

    public function validateFrais(Request $request)
    {
        $erreur = "";
        try {
            $id_frais = $request->input('id_frais');
            $anneemois = $request->input('anneemois');
            $nbjustificatifs = $request->input('nbjustificatifs');
            $serviceFrais = new ServiceFrais();

            if ($id_frais > 0) {
                $serviceFrais->updateFrais($id_frais, $anneemois, $nbjustificatifs);
            } else {
                $id_visiteur = Session::get('id');
                $serviceFrais->insertFrais($id_visiteur, $anneemois, $nbjustificatifs);

            }
            return redirect('getListeFrais');
            } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }

    public function  addFrais()
    {
        $erreur = "";
        try {
            $unFrais = new Frais();
            $unFrais->id_frais = 0;
            $titreVue = "Création d'une fiche frais";
            return view('vues/formFrais', compact('unFrais', 'titreVue'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }
    public function removeFrais()
    {
        $erreur = "";
        try {
            $id_frais = session::get('id');
            $serviceFrais = new ServiceFrais();
            $serviceFrais->deleteFrais($id_frais);

        } catch (Exception $e) {
            Session::put('erreur', $e->getMessage());
        }
        return redirect('getListeFrais');
    }
    public function getFraisHf()
    {
        $erreur = Session::get('erreur');
        Session::forget('erreur');

        try {
            $id = Session::get('id');
            $serviceHorsForfait = new ServiceHorsForfait();
            $mesfraishf= $serviceHorsForfait->getFraisHf($id);
            return view('vues/listeHorsForfait', compact('mesfraishf', 'erreur'));
        }catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }
    public function updateFraisHf($id_fraishf)
    {
        $erreur = Session::get('erreur');

        try {
            $serviceHorsForfait = new ServiceHorsForfait();
            $unFraishf= $serviceHorsForfait->getHfByID($id_fraishf);
            $titreVue = "Modification d'un frais Hors forfait";
            return view('vues/formFraisHF', compact('unFraishf', 'titreVue'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact( 'erreur'));
        }

    }
    public function validateFraisHf(Request $request) {
        $erreur = "";
        try {
            $id_fraishf = $request->input('id_fraishorsforfait');
            $libhf = $request->input('lib_fraishorfait');
            $montant = $request->input('montant');
            $serviceHF = new ServiceHorsForfait();

            if ($id_fraishf > 0) {
                $serviceHF->updateFrais($id_fraishf, $libhf, $montant);
            } else {
                $id_frais = Session::get('id_frais');
                $serviceHF->insertFrais($id_frais, $libhf, $montant);
            }
            return redirect('getListeHorsForfait');
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }
    public function addFraisHf()
    {

    }


}
