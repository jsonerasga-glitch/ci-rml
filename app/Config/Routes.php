<?php

namespace Config;

use App\Controllers\CrudController;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('User');
$routes->setDefaultMethod('login');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//$routes->get('/', 'LoginController::adminLogin');
//$routes->get('dashboardAdmin', 'DashboardController::dashboardAdmin');
//$routes->get('/', 'Home::index');

// Public page opened by scanning the QR code printed on certificates (no login required).
$routes->get('certificate/verify/(:segment)', 'CertificateVerification::verify/$1');

/*
$routes->get('table', 'CrudController::index', ['filter' => 'auth']);
$routes->post('rml-store', 'CrudController::store', ['filter' => 'auth']);
$routes->get('edit/(:num)', 'CrudController::edit/$1', ['filter' => 'auth']);
$routes->get('print', 'PdfController::index', ['filter' => 'auth']);
*/

//UserRoutes
	$routes->get('createUser', 'UserController::index', ['filter' => 'auth']);
	$routes->post('addUser', 'UserController::store', ['filter' => 'auth']);
	$routes->get('manageUser', 'User::table', ['filter' => 'auth']);
	$routes->get('deleteUser/(:any)', 'User::delete/$1', ['filter' => 'auth']);
	$routes->get('deleteGuest/(:any)', 'User::deleteGuest/$1', ['filter' => 'auth']);

	$routes->get('manageGuestUser', 'User::guestTable', ['filter' => 'auth']);

	$routes->post('forNotification', 'Dashboard::forNotification', ['filter' => 'auth']);

	$routes->post('profile/change_pass', 'UserController::changePassword', ['filter' => 'auth']);
	
//UserRoutes

//userlogin
	$routes->match(['get', 'post'], 'register', 'User::register', ['filter' => 'auth']);
	$routes->match(['get', 'post'], 'adminLogin', 'User::login', ['filter' => 'noauth']);
	$routes->get('dashboard', 'Dashboard::index', ['filter' => 'auth']);
	$routes->get('profile', 'User::profile', ['filter' => 'auth']);
	$routes->get('logout', 'User::logout');
	//userlogin
//guest
	$routes->get('guestUserIndex', 'User::GuestIndex', ['filter' => 'auth']);
	$routes->match(['get', 'post'], 'registerGuest', 'User::registerGuest', ['filter' => 'auth']);
//guest


//userguest
	$routes->match(['get', 'post'], '/', 'UserGuestController::guestLogin', ['filter' => 'noauth']);
	$routes->get('guestDashboard', 'UserGuestController::guestDashboard', ['filter' => 'auth']);
	$routes->get('pendingTable', 'Dashboard::pendingForCorrectionTable', ['filter' => 'auth']);

//guestelect
	// $routes->get('guestAddElect', 'UserGuestElectController::index', ['filter' => 'auth']);
	// $routes->post('guestStore', 'UserGuestElectController::store', ['filter' => 'auth']);
	// $routes->get('guestElectTable', 'UserGuestElectController::table', ['filter' => 'auth']);
	// $routes->get('guestElectEdit/(:any)', 'UserGuestElectController::update/$1', ['filter' => 'auth']);
	// $routes->post('guestElectUpdateData', 'UserGuestElectController::updateData', ['filter' => 'auth']);
	// $routes->get('guestDeleteElect/(:any)', 'UserGuestElectController::delete/$1', ['filter' => 'auth']);
	// $routes->post('guestGraphDataSave', 'UserGuestElectController::graphData', ['filter' => 'auth']);
	

//preview edit elect
// $routes->get('guestEditElect/(:any)', 'UserGuestElectController::edit/$1', ['filter' => 'auth']);
//preview PDF
// $routes->post('guestElectToPdfPreview/(:num)', 'UserGuestElectController::htmlToPDFPreview/$1', ['filter' => 'auth']);
//download elect pdf
// $routes->post('guestElectToPdf/(:num)', 'UserGuestElectController::htmlToPDFPreview/$1', ['filter' => 'auth']);
//user edit remarks
	// $routes->post('guestUpdateWord', 'UserGuestElectController::updateWord', ['filter' => 'auth']);
	// $routes->post('guestElectToDraft/(:num)', 'UserGuestElectController::htmlToDraft/$1', ['filter' => 'auth']);	
	// $routes->get('guestElectStandard', 'UserGuestElectController::standardTable', ['filter' => 'auth']);
	// $routes->get('guestElectStandardEdit/(:num)', 'UserGuestElectController::standardTableEdit/$1', ['filter' => 'auth']);
	// $routes->post('guestElectStandardStore', 'UserGuestElectController::standardTableStore', ['filter' => 'auth']);
	// $routes->post('guestElectStandardDelete', 'UserGuestElectController::deleteStandardTestPoint', ['filter' => 'auth']);			
	// $routes->post('guestElectStandardUpdate', 'UserGuestElectController::standardTableUpdateInfo', ['filter' => 'auth']);
	// $routes->get('guestElectStandardAddNew', 'UserGuestElectController::standardTableAddNew', ['filter' => 'auth']);
	// $routes->post('guestElectStandardAddNewDetails', 'UserGuestElectController::standardTableAddNewDetails');	
	// $routes->post('guestStandardTableEditValues/(:num)', 'UserGuestElectController::standardTableEditValues/$1', ['filter' => 'auth']);
	// $routes->get('guestElectStandardEdit/(:num)', 'UserGuestElectController::standardTableEdit/$1', ['filter' => 'auth']);
	// $routes->post('guestElectStandardDeleteTestPoint', 'UserGuestElectController::deleteStandardTestPoint', ['filter' => 'auth']);		
	// $routes->post('guestUpdatePabLogo', 'UserGuestElectController::PabLogoUpdate', ['filter' => 'auth']);
		

	// $routes->post('guestElectToPdfHanging/(:num)', 'UserGuestElectController::htmlToPDFHanging/$1', ['filter' => 'auth']);
	// $routes->post('guestElectToPdfPreviewHanging/(:num)', 'UserGuestElectController::htmlToPDFPreviewHanging/$1', ['filter' => 'auth']);
	// $routes->post('guestElectToDraftHanging/(:num)', 'UserGuestElectController::htmlToDraftHanging/$1', ['filter' => 'auth']);
	

//guestThermo
	// $routes->get('guestAddThermo', 'UserGuestThermoController::addView', ['filter' => 'auth']);
	// $routes->get('guestThermoTable', 'UserGuestThermoController::thermoTable', ['filter' => 'auth']);
	// $routes->get('guestThermoPreview/(:any)', 'UserGuestThermoController::thermoEdit/$1', ['filter' => 'auth']);
	// $routes->get('guestThermoEdit/(:any)', 'UserGuestThermoController::thermoUpdate/$1', ['filter' => 'auth']);
	// $routes->get('guestThermoStandardTable', 'UserGuestThermoController::thermoStandardTable', ['filter' => 'auth']);
	// $routes->get('guestThermoStandardEdit/(:num)', 'UserGuestThermoController::thermoStandardEdit/$1', ['filter' => 'auth']);
	// $routes->get('guestThermoStandardAddView', 'UserGuestThermoController::thermoStandardAddView', ['filter' => 'auth']);
	// $routes->get('guestThermoStandardAddViewPRT', 'UserGuestThermoController::thermoStandardAddViewPRT', ['filter' => 'auth']);
	// $routes->get('guestThermoStandardAddChamber', 'UserGuestThermoController::thermoStandardAddChamber');
	// $routes->get('guestThermoChamberView/(:any)', 'UserGuestThermoController::thermoChamberView/$1', ['filter' => 'auth']);
	// $routes->get('guestDeleteChamber/(:any)', 'UserGuestThermoController::deleteChamber/$1', ['filter' => 'auth']);
	// $routes->post('guestThermoStandardAddData', 'UserGuestThermoController::thermoStandardAddData');
	// $routes->post('guestThermoStandardEditDetails', 'UserGuestThermoController::standardTableUpdateInfo', ['filter' => 'auth']);
	// $routes->post('guestThermoChamberAddNew', 'UserGuestThermoController::thermoChamberAddNew');
	// $routes->post('guestThermoAddData', 'UserGuestThermoController::thermoAddData', ['filter' => 'auth']);
	// $routes->post('guestThermoStandardStoreChamber', 'UserGuestThermoController::thermoStandardStoreChamber');
	// $routes->post('guestThermoStandardEditDrift/(:num)', 'UserGuestThermoController::thermoStandardEditDrift/$1', ['filter' => 'auth']);
	// $routes->post('guestThermoStandardEditValues/(:num)', 'UserGuestThermoController::thermoStandardEditValues/$1', ['filter' => 'auth']);
	// $routes->post('guestThermoStandardAddTestPoint', 'UserGuestThermoController::thermoStandardAddTestPoint');
	// $routes->post('guestThermoStandardDeleteTestPoint', 'UserGuestThermoController::deleteStandardTestPoint', ['filter' => 'auth']);
	// $routes->post('guestThermoStandardAddDrift', 'UserGuestThermoController::thermoStandardAddDr	ft');
	// $routes->get('guestThermoDelete/(:any)', 'UserGuestThermoController::thermoDelete/$1', ['filter' => 'auth']);

											
//preview pdf
// $routes->post('guestThermoToPdfPreview/(:num)', 'UserGuestThermoController::htmlToPDFPreview/$1', ['filter' => 'auth']);
// //download thermo pdf
// $routes->post('guestThermoToPdf/(:num)', 'UserGuestThermoController::htmlToPDF/$1', ['filter' => 'auth']);
// //for updating thermodata
// $routes->post('guestThermoUpdateData', 'UserGuestThermoController::thermoUpdateData', ['filter' => 'auth']);

//guestThermo

