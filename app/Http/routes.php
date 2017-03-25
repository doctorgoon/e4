<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function() {

// TABLEAU DE BORD
    Route::get('/administration/tableau-de-bord', 'AdminController@dashboard');

// CONNEXION
    Route::get('/administration', 'AdminController@loginUser');
    Route::post('/administration', 'AdminController@postLoginUser');
    Route::get('/administration/deconnexion', 'AdminController@logoutUser');

// PROFIL
    Route::get('/administration/mon-profil', 'AdminController@myProfile');
    Route::post('/administration/mon-profil', 'AdminController@postMyProfile');

// NOTES
    Route::get('/administration/mes-notes/lire-la-note/{id}', 'AdminController@readANote');
    Route::get('/administration/mes-notes/creer-une-note', 'AdminController@addANote');
    Route::post('/administration/mes-notes/creer-une-note', 'AdminController@postAddANote');
    Route::get('/administration/mes-notes/modifier-la-note/{id}', 'AdminController@editANote');
    Route::post('/administration/mes-notes/modifier-la-note/{id}', 'AdminController@postEditANote');
    Route::get('/administration/mes-notes/finir-la-note/{id}', 'AdminController@finishNote');
    Route::get('/administration/mes-notes/supprimer-la-note/{id}', 'AdminController@deleteANote');
    Route::post('/administration/mes-notes/supprimer-la-note/{id}', 'AdminController@postDeleteANote');
    Route::get('/administration/mes-notes', 'AdminController@myNotes');

// GESTION UTILISATEUR
    Route::get('/administration/outils/liste-des-utilisateurs', 'AdminToolsController@users');
    Route::get('/administration/outils/ajouter-un-utilisateur', 'AdminToolsController@addUser');
    Route::post('/administration/outils/ajouter-un-utilisateur', 'AdminToolsController@postAddUser');
    Route::get('/administration/outils/modifier-un-utilisateur/{id}', 'AdminToolsController@editUser');
    Route::post('/administration/outils/modifier-un-utilisateur/{id}', 'AdminToolsController@postEditUser');
    Route::get('/administration/outils/supprimer-un-utilisateur/{id}', 'AdminToolsController@deleteUser');
    Route::post('/administration/outils/supprimer-un-utilisateur/{id}', 'AdminToolsController@postDeleteUser');

// APPELS
    Route::get('/administration/appels', 'AdminCallsController@calls');
    Route::get('/administration/mes-appels', 'AdminCallsController@myCalls');
    Route::get('/administration/appels/nouveau', 'AdminCallsController@addCall');
    Route::get('/administration/appels/{id}', 'AdminCallsController@showCall');
    Route::post('/administration/appels/nouveau', 'AdminCallsController@postAddCall');
    Route::get('/administration/appels/{id}/modifier', 'AdminCallsController@editCall');
    Route::post('/administration/appels/{id}/modifier', 'AdminCallsController@postEditCall');
    Route::get('/administration/appels/associer/{id}', 'AdminCallsController@pairCall');
    Route::post('/administration/appels/associer/{id}', 'AdminCallsController@postPairCall');

// TICKETS
    Route::get('/administration/tickets/{id}/nouveau', 'AdminCallsController@addTicket');
    Route::post('/administration/tickets/{id}/nouveau', 'AdminCallsController@postAddTicket');
    Route::get('/administration/tickets/{id}/modifier', 'AdminCallsController@editTicket');
    Route::post('/administration/tickets/{id}/modifier', 'AdminCallsController@postEditTicket');
    Route::get('/administration/tickets/{id}/changer-statut', 'AdminCallsController@setStatus');
    Route::post('/administration/tickets/{id}/changer-statut', 'AdminCallsController@postSetStatus');

// CLIENTS
    Route::get('/administration/clients', 'AdminClientsController@clients');
    Route::get('/administration/clients/nouveau', 'AdminClientsController@addClient');
    Route::get('/administration/clients/call/{id}/nouveau', 'AdminClientsController@addClientCall');
    Route::post('/administration/clients/call/{id}/nouveau', 'AdminClientsController@postAddClientCall');
    Route::post('/administration/clients/rechercher-client/{origin}', 'AdminClientsController@postSearchClient');
    Route::get('/administration/clients/{id}', 'AdminClientsController@showClient');
    Route::post('/administration/clients/nouveau', 'AdminClientsController@postAddClient');
    Route::get('/administration/clients/{id}/modifier', 'AdminClientsController@editClient');
    Route::post('/administration/clients/{id}/modifier', 'AdminClientsController@postEditClient');
    Route::get('/administration/clients/{id}/supprimer', 'AdminClientsController@destroyClient');
    Route::post('/administration/clients/{id}/supprimer', 'AdminClientsController@postDestroyClient');

// PRODUITS
    Route::get('/administration/produits', 'AdminProductsController@products');
    Route::get('/administration/produits/ajouter', 'AdminProductsController@addProduct');
    Route::get('/administration/produits/{id}', 'AdminProductsController@showProduct');
    Route::get('/administration/produits/{id}', 'AdminProductsController@expeditProduct');
    Route::post('/administration/produits/ajouter', 'AdminProductsController@postAddProduct');
    Route::get('/administration/produits/{id}/modifier', 'AdminProductsController@editProduct');
    Route::post('/administration/produits/{id}/modifier', 'AdminProductsController@postEditProduct');
    Route::get('/administration/produits/{id}/supprimer', 'AdminProductsController@destroyProduct');
    Route::post('/administration/produits/{id}/supprimer', 'AdminProductsController@postDestroyProduct');

});

// POST Requests from the android app
Route::post('/app/get', 'AdminProductsController@showStatus');
Route::post('/app/set', 'AdminProductsController@changeStatus');

