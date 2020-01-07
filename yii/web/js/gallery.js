
app.controller('GalleryCtrl', function($scope, $http) {
	 
	$scope.images = []; /*[
		{url:"/ninilala/web/images/a.jpg", id:1, code:"1"},
		{url:"/ninilala/web/images/b.jpg", id:2, code:"2"},
		{url:"/ninilala/web/images/c.jpg", id:3, code:"3"},
		{url:"/ninilala/web/images/1.jpg", id:4, code:"4"},
		{url:"/ninilala/web/images/2.jpg", id:5, code:"5"},
	];*/
	
	$http({
	    method : "GET",
	    url : "/ninilala/tblimage/listimages"
	  }).then(function mySuccess(response) {
	      $scope.images = response.data;
	    }, function myError(response) {
	      alert(" Error in getting images! :" + response.data);
	  });
});