//guestTestWeight
	// $routes->get('guestTestWeightAddDataView', 'UserGuestTestWeightController::addDataView', ['filter' => 'auth']);
	// $routes->post('guestTestWeightStoreData', 'UserGuestTestWeightController::storeData', ['filter' => 'auth']);
	// $routes->get('guestTestWeightTable', 'UserGuestTestWeightController::testWeightTable', ['filter' => 'auth']);
	// $routes->get('guestTestWeightEdit/(:any)', 'UserGuestTestWeightController::testWeightEdit/$1', ['filter' => 'auth']);
	// $routes->post('guestTestWeighToPdfPreview/(:any)', 'UserGuestTestWeightController::htmlToPDFPreview/$1', ['filter' => 'auth']);
	// $routes->get('guestTestWeightEditDataView/(:any)', 'UserGuestTestWeightController::editDataView/$1', ['filter' => 'auth']);
	// $routes->post('guestTestWeightUpdateData', 'UserGuestTestWeightController::updateData', ['filter' => 'auth']);
	// $routes->post('guestHtmlToPDFFullScreenTestWeight/(:num)', 'UserGuestTestWeightController::htmlToPDFFull/$1', ['filter' => 'auth']);
	// $routes->get('guestTestWeightStandardTable', 'UserGuestTestWeightController::StandardTable', ['filter' => 'auth']);
	// $routes->get('guestTestWeightSensitivityTestTable', 'UserGuestTestWeightController::sensitivityTestTable', ['filter' => 'auth']);
	// $routes->get('guestTestWeightSensitivityTestAddNew', 'UserGuestTestWeightController::sensitivityTestAdd', ['filter' => 'auth']);
	// $routes->post('guestTestWeightSensitivityTestAddValue', 'UserGuestTestWeightController::sensitivityTestAddValue', ['filter' => 'auth']);
	// $routes->get('guestTestWeightSensitivityTestEdit/(:num)', 'UserGuestTestWeightController::sensitivityTestEdit/$1', ['filter' => 'auth']);
	// $routes->post('guestTestWeightSensitivityTestUpdateInfo', 'UserGuestTestWeightController::sensitivityTestUpdateInfo', ['filter' => 'auth']);
	// $routes->get('guestTestWeightAlloyTable', 'UserGuestTestWeightController::AlloyTable', ['filter' => 'auth']);
	// $routes->get('guestTestWeightAlloyAddNew', 'UserGuestTestWeightController::alloyAddNew', ['filter' => 'auth']);
	// $routes->post('guestTestWeightAlloyAddNewDetails', 'UserGuestTestWeightController::alloyAddNewDetails', ['filter' => 'auth']);
	// $routes->post('guestTestWeightAlloyUpdateDetails', 'UserGuestTestWeightController::alloyUpdateData', ['filter' => 'auth']);
	// $routes->get('guestTestWeightStandardAddNew', 'UserGuestTestWeightController::standardTableAddNew', ['filter' => 'auth']);
	// $routes->post('guestTestWeightStandardTableAddNewDetails', 'UserGuestTestWeightController::standardTableAddNewDetails');
	// $routes->get('guestTestWeightMPETable', 'UserGuestTestWeightController::mpeTable', ['filter' => 'auth']);
	// $routes->get('guestTestWeightMPEAddNew', 'UserGuestTestWeightController::mpeAddNew', ['filter' => 'auth']);
	// $routes->post('guestTestWeightMPEAddNewDetails', 'UserGuestTestWeightController::mpeAddNewDetails', ['filter' => 'auth']);
	// $routes->post('guestTestWeightPABUpdateDetails', 'UserGuestTestWeightController::pabUpdateData');
	// $routes->get('guestTestWeightPABTable', 'UserGuestTestWeightController::PABTable', ['filter' => 'auth']);
	// $routes->get('guestTestWeightPABAddNew', 'UserGuestTestWeightController::pabAddNew', ['filter' => 'auth']);
	// $routes->post('guestTestWeightPABAddNewDetails', 'UserGuestTestWeightController::pabAddNewDetails');
	// $routes->get('guestTestWeightStandardEdit/(:num)', 'UserGuestTestWeightController::standardTableEdit/$1', ['filter' => 'auth']);
	// $routes->get('guestTestWeightDelete/(:any)', 'UserGuestTestWeightController::deleteData/$1', ['filter' => 'auth']);

																	
//guestTestWeight

//guest profile
// $routes->get('guestProfile', 'UserGuestController::profile', ['filter' => 'auth']);
// //guest about
// $routes->get('guestAbout', 'UserGuestController::about', ['filter' => 'auth']);

//userguest

//Elect routes
	// $routes->get('electHome', 'ElectController::index', ['filter' => 'auth']);
	// $routes->get('electTable', 'ElectController::table', ['filter' => 'auth']);
	// $routes->post('elect-store', 'ElectController::store');
	// $routes->post('electSave', 'ElectController::storeSave', ['filter' => 'auth']);
	// $routes->post('electUpdateData', 'ElectController::updateData');
	// $routes->get('editElect/(:any)', 'ElectController::edit/$1', ['filter' => 'auth']);
	// $routes->get('updateElect/(:any)', 'ElectController::update/$1', ['filter' => 'auth']);
	// $routes->get('deleteElect/(:any)', 'ElectController::delete/$1', ['filter' => 'auth']);
	// $routes->get('electStandard', 'ElectController::standardTable', ['filter' => 'auth']);
	// $routes->get('electStandardAddNew', 'ElectController::standardTableAddNew', ['filter' => 'auth']);
	// $routes->post('electStandardAddNewDetails', 'ElectController::standardTableAddNewDetails');
	// $routes->post('ElectImageStore', 'ElectController::ElectImageStore');
	// $routes->get('electStandardEdit/(:num)', 'ElectController::standardTableEdit/$1', ['filter' => 'auth']);
	// $routes->post('standardTableEditValues/(:num)', 'ElectController::standardTableEditValues/$1', ['filter' => 'auth']);
	// $routes->post('UpdatePabLogo', 'ElectController::PabLogoUpdate', ['filter' => 'auth']);
	// $routes->post('ElectToPdf/(:num)', 'ElectController::htmlToPDF/$1', ['filter' => 'auth']);
	// $routes->post('ElectToPdfPreview/(:num)', 'ElectController::htmlToPDFPreview/$1', ['filter' => 'auth']);
	// $routes->post('ElectToDraft/(:num)', 'ElectController::htmlToDraft/$1', ['filter' => 'auth']);

	// $routes->post('ElectToPdfHanging/(:num)', 'ElectController::htmlToPDFHanging/$1', ['filter' => 'auth']);
	// $routes->post('ElectToPdfPreviewHanging/(:num)', 'ElectController::htmlToPDFPreviewHanging/$1', ['filter' => 'auth']);
	// $routes->post('ElectToDraftHanging/(:num)', 'ElectController::htmlToDraftHanging/$1', ['filter' => 'auth']);
	
	// $routes->post('electStandardStore', 'ElectController::standardTableStore', ['filter' => 'auth']);
	// $routes->post('electStandardUpdate', 'ElectController::standardTableUpdateInfo', ['filter' => 'auth']);
	// $routes->post('electStandardDelete', 'ElectController::deleteStandardTestPoint', ['filter' => 'auth']);
	// $routes->post('updateWord', 'ElectController::updateWord', ['filter' => 'auth']);
	// $routes->get('deleteElectStd/(:any)', 'ElectController::deleteElectStd/$1', ['filter' => 'auth']);
	// $routes->post('graphDataSave', 'ElectController::graphData', ['filter' => 'auth']);
	
	// $routes->post('electVerify', 'ElectController::updateVerify', ['filter' => 'auth']);
	// $routes->post('electCorrection', 'ElectController::updateCorrection', ['filter' => 'auth']);

	// $routes->post('electSaveDateOfIssue/(:any)', 'ElectController::saveDateOfIssue/$1', ['filter' => 'auth']);

//Elect routes


//Thermo thermoStandardEditValues
	$routes->get('thermoAdd', 'ThermoController::addView', ['filter' => 'auth']);
	$routes->get('thermoTable', 'ThermoController::thermoTable', ['filter' => 'auth']);
	$routes->get('thermoEdit/(:any)', 'ThermoController::thermoEdit/$1', ['filter' => 'auth']);
	$routes->get('thermoUpdate/(:any)', 'ThermoController::thermoUpdate/$1', ['filter' => 'auth']);
	$routes->get('thermoDelete/(:any)', 'ThermoController::thermoDelete/$1', ['filter' => 'auth']);
	$routes->post('thermoAddData', 'ThermoController::thermoAddData');

	$routes->post('thermoSaveOnlyData', 'ThermoController::thermoSaveOnlyData');
	$routes->post('thermoUpdateSaveData', 'ThermoController::thermoUpdateSaveData', ['filter' => 'auth']);

	$routes->post('thermoStandardAddData', 'ThermoController::thermoStandardAddData');
	$routes->get('thermoStandardTable', 'ThermoController::thermoStandardTable', ['filter' => 'auth']);
	$routes->get('thermoStandardAddView', 'ThermoController::thermoStandardAddView', ['filter' => 'auth']);
	$routes->get('thermoStandardAddViewPRT', 'ThermoController::thermoStandardAddViewPRT', ['filter' => 'auth']);
	$routes->get('thermoStandardEdit/(:num)', 'ThermoController::thermoStandardEdit/$1', ['filter' => 'auth']);
	$routes->post('thermoStandardEditDetails', 'ThermoController::standardTableUpdateInfo', ['filter' => 'auth']);
	$routes->post('thermoStandardAddTestPoint', 'ThermoController::thermoStandardAddTestPoint');
	$routes->post('thermoStandardEditValues/(:num)', 'ThermoController::thermoStandardEditValues/$1', ['filter' => 'auth']);
	$routes->post('thermoStandardEditDrift/(:num)', 'ThermoController::thermoStandardEditDrift/$1', ['filter' => 'auth']);
	$routes->post('thermoStandardEditDriftPRT/(:num)', 'ThermoController::thermoStandardEditDriftPRT/$1', ['filter' => 'auth']);
	$routes->post('thermoStandardAddDrift', 'ThermoController::thermoStandardAddDrift');
	$routes->post('thermoStandardAddDriftPRT', 'ThermoController::thermoStandardAddDriftPRT');
	$routes->post('ThermoToPdf/(:num)', 'ThermoController::htmlToPDF/$1', ['filter' => 'auth']);
	$routes->post('ThermoToPdfNew/(:num)', 'ThermoController::htmlToPDFNew/$1', ['filter' => 'auth']);
	$routes->post('ThermoToPdfPreview/(:num)', 'ThermoController::htmlToPDFPreview/$1', ['filter' => 'auth']);
	$routes->post('htmlToPDFFullScreen/(:num)', 'ThermoController::htmlToPDFFullScreen/$1', ['filter' => 'auth']);
	$routes->post('UpdatePabLogoThermo', 'ThermoController::PabLogoUpdate', ['filter' => 'auth']);
	$routes->post('thermoUpdateWord', 'ThermoController::updateWord', ['filter' => 'auth']);
	$routes->post('thermoUpdateData', 'ThermoController::thermoUpdateData', ['filter' => 'auth']);
	$routes->get('thermoStandardAddChamber', 'ThermoController::thermoStandardAddChamber', ['filter' => 'auth']);
	$routes->post('thermoStandardStoreChamber', 'ThermoController::thermoStandardStoreChamber');
	$routes->post('thermoChamberAddNew', 'ThermoController::thermoChamberAddNew');
	$routes->get('deleteChamber/(:any)', 'ThermoController::deleteChamber/$1', ['filter' => 'auth']);
	$routes->post('thermoStandardDeleteTestPoint', 'ThermoController::deleteStandardTestPoint', ['filter' => 'auth']);
	$routes->get('deleteThermoStd/(:any)', 'ThermoController::deleteThermoStd/$1', ['filter' => 'auth']);
	$routes->post('thermoStandardDeleteDrift', 'ThermoController::deleteStandardDrift', ['filter' => 'auth']);
	$routes->post('thermoChamberUpdate', 'ThermoController::thermoChamberUpdate', ['filter' => 'auth']);
	$routes->get('thermoChamberView/(:any)', 'ThermoController::thermoChamberView/$1', ['filter' => 'auth']);

	$routes->post('thermoVerify', 'ThermoController::updateVerify', ['filter' => 'auth']);
	$routes->post('thermoCorrection', 'ThermoController::updateCorrection', ['filter' => 'auth']);

	$routes->post('thermoSaveCustomDecimal', 'ThermoController::saveCustomDecimal', ['filter' => 'auth']);
//Thermo

