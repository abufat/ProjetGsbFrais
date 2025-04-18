@extends('layouts.master')
@section('content')
    <h1>Liste des fiche de frais hors forfait </h1>
    <table class="table table-bordered table-striped table-responsive">
        <thead>
        <th style="width:30%">Date </th>
        <th style="width:30%"> Libellé</th>
        <th style="width:30%"> Montant </th>
        <th style="width:20%">Modifier</th>
        <th style="width:20%">Supprimer</th>
        </thead>
        @foreach($mesfraishf as $unfrais )
            <tr>
                <td>{{$unfrais->date_fraishorsforfait}}</td>
                <td>{{$unfrais->lib_fraishorsforfait}}</td>
                <td>{{$unfrais->montant_fraishorsforfait}}</td>
                <td style="text-align:center;">
                    <a href="/modifierFraishf/{{$unfrais->id_fraishorsforfait}}">
                    <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top"
                          title="Modifier">
                    </span>
                    </a>
                </td>
                <td style="text-align:center;">
                    <a onclick="javascript:if (confirm('Suppression confirmée ?')) {
                    window.location='{{url('/supprimerFrais')}} '
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
                    onclick="javascript: window.location = '{{url('/ajouterFraisHf')}}';" >
                <span class="glyphicon glyphicon-plus-sign"></span> Ajouter </button>

            <button type="submit" class="btn btn-success"
                    onclick="javascript: window.location = '{{url('/validerMontants')}}';">
                <span class="glyphicon glyphicon-plus-sign"></span> Valider les montants </button>

            <button type="submit" class="btn btn-success"
           href="vues/listeHorsForfait/{{$unfrais->id_fraishorsforfait}}">
                <span class="glyphicon glyphicon-remove"></span> Annuler </button>
        </div>
    </div>

    @include('vues/error')

