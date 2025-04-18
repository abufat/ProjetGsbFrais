<?php

namespace App\dao;

use App\Exceptions\MonException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class ServicePracticien
{
    public function getPracticienById($id_practicen)
    {
        try {
            $mespracticiens = DB::table('practicien')
                ->select()
                ->where('id_practicien', "=", $id_practicen)
                ->orderBy('id_practicien')
                ->get();
            return $mespracticiens;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

    public function getPracticiens()
    {
        try {
            $mespracticiens = DB::table('practicen')
                ->select()
                ->orderBy('id_practicen')
                ->get();
            return $mespracticiens;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }
}
