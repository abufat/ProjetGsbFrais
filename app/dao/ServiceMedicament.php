<?php

namespace App\dao;

use Illuminate\Support\Facades\DB;
use App\Exceptions\MonException;
use Illuminate\Database\QueryException;

class ServiceMedicament
{
    public function getMed()
    {
        try {
            $mesmed = DB::table('medicament')
                ->select('*')
                ->get();

            return $mesmed;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

    public function getComposants($search = null)
    {
        try {
            $query = DB::table('constituer')
                ->join('composant', 'constituer.id_composant', '=', 'composant.id_composant')
                ->join('medicament', 'medicament.id_medicament', '=', 'constituer.id_medicament')
                ->select('composant.lib_composant', 'constituer.qte_composant', 'medicament.nom_commercial');

            if (!empty($search)) {
                $query->where('medicament.nom_commercial', 'like', '%' . $search . '%');
            }

            return $query->get();
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }
    public function searchComposant($search)
    {
        try {
            return DB::table('constituer')
                ->join('composant', 'constituer.id_composant', '=', 'composant.id_composant')
                ->join('medicament', 'medicament.id_medicament', '=', 'constituer.id_medicament')
                ->where('medicament.nom_commercial', 'LIKE', '%' . $search . '%')
                ->select('composant.*', 'constituer.qte_composant', 'medicament.nom_commercial')
                ->get();
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }



    public function ajouterComposant($id_medicament, $id_composant, $quantite)
    {
        try {
            DB::table('constituer')->insert([
                'id_medicament' => $id_medicament,
                'id_composant' => $id_composant,
                'quantite' => $quantite
            ]);
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

    public function modifierComposant($id_medicament, $id_composant, $quantite)
    {
        try {
            DB::table('constituer')
                ->where('id_medicament', $id_medicament)
                ->where('id_composant', $id_composant)
                ->update(['quantite' => $quantite]);
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

    public function deleteComposant($id_medicament, $id_composant)
    {
        try {
            DB::table('constituer')
                ->where('id_medicament', $id_medicament)
                ->where('id_composant', $id_composant)
                ->delete();
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

    public function getMedFamille()
    {
        try {
            return DB::table('medicament')
                ->join('famille', 'medicament.id_famille', '=', 'famille.id_famille')
                ->select('famille.lib_famille', 'medicament.*')
                ->orderBy('famille.lib_famille', 'asc')
                ->orderBy('medicament.nom_commercial', 'asc')
                ->get();
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }
}
