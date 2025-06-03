@extends('layouts.master')
@section('content')
    {!! Form::open(['url' => '/getListeRapport']) !!}

    <div class="col-md-12  col-sm-12 well well-md">
        <div class="form-horizontal">
            <h1> {{ $titreVue }} </h1>
            <div class="form-group">
                <label class="col-md-3 col-sm-3 control-label">Nom du practicien: </label>
                <div class="col-md-3 col-sm-3">
                    <input type="text" name="search" value="" class="form-control" placeholder="Nom Practicien" required min="0" step="1" >
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 col-sm-3  control-label">Date du rapport : </label>
                <div class="col-md-2 col-sm-2">
                    <input type="date" name="searchdate" value="" class="form-control" placeholder="JJ-MM-AAAA"  autofocus  maxlength="10" minlength="2">
                </div>
            </div>


            <div class="form-group">
                <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                    <button type="submit" class="btn btn-default btn-primary">
                        <span class="glyphicon glyphicon-search"></span> Valider
                    </button>
                    &nbsp;
                </div>
            </div>
        </div>
    </div>
