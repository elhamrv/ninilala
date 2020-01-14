
var app = angular.module('myApp', []);

app.controller('BodyController', function($scope) {
	$(".main-nav ul li a[href]").each(function() {
		
        if (this.href == window.location.href || this.href + '/' == window.location.href) {
            $(this).addClass("active");
        }
    });
	
	$scope.taggelMenu = function(){
		$(".topNav").toggleClass("taggeld");
	}
});