//Test Weight
	$routes->get('testWeightAddDataView', 'TestWeightController::addDataView', ['filter' => 'auth']);
	$routes->post('testWeightStoreData', 'TestWeightController::storeData', ['filter' => 'auth']);
	$routes->get('testWeightTable', 'TestWeightController::testWeightTable', ['filter' => 'auth']);
	$routes->get('testWeightEdit/(:any)', 'TestWeightController::testWeightEdit/$1', ['filter' => 'auth']);
	$routes->get('testWeightEditDataView/(:any)', 'TestWeightController::editDataView/$1', ['filter' => 'auth']);
	$routes->post('testWeightUpdateData', 'TestWeightController::updateData', ['filter' => 'auth']);
	$routes->get('testWeightDelete/(:any)', 'TestWeightController::deleteData/$1', ['filter' => 'auth']);
	$routes->get('testWeightStandardTable', 'TestWeightController::StandardTable', ['filter' => 'auth']);
	$routes->get('testWeightStandardAddNew', 'TestWeightController::standardTableAddNew', ['filter' => 'auth']);
	$routes->get('testWeightPABTable', 'TestWeightController::PABTable', ['filter' => 'auth']);
	$routes->get('testWeightPABAddNew', 'TestWeightController::pabAddNew', ['filter' => 'auth']);
	$routes->post('testWeightPABAddNewDetails', 'TestWeightController::pabAddNewDetails');
	$routes->post('testWeightPABUpdateDetails', 'TestWeightController::pabUpdateData');
	$routes->get('testWeightMPETable', 'TestWeightController::mpeTable', ['filter' => 'auth']);
	$routes->get('testWeightMPEAddNew', 'TestWeightController::mpeAddNew', ['filter' => 'auth']);
	$routes->get('testWeightAlloyTable', 'TestWeightController::AlloyTable', ['filter' => 'auth']);
	$routes->get('testWeightAlloyAddNew', 'TestWeightController::alloyAddNew', ['filter' => 'auth']);
	$routes->post('testWeightMPEAddNewDetails', 'TestWeightController::mpeAddNewDetails', ['filter' => 'auth']);
	$routes->post('testWeightAlloyAddNewDetails', 'TestWeightController::alloyAddNewDetails', ['filter' => 'auth']);
	$routes->post('testWeightAlloyUpdateDetails', 'TestWeightController::alloyUpdateData', ['filter' => 'auth']);
	$routes->post('testWeightStandardTableAddNewDetails', 'TestWeightController::standardTableAddNewDetails');
	$routes->get('testWeightStandardEdit/(:num)', 'TestWeightController::standardTableEdit/$1', ['filter' => 'auth']);
	$routes->post('testWeightStandardStore', 'TestWeightController::standardTableStore', ['filter' => 'auth']);
	$routes->post('testWeightStandardUpdate', 'TestWeightController::standardTableUpdateInfo', ['filter' => 'auth']);
	$routes->post('testWeightStandardTableEditValues/(:num)', 'TestWeightController::standardTableEditValues/$1', ['filter' => 'auth']);
	$routes->get('testWeightSensitivityTestTable', 'TestWeightController::sensitivityTestTable', ['filter' => 'auth']);
	$routes->get('testWeightSensitivityTestAddNew', 'TestWeightController::sensitivityTestAdd', ['filter' => 'auth']);
	$routes->post('testWeightSensitivityTestAddValue', 'TestWeightController::sensitivityTestAddValue', ['filter' => 'auth']);
	$routes->get('testWeightSensitivityTestEdit/(:num)', 'TestWeightController::sensitivityTestEdit/$1', ['filter' => 'auth']);
	$routes->post('testWeightSensitivityTestUpdateInfo', 'TestWeightController::sensitivityTestUpdateInfo', ['filter' => 'auth']);
	$routes->post('testWeightUpdateWord', 'TestWeightController::updateWord', ['filter' => 'auth']);
	$routes->post('testWeighToPdf/(:num)', 'TestWeightController::htmlToPDF/$1', ['filter' => 'auth']);
	$routes->post('testWeighToPdfPreview/(:num)', 'TestWeightController::htmlToPDFPreview/$1', ['filter' => 'auth']);
	$routes->post('htmlToPDFFullScreenTestWeight/(:num)', 'TestWeightController::htmlToPDFFull/$1', ['filter' => 'auth']);
	$routes->post('UpdatePabLogoTestWeight', 'TestWeightController::PabLogoUpdate', ['filter' => 'auth']);

	$routes->post('testWeightVerify', 'TestWeightController::updateVerify', ['filter' => 'auth']);
	$routes->post('testWeightCorrection', 'TestWeightController::updateCorrection', ['filter' => 'auth']);
//Test Weight

//Weighing scale
	$routes->get('weighingScaleAddNew', 'WeighingScaleController::weighingScaleNew', ['filter' => 'auth']);
	$routes->get('weighingScaleEdit/(:any)', 'WeighingScaleController::weighingScaleEdit/$1', ['filter' => 'auth']);
	$routes->get('weighingScaleTable', 'WeighingScaleController::weighingScaleTable', ['filter' => 'auth']);
	$routes->post('weighingScaleAddData', 'WeighingScaleController::storeData', ['filter' => 'auth']);
	$routes->get('weighingScalePrint/(:any)', 'WeighingScaleController::weighingScalePrint/$1', ['filter' => 'auth']);
	$routes->post('weighingScaleUpdatePab', 'WeighingScaleController::PabLogoUpdate', ['filter' => 'auth']);
	$routes->post('weighingScaleCorrection', 'WeighingScaleController::updateCorrection', ['filter' => 'auth']);
	$routes->post('weighingScaleUpdateData', 'WeighingScaleController::updateData', ['filter' => 'auth']);
	$routes->post('weighingScalePDF/(:any)', 'WeighingScaleController::htmlToPDF/$1', ['filter' => 'auth']);
	$routes->post('weighingScaleUpdateWord', 'WeighingScaleController::updateWord', ['filter' => 'auth']);
	
//Weighing scale

//Digital Timer
	 $routes->get('digitalTimer/worksheet', 'DigitalTimerController::worksheet', ['filter' => 'auth']);
	 $routes->get('digitalTimer/worksheet/(:any)', 'DigitalTimerController::worksheet/$1', ['filter' => 'auth']);
	 $routes->get('digitalTimer/certificates', 'DigitalTimerController::certificateTable', ['filter' => 'auth']);
	 $routes->get('digitalTimer/deleteWorksheet/(:any)', 'DigitalTimerController::deleteWorksheet/$1', ['filter' => 'auth']);
	 $routes->post('digitalTimer/get_standard_value_by_serial', 'DigitalTimerController::get_standard_value_by_serial', ['filter' => 'auth']);
	 $routes->post('digitalTimer/add_New_Worksheet_Data', 'DigitalTimerController::addNewWorksheetData', ['filter' => 'auth']);
	 $routes->post('digitalTimer/update_Worksheet_Data', 'DigitalTimerController::updateWorksheetData', ['filter' => 'auth']);
	 $routes->post('digitalTimer/get_data_by_id', 'DigitalTimerController::get_data_by_id', ['filter' => 'auth']);	 
	 $routes->post('digitalTimer/generateReport', 'DigitalTimerController::generateReport', ['filter' => 'auth']);
	//$routes->get('worksheets/report/(:any)', 'DigitalTimerController::htmlToPDF/$1', ['filter' => 'auth']);
//Digital Timer

// Digital thermometer
	$routes->get('digitalThermometer/new', 'DigitalThermometerController::new', ['filter' => 'auth']);
	$routes->get('digitalThermometer/edit/(:any)', 'DigitalThermometerController::editData/$1', ['filter' => 'auth']);
	$routes->get('digitalThermometer/table', 'DigitalThermometerController::table', ['filter' => 'auth']);
	$routes->get('digitalThermometer/standardTable', 'DigitalThermometerController::thermometerStandardTable', ['filter' => 'auth']);
	$routes->get('digitalThermometer/print/(:any)', 'DigitalThermometerController::print/$1', ['filter' => 'auth']);
	
	$routes->post('digitalThermometer/addNew', 'DigitalThermometerController::storeData', ['filter' => 'auth']);
	$routes->post('digitalThermometer/update', 'DigitalThermometerController::updateData', ['filter' => 'auth']);
	$routes->post('digitalThermometer/report/(:num)', 'DigitalThermometerController::htmlToPDF/$1', ['filter' => 'auth']);
	$routes->post('digitalThermometer/updatePlaceholder', 'DigitalThermometerController::updateWord', ['filter' => 'auth']);
	$routes->post('digitalThermometer/imageUpdate/(:any)', 'DigitalThermometerController::addImage/$1', ['filter' => 'auth']);

	$routes->get('digitalThermometer/temperatureSourceTable', 'DigitalThermometerController::temperatureSource', ['filter' => 'auth']);
	$routes->post('digitalThermometer/addNewSource', 'DigitalThermometerController::addNewSource', ['filter' => 'auth']);
	$routes->post('digitalThermometer/deleteSource/(:any)', 'DigitalThermometerController::deleteNewSource/$1', ['filter' => 'auth']);
	$routes->post('digitalThermometer/getSourceStandard', 'DigitalThermometerController::getSourceStandard', ['filter' => 'auth']);
	$routes->post('digitalThermometer/getSourceById', 'DigitalThermometerController::getSourceById', ['filter' => 'auth']);
	

// Digital thermometer

// Digital thermometer NEW
	$routes->get('digitalThermometer/worksheet', 'DigitalThermometerController::worksheet', ['filter' => 'auth']);
	$routes->get('digitalThermometer/worksheet/(:any)', 'DigitalThermometerController::worksheet/$1', ['filter' => 'auth']);
	$routes->get('digitalThermometer/certificates', 'DigitalThermometerController::certificateTable', ['filter' => 'auth']);
	$routes->get('digitalThermometer/print/(:any)', 'DigitalThermometerController::worksheetPrint/$1', ['filter' => 'auth']);
	$routes->get('digitalThermometer/deleteWorksheet/(:any)', 'DigitalThermometerController::deleteWorksheet/$1', ['filter' => 'auth']);

	$routes->post('digitalThermometer/add_New_Worksheet_Data', 'DigitalThermometerController::addNewWorksheetData', ['filter' => 'auth']);
	$routes->post('digitalThermometer/update_Worksheet_Data', 'DigitalThermometerController::updateWorksheetData', ['filter' => 'auth']);
	$routes->post('digitalThermometer/get_data_by_id', 'DigitalThermometerController::get_data_by_id', ['filter' => 'auth']);
	$routes->post('digitalThermometer/updatePlaceholder', 'DigitalThermometerController::updatePlaceholder', ['filter' => 'auth']);
	$routes->post('digitalThermometer/report/(:num)', 'DigitalThermometerController::htmlToPDF/$1', ['filter' => 'auth']);

	$routes->post('digitalThermometer/generateReport', 'DigitalThermometerController::generateReport', ['filter' => 'auth']);
	$routes->post('digitalThermometer/verifyCorrection', 'DigitalThermometerController::verifyCorrection', ['filter' => 'auth']);

	$routes->post('digitalThermometer/get_data_for_previous_table', 'DigitalThermometerController::get_data_for_previous_table', ['filter' => 'auth']);
// Digital thermometer NEW

