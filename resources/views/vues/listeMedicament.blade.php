@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-sm-12">
                <h1>Liste des médicaments </h1>
                <table class="table table-bordered table-striped table-responsive">
                    <thead>
                    <th style="width:10%" class="text-center">Id du rapport </th>
                    <th style="width:10%" class="text-center">Nom du praticien </th>
                    <th style="width:10%" class="text-center">
                        <i class="bi bi-prescription2" data-toggle="tooltip" data-placement="center" title="medicament"></i>
                    </th>
                    <th style="width:10%" class="text-center">Qté offerte</th>
                    <th style="width:20%" class="text-center">Modifier</th>
                    <th style="width:20%" class="text-center">Supprimer</th>
                    </thead>
                    @foreach($mesMed as $unMedicament)
                        <tr>
                            <td class="text-center">{{$unMedicament->id_rapport }} </td>
                            <td class="text-center"> {{$unMedicament->nom_praticien}} {{$unMedicament->prenom_praticien}}</td>
                            <td class="text-center"> {{$unMedicament->nom_commercial}}</td>
                            <td class="text-center">{{$unMedicament->qte_offerte }}</td>
                            <td style="text-align:center;">
                                <a href="/modifierMeds/{{$unMedicament->id_rapport}}">
                                        <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" title="Modifier">
                                        </span>
                                </a>
                            </td>
                            <td style="text-align:center;">
                                <a onclick="javascript:if (confirm('Suppression confirmée ?'))  {
                                     window.location='{{url('/supprimerMed')}}'/{{$unMedicament->id_medicament}}
					            }">
                                 <span class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="top"
                                title="Supprimer"></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                        <button type="submit" class="btn btn-default btn-primary"
                                onclick="javascript: window.location = '{{url('/validerFrais')}}';">
                            <span class="glyphicon glyphicon-ok"></span> Ajouter des médicaments
                        </button>
                        &nbsp;</div>
                </div>
            </div>
        </div>
    </div>
