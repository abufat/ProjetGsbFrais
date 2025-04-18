@extends('layouts.master')

@section('content')
    {!! Form::open(['url' => '/validerFraisHf']) !!}

    <div class="col-md-12 col-sm-12 well well-md">
        <h1> {{ $titreVue }} </h1>

        <div class="form-horizontal">
            <input type="hidden" name="id_fraishorsforfait" value="{{ $unFraishf->id_fraishorsforfait}}">

            <div class="form-group">
                <label class="col-md-3 col-sm-3 control-label" for="date">Date :</label>
                <div class="col-md-2 col-sm-2">
                    <input type="text" name="date_horsforfait" value="{{ $unFraishf->date_fraishorsforfait }}" class="form-control" placeholder="AAAA-MM" required autofocus maxlength="7">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 col-sm-3 control-label" for="libelle">Libellé :</label>
                <div class="col-md-5 col-sm-5">
                    <input type="text" name="lib_fraishorsforfait" value="{{ $unFraishf->lib_fraishorsforfait }}" class="form-control" placeholder="Libellé du frais hors forfait" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 col-sm-3 control-label" for="montant">Montant :</label>
                <div class="col-md-2 col-sm-2">
                    <input type="number" step="0.01" name="montant_fraishorsforfait" value="{{ $unFraishf->montant_fraishorsforfait }}" class="form-control" placeholder="Montant" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                    <button type="submit" class="btn btn-default btn-primary">
                        <span class="glyphicon glyphicon-ok"></span> Valider
                    </button>
                    &nbsp;
                    <button type="button" class="btn btn-default btn-primary"
                            onclick="javascript: window.location = '{{url('/getListeHorsForfait')}} ';"
                        class="btn btn-default btn-primary">
                        <span class="glyphicon glyphicon-remove"></span> Annuler </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {!! Form::close() !!}
@endsection
