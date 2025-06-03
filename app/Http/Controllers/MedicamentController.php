<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dao\ServiceMedicament;
use Exception;
use Illuminate\Support\Facades\Session;

class MedicamentController extends Controller
{
    public function getMed()
    {
        $erreur = Session::get('erreur');
        Session::forget('erreur');
        try {
            $service = new ServiceMedicament();
            $medicaments = $service->getMedComp();
            return view('vues/listeMedicaments', compact('medicaments', 'erreur'));
        } catch (Exception $e) {
            return view('vues/error', ['erreur' => $e->getMessage()]);
        }
    }

    public function getComp(Request $request)
    {
        try {
            $search = $request->input('search');
            $service = new ServiceMedicament();

            if ($search) {
                $composants = $service->searchComposant($search);
            } else {
                $composants = $service->getComposants();
            }

            return view('vues/listeComposants', compact('composants', 'search'));
        } catch (Exception $e) {
            return view('vues/error', ['erreur' => $e->getMessage()]);
        }
    }



    public function addComposant(Request $request)
    {
        try {
            $service = new ServiceMedicament();
            $service->ajouterComposant(
                $request->input('id_medicament'),
                $request->input('id_composant'),
                $request->input('quantite')
            );
            return redirect()->back()->with('message', 'Composant ajouté.');
        } catch (Exception $e) {
            return view('vues/error', ['erreur' => $e->getMessage()]);
        }
    }

    public function updateComposant(Request $request)
    {
        try {
            $service = new ServiceMedicament();
            $service->modifierComposant(
                $request->input('id_medicament'),
                $request->input('id_composant'),
                $request->input('quantite')
            );
            return redirect()->back()->with('message', 'Composant modifié.');
        } catch (Exception $e) {
            return view('vues/error', ['erreur' => $e->getMessage()]);
        }
    }

    public function removeComposant($id_medicament, $id_composant)
    {
        try {
            $service = new ServiceMedicament();
            $service->deleteComposant($id_medicament, $id_composant);
            return redirect()->back()->with('message', 'Composant supprimé.');
        } catch (Exception $e) {
            return view('vues/error', ['erreur' => $e->getMessage()]);
        }
    }

    public function getMedsFamille()
    {
        try {
            $service = new ServiceMedicament();
            $familles = $service->getMedFamille();
            return view('vues/listeMedicamentsF', compact('familles'));
        } catch (Exception $e) {
            return view('vues/error', ['erreur' => $e->getMessage()]);
        }
    }
}
