<?php

namespace App\dao;

use App\Models\Frais;
use Collective\Html\Eloquent;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Exceptions\MonException;
use MongoDB\Driver\Session;


class ServiceFrais
{
    public function getFrais($id)
    {
        try {
            $mesfrais = DB::table('frais')
                ->select()
                ->where('id_visiteur', '=', $id)
                ->orderBy('anneemois')
                ->get();
            return $mesfrais;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

    public function getById($id_frais)
    {
        try {
            $mesId = DB::table('frais')
                ->select()
                ->where('id_frais', '=', $id_frais)
                ->first();
            return $mesId;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }

    public function updatefrais($id_frais, $anneemois, $nbjustificatifs)
    {
        try {
            $aujourdhui = date("Y-m-d ");
            DB::table('frais')
                ->where('id_frais', $id_frais)
                ->update(['datemodification' => $aujourdhui,
                    'anneemois' => $anneemois, 'nbjustificatifs' => $nbjustificatifs]);
        } catch (QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }
    public function insertfrais($id_visiteur,$anneemois,$nbjustificatifs)
    {
        try {
            $aujourdhui = date("Y-m-d ");
            DB::table('frais')
            ->insert(['datemodification' => $aujourdhui,
                'id_etat'=>2,
                'id_visiteur'=>$id_visiteur,
                'anneemois'=>$anneemois ,
                'nbjustificatifs'=>$nbjustificatifs],
            );
        } catch (QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }
    public function deletefrais($id_frais)
    {

        try {
            DB::table('frais')->where('id_frais', $id_frais)->delete();
        } catch (QueryException $e) {
            $erreur=$e->getMessage();
            if ($e->getCode()==23000) {
                $erreur="Impossible de supprimer une fiche ayant des frais liés ";
            }
            throw new MonException($erreur,5);
        }
    }
}
