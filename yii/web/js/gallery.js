
app.controller('GalleryCtrl', function($scope, $http) {
	 
	$scope.showModal = false;
	$scope.selectedImages = [];
	$scope.checkedlist = [];
	
	$scope.images = []; /*[
		{url:"/ninilala/web/images/a.jpg", id:1, code:"1"},
		{url:"/ninilala/web/images/b.jpg", id:2, code:"2"},
		{url:"/ninilala/web/images/c.jpg", id:3, code:"3"},
		{url:"/ninilala/web/images/1.jpg", id:4, code:"4"},
		{url:"/ninilala/web/images/2.jpg", id:5, code:"5"},
	];*/
	
	$scope.togglechecked = function(id){
		if($scope.checkedlist[id] === undefined){
			$scope.checkedlist[id] = false;
		}
		$scope.checkedlist[id] = !$scope.checkedlist[id];
		 
	}
	
	$scope.selectImages = function(){
		$scope.selectedImages = [];
		
		for(var id in $scope.checkedlist){
			if($scope.checkedlist[id] === true){
				$scope.selectedImages.push(id);
			}
		}
		
		$scope.hideDailog();
	}
	
	$scope.showDailog = function(){
		$scope.showModal = true;	
		
	}
	
	$scope.hideDailog = function(){
		$scope.showModal = false;	
		
	}
	
	$http({
	    method : "GET",
	    url : "/ninilala/tblimage/listimages"
	  }).then(function mySuccess(response) {
	      $scope.images = response.data;
	    }, function myError(response) {
	      alert(" Error in getting images! :" + response.data);
	  });
});
