var app = angular.module("myApp", ["ngRoute","angularUtils.directives.dirPagination"]);
app.config(function($routeProvider) {
    $routeProvider
    .when("/home", {
        templateUrl : "Templates/main.html",
        controller : "mainCtrl"
    })
    .when("/languages", {
        templateUrl : "Templates/london.html",
        controller : "londonCtrl"
    })
    .when("/students", {
        templateUrl : "Templates/paris.html",
        controller : "parisCtrl"
    })
    .when("/students/:id", {
        templateUrl : "Templates/viewstudent.html",
        controller : "viewstudentCtrl"
    })
    .when("/studentsSearch/:name", {
        templateUrl: "Templates/studentsSearch.html",
        controller: "studentsSearchController"
    });

});
app.controller("mainCtrl", function ($scope) {
    $scope.msg = "This is home page!!";
});
app.controller("londonCtrl", function ($scope) {
	$scope.lang = ["java","php","ruby"];
	});
app.controller("parisCtrl", function ($scope,$http,$location) {
	$scope.studentsearch = function(){
		 if ($scope.name)
	            $location.url("/studentsSearch/" + $scope.name)
	        else
	            $location.url("/studentsSearch")
	};
	$http.get('./js/popData.php')
	.then(function(response) {
		$scope.blogs = response.data;
	})
});
app.controller("viewstudentCtrl", function ($scope,$http,$routeParams) {
	$http({
		    url: "./js/showData.php", 
		    method: "GET",
		    params: { id: $routeParams.id }	
	}).then(function (response) {
        $scope.students = response.data;
    })
});
app.controller("studentsSearchController",function($scope,$http,$routeParams){
	$http({
	    url: "./js/showByName.php", 
	    method: "GET",
	    params: { name: $routeParams.name }	
}).then(function (response) {
    $scope.studentslist = response.data;
})
});
