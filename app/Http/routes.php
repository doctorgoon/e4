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

Route::group(['middleware' => ['admin']], function() {

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
    Route::get('/administration/mes-notes/finir-la-note/{id}', 'AdminController@finishNoteDash');
    Route::get('/administration/mes-notes/supprimer-la-note/{id}', 'AdminController@deleteANote');
    Route::post('/administration/mes-notes/supprimer-la-note/{id}', 'AdminController@postDeleteANote');
    Route::get('/administration/mes-notes', 'AdminController@myNotes');

// GESTION UTILISATEUR
    Route::get('/administration/utilisateurs/liste-des-utilisateurs', 'AdminUsersController@users');
    Route::get('/administration/utilisateurs/ajouter-un-utilisateur', 'AdminUsersController@addUser');
    Route::post('/administration/utilisateurs/ajouter-un-utilisateur', 'AdminUsersController@postAddUser');
    Route::get('/administration/utilisateurs/modifier-un-utilisateur/{id}', 'AdminUsersController@editUser');
    Route::post('/administration/utilisateurs/modifier-un-utilisateur/{id}', 'AdminUsersController@postEditUser');
    Route::get('/administration/utilisateurs/supprimer-un-utilisateur/{id}', 'AdminUsersController@deleteUser');
    Route::post('/administration/utilisateurs/supprimer-un-utilisateur/{id}', 'AdminUsersController@postDeleteUser');

// APPELS
    Route::get('/administration/appels', 'CallsController@calls');
    Route::get('/administration/mes-appels', 'CallsController@myCalls');
    Route::get('/administration/appels/nouveau', 'CallsController@addCall');
    Route::get('/administration/appels-client/{id}/nouveau', 'CallsController@addClientCall');
    Route::get('/administration/appels/{id}', 'CallsController@showCall');
    Route::post('/administration/appels/nouveau', 'CallsController@postAddCall');
    Route::get('/administration/appels/{id}/modifier', 'CallsController@editCall');
    Route::post('/administration/appels/{id}/modifier', 'CallsController@postEditCall');
    Route::get('/administration/appels/associer/{id}', 'CallsController@pairCall');
    Route::post('/administration/appels/associer/{id}', 'CallsController@postPairCall');
    Route::get('/administration/appels/supprimer/{id}', 'CallsController@destroyCall');
    Route::post('/administration/appels/supprimer/{id}', 'CallsController@postDestroyCall');


// TICKETS
    Route::get('/administration/tickets/{id}/nouveau', 'CallsController@addTicket');
    Route::post('/administration/tickets/{id}/nouveau', 'CallsController@postAddTicket');
    Route::get('/administration/tickets/{id}/modifier', 'CallsController@editTicket');
    Route::post('/administration/tickets/{id}/modifier', 'CallsController@postEditTicket');
    Route::get('/administration/tickets/{id}/changer-statut', 'CallsController@setStatus');
    Route::post('/administration/tickets/{id}/changer-statut', 'CallsController@postSetStatus');

// CLIENTS
    Route::get('/administration/clients/{sort?}', 'ClientsController@clients')->defaults('sort', 'lastname');
    Route::get('/administration/clients/nouveau', 'ClientsController@addClient');
    Route::get('/administration/clients/call/{id}/nouveau', 'ClientsController@addClientCall');
    Route::post('/administration/clients/call/{id}/nouveau', 'ClientsController@postAddClientCall');
    Route::post('/administration/clients/rechercher-client/{origin}', 'ClientsController@postSearchClient');
    Route::get('/administration/clients/id/{id}', 'ClientsController@showClient');
    Route::post('/administration/clients/nouveau', 'ClientsController@postAddClient');
    Route::get('/administration/clients/{id}/modifier', 'ClientsController@editClient');
    Route::post('/administration/clients/{id}/modifier', 'ClientsController@postEditClient');
    Route::get('/administration/clients/{id}/supprimer', 'ClientsController@destroyClient');
    Route::post('/administration/clients/{id}/supprimer', 'ClientsController@postDestroyClient');

// PRODUITS
    Route::get('/administration/produits', 'ProductsController@products');
    Route::get('/administration/produits/ajouter', 'ProductsController@addProduct');
    Route::get('/administration/produits/{id}', 'ProductsController@showProduct');
    Route::get('/administration/produits/{id}/expedier', 'ProductsController@expeditProduct');
    Route::post('/administration/produits/ajouter', 'ProductsController@postAddProduct');
    Route::get('/administration/produits/{id}/modifier', 'ProductsController@editProduct');
    Route::post('/administration/produits/{id}/modifier', 'ProductsController@postEditProduct');
    Route::get('/administration/produits/{id}/supprimer', 'ProductsController@destroyProduct');
    Route::post('/administration/produits/{id}/supprimer', 'ProductsController@postDestroyProduct');

});

// POST Requests from the android app
Route::post('/app/get', 'ProductsController@showStatus');
Route::post('/app/set', 'ProductsController@changeStatus');
