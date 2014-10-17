var app=angular.module("jsonapp",[]);

 function myapp($scope,$http){
    $scope.currentPage = 0;
    $scope.pageSize = 3;
	$scope.items = [];
	$scope.getItems = function() {
		$http({method : 'GET',url : 'https://api.parse.com/1/classes/turlar', headers: { 'X-Parse-Application-Id':'hSNY3qCUgP6jYeb3dwG53huAGGd8YEHugCAjdgGR', 'X-Parse-REST-API-Key':'2rkTaxHnBJbKZvJsDmqdl4kHhqTI8QP9rzaFpPDi'}})
		.success(function(data, status) {
			$scope.items = data.results;
		});
	};

	};
	app.filter('startFrom', function() {
    return function(input, start) {
        start = +start; //parse to int
        return input.slice(start);
    }
});
