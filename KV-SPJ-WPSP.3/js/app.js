var tabliceModul = angular.module('tablice-app', ['ngRoute']);

tabliceModul.config(function($routeProvider)
{
	$routeProvider.when('/tableUsers', {
		templateUrl: 'templates/tableUsers.html',
		controller: 'usersController',
	});
	$routeProvider.when('/tableVijesti', {
		templateUrl: 'templates/tableVijesti.html',
		controller: 'vijestiController'
	});
	$routeProvider.when('/tableKategorije', {
		templateUrl: 'templates/tableKategorije.html',
		controller: 'kategorijeController'
	});
	/*$routeProvider.when('/dodajKategoriju', {
		templateUrl: 'templates/dodajKategoriju.html',
		controller: 'kategorijeController'
	});*/
	$routeProvider.when('/naslovnaVijesti', {
		templateUrl: 'templates/naslovnaVijesti.html',
		controller: 'vijestiController'
	});
	$routeProvider.when('/naslovnaKategorije', {
		templateUrl: 'templates/naslovnaKategorije.html',
		controller: 'kategorijeController'
	});
	$routeProvider.otherwise({
		template: ''
	});
});

tabliceModul.controller('usersController', function($scope, $http)
{
	$scope.oUsers = [];

	$http({
		method: "GET",
		url: "actionUsers.php?action_id=users"
	}).then(function(response)
	{
		console.log(response.data);
		$scope.oUsers = response.data;
	},function(response)
	{
		console.log(response);
		console.log('Ne valja');
	});
});

tabliceModul.controller('vijestiController', function($scope, $http)
{
	$scope.oVijesti = [];

	$http({
		method: "GET",
		url: "actionVijesti.php?action_id=vijesti"
	}).then(function(response)
	{
		console.log(response.data);
		$scope.oVijesti = response.data;
	},function(response)
	{
		console.log(response);
		console.log('Ne valja');
	});
});

tabliceModul.controller('kategorijeController', function($scope, $http)
{
	$scope.oKategorije = [];

	$http({
		method: "GET",
		url: "actionKategorije.php?action_id=kategorije"
	}).then(function(response)
	{
		console.log(response.data);
		$scope.oKategorije = response.data;
	},function(response)
	{
		console.log(response);
		console.log('Ne valja');
	});
});
