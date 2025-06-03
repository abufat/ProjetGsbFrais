<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/formLogin','App\Http\Controllers\VisiteurController@getLogin');

Route::post('/login','App\Http\Controllers\VisiteurController@signIn');

Route::get('/getLogout','App\Http\Controllers\VisiteurController@signOut');

Route::get('/getListeFrais','App\Http\Controllers\FraisController@getFraisVisiteur');

Route::get('/modifierFrais/{id}','App\Http\Controllers\FraisController@updateFrais');

Route::get('/ajouterFrais','App\Http\Controllers\FraisController@addFrais');

Route::post('/validerFrais','App\Http\Controllers\FraisController@validateFrais');

Route::get('/supprimerFrais','App\Http\Controllers\FraisController@removeFrais');

Route::get('/getListeHorsForfait/{id_frais}','App\Http\Controllers\FraisController@getFraisHf');

Route::get('/modifierFraishf/{id_fraishorsforfait}','App\Http\Controllers\FraisController@updateFraisHf');

Route::get('/ajouterFraisHf','App\Http\Controllers\FraisController@addFraisHf');

Route::post('/validerFraishf','App\Http\Controllers\FraisController@validateFraisHf');

Route::get('/getListeVisites','App\Http\Controllers\RapportVisiteController@getRapportVisite');

Route::get('/ajouterVisite','App\Http\Controllers\RapportVisiteController@addRapportVisite'); Route::post('/validerVisite','App\Http\Controllers\RapportVisiteController@validateRapport');

Route::get('/chercheRapport','App\Http\Controllers\RapportVisiteController@formRapportVisite');

Route::post('/getListeRapport','App\Http\Controllers\RapportVisiteController@searchRapportVisite');

Route::get('/modifierMeds/{id}','App\Http\Controllers\RapportVisiteController@updateMed');

Route::get('/getListeMed/{id}','App\Http\Controllers\RapportVisiteController@getListeMed');

Route::get('/supprimerMed/{id}','App\Http\Controllers\RapportVisiteController@removeMedicaments');

Route::post('/validerMed','App\Http\Controllers\RapportVisiteController@validateMed');

Route::get('/getComposants','App\Http\Controllers\MedicamentController@getComp');

Route::get('/getMedFamille','App\Http\Controllers\MedicamentController@getMedsFamille');