// Electronic Balance
	$routes->get('electronicBalance/worksheet', 'ElectronicBalanceController::worksheet', ['filter' => 'auth']);
	$routes->get('electronicBalance/worksheet/(:any)', 'ElectronicBalanceController::worksheet/$1', ['filter' => 'auth']);
	$routes->get('electronicBalance/certificates', 'ElectronicBalanceController::certificateTable', ['filter' => 'auth']);
	$routes->get('electronicBalance/print/(:any)', 'ElectronicBalanceController::worksheetPrint/$1', ['filter' => 'auth']);
	$routes->get('electronicBalance/deleteWorksheet/(:any)', 'ElectronicBalanceController::deleteWorksheet/$1', ['filter' => 'auth']);

	$routes->post('electronicBalance/get_standard_value_by_serial', 'ElectronicBalanceController::get_standard_value_by_serial', ['filter' => 'auth']);
	$routes->post('electronicBalance/add_New_Worksheet_Data', 'ElectronicBalanceController::addNewWorksheetData', ['filter' => 'auth']);
	$routes->post('electronicBalance/update_Worksheet_Data', 'ElectronicBalanceController::updateWorksheetData', ['filter' => 'auth']);
	$routes->post('electronicBalance/get_data_by_id', 'ElectronicBalanceController::get_data_by_id', ['filter' => 'auth']);
	$routes->post('electronicBalance/report/(:num)', 'ElectronicBalanceController::htmlToPDF/$1', ['filter' => 'auth']);
	$routes->post('electronicBalance/deleteStandard', 'ElectronicBalanceController::deleteStandard', ['filter' => 'auth']);
	$routes->post('electronicBalance/updatePlaceholder', 'ElectronicBalanceController::updatePlaceholder', ['filter' => 'auth']);

	$routes->post('electronicBalance/imageUpdate/(:any)', 'ElectronicBalanceController::addImage/$1', ['filter' => 'auth']);

	$routes->get('worksheets/report/(:any)', 'ElectronicBalanceController::htmlToPDF/$1', ['filter' => 'auth']);

	$routes->post('electronicBalance/generateReport', 'ElectronicBalanceController::generateReport', ['filter' => 'auth']);
	$routes->post('electronicBalance/verifyCorrection', 'ElectronicBalanceController::verifyCorrection', ['filter' => 'auth']);
	

// Electronic Balance

//Thermo_Hygrometer
	$routes->get('thermohygrometer/worksheet', 'Thermo_HygrometerController::worksheet', ['filter' => 'auth']);
	$routes->get('thermohygrometer/worksheet/(:any)', 'Thermo_HygrometerController::worksheet/$1', ['filter' => 'auth']);
	$routes->get('thermohygrometer/certificates', 'Thermo_HygrometerController::certificateTable', ['filter' => 'auth']);
	$routes->get('thermohygrometer/print/(:any)', 'Thermo_HygrometerController::worksheetPrint/$1', ['filter' => 'auth']);
	$routes->get('thermohygrometer/deleteWorksheet/(:any)', 'Thermo_HygrometerController::deleteWorksheet/$1', ['filter' => 'auth']);

	$routes->post('thermohygrometer/get_standard_value_by_serial', 'Thermo_HygrometerController::get_standard_value_by_serial', ['filter' => 'auth']);
	$routes->post('thermohygrometer/add_New_Worksheet_Data', 'Thermo_HygrometerController::addNewWorksheetData', ['filter' => 'auth']);
	$routes->post('thermohygrometer/update_Worksheet_Data', 'Thermo_HygrometerController::updateWorksheetData', ['filter' => 'auth']);
	$routes->post('thermohygrometer/get_data_by_id', 'Thermo_HygrometerController::get_data_by_id', ['filter' => 'auth']);
	$routes->post('thermohygrometer/report/(:num)', 'Thermo_HygrometerController::htmlToPDF/$1', ['filter' => 'auth']);
	$routes->post('thermohygrometer/get_data_for_previous_table', 'Thermo_HygrometerController::get_data_for_previous_table', ['filter' => 'auth']);
	$routes->post('thermohygrometer/imageUpdate/(:any)', 'Thermo_HygrometerController::addImage/$1', ['filter' => 'auth']);

	$routes->post('thermohygrometer/generateReport', 'Thermo_HygrometerController::generateReport', ['filter' => 'auth']);
	$routes->post('thermohygrometer/verifyCorrection', 'Thermo_HygrometerController::verifyCorrection', ['filter' => 'auth']);

//Thermo_Hygrometer

//Test Weight Additional Routes
	$routes->get('testWeight/worksheet', 'TestWeightController::worksheet', ['filter' => 'auth']);
	$routes->get('testWeight/worksheet/(:any)', 'TestWeightController::worksheet/$1', ['filter' => 'auth']);

	$routes->post('testWeight/add_New_Worksheet_Data', 'TestWeightController::addNewWorksheetData', ['filter' => 'auth']);
	$routes->post('testWeight/get_data_by_id', 'TestWeightController::get_data_by_id', ['filter' => 'auth']);
	$routes->post('testWeight/update_Worksheet_Data', 'TestWeightController::updateWorksheetData', ['filter' => 'auth']);
	$routes->post('testWeight/imageUpdate/(:any)', 'TestWeightController::addImage/$1', ['filter' => 'auth']);

	$routes->post('testWeight/updatePlaceholder', 'TestWeightController::updatePlaceholder', ['filter' => 'auth']);
	$routes->post('testWeight/generateReport', 'TestWeightController::generateReport', ['filter' => 'auth']);
	$routes->post('testWeight/verifyCorrection', 'TestWeightController::verifyCorrection', ['filter' => 'auth']);

//Test Weight Additional Routes

//Weighing Scale Additional Routes
	$routes->get('weighingScale/worksheet', 'WeighingScaleController::worksheet', ['filter' => 'auth']);
	$routes->get('weighingScale/worksheet/(:any)', 'WeighingScaleController::worksheet/$1', ['filter' => 'auth']);
	$routes->get('weighingScale/delete/(:any)', 'WeighingScaleController::deleteData/$1', ['filter' => 'auth']);

	$routes->post('weighingScale/add_New_Worksheet_Data', 'WeighingScaleController::addNewWorksheetData', ['filter' => 'auth']);
	$routes->post('weighingScale/get_data_by_id', 'WeighingScaleController::get_data_by_id', ['filter' => 'auth']);
	$routes->post('weighingScale/update_Worksheet_Data', 'WeighingScaleController::updateWorksheetData', ['filter' => 'auth']);
	$routes->post('weighingScale/imageUpdate/(:any)', 'WeighingScaleController::addImage/$1', ['filter' => 'auth']);
	$routes->post('weighingScale/generateReport', 'WeighingScaleController::generateReport', ['filter' => 'auth']);
	$routes->post('weighingScale/verifyCorrection', 'WeighingScaleController::verifyCorrection', ['filter' => 'auth']);
//Weighing Scale Additional Routes

// Pressure Gauge
	$routes->get('pressureGauge/worksheet', 'PressureGaugeController::worksheet', ['filter' => 'auth']);
	$routes->get('pressureGauge/worksheet/(:any)', 'PressureGaugeController::worksheet/$1', ['filter' => 'auth']);

	$routes->get('pressureGauge/standardTable', 'PressureGaugeController::standardTable', ['filter' => 'auth']);
	$routes->get('pressureGauge/certificates', 'PressureGaugeController::certificateTable', ['filter' => 'auth']);
	$routes->get('pressureGauge/print/(:any)', 'PressureGaugeController::worksheetPrint/$1', ['filter' => 'auth']);
	$routes->get('pressureGauge/delete/(:any)', 'PressureGaugeController::deleteData/$1', ['filter' => 'auth']);

	$routes->post('pressureGauge/addNewStandardDetails', 'PressureGaugeController::addNewStandardDetails', ['filter' => 'auth']);
	$routes->post('pressureGauge/addNewStandardValues', 'PressureGaugeController::addNewStandardValues', ['filter' => 'auth']);
	$routes->post('pressureGauge/get_standard_value_by_serial', 'PressureGaugeController::get_standard_value_by_serial', ['filter' => 'auth']);
	$routes->post('pressureGauge/add_New_Worksheet_Data', 'PressureGaugeController::addNewWorksheetData', ['filter' => 'auth']);
	$routes->post('pressureGauge/update_Worksheet_Data', 'PressureGaugeController::updateWorksheetData', ['filter' => 'auth']);
	$routes->post('pressureGauge/get_data_by_id', 'PressureGaugeController::get_data_by_id', ['filter' => 'auth']);
	$routes->post('pressureGauge/imageUpdate/(:any)', 'PressureGaugeController::addImage/$1', ['filter' => 'auth']);
	
	$routes->post('pressureGauge/report/(:num)', 'PressureGaugeController::htmlToPDF/$1', ['filter' => 'auth']);
	$routes->post('pressureGauge/generateReport', 'PressureGaugeController::generateReport', ['filter' => 'auth']);
	$routes->post('pressureGauge/updatePlaceholder', 'PressureGaugeController::updatePlaceholder', ['filter' => 'auth']);

	$routes->post('pressureGauge/removeStandard', 'PressureGaugeController::removeStandard', ['filter' => 'auth']);
	$routes->post('pressureGauge/removeStandardValue', 'PressureGaugeController::removeStandardValue', ['filter' => 'auth']);
	$routes->post('pressureGauge/updateStandardValues', 'PressureGaugeController::updateStandardValues', ['filter' => 'auth']);
	$routes->post('pressureGauge/updateStandardDetails', 'PressureGaugeController::updateStandardDetails', ['filter' => 'auth']);

	$routes->post('pressureGauge/geCustomerData', 'PressureGaugeController::get_customer_data', ['filter' => 'auth']);
	$routes->post('pressureGauge/verifyCorrection', 'PressureGaugeController::verifyCorrection', ['filter' => 'auth']);
	
// Pressure Gauge

// Glassware
	$routes->get('glassware/worksheet', 'GlasswareController::worksheet', ['filter' => 'auth']);
	$routes->get('glassware/worksheet/(:any)', 'GlasswareController::worksheet/$1', ['filter' => 'auth']);
	$routes->get('glassware/certificates', 'GlasswareController::certificateTable', ['filter' => 'auth']);
	$routes->get('glassware/print/(:any)', 'GlasswareController::worksheetPrint/$1', ['filter' => 'auth']);
	$routes->get('glassware/deleteWorksheet/(:any)', 'GlasswareController::deleteWorksheet/$1', ['filter' => 'auth']);

	$routes->post('glassware/get_data_by_id', 'GlasswareController::get_data_by_id', ['filter' => 'auth']);
	$routes->post('glassware/add_New_Worksheet_Data', 'GlasswareController::addNewWorksheetData', ['filter' => 'auth']);
	$routes->post('glassware/update_Worksheet_Data', 'GlasswareController::updateWorksheetData', ['filter' => 'auth']);
	$routes->post('glassware/report/(:num)', 'GlasswareController::htmlToPDF/$1', ['filter' => 'auth']);
	$routes->post('glassware/imageUpdate/(:any)', 'GlasswareController::addImage/$1', ['filter' => 'auth']);

	$routes->post('glassware/generateReport', 'GlasswareController::generateReport', ['filter' => 'auth']);

// Glassware

