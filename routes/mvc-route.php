<?php
use Illuminate\Support\Facades\Route;
Route::group(['prefix'=>config('mvc.route_prefix')], function () { // remove this line if you dont have route group prefix
    Route::group(['middleware'=>['userRoles']], function () {
		//departement
		Route::prefix('departement')->as('departement')->group(function () {
			Route::get('data', 'Departement\DepartementController@data');
			Route::get('delete/{id}', 'Departement\DepartementController@delete');
		});
		Route::resource('departement', 'Departement\DepartementController');
		//end-departement
		//projet
		Route::prefix('projet')->as('projet')->group(function () {
			Route::get('data', 'Projet\ProjetController@data');
			Route::get('delete/{id}', 'Projet\ProjetController@delete');
			Route::get('{id}/membres','Projet\ProjetController@membres');
		});
		Route::resource('projet', 'Projet\ProjetController');
		//end-projet
		//office
		Route::prefix('office')->as('office')->group(function () {
			Route::get('data', 'Office\OfficeController@data');
			Route::get('delete/{id}', 'Office\OfficeController@delete');
		});
		Route::resource('office', 'Office\OfficeController');
		//end-office
		//donor
		Route::prefix('donor')->as('donor')->group(function () {
			Route::get('data', 'Donor\DonorController@data');
			Route::get('delete/{id}', 'Donor\DonorController@delete');
		});
		Route::resource('donor', 'Donor\DonorController');
		//end-donor
		//national-organisation
		Route::prefix('national-organisation')->as('national-organisation')->group(function () {
			Route::get('data', 'NationalOrganisation\NationalOrganisationController@data');
			Route::get('delete/{id}', 'NationalOrganisation\NationalOrganisationController@delete');
		});
		Route::resource('national-organisation', 'NationalOrganisation\NationalOrganisationController');
		//end-national-organisation
		//membres-departement
		Route::prefix('membres-departement')->as('membres-departement')->group(function () {
			Route::get('data', 'MembresDepartement\MembresDepartementController@data');
			Route::get('delete/{id}', 'MembresDepartement\MembresDepartementController@delete');
		});
		Route::resource('membres-departement', 'MembresDepartement\MembresDepartementController');
		//end-membres-departement
		//membres-projet
		Route::prefix('membres-projet')->as('membres-projet')->group(function () {
			Route::get('data', 'MembresProjet\MembresProjetController@data');
			Route::get('projet/{id_projet}', 'MembresProjet\MembresProjetController@ProjectMembers');
			Route::get('delete/{id}', 'MembresProjet\MembresProjetController@delete');
		});
		Route::resource('membres-projet', 'MembresProjet\MembresProjetController');
		//end-annee-fiscal
		//annee-fiscale
		Route::prefix('annee-fiscale')->as('annee-fiscale')->group(function () {
			Route::get('data', 'AnneeFiscale\AnneeFiscaleController@data');
			Route::get('delete/{id}', 'AnneeFiscale\AnneeFiscaleController@delete');
		});
		Route::resource('annee-fiscale', 'AnneeFiscale\AnneeFiscaleController');
		//end-annee-fiscale
		//categorie-approvisionnement
		Route::prefix('categorie-approvisionnement')->as('categorie-approvisionnement')->group(function () {
			Route::get('data', 'CategorieApprovisionnement\CategorieApprovisionnementController@data');
			Route::get('delete/{id}', 'CategorieApprovisionnement\CategorieApprovisionnementController@delete');
		});
		Route::resource('categorie-approvisionnement', 'CategorieApprovisionnement\CategorieApprovisionnementController');
		//end-categorie-approvisionnement
		//budget
		Route::prefix('budget')->as('budget')->group(function () {
			Route::get('data', 'Budget\BudgetController@data');
			Route::get('delete/{id}', 'Budget\BudgetController@delete');
		});
		Route::resource('budget', 'Budget\BudgetController');
		//end-budget
		//budget-item
		Route::prefix('budget-item')->as('budget-item')->group(function () {
			Route::get('data', 'BudgetItem\BudgetItemController@data');
			Route::get('delete/{id}', 'BudgetItem\BudgetItemController@delete');
		});
		Route::resource('budget-item', 'BudgetItem\BudgetItemController');
		//end-budget-item
		//budget-phasing-check
		Route::prefix('budget-phasing-check')->as('budget-phasing-check')->group(function () {
			Route::get('data', 'BudgetPhasingCheck\BudgetPhasingCheckController@data');
			Route::get('delete/{id}', 'BudgetPhasingCheck\BudgetPhasingCheckController@delete');
		});
		Route::resource('budget-phasing-check', 'BudgetPhasingCheck\BudgetPhasingCheckController');
		//end-budget-phasing-check
		//module
		Route::prefix('module')->as('module')->group(function () {
			Route::get('data', 'Module\ModuleController@data');
			Route::get('delete/{id}', 'Module\ModuleController@delete');
		});
		Route::resource('module', 'Module\ModuleController');
		//end-module
		//role
		Route::prefix('role')->as('role')->group(function () {
			Route::get('data', 'Role\RoleController@data');
			Route::get('delete/{id}', 'Role\RoleController@delete');
		});
		Route::resource('role', 'Role\RoleController');
		//end-role
		//user-role
		Route::prefix('user-role')->as('user-role')->group(function () {
			Route::get('data', 'UserRole\UserRoleController@data');
			Route::get('delete/{id}', 'UserRole\UserRoleController@delete');
		});
		Route::resource('user-role', 'UserRole\UserRoleController');
		//end-user-role
		//processus
		Route::prefix('processus')->as('processus')->group(function () {
			Route::get('data', 'Processus\ProcessusController@data');
			Route::get('delete/{id}', 'Processus\ProcessusController@delete');
			Route::get('{id}/etapes', 'Processus\ProcessusController@listEtapes');
			Route::get('list', 'Processus\ProcessusController@ajaxListProcessus');
			Route::get('{id}/create-etape', 'Processus\ProcessusController@createEtape');
			Route::get('{id}/edit-etape', 'Processus\ProcessusController@editEtape');
			Route::get('delete-etape/{id}', 'Processus\ProcessusController@deleteEtape');
			Route::post('store-etape', 'Processus\ProcessusController@storeEtape')->name('.store-etape');
			Route::post('update-etape', 'Processus\ProcessusController@updateEtape')->name('.update-etape');
			Route::post('destroy-etape', 'Processus\ProcessusController@destroyEtape')->name('.destroy-etape');
			Route::post('sorted-etapes', 'Processus\ProcessusController@sortedEtapes')->name('.sorted-etapes');;
		});
		Route::resource('processus', 'Processus\ProcessusController');
		//end-processus
		//etape
		Route::prefix('etape')->as('etape')->group(function () {
			Route::get('data', 'Etape\EtapeController@data');
			Route::get('delete/{id}', 'Etape\EtapeController@delete');
		});
		Route::resource('etape', 'Etape\EtapeController');
		//end-etape
		//type-document
		Route::prefix('type-document')->as('type-document')->group(function () {
			Route::get('data', 'TypeDocument\TypeDocumentController@data');
			Route::get('delete/{id}', 'TypeDocument\TypeDocumentController@delete');
		});
		Route::resource('type-document', 'TypeDocument\TypeDocumentController');
		//end-type-document
		//document-etape
		Route::prefix('document-etape')->as('document-etape')->group(function () {
			Route::get('data', 'DocumentEtape\DocumentEtapeController@data');
			Route::get('delete/{id}', 'DocumentEtape\DocumentEtapeController@delete');
		});
		Route::resource('document-etape', 'DocumentEtape\DocumentEtapeController');
		//end-document-etape
		//processus-engage
		Route::prefix('processus-engage')->as('processus-engage')->group(function () {
			Route::get('data', 'ProcessusEngage\ProcessusEngageController@data');
			Route::get('delete/{id}', 'ProcessusEngage\ProcessusEngageController@delete');
			Route::get('initier', 'ProcessusEngage\ProcessusEngageController@initier')->name('.initier');
			Route::get('get-entites/{type}', 'ProcessusEngage\ProcessusEngageController@getEntites')->name('.get-entites');
			Route::get('get-users/{option}/{level}', 'ProcessusEngage\ProcessusEngageController@getUsers')->name('.get-users');
			Route::get('selection-processus/{processus_id}', 'ProcessusEngage\ProcessusEngageController@selectionProcessus')->name('.selection-processus');
			Route::get('set-etape/{processus_id}/{ordretape}', 'ProcessusEngage\ProcessusEngageController@setEtapeProcessus')->name('.set-etape');
			Route::post('store-processus-init', 'ProcessusEngage\ProcessusEngageController@storeProcessusInit')->name('.store-processus-init');
		});
		Route::resource('processus-engage', 'ProcessusEngage\ProcessusEngageController');
		//end-processus-engage
		//document-etape-upload
		Route::prefix('document-etape-upload')->as('document-etape-upload')->group(function () {
			Route::get('data', 'DocumentEtapeUpload\DocumentEtapeUploadController@data');
			Route::get('delete/{id}', 'DocumentEtapeUpload\DocumentEtapeUploadController@delete');
		});
		Route::resource('document-etape-upload', 'DocumentEtapeUpload\DocumentEtapeUploadController');
		//end-document-etape-upload
		//user-assigne-etape
		Route::prefix('user-assigne-etape')->as('user-assigne-etape')->group(function () {
			Route::get('data', 'UserAssigneEtape\UserAssigneEtapeController@data');
			Route::get('delete/{id}', 'UserAssigneEtape\UserAssigneEtapeController@delete');
		});
		Route::resource('user-assigne-etape', 'UserAssigneEtape\UserAssigneEtapeController');
		//end-user-assigne-etape
		//etape-metadonnee
		Route::prefix('etape-metadonnee')->as('etape-metadonnee')->group(function () {
			Route::get('data', 'EtapeMetadonnee\EtapeMetadonneeController@data');
			Route::get('delete/{id}', 'EtapeMetadonnee\EtapeMetadonneeController@delete');
		});
		Route::resource('etape-metadonnee', 'EtapeMetadonnee\EtapeMetadonneeController');
		//end-etape-metadonnee
		//{{route replacer}} DON'T REMOVE THIS LINE
    });
});
