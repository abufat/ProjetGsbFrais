@extends('layouts.master')
@section('content')
    {!! Form::open(['url' => '/validerMed']) !!}

    <div class="col-md-12  col-sm-12 well well-md">
        <h1> {{ $titreVue }} </h1>
        <div>
            <input type="hidden" name="id_rapport" value="{{ $unMed->id_rapport }}">
        </div>

    <div class="form-horizontal">
        <div class="form-group">
            <label class="col-md-3 control-label">Nom du médicament :</label>
            <div class="col-md-2" >
                <input type="text" class="form-control" value="{{ $unMed->nom_commercial }}" disabled>
                <input type="hidden" name="id_medicament" value="{{ $unMed->id_medicament }}">
            </div>
        </div>
    </div>
    <div class="form-horizontal">
        <div class="form-group">
            <label class="col-md-3 col-sm-3 control-label">Quantité offerte: </label>
            <div class="col-md-2  col-sm-2">
                <input type="number" name="qteofferte" value="{{$unMed->qte_offerte}}"  class="form-control" placeholder="Quantité offerte" required min="0" step="1">
            </div>
        </div>
    </div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                <button type="submit" class="btn btn-default btn-primary"
                        onclick="javascript: window.location = '{{url('/validerMed')}}';">
                    <span class="glyphicon glyphicon-ok"></span> Valider
                </button>
                    &nbsp;
                <button type="button" class="btn btn-default btn-primary"
                        onclick="window.location.href='{{ url('/getListeMed/' . $unMed->id_rapport) }}';">
                    <span class="glyphicon glyphicon-remove"></span> Annuler
                </button>
            </div>
        </div>
    </div>

