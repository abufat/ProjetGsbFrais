<?php

namespace App\dao;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Exceptions\MonException;
use App\Models\FraisHorsForfait;

class ServiceHorsForfait
{
    public function getFraisHf($id)
    {
        try {
            $mesfraishf = DB::table('fraishorsforfait')
                ->join('frais', 'frais.id_frais', '=', 'fraishorsforfait.id_frais') // Fixed join syntax
                ->select('fraishorsforfait.*', 'frais.*')
                ->where('frais.id_visiteur', '=', $id)
                ->get();
            return $mesfraishf;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }


    public function getHfByID($id_fraishf)
    {
        try {
            $fraisHF = DB::table('fraishorsforfait')
                ->where('id_fraishorsforfait', '=', $id_fraishf)
                ->first();
            return $fraisHF;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }

    public function updateFraisHf($id_fraishf, $libhf, $montant)
    {
        try {
            $aujourdhui = date("Y-m-d ");
            DB::table('fraishorsforfait')
                ->where('id_fraishorsforfait', $id_fraishf)
                ->update(['date_fraishorsforfait' => $aujourdhui,
                    'lib_fraishorsforait' => $libhf, 'montant_fraishorsforfait' => $montant]);
        } catch (QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }
    public function deletefraiHf($id_fraishf)
    {
        try {
        DB::table('fraishorsforfait')->where('id', $id_fraishf)->delete();
    } catch (QueryException $e){
            $erreur=$e->getMessage();
            if ($e->getCode()==23000) {
                $erreur="Impossible de supprimer une fiche ayant des frais liés ";
            }
            throw new MonException($erreur,5);
        }
    }
}
