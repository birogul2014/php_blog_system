// tormahiri
var app=angular.module("myapp",[]);
app.controller('tormahiri',function  ($scope,$rootScope) {
	$rootScope.date = new Date();
	$scope.bio=[
	{name:"تورماھىرى",bio:"ھەرخىل سۇپىلارغا يۇمشاق دېتال ئاچقۇچى،پىروگىراممىر",rasim:"static-file/img/tormahiri.jpg"},
	{name:"uycyber",bio:"خاككىرلىق تەجرىبىسىگە ئىگە شۇنداقلا پىروگىرامما ئاچقۇسى",rasim:"static-file/img/tormahiri1.jpg"}


	]
});