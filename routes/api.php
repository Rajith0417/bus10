<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('waypoints','WaypointController@apiIndex');
Route::get('waypoints/{waypoint}', 'WaypointController@apiShow');
Route::get('waypointsName/{waypoint}', 'WaypointController@apiNameSearch');
Route::get('countWaypointsName/{waypoint}', 'WaypointController@countNameSearch');
Route::get('waypointsClose/{radius}/{district}/{lat}/{lng}', 'WaypointController@apiBusesNearby');
Route::get('countWaypointsClose/{radius}/{district}/{lat}/{lng}', 'WaypointController@apiCountBusesNearby');

Route::get('waypoints/{waypoint1}/{waypoint2}', 'WaypointController@apiDijkstra');
Route::get('shortestPath/{waypoint1}/{waypoint2}', 'WaypointController@shortestPath');
Route::get('waypointsDirect/{waypoint1}/{waypoint2}', 'WaypointController@apiDirect');
Route::get('waypointsDual/{waypoint1}/{waypoint2}', 'WaypointController@apiDual');

Route::get('waypointsDistrict/{district}', 'WaypointController@apiWaypointsbyDistrict');

Route::get('routes','RouteController@apiIndex');
Route::get('routesName/{routename}', 'RouteController@apiShowName');
Route::get('countShowName/{routename}', 'RouteController@countShowName');
Route::get('routesNumber/{routenumber}', 'RouteController@apiShowNumber');
Route::get('routesNumbers/{routeNumbers}', 'RouteController@apiShowMultiple');
Route::get('routesShow/{route}', 'RouteController@apiShowRoute');

// Route::get('routesInfoShow/{routeName}', 'RouteController@apiShowRouteInfo');