// Enclosure
	$routes->get('enclosure/worksheet', 'EnclosureController::worksheet', ['filter' => 'auth']);
	$routes->get('enclosure/worksheet/(:any)', 'EnclosureController::worksheet/$1', ['filter' => 'auth']);
	$routes->get('enclosure/certificates', 'EnclosureController::certificateTable', ['filter' => 'auth']);
	$routes->get('enclosure/print/(:any)', 'EnclosureController::worksheetPrint/$1', ['filter' => 'auth']);
	$routes->get('enclosure/deleteWorksheet/(:any)', 'EnclosureController::deleteWorksheet/$1', ['filter' => 'auth']);

	$routes->post('enclosure/add_New_Worksheet_Data', 'EnclosureController::addNewWorksheetData', ['filter' => 'auth']);
	$routes->post('enclosure/update_Worksheet_Data', 'EnclosureController::updateWorksheetData', ['filter' => 'auth']);
	$routes->post('enclosure/get_data_by_id', 'EnclosureController::get_data_by_id', ['filter' => 'auth']);

	$routes->post('enclosure/updatePlaceholder', 'PressureGaugeController::updatePlaceholder', ['filter' => 'auth']);
	$routes->post('enclosure/report/(:num)', 'EnclosureController::htmlToPDF/$1', ['filter' => 'auth']);
	$routes->post('enclosure/generateReport', 'EnclosureController::generateReport', ['filter' => 'auth']);

	// $routes->post('enclosure/certificateNumberChecker', 'EnclosureController::certificateNumberChecker', ['filter' => 'auth']);
	// $routes->post('enclosure/getCustomerData', 'EnclosureController::get_customer_data', ['filter' => 'auth']);
	$routes->post('enclosure/verifyCorrection', 'EnclosureController::verifyCorrection', ['filter' => 'auth']);

// Enclosure

// Refractometer
	$routes->get('refractometer/worksheet', 'refractometerController::worksheet', ['filter' => 'auth']);
	$routes->get('refractometer/worksheet/(:any)', 'refractometerController::worksheet/$1', ['filter' => 'auth']);
	$routes->get('refractometer/certificates', 'refractometerController::certificateTable', ['filter' => 'auth']);
	$routes->get('refractometer/print/(:any)', 'refractometerController::worksheetPrint/$1', ['filter' => 'auth']);
	$routes->get('refractometer/deleteWorksheet/(:any)', 'refractometerController::deleteWorksheet/$1', ['filter' => 'auth']);
	
	$routes->post('refractometer/add_New_Worksheet_Data', 'refractometerController::addNewWorksheetData', ['filter' => 'auth']);
	$routes->post('refractometer/update_Worksheet_Data', 'refractometerController::updateWorksheetData', ['filter' => 'auth']);
	$routes->post('refractometer/get_data_by_id', 'refractometerController::get_data_by_id', ['filter' => 'auth']);
	$routes->post('refractometer/updatePlaceholder', 'refractometerController::updatePlaceholder', ['filter' => 'auth']);
	$routes->post('refractometer/report/(:num)', 'refractometerController::htmlToPDF/$1', ['filter' => 'auth']);
	//$routes->post('refractometer/generateReport/(:any)/(:any)/(:any)', 'refractometerController::generateReport/$1/$2/$3', ['filter' => 'auth']);

	$routes->post('refractometer/generateReport', 'refractometerController::generateReport', ['filter' => 'auth']);
	//$routes->post('refractometer/verifyCorrection', 'refractometerController::verifyCorrection', ['filter' => 'auth']);
// Refractometer

//ph meter
	$routes->get('pHMeter/worksheet', 'PHMeterController::worksheet', ['filter' => 'auth']); 
	$routes->get('pHMeter/worksheet/(:any)', 'PHMeterController::worksheet/$1', ['filter' => 'auth']);
	$routes->get('pHMeter/certificates', 'PHMeterController::certificateTable', ['filter' => 'auth']);

	$routes->get('pHMeter/deleteWorksheet/(:any)', 'PHMeterController::deleteWorksheet/$1', ['filter' => 'auth']);
	$routes->post('pHMeter/get_standard_value_by_serial', 'PHMeterController::get_standard_value_by_serial', ['filter' => 'auth']);
	$routes->post('pHMeter/add_New_Worksheet_Data', 'PHMeterController::addNewWorksheetData', ['filter' => 'auth']);
	$routes->post('pHMeter/update_Worksheet_Data', 'PHMeterController::updateWorksheetData', ['filter' => 'auth']);
	$routes->post('pHMeter/get_data_by_id', 'PHMeterController::get_data_by_id', ['filter' => 'auth']);	 
	$routes->post('pHMeter/generateReport', 'PHMeterController::generateReport', ['filter' => 'auth']);
	//$routes->get('worksheets/report/(:any)', 'PHMeterController::htmlToPDF/$1', ['filter' => 'auth']);
//ph meter

//temperature controller
	$routes->get('temperaturecontroll/worksheet', 'TemperaturecontrollController::worksheet', ['filter' => 'auth']);
	$routes->get('temperaturecontroll/worksheet/(:any)', 'TemperaturecontrollController::worksheet/$1', ['filter' => 'auth']);
	$routes->get('temperaturecontroll/certificates', 'TemperaturecontrollController::certificateTable', ['filter' => 'auth']);
	$routes->get('temperaturecontroll/print/(:any)', 'TemperaturecontrollController::worksheetPrint/$1', ['filter' => 'auth']);
	$routes->get('temperaturecontroll/deleteWorksheet/(:any)', 'TemperaturecontrollController::deleteWorksheet/$1', ['filter' => 'auth']);

	$routes->post('temperaturecontroll/get_standard_value_by_serial', 'TemperaturecontrollController::get_standard_value_by_serial', ['filter' => 'auth']);
	$routes->post('temperaturecontroll/add_New_Worksheet_Data', 'TemperaturecontrollController::addNewWorksheetData', ['filter' => 'auth']);
	$routes->post('temperaturecontroll/update_Worksheet_Data', 'TemperaturecontrollController::updateWorksheetData', ['filter' => 'auth']);
	$routes->post('temperaturecontroll/get_data_by_id', 'TemperaturecontrollController::get_data_by_id', ['filter' => 'auth']);
	$routes->post('temperaturecontroll/report/(:num)', 'TemperaturecontrollController::htmlToPDF/$1', ['filter' => 'auth']);
	$routes->post('temperaturecontroll/deleteStandard', 'TemperaturecontrollController::deleteStandard', ['filter' => 'auth']);
	$routes->post('temperaturecontroll/updatePlaceholder', 'TemperaturecontrollController::updatePlaceholder', ['filter' => 'auth']);

	$routes->post('temperaturecontroll/imageUpdate/(:any)', 'TemperaturecontrollController::addImage/$1', ['filter' => 'auth']);

	$routes->get('worksheets/report/(:any)', 'TemperaturecontrollController::htmlToPDF/$1', ['filter' => 'auth']);

	$routes->post('temperaturecontroll/generateReport', 'TemperaturecontrollController::generateReport', ['filter' => 'auth']);
	$routes->post('temperaturecontroll/verifyCorrection', 'TemperaturecontrollController::verifyCorrection', ['filter' => 'auth']);

//temperature controller


//Voltmeter
	$routes->get('electricalmeter/worksheet', 'electricalmeterController::worksheet', ['filter' => 'auth']);
	$routes->get('electricalmeter/worksheet/(:any)', 'electricalmeterController::worksheet/$1', ['filter' => 'auth']);
	$routes->get('electricalmeter/certificates', 'electricalmeterController::certificateTable', ['filter' => 'auth']);
	$routes->get('electricalmeter/print/(:any)', 'electricalmeterController::worksheetPrint/$1', ['filter' => 'auth']);
	$routes->get('electricalmeter/deleteWorksheet/(:any)', 'electricalmeterController::deleteWorksheet/$1', ['filter' => 'auth']);

	$routes->post('electricalmeter/get_standard_value_by_serial', 'electricalmeterController::get_standard_value_by_serial', ['filter' => 'auth']);
	$routes->post('electricalmeter/add_New_Worksheet_Data', 'electricalmeterController::addNewWorksheetData', ['filter' => 'auth']);
	$routes->post('electricalmeter/update_Worksheet_Data', 'electricalmeterController::updateWorksheetData', ['filter' => 'auth']);
	$routes->post('electricalmeter/get_data_by_id', 'electricalmeterController::get_data_by_id', ['filter' => 'auth']);
	$routes->post('electricalmeter/report/(:num)', 'electricalmeterController::htmlToPDF/$1', ['filter' => 'auth']);
	$routes->post('electricalmeter/deleteStandard', 'electricalmeterController::deleteStandard', ['filter' => 'auth']);
	$routes->post('electricalmeter/updatePlaceholder', 'electricalmeterController::updatePlaceholder', ['filter' => 'auth']);

	$routes->post('electricalmeter/imageUpdate/(:any)', 'electricalmeterController::addImage/$1', ['filter' => 'auth']);

	$routes->get('worksheets/report/(:any)', 'electricalmeterController::htmlToPDF/$1', ['filter' => 'auth']);

	$routes->post('electricalmeter/generateReport', 'electricalmeterController::generateReport', ['filter' => 'auth']);
	$routes->post('electricalmeter/verifyCorrection', 'electricalmeterController::verifyCorrection', ['filter' => 'auth']);

//Voltmeter

//Caliper
	$routes->get('caliper/worksheet', 'CaliperController::worksheet', ['filter' => 'auth']);
	$routes->get('caliper/worksheet/(:any)', 'CaliperController::worksheet/$1', ['filter' => 'auth']);

	$routes->get('caliper/standardTable', 'CaliperController::standardTable', ['filter' => 'auth']);
	$routes->get('caliper/certificates', 'CaliperController::certificateTable', ['filter' => 'auth']);

	$routes->post('caliper/add_New_Worksheet_Data', 'CaliperController::addNewWorksheetData', ['filter' => 'auth']);
	$routes->post('caliper/update_Worksheet_Data', 'CaliperController::updateWorksheetData', ['filter' => 'auth']);
	$routes->get('caliper/deleteWorksheet/(:any)', 'CaliperController::deleteWorksheet/$1', ['filter' => 'auth']);
	
	$routes->post('caliper/get_data_by_id', 'CaliperController::get_data_by_id', ['filter' => 'auth']);
	//$routes->post('caliper/imageUpdate/(:any)', 'CaliperController::addImage/$1', ['filter' => 'auth']);

	$routes->post('caliper/report/(:num)', 'CaliperController::htmlToPDF/$1', ['filter' => 'auth']);
	$routes->post('caliper/generateReport', 'CaliperController::generateReport', ['filter' => 'auth']);
	$routes->post('caliper/updatePlaceholder', 'CaliperController::updatePlaceholder', ['filter' => 'auth']);

	$routes->post('caliper/getCustomerData', 'CaliperController::get_customer_data', ['filter' => 'auth']);
	$routes->post('caliper/verifyCorrection', 'CaliperController::verifyCorrection', ['filter' => 'auth']);
//Caliper

