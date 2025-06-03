 @extends('layouts.master')
 @section('content')
         <div class="container">
             <div class="row justify-content-center">
                 <div class="col-md-10 col-sm-12">
                     <h1>Liste des visites</h1>
                     <table class="table table-bordered table-striped table-responsive">
                         <thead>
                         <th style="width:10%" class="text-center">Nom du praticien </th>
                         <th style="width:10%" class="text-center">Nom du visiteur </th>
                         <th style="width:10%" class="text-center">Date Rapport</th>
                         <th style="width:20%" class="text-center">Plus</th>
                         </thead>
                         @foreach($mesvisites as $unRapportVisite)
                             <tr>
                                 <td class="text-center">{{$unRapportVisite->nom_praticien }} {{$unRapportVisite->prenom_praticien }}</td>
                                 <td class="text-center"> {{$unRapportVisite->prenom_visiteur }} {{$unRapportVisite->prenom_praticien }}</td>
                                 <td class="text-center">{{$unRapportVisite->date_rapport }}</td>
                                 <td style="text-align:center;">
                                     <a href="/getListeMed/{{$unRapportVisite->id_rapport}}">
                                        <span class="glyphicon glyphicon-plus" data-toggle="tooltip" data-placement="top" title="Modifier">
                                        </span>
                                     </a>
                                 </td>
                             </tr>
                         @endforeach
                     </table>

                 </div>
             </div>
         </div>



