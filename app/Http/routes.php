<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
  Route::group(['middleware' => ['auth']], function () {
          Route::get('/', array('as' => 'user.welcome' , 'uses' => 'TestController@index'));
          Route::get('user/ppp/list',array('uses' => 'User\UserPPPController@listPPP'));
          Route::get('user/profile/update', array('as' => 'user.edit' , 'uses'=>'User\UserProfileController@getUpdateProfile')) ;
          Route::post('user/profile/update', array('as' =>'user.update' ,'uses'=>'User\UserProfileController@UpdateProfile'));
          Route::get('user/ppp/details/{ppp_id}', array('as' =>'ppp.details' ,'uses'=>'User\UserPPPController@showPPP'));
          Route::get('user/ppp/choix' , array('as' => 'ppp.choix' , 'uses' => 'User\UserPPPController@getChoixPPP' )) ;
          Route::post('user/ppp/choix' , array('as' => 'ppp.choix.save' , 'uses' => 'User\UserPPPController@postChoixPPP' )) ;
          Route::get('user/binome/choix', array('as' => 'binom.choix' , 'uses' => 'User\UserBinomageController@choixBinomage')) ;
          Route::post('user/binome/choix', array('as' => 'binom.choix.save' , 'uses' => 'User\UserBinomageController@saveChoixBinomage')) ;
          Route::get('user/binome/list', array('as' =>'binom.list' ,'uses'=>'User\UserBinomageController@listBinome'));
          Route::resource('user_module', 'User\userModuleController', ['only' => [
    'index', 'show'
]]);
  });

  Route::group(['middleware' => ['professeur']], function () {
          Route::get('/professeur', array('as' => 'professeur.welcome'  ,'uses' => 'TestController@professeur'));
          Route::get('/professeur/add_ppp', array('as' => 'professeur.add' ,'uses' => 'Professeur\ProfesseurPPPController@getAddPPP')) ;
          Route::post('/professeur/add_ppp', array('as' => 'professeur.add.save' ,'uses' => 'Professeur\ProfesseurPPPController@postAddPPP')) ;
          Route::get('professeur/profile', array('as' => 'professeur.edit' , 'uses'=> 'Professeur\ProfesseurProfileController@getUpdateProfile')) ;
         Route::put('professeur/profile/update', array('as' => 'professeur.update' , 'uses'=> 'Professeur\ProfesseurProfileController@updateProfile')) ;
          Route::get('profeseur/ppp/list',array('as' =>'professeur.ppp.list' ,'uses' => 'Professeur\ProfesseurPPPController@listMyPPP'));
          Route::get('professeur/ppp/modifier/{ppp_id}', array('as' =>'professeur.ppp.modifier' ,'uses'=>'Professeur\ProfesseurPPPController@editPPP'));
          Route::post('professeur/profile/update', array('as' => 'professeur.ppp.update' , 'uses'=> 'Professeur\ProfesseurPPPController@updatePPP')) ;
          Route::get('professeur/ppp/mail/{ppp_id}' , array('as'=> 'ppp.user.mail' , 'uses'=> 'Professeur\ProfesseurPPPController@PPPEtudiantmail' ));
          Route::post('professeur/ppp/mail' , array('as'=> 'ppp.user.mail.send' , 'uses'=> 'Professeur\ProfesseurPPPController@SendEtudiantmail' ));
          Route::get('evaluer/{ppp_id}', array('as'=>'get.evaluer.ppp','uses'=>'Professeur\ProfesseurPPPController@getEvaluerPPP'));
          Route::post('evaluer', array('as'=> 'post.evaluer.ppp','uses'=>'Professeur\ProfesseurPPPController@postEvaluerPPP'));
          Route::get('professeur/soutenance/{id}',array('as'=>'ppp.encadrement.soutenance', 'uses'=> 'Professeur\ProfesseurPPPController@getSoutenancePPP'));
          Route::post('professeur/soutenance',array('as'=>'ppp.encadrement.soutenance.save', 'uses'=> 'Professeur\ProfesseurPPPController@postSoutenancePPP'));
          Route::get('professeur/mes_soutenances',array('as'=>'ppp.get.soutenances' , 'uses' => 'Professeur\ProfesseurPPPController@mesSoutenances'));
          //Examinateur Système de Notes
          Route::get('examinateur/{ppp_id}',array('as'=>'examinateur.note.get' , 'uses' => 'Professeur\ExaminateurController@getPPPNotesPage'));
          Route::post('examinateur',array('as'=>'examinateur.note.save' , 'uses' => 'Professeur\ExaminateurController@savePPPNotes'));
          Route::resource('module','Professeur\ProfesseurModuleController') ;
          Route::resource('categorie','Professeur\CategorieController') ;


  });


  Route::group(['middleware' => ['adminPPP']], function () {
      Route::get('/AdminPPP' , array('as'=>'adminPPP.welcome', 'uses' => 'adminPPP\AdminPPPController@welcomeAdminPPP' ));
      Route::get('/AdminPPP/Critere', array('as'=> 'adminPPP.critere.list', 'uses' => 'adminPPP\AdminPPPChoixController@indexCritere'));
      Route::get('/AdminPPP/Critere/Add', array('as'=> 'adminPPP.critere.add', 'uses' => 'adminPPP\AdminPPPChoixController@getAjouterPPP'));
      Route::post('/AdminPPP/Critere/Add', array('as'=> 'adminPPP.post.add', 'uses' => 'adminPPP\AdminPPPChoixController@postAddCritere'));
      Route::post('/AdminPPP/Critere/Delete',array('as'=>'adminPPP.post.delete','uses'=>'adminPPP\AdminPPPChoixController@deleteCritere'));
      Route::get('/AdminPPP/Critere/Update/{id}', array('as'=>'AdminPPP.update.critere','uses'=>'adminPPP\AdminPPPChoixController@updateCritere'));
      Route::post('/AdminPPP/Critere/Update', array('as'=>'AdminPPP.update.critere.save','uses'=>'adminPPP\AdminPPPChoixController@saveUpdateCritere'));
      Route::get('/AdminPPP/Etudiant/Add',array('as'=>'AdminPPP.etudiant.add.get','uses'=> 'adminPPP\AdminPPPEtudiantsController@getAddEtudiant'));
      Route::post('/AdminPPP/Etudiant/Add',array('as'=>'AdminPPP.etudiant.add.post','uses'=> 'adminPPP\AdminPPPEtudiantsController@saveEtudiant'));
      Route::get('/AdminPPP/Etudiant/List', array('as'=>'AdminPPP.etudiant.list','uses' => 'adminPPP\AdminPPPEtudiantsController@listEtudiant'));
      Route::post('/AdminPPP/Etudiant/Delete', array('as'=>'AdminPPP.etudiant.delete','uses'=>'adminPPP\AdminPPPEtudiantsController@deleteEtudiant'));
      Route::get('/AdminPPP/Etudiant/Update/{id}',array('as'=> 'AdminPPP.etudiant.update.get','uses'=>'adminPPP\AdminPPPEtudiantsController@getUpdateEtudiant'));
      Route::post('/AdminPPP/Etudiant/Update',array('as'=> 'AdminPPP.etudiant.update.post','uses'=>'adminPPP\AdminPPPEtudiantsController@postUpdateEtudiant'));
      Route::get('/AdminPPP/Professeur/Add', array('as'=>'AdminPPP.professeur.add.get','uses' => 'adminPPP\AdminPPPProfesseurController@getAddProfesseur'));
      Route::post('/AdminPPP/Professeur/Add',array('as'=> 'AdminPPP.professeur.add.post','uses'=>'adminPPP\AdminPPPProfesseurController@saveProfesseur' ));
      Route::get('/AdminPPP/Professeur/List', array('as'=>'AdminPPP.professeur.list.get','uses' => 'adminPPP\AdminPPPProfesseurController@getListProfesseur'));
      Route::post('/AdminPPP/Professeur/Delete', array('as'=>'AdminPPP.professeur.delete','uses'=>'adminPPP\AdminPPPProfesseurController@deleteProfesseur'));
      Route::get('/AdminPPP/Professeur/Update/{id}', array('as' => 'AdminPPP.professeur.update.get','uses' => 'adminPPP\AdminPPPProfesseurController@getUpdateProfesseur'));
      Route::post('/AdminPPP/Professeur/Update', array('as' => 'AdminPPP.professeur.update.post','uses' => 'adminPPP\AdminPPPProfesseurController@postUpdateProfesseur'));
      Route::get('/AdminPPP/ListeBinome/Rang', array('as'=>'AdminPPP.professeur.listebinomerang','uses'=>'adminPPP\AdminPPPAffectationController@obtenirRangBinome'));
      Route::get('/AdminPPP/Critere/Examinateur/Add', array('as'=> 'adminPPP.critere.examinateur.add', 'uses' => 'adminPPP\AdminPPPChoixController@getAjouterCritereExaminateur'));
      Route::post('/AdminPPP/Critere/Examinateur/Add', array('as'=> 'adminPPP.critere.examinateur.add.save', 'uses' => 'adminPPP\AdminPPPChoixController@postAjouterCritereExaminateur'));
      Route::get('/AdminPPP/Critere/Examinateur', array('as'=> 'adminPPP.critere.examinateur.list', 'uses' => 'adminPPP\AdminPPPChoixController@indexCritereExaminateur'));
      Route::post('/AdminPPP/Critere/Examinateur/Delete',array('as'=>'adminPPP.post.examinateur.delete','uses'=>'adminPPP\AdminPPPChoixController@deleteCritereExaminateur'));
      Route::get('/AdminPPP/Critere/Examinateur/Update/{id}', array('as'=>'AdminPPP.update.examinateur.critere','uses'=>'adminPPP\AdminPPPChoixController@updateCritereExaminateur'));
      Route::post('/AdminPPP/Critere/Update', array('as'=>'AdminPPP.update.examinateur.critere.save','uses'=>'adminPPP\AdminPPPChoixController@saveUpdateExaminateurCritere'));
      Route::get('/AdminPPP/Sujet/Affectation/{id}', array('as'=>'AdminPPP.sujet.affectation','uses'=>'adminPPP\AffectationController@affecterLesSujetsParFiliere'));
        Route::resource('admin_module','adminPPP\AdminModuleController') ;
  });



Route::post('api/v1', 'WebApiController@postIndex');
Route::get('professeur/login', 'Auth\AuthProfesseurController@getLogin');
Route::post('professeur/login', 'Auth\AuthProfesseurController@postLogin');
Route::get('professeur/logout', 'Auth\AuthProfesseurController@logout');
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@logout');
//Admin ppp
Route::get('AdminPPP/login', 'Auth\AuthAdminPPPController@getLogin');
Route::post('AdminPPP/login', 'Auth\AuthAdminPPPController@postLogin');
Route::get('AdminPPP/logout', 'Auth\AuthAdminPPPController@logout');

});