//TSR API ULIMS
	$routes->get('TSR/requests', 'TSRController::requestTable', ['filter' => 'auth']);
	
	$routes->post('TSR/worksheetElectronicBalance', 'TSRController::worksheetElectronicBalance', ['filter' => 'auth']);
	$routes->post('TSR/worksheetThermoHygrometer', 'TSRController::worksheetThermoHygrometer', ['filter' => 'auth']);
	$routes->post('TSR/worksheetTestWeight', 'TSRController::worksheetTestWeight', ['filter' => 'auth']);
	$routes->post('TSR/worksheetWeighingScale', 'TSRController::worksheetWeighingScale', ['filter' => 'auth']);
	$routes->post('TSR/worksheetThermometer', 'TSRController::worksheetThermometer', ['filter' => 'auth']);
	$routes->post('TSR/worksheetTimer', 'TSRController::worksheetTimer', ['filter' => 'auth']);
	$routes->post('TSR/worksheetPressure', 'TSRController::worksheetPressure', ['filter' => 'auth']);
	$routes->post('TSR/worksheetPHmeter', 'TSRController::worksheetPHmeter', ['filter' => 'auth']);
	$routes->post('TSR/worksheetVolumetric', 'TSRController::worksheetVolumetric', ['filter' => 'auth']);
	$routes->post('TSR/worksheetEnclosure', 'TSRController::worksheetEnclosure', ['filter' => 'auth']);
	$routes->post('TSR/worksheetRefractometer', 'TSRController::worksheetRefractometer', ['filter' => 'auth']);
	$routes->post('TSR/worksheetCaliper', 'TSRController::worksheetCaliper', ['filter' => 'auth']);
	$routes->post('TSR/worksheetElectricalMeters', 'TSRController::worksheetElectricalMeters', ['filter' => 'auth']);

	$routes->post('TSR/samplePerRequestID', 'TSRController::requestSampleWorksheetID', ['filter' => 'auth']);
	$routes->post('TSR/samplePerRequestIDImport', 'TSRController::requestSampleWorksheetID_import', ['filter' => 'auth']);
	$routes->post('TSR/countPerType', 'TSRController::checkRequestSample', ['filter' => 'auth']);
	$routes->post('TSR/checkSampleId', 'TSRController::checkSampleId', ['filter' => 'auth']);
	$routes->post('TSR/get_request_sample_id', 'TSRController::get_request_sample_id', ['filter' => 'auth']);
	$routes->post('TSR/get_worksheet_tsr_id', 'TSRController::get_worksheet_tsr_id', ['filter' => 'auth']);
	
	$routes->post('TSR/get_all_from_type', 'TSRController::get_all_from_type', ['filter' => 'auth']);
	$routes->post('TSR/get_data_from_worksheet_type', 'TSRController::get_data_from_worksheet_type', ['filter' => 'auth']);
	

	
	$routes->post('TSR/request_samples', 'TSRController::get_data_from_request_samples', ['filter' => 'auth']);
	$routes->post('TSR/reference_data', 'TSRController::get_reference_data', ['filter' => 'auth']);
	
	

	$routes->post('TSR/updateTSRID', 'TSRController::updateTSRID', ['filter' => 'auth']);
	$routes->post('TSR/updateTSRIDImport', 'TSRController::updateTSRIDImport', ['filter' => 'auth']);
	$routes->post('TSR/update_from_offline', 'TSRController::update_from_offline', ['filter' => 'auth']);
	
	$routes->post('TSR/standard_update', 'TSRController::standard_updated_data', ['filter' => 'auth']);

	
//TSR API ULIMS

// placeholder
	$routes->post('placeholder/get_placeholders', 'DefaultsController::get_placeholders', ['filter' => 'auth']);
	$routes->post('placeholder/update_statements', 'DefaultsController::update_statements', ['filter' => 'auth']);
	$routes->post('placeholder/update_date_issued', 'DefaultsController::update_date_issued', ['filter' => 'auth']);
	
// placeholder


//Worksheets
	$routes->get('worksheets/ElectronicBalance/(:any)', 'WorksheetController::ElectronicBalanceWorksheet/$1', ['filter' => 'auth']);
	$routes->get('worksheets/ThermoHygrometer/(:any)', 'WorksheetController::ThermoHygrometerWorksheet/$1', ['filter' => 'auth']);
	$routes->get('worksheets/TestWeight/(:any)', 'WorksheetController::TestWeightWorksheet/$1', ['filter' => 'auth']);
	$routes->get('worksheets/WeighingScale/(:any)', 'WorksheetController::WeighingScaleWorksheet/$1', ['filter' => 'auth']);
	$routes->get('worksheets/DigitalThermometer/(:any)', 'WorksheetController::DigitalThermometerWorksheet/$1', ['filter' => 'auth']);
	$routes->get('worksheets/DigitalTimer/(:any)', 'WorksheetController::DigitalTimerWorksheet/$1', ['filter' => 'auth']);
	$routes->get('worksheets/PHMeter/(:any)', 'WorksheetController::PHMeterWorksheet/$1', ['filter' => 'auth']);
	$routes->get('worksheets/TemperatureController/(:any)', 'WorksheetController::TemperatureControllerWorksheet/$1', ['filter' => 'auth']);
	$routes->get('worksheets/PressureGauge/(:any)', 'WorksheetController::PressureGaugeWorksheet/$1', ['filter' => 'auth']);
	$routes->get('worksheets/ElectricalMeter/(:any)', 'WorksheetController::ElectricalMeterWorksheet/$1', ['filter' => 'auth']);
	$routes->get('worksheets/Glassware/(:any)', 'WorksheetController::GlasswareWorksheet/$1', ['filter' => 'auth']);
	$routes->get('worksheets/Refractometer/(:any)', 'WorksheetController::RefractometerWorksheet/$1', ['filter' => 'auth']);
	$routes->get('worksheets/Enclosure/(:any)', 'WorksheetController::EnclosureWorksheet/$1', ['filter' => 'auth']);
	$routes->get('worksheets/Caliper/(:any)', 'WorksheetController::CaliperWorksheet/$1', ['filter' => 'auth']);

	$routes->post('image/add/(:any)', 'WorksheetController::save_image/$1', ['filter' => 'auth']);
	$routes->post('image/getData', 'WorksheetController::get_image_data', ['filter' => 'auth']);
	$routes->post('worksheet/update_worksheet_image', 'WorksheetController::update_worksheet_image', ['filter' => 'auth']);
	$routes->post('worksheet/get_worksheet_image_data', 'WorksheetController::get_worksheet_image_data', ['filter' => 'auth']);
	
	$routes->post('status/update', 'WorksheetController::update_worksheet_status', ['filter' => 'auth']);
//Worksheets

// STANDARD BAROMETER
	$routes->get('standard/barometer', 'StandardController::tableBarometer', ['filter' => 'auth']);
	$routes->post('standard/barometer/addBarometer', 'StandardController::newStandardBarometer', ['filter' => 'auth']);
	$routes->post('standard/barometer/deleteBarometer/(:num)', 'StandardController::deleteStandardBarometer/$1', ['filter' => 'auth']);
	$routes->post('standard/barometer/updateBarometer', 'StandardController::updateStandardBarometer', ['filter' => 'auth']);
// STANDARD BAROMETER
// STANDARD BALANCE
	// $routes->get('standard/balance', 'StandardController::tableBalance', ['filter' => 'auth']);
	// $routes->post('standard/balance/addBalance', 'StandardController::newStandardBalance', ['filter' => 'auth']);
	// $routes->post('standard/balance/deleteBalance/(:num)', 'StandardController::deleteStandardBalance/$1', ['filter' => 'auth']);
	// $routes->post('standard/balance/updateBalance', 'StandardController::updateStandardBalance', ['filter' => 'auth']);


	$routes->get('standard/balance', 'StandardController::tableBalance', ['filter' => 'auth']);
	$routes->post('standard/balance/addBalance', 'StandardController::newStandardBalance', ['filter' => 'auth']);
	$routes->post('standard/balance/updateBalance', 'StandardController::updateStandardBalance', ['filter' => 'auth']);
	$routes->post('standard/balance/updateMeasurementsBalance', 'StandardController::updateMeasurementsStandardBalance', ['filter' => 'auth']);
	
	$routes->post('standard/balance/removeStandard', 'StandardController::removeStandardBalance', ['filter' => 'auth']);

	$routes->post('standard/balance/getStandardDataBalance', 'StandardController::getStandardDataBalance', ['filter' => 'auth']);
	$routes->post('standard/balance/getStandardValuesBalanceByDetailsID', 'StandardController::getStandardValuesBalanceByDetailsID', ['filter' => 'auth']);



// STANDARD BALANCE
// STANDARD TEMPERATURE RECORDER
	$routes->get('standard/tempRecorder', 'StandardController::tableTempRecorder', ['filter' => 'auth']);
	$routes->post('standard/tempRecorder/addTempRecorder', 'StandardController::newStandardTempRecorder', ['filter' => 'auth']);
	$routes->post('standard/tempRecorder/deleteTempRecorder/(:num)', 'StandardController::deleteStandardTempRecorder/$1', ['filter' => 'auth']);
	$routes->post('standard/tempRecorder/updateTempRecorder', 'StandardController::updateStandardTempRecorder', ['filter' => 'auth']);
	$routes->post('standard/tempRecorder/updateMeasurementsTempRecorder', 'StandardController::updateStandardMeasurementsTempRecorder', ['filter' => 'auth']);
	$routes->post('standard/tempRecorder/getStandardDataTempRecorder', 'StandardController::getStandardDataTempRecorder', ['filter' => 'auth']);
	
// STANDARD TEMPERATURE RECORDER
// STANDARD REFERENCE THERMO-HYGROMETER
	$routes->get ('standard/thermoHygrometer', 'StandardController::tableThermoHygrometer', ['filter' => 'auth']);
	$routes->post('standard/thermoHygrometer/addThermoHygrometer', 'StandardController::newStandardThermoHygrometer', ['filter' => 'auth']);
	$routes->post('standard/thermoHygrometer/deleteThermoHygrometer/(:num)', 'StandardController::deleteStandardThermoHygrometer/$1', ['filter' => 'auth']);
	$routes->post('standard/thermoHygrometer/updateThermoHygrometer', 'StandardController::updateStandardThermoHygrometer', ['filter' => 'auth']);
	$routes->post('standard/thermoHygrometer/updateMeasurementsThermoHygrometer', 'StandardController::updateStandardMeasurementsThermoHygrometer', ['filter' => 'auth']);
	$routes->post('standard/thermoHygrometer/getStandardDataThermoHygrometer', 'StandardController::getStandardDataThermoHygrometer', ['filter' => 'auth']);

// STANDARD REFERENCE THERMO-HYGROMETER
// STANDARD WIRELESS TEMPERATURE LOGGER
	$routes->get('standard/wirelessTempLogger', 'StandardController::tableWirelessTempLogger', ['filter' => 'auth']);
	$routes->post('standard/wirelessTempLogger/addWirelessTempLogger', 'StandardController::newStandardWirelessTempLogger', ['filter' => 'auth']);
	$routes->post('standard/wirelessTempLogger/deleteWirelessTempLogger/(:num)', 'StandardController::deleteStandardWirelessTempLogger/$1', ['filter' => 'auth']);
	$routes->post('standard/wirelessTempLogger/updateWirelessTempLogger', 'StandardController::updateStandardWirelessTempLogger', ['filter' => 'auth']);
	$routes->post('standard/wirelessTempLogger/updateMeasurementsWirelessTempLogger', 'StandardController::updateStandardMeasurementsWirelessTempLogger', ['filter' => 'auth']);
	$routes->post('standard/wirelessTempLogger/getStandardDataWirelessTempLogger', 'StandardController::getStandardDataWirelessTempLogger', ['filter' => 'auth']);

