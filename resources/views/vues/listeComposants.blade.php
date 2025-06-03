@extends('layouts.master')
@section('content')
    <title> Recherche de composant</title>
    <div class="container">
        <form method="GET" action="{{ url('/getComposants') }}" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Rechercher un médicament..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary glyphicon glyphicon-search">Rechercher</button>
                <a href="{{ url('/getComposants') }}" class="btn btn-secondary">Réinitialiser</a>
            </div>
        </form>

        <div class="row justify-content-center">
            <div class="col-md-10 col-sm-12">
                <h1>Liste des médicaments </h1>
                <table class="table table-bordered table-striped table-responsive">
                    <thead>
                    <th style="width:10%" class="text-center">Nom du médicament </th>
                    <th style="width:10%" class="text-center">Composant </th>

                    <th style="width:10%" class="text-center">Qté du composant </th>
                    </thead>
                    @foreach($composants as $unComp)
                        <tr>
                            <td class="text-center">{{$unComp->nom_commercial }} </td>
                            <td class="text-center"> {{$unComp->lib_composant}} </td>
                            <td class="text-center"> {{$unComp->qte_composant}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
