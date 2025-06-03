@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-sm-12">
                <h1>Liste des médicaments </h1>
                <table class="table table-bordered table-striped table-responsive">
                    <thead>
                    <th style="width:10%" class="text-center">Nom du médicament </th>
                    <th style="width:10%" class="text-center">Nom du praticien </th>

                    </thead>
                    @foreach($familles as $unMedFam)
                        <tr>
                            <td class="text-center">{{$unMedFam->nom_commercial }} </td>
                            <td class="text-center"> {{$unMedFam->lib_famille}} </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