// STANDARD WIRELESS TEMPERATURE LOGGER
// STANDARD REFERENCE WEIGHT
	$routes->get('standard/referenceWeight', 'StandardController::tableReferenceWeight', ['filter' => 'auth']);
	$routes->post('standard/referenceWeight/addReferenceWeight', 'StandardController::newStandardReferenceWeight', ['filter' => 'auth']);
	$routes->post('standard/referenceWeight/deleteReferenceWeight/(:num)', 'StandardController::deleteStandardReferenceWeight/$1', ['filter' => 'auth']);
	$routes->post('standard/referenceWeight/updateReferenceWeight', 'StandardController::updateStandardReferenceWeight', ['filter' => 'auth']);
	$routes->post('standard/referenceWeight/updateMeasurementsReferenceWeight', 'StandardController::updateStandardMeasurementsReferenceWeight', ['filter' => 'auth']);
	$routes->post('standard/referenceWeight/updateStandardValuesReferenceWeight', 'StandardController::updateStandardValuesReferenceWeight', ['filter' => 'auth']);
	$routes->post('standard/referenceWeight/newStandardValuesReferenceWeight', 'StandardController::newStandardValuesReferenceWeight', ['filter' => 'auth']);
	$routes->post('standard/referenceWeight/removeStandard', 'StandardController::removeStandardReferenceWeight', ['filter' => 'auth']);
	$routes->post('standard/referenceWeight/removeStandardValue', 'StandardController::removeStandardValueReferenceWeight', ['filter' => 'auth']);

	$routes->post('standard/referenceWeight/getStandardDataReferenceWeight', 'StandardController::getStandardDataReferenceWeight', ['filter' => 'auth']);
	$routes->post('standard/referenceWeight/getStandardValuesReferenceWeightByDetailsID', 'StandardController::getStandardValuesReferenceWeightByDetailsID', ['filter' => 'auth']);

// STANDARD REFERENCE WEIGHT

// STANDARD CURRENT COIL
	$routes->get('standard/currentCoil', 'StandardController::tableCurrentCoil', ['filter' => 'auth']);
	$routes->post('standard/currentCoil/addCurrentCoil', 'StandardController::newStandardCurrentCoil', ['filter' => 'auth']);
	$routes->post('standard/currentCoil/updateCurrentCoil', 'StandardController::updateStandardCurrentCoil', ['filter' => 'auth']);
	$routes->post('standard/currentCoil/removeStandard', 'StandardController::removeStandardCurrentCoil', ['filter' => 'auth']);

	$routes->post('standard/currentCoil/getStandardDataCurrentCoil', 'StandardController::getStandardDataCurrentCoil', ['filter' => 'auth']);
	$routes->post('standard/currentCoil/getStandardValuesCurrentCoilByDetailsID', 'StandardController::getStandardValuesCurrentCoilByDetailsID', ['filter' => 'auth']);

// STANDARD CURRENT COIL


// STANDARD GAUGE BLOCK
	$routes->get('standard/gaugeBlock', 'StandardController::tableGaugeBlock', ['filter' => 'auth']);
	$routes->post('standard/gaugeBlock/addGaugeBlock', 'StandardController::newStandardGaugeBlock', ['filter' => 'auth']);
	$routes->post('standard/gaugeBlock/updateGaugeBlock', 'StandardController::updateStandardGaugeBlock', ['filter' => 'auth']);
	$routes->post('standard/gaugeBlock/removeStandard', 'StandardController::removeStandardGaugeBlock', ['filter' => 'auth']);


	$routes->post('standard/gaugeBlock/getStandardDataGaugeBlock', 'StandardController::getStandardDataGaugeBlock', ['filter' => 'auth']);
	$routes->post('standard/gaugeBlock/getStandardDataGaugeBlockDetails', 'StandardController::getStandardDataGaugeBlockDetails', ['filter' => 'auth']);
	$routes->post('standard/gaugeBlock/getStandardValuesGaugeBlockByDetailsID', 'StandardController::getStandardValuesGaugeBlockByDetailsID', ['filter' => 'auth']);

	$routes->post('standard/gaugeBlock/newUncertainty', 'StandardController::newUncertainty', ['filter' => 'auth']);
	$routes->post('standard/gaugeBlock/editUncertainty', 'StandardController::editUncertainty', ['filter' => 'auth']);
	$routes->post('standard/gaugeBlock/removeUncertainty', 'StandardController::removeUncertainty', ['filter' => 'auth']);

	$routes->post('standard/gaugeBlock/newMeasurement', 'StandardController::newMeasurement', ['filter' => 'auth']);
	$routes->post('standard/gaugeBlock/editMeasurement', 'StandardController::editMeasurement', ['filter' => 'auth']);
	$routes->post('standard/gaugeBlock/removeMeasurement', 'StandardController::removeMeasurement', ['filter' => 'auth']);


// STANDARD GAUGE BLOCK

// STANDARD MULTI-PRODUCT CALIBRATOR
	$routes->get('standard/multiProductCalibrator', 'StandardController::tableMultiProductCalibrator', ['filter' => 'auth']);
	$routes->post('standard/multiProductCalibrator/addMultiProductCalibrator', 'StandardController::newStandardMultiProductCalibrator', ['filter' => 'auth']);
	$routes->post('standard/multiProductCalibrator/deleteMultiProductCalibrator/(:num)', 'StandardController::deleteStandardMultiProductCalibrator/$1', ['filter' => 'auth']);
	$routes->post('standard/multiProductCalibrator/updateMultiProductCalibrator', 'StandardController::updateStandardMultiProductCalibrator', ['filter' => 'auth']);
	$routes->post('standard/multiProductCalibrator/updateMeasurementsMultiProductCalibrator', 'StandardController::updateStandardMeasurementsMultiProductCalibrator', ['filter' => 'auth']);
	$routes->post('standard/multiProductCalibrator/updateStandardValuesMultiProductCalibrator', 'StandardController::updateStandardValuesMultiProductCalibrator', ['filter' => 'auth']);
	$routes->post('standard/multiProductCalibrator/newStandardValuesMultiProductCalibrator', 'StandardController::newStandardValuesMultiProductCalibrator', ['filter' => 'auth']);
	$routes->post('standard/multiProductCalibrator/removeStandard', 'StandardController::removeStandardMultiProductCalibrator', ['filter' => 'auth']);
	$routes->post('standard/multiProductCalibrator/removeStandardValue', 'StandardController::removeStandardValueMultiProductCalibrator', ['filter' => 'auth']);

	$routes->post('standard/multiProductCalibrator/getStandardDataMultiProductCalibrator', 'StandardController::getStandardDataMultiProductCalibrator', ['filter' => 'auth']);
	$routes->post('standard/multiProductCalibrator/getStandardValuesMultiProductCalibratorByDetailsID', 'StandardController::getStandardValuesMultiProductCalibratorByDetailsID', ['filter' => 'auth']);

// STANDARD MULTI-PRODUCT CALIBRATOR

// STANDARD TEMPERATURE SOURCE
	// $routes->get('digitalThermometer/temperatureSourceTable', 'DigitalThermometerController::temperatureSource', ['filter' => 'auth']);
	// $routes->post('digitalThermometer/addNewSource', 'DigitalThermometerController::addNewSource', ['filter' => 'auth']);
	// $routes->post('digitalThermometer/deleteSource/(:any)', 'DigitalThermometerController::deleteNewSource/$1', ['filter' => 'auth']);
	// $routes->post('digitalThermometer/getSourceStandard', 'DigitalThermometerController::getSourceStandard', ['filter' => 'auth']);
	// $routes->post('digitalThermometer/getSourceById', 'DigitalThermometerController::getSourceById', ['filter' => 'auth']);

	$routes->get('standard/temperatureSource', 'StandardController::tableTemperatureSource', ['filter' => 'auth']);
	$routes->post('standard/temperatureSource/addTemperatureSource', 'StandardController::newStandardTemperatureSource', ['filter' => 'auth']);
	$routes->post('standard/temperatureSource/deleteTemperatureSource/(:num)', 'StandardController::deleteStandardTemperatureSource/$1', ['filter' => 'auth']);
	$routes->post('standard/temperatureSource/updateTemperatureSource', 'StandardController::updateStandardTemperatureSource', ['filter' => 'auth']);
	$routes->post('standard/temperatureSource/removeStandard', 'StandardController::removeStandardTemperatureSource', ['filter' => 'auth']);
	$routes->post('standard/temperatureSource/removeStandardValue', 'StandardController::removeStandardValueTemperatureSource', ['filter' => 'auth']);

	$routes->post('standard/temperatureSource/getStandardDataTemperatureSource', 'StandardController::getStandardDataTemperatureSource', ['filter' => 'auth']);
	$routes->post('standard/temperatureSource/getStandardValuesTemperatureSourceByDetailsID', 'StandardController::getStandardValuesTemperatureSourceByDetailsID', ['filter' => 'auth']);

// STANDARD TEMPERATURE SOURCE

// STANDARD Digital Timer
	$routes->get('standard/digitalTimer', 'StandardController::tableDigitalTimer', ['filter' => 'auth']);
	$routes->post('standard/digitalTimer/addDigitalTimer', 'StandardController::newStandardDigitalTimer', ['filter' => 'auth']);
	// $routes->post('standard/multiProductCalibrator/deleteMultiProductCalibrator/(:num)', 'StandardController::deleteStandardMultiProductCalibrator/$1', ['filter' => 'auth']);
	$routes->post('standard/digitalTimer/updateDigitalTimer', 'StandardController::updateStandardDigitalTimer', ['filter' => 'auth']);
	// $routes->post('standard/multiProductCalibrator/updateMeasurementsMultiProductCalibrator', 'StandardController::updateStandardMeasurementsMultiProductCalibrator', ['filter' => 'auth']);
	$routes->post('standard/digitalTimer/updateStandardValuesDigitalTimer', 'StandardController::updateStandardValuesDigitalTimer', ['filter' => 'auth']);
	$routes->post('standard/digitalTimer/newStandardValuesDigitalTimer', 'StandardController::newStandardValuesDigitalTimer', ['filter' => 'auth']);
	$routes->post('standard/digitalTimer/removeStandard', 'StandardController::removeStandardDigitalTimer', ['filter' => 'auth']);
	$routes->post('standard/digitalTimer/removeStandardValue', 'StandardController::removeStandardValueDigitalTimer', ['filter' => 'auth']);

	 $routes->post('standard/digitalTimer/getStandardDataDigitalTimer', 'StandardController::getStandardDataDigitalTimer', ['filter' => 'auth']);
	 $routes->post('standard/digitalTimer/getStandardValuesDigitalTimerByDetailsID', 'StandardController::getStandardValuesDigitalTimerByDetailsID', ['filter' => 'auth']);
// STANDARD Digital Timer

