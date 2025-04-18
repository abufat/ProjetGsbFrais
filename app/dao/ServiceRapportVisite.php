<?php

namespace App\dao;

use App\Exceptions\MonException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\RapportVisiteController;

class ServiceRapportVisite
{
    public function getVisite()
    {
        try {
            $mesvisites = DB::table('rapport_visite')
                ->select()
                ->join('praticien', 'praticien.id_praticien', '=', 'rapport_visite.id_praticien')
                ->join('offrir', 'offrir.id_rapport','=','rapport_visite.id_rapport')
                ->join('medicament', 'medicament.id_medicament','=','offrir.id_medicament')
                ->orderBy('rapport_visite.id_rapport')
                ->get();
            return $mesvisites;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

    public function updateRapportVisite($id_rapport, $id_praticien, $id_visiteur, $date_rapport, $bilan, $motif)
    {
        try {
            DB::table('rapport_visite')
                ->where('id_rapport', $id_rapport)
                ->update(['id_rapport' => $id_rapport,
                    'id_praticien' => $id_praticien, 'id_visiteur' => $id_visiteur, 'date_rapport' => $date_rapport,
                    'bilan' => $bilan, 'motif' => $motif]);
        } catch (QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }

    public function insertRapportVisite( $id_praticien, $id_visiteur, $date_rapport, $bilan, $motif)
    {
        try {
            DB::table('rapport_visite')
                ->insert(['id_praticien' => $id_praticien, 'id_visiteur' => $id_visiteur, 'date_rapport' => $date_rapport,
                    'bilan' => $bilan, 'motif' => $motif]);
        } catch (QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }

    public function deleteRapportVisite($id_rapport)
    {

        try {
            DB::table('rapport_visite')->where('id_rapport', $id_rapport)->delete();
        } catch (QueryException $e) {
            $erreur = $e->getMessage();
            if ($e->getCode() == 23000) {
                $erreur = "Impossible de supprimer une fiche ayant des frais liés ";
            }
            throw new MonException($erreur, 5);
        }
    }

    public function recherche($search)
    {
        try {
            $alea = DB::table('rapport_visite')
                ->join('praticien', 'praticien.id_praticien', '=', 'rapport_visite.id_praticien')
                ->join('offrir', 'offrir.id_rapport','=','rapport_visite.id_rapport')
                ->join('medicament', 'medicament.id_medicament','=','offrir.id_medicament')
                ->join('visiteur', 'visiteur.id_visiteur','=','rapport_visite.id_visiteur')
                ->where('praticien.nom_praticien', 'LIKE', '%' . $search . '%')
                ->orWhere('rapport_visite.date_rapport', 'LIKE', '%' . $search . '%')
                ->get();

            return $alea;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }
    public function getMedByVisite($id_rapport)
    {
        try {
            $mesMed = DB::table('rapport_visite')
                ->select()
                ->join('praticien', 'praticien.id_praticien', '=', 'rapport_visite.id_praticien')
                ->join('offrir', 'offrir.id_rapport','=','rapport_visite.id_rapport')
                ->join('medicament', 'medicament.id_medicament','=','offrir.id_medicament')
                ->where('offrir.id_rapport', '=', $id_rapport)
                ->get();
            return $mesMed;
        }
        catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }

    }
    public function deleteMedicament($id_med)
    {

        try {
            DB::table('offrir')->where('id_medicament', $id_med)->delete();
        } catch (QueryException $e) {
            $erreur=$e->getMessage();
            if ($e->getCode()==23000) {
                $erreur="Impossible de supprimer un Medicament ";
            }
            throw new MonException($erreur,5);
        }
    }

}

