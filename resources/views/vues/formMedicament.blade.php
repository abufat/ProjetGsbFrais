@extends('layouts.master')
@section('content')
    {!! Form::open(['url' => '/validerFrais']) !!}

    <div class="col-md-12  col-sm-12 well well-md">
        <h1> {{ $titreVue }} </h1>
        <div class="form-horizontal">
            <input type="text" name="id_medicament" value="{{$unMed->id_medicament}}"/>
            <div class="form-group">
                <label class="col-md-3 col-sm-3 control-label">Date d'offre : </label>
                <div class="col-md-2 col-sm-2">
                    <input type="text" name="anneemois" value="{{$unMed->date_rapport}}" class="form-control" placeholder="AAAA-MM" required autofocus  maxlength="10">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 col-sm-3 control-label">Id du praticien : </label>
                <div class="col-md-2  col-sm-2">
                    <input type="number" name="nbjustificatifs" value="{{$unMed->id_praticien}}"  class="form-control" placeholder="Nombre de justificatifs" required min="0" step="1">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 col-sm-3 control-label">Nom du patient : </label>
                <div class="col-md-3 col-sm-3">
                    <label class="control-label">{{$unMed->nom_visiteur}} </label>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                    <button type="submit" class="btn btn-default btn-primary"
                            onclick="javascript: window.location = '{{url('/validerFrais')}}';">
                        <span class="glyphicon glyphicon-ok"></span> Valider
                    </button>
                    &nbsp;
                    <button type="button" class="btn btn-default btn-primary"
                            onclick="javascript: window.location = '{{url('/getListeFrais')}} ';">
                        <span class="glyphicon glyphicon-remove"></span> Annuler</button>
                </div>
            </div>
        </div>
    </div>