// STANDARD pH Meter
	$routes->get('standard/pHMeter', 'standardPHMeterController::standardTable', ['filter' => 'auth']);
	$routes->post('standard/pHMeter/addPHMeter', 'standardPHMeterController::newStandardPHMeter', ['filter' => 'auth']);	
	$routes->post('standard/pHMeter/removeStandard', 'standardPHMeterController::removeStandard', ['filter' => 'auth']);

	$routes->post('standard/pHMeter/getStandardDataPHMeter', 'standardPHMeterController::getStandardDataPHMeter', ['filter' => 'auth']);
	$routes->post('standard/pHMeter/updateMeasurementsPHMeter', 'standardPHMeterController::updateStandardMeasurementsPHMeter', ['filter' => 'auth']);
	$routes->post('standard/pHMeter/updatePHMeter', 'standardPHMeterController::updateStandardPHMeter', ['filter' => 'auth']);

// STANDARD pH Meter

// STANDARD DOCUMENTING PROCESS CALIBRATOR
	$routes->get('standard/documentingProcessCalibrator', 'StandardController::tableDocumentingProcessCalibrator', ['filter' => 'auth']);
	$routes->post('standard/documentingProcessCalibrator/addDocumentingProcessCalibrator', 'StandardController::newStandardDocumentingProcessCalibrator', ['filter' => 'auth']);
	$routes->post('standard/documentingProcessCalibrator/deleteDocumentingProcessCalibrator/(:num)', 'StandardController::deleteStandardDocumentingProcessCalibrator/$1', ['filter' => 'auth']);
	$routes->post('standard/documentingProcessCalibrator/updateDocumentingProcessCalibrator', 'StandardController::updateStandardDocumentingProcessCalibrator', ['filter' => 'auth']);
	$routes->post('standard/documentingProcessCalibrator/updateMeasurementsDocumentingProcessCalibrator', 'StandardController::updateStandardMeasurementsDocumentingProcessCalibrator', ['filter' => 'auth']);
	$routes->post('standard/documentingProcessCalibrator/updateStandardValuesDocumentingProcessCalibrator', 'StandardController::updateStandardValuesDocumentingProcessCalibrator', ['filter' => 'auth']);
	$routes->post('standard/documentingProcessCalibrator/newStandardValuesDocumentingProcessCalibrator', 'StandardController::newStandardValuesDocumentingProcessCalibrator', ['filter' => 'auth']);
	$routes->post('standard/documentingProcessCalibrator/removeStandard', 'StandardController::removeStandardDocumentingProcessCalibrator', ['filter' => 'auth']);
	$routes->post('standard/documentingProcessCalibrator/removeStandardValue', 'StandardController::removeStandardValueDocumentingProcessCalibrator', ['filter' => 'auth']);

	$routes->post('standard/documentingProcessCalibrator/getStandardDataDocumentingProcessCalibrator', 'StandardController::getStandardDataDocumentingProcessCalibrator', ['filter' => 'auth']);
	$routes->post('standard/documentingProcessCalibrator/getStandardValuesDocumentingProcessCalibratorByDetailsID', 'StandardController::getStandardValuesDocumentingProcessCalibratorByDetailsID', ['filter' => 'auth']);

// STANDARD DOCUMENTING PROCESS CALIBRATOR

// STANDARD BUFFER SOLUTIONS
	$routes->get('standard/bufferSolution', 'StandardController::tableBufferSolution', ['filter' => 'auth']);
	$routes->post('standard/bufferSolution/addBufferSolution', 'StandardController::newStandardBufferSolution', ['filter' => 'auth']);
	$routes->post('standard/bufferSolution/deleteBufferSolution/(:num)', 'StandardController::deleteStandardBufferSolution/$1', ['filter' => 'auth']);
	$routes->post('standard/bufferSolution/updateBufferSolution', 'StandardController::updateStandardBufferSolution', ['filter' => 'auth']);
	$routes->post('standard/bufferSolution/updateMeasurementsBufferSolution', 'StandardController::updateStandardMeasurementsBufferSolution', ['filter' => 'auth']);
	$routes->post('standard/bufferSolution/updateStandardValuesBufferSolution', 'StandardController::updateStandardValuesBufferSolution', ['filter' => 'auth']);
	$routes->post('standard/bufferSolution/newStandardValuesBufferSolution', 'StandardController::newStandardValuesBufferSolution', ['filter' => 'auth']);
	$routes->post('standard/bufferSolution/removeStandard', 'StandardController::removeStandardBufferSolution', ['filter' => 'auth']);
	$routes->post('standard/bufferSolution/removeStandardValue', 'StandardController::removeStandardValueBufferSolution', ['filter' => 'auth']);

	$routes->post('standard/bufferSolution/getStandardDataBufferSolution', 'StandardController::getStandardDataBufferSolution', ['filter' => 'auth']);
	$routes->post('standard/bufferSolution/getStandardValuesBufferSolutionByDetailsID', 'StandardController::getStandardValuesBufferSolutionByDetailsID', ['filter' => 'auth']);

// STANDARD BUFFER SOLUTIONS

// STANDARD CHAMBER

	$routes->get('standard/chamber', 'StandardController::tableChamber', ['filter' => 'auth']);
	$routes->post('standard/chamber/addChamber', 'StandardController::newStandardChamber', ['filter' => 'auth']);
	$routes->post('standard/chamber/updateChamber', 'StandardController::updateStandardChamber', ['filter' => 'auth']);
	$routes->post('standard/chamber/updateMeasurementsChamber', 'StandardController::updateMeasurementsStandardChamber', ['filter' => 'auth']);
	
	$routes->post('standard/chamber/removeStandard', 'StandardController::removeStandardChamber', ['filter' => 'auth']);

	$routes->post('standard/chamber/getStandardDataChamber', 'StandardController::getStandardDataChamber', ['filter' => 'auth']);
	$routes->post('standard/chamber/getStandardValuesChamberByDetailsID', 'StandardController::getStandardValuesChamberByDetailsID', ['filter' => 'auth']);



// STANDARD CHAMBER

//Customer
	$routes->get('customerTable', 'Customer::customerTable', ['filter' => 'auth']);
	$routes->post('customerStore', 'Customer::store', ['filter' => 'auth']);
	$routes->get('EditCus/(:any)', 'Customer::EditCus/$1', ['filter' => 'auth']);
	$routes->get('deleteCus/(:any)', 'Customer::delete/$1', ['filter' => 'auth']);

	$routes->get('about', 'Customer::about', ['filter' => 'auth']);
	$routes->post('about/update', 'Customer::updateAbout', ['filter' => 'auth']);
	
	
	//PERSONNEL
	$routes->get('personnelTable', 'Personnel::personnelTable', ['filter' => 'auth']);
	$routes->post('personnelStore', 'Personnel::store', ['filter' => 'auth']);
	$routes->get('deletePerson/(:any)', 'Personnel::delete/$1', ['filter' => 'auth']);
	//verifier
	$routes->post('verifierStore', 'Verifier::store', ['filter' => 'auth']);
	$routes->get('deleteVerifier/(:any)', 'Verifier::delete/$1', ['filter' => 'auth']);


	$routes->get('profile', 'Dashboard::profile', ['filter' => 'auth']);

	$routes->get('forVerifyTable', 'Dashboard::forVerifyTable', ['filter' => 'auth']); 
	
//defaults
	$routes->get('defaultEdit', 'DefaultsController::fetchTableController', ['filter' => 'auth']);
	$routes->post('saveModule1', 'DefaultsController::saveModule1', ['filter' => 'auth']);
	$routes->post('saveModule2', 'DefaultsController::saveModule2', ['filter' => 'auth']);
//defaults



//certificate number checker
$routes->post('electronicBalance/certificateNumberChecker', 'ElectronicBalanceController::certificateNumberChecker', ['filter' => 'auth']);
$routes->post('thermohygrometer/certificateNumberChecker', 'Thermo_HygrometerController::certificateNumberChecker', ['filter' => 'auth']);
$routes->post('testWeight/certificateNumberChecker', 'TestWeightController::certificateNumberChecker', ['filter' => 'auth']);

$routes->post('weighingScale/certificateNumberChecker', 'WeighingScaleController::certificateNumberChecker', ['filter' => 'auth']);
$routes->post('digitalThermometer/certificateNumberChecker', 'DigitalThermometerController::certificateNumberChecker', ['filter' => 'auth']);
$routes->post('digitalTimer/certificateNumberChecker', 'DigitalTimerController::certificateNumberChecker', ['filter' => 'auth']);

$routes->post('pressureGauge/certificateNumberChecker', 'PressureGaugeController::certificateNumberChecker', ['filter' => 'auth']);

$routes->post('pHMeter/certificateNumberChecker', 'PHMeterController::certificateNumberChecker', ['filter' => 'auth']);
$routes->post('glassware/certificateNumberChecker', 'GlasswareController::certificateNumberChecker', ['filter' => 'auth']);
$routes->post('temperaturecontroll/certificateNumberChecker', 'TemperaturecontrollController::certificateNumberChecker', ['filter' => 'auth']);
$routes->post('enclosure/certificateNumberChecker', 'EnclosureController::certificateNumberChecker', ['filter' => 'auth']);
$routes->post('refractometer/certificateNumberChecker', 'refractometerController::certificateNumberChecker', ['filter' => 'auth']);

$routes->post('caliper/certificateNumberChecker', 'CaliperController::certificateNumberChecker', ['filter' => 'auth']);

$routes->post('electricalmeter/certificateNumberChecker', 'electricalmeterController::certificateNumberChecker', ['filter' => 'auth']);


	// $routes->post('enclosure/certificateNumberChecker', 'EnclosureController::certificateNumberChecker', ['filter' => 'auth']);
//certificate number checker


//cmc
$routes->get('cmc', 'CMCController::cmc', ['filter' => 'auth']);

$routes->post('cmc/get_cmc_data_full', 'CMCController::get_cmc_data_full', ['filter' => 'auth']);
$routes->post('cmc/save_data', 'CMCController::save_data', ['filter' => 'auth']);
$routes->post('cmc/update_data', 'CMCController::update_data', ['filter' => 'auth']);
//cmc

//worksheet layouts
	$routes->get('ElectWorksheetLayout', 'WorksheetLayout::SingleRange', ['filter' => 'auth']);
	$routes->get('testWeightSheetLayout', 'WorksheetLayout::testWeight', ['filter' => 'auth']);
	$routes->get('phMeterSheetLayout', 'WorksheetLayout::phMeter', ['filter' => 'auth']);
	$routes->get('thermoHygrometerSheetLayout', 'WorksheetLayout::thermoHygrometer', ['filter' => 'auth']);
	$routes->get('pressureGaugeSheetLayout', 'WorksheetLayout::pressureGauge', ['filter' => 'auth']);
	$routes->get('tempEnclosureSheetLayout', 'WorksheetLayout::tempEnclosure', ['filter' => 'auth']);
	$routes->get('thermometerSheetLayout', 'WorksheetLayout::thermometer', ['filter' => 'auth']);
	$routes->get('autoclaveSheetLayout', 'WorksheetLayout::autoclave', ['filter' => 'auth']);
	$routes->get('timerSheetLayout', 'WorksheetLayout::timer', ['filter' => 'auth']);
	$routes->get('electricmeterSheetLayout', 'WorksheetLayout::electricmeter', ['filter' => 'auth']);
	$routes->get('volumetricSheetLayout', 'WorksheetLayout::volumetric', ['filter' => 'auth']);
//worksheet layouts

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
