'use strict';

/**
 * @ngdoc directive
 * @name izzyposWebApp.directive:adminPosHeader
 * @description
 * # adminPosHeader
 */
angular.module('sbAdminApp')
	.directive('timeline',function() {
    return {
        templateUrl:'scripts/directives/timeline/timeline.html',
        restrict: 'E',
        replace: true,
				controller:function($http,$scope){
					$http.get("http://localhost/API-shop_test/admin_api_router.php?f=5").success(function(data){
					$scope.orderedata = data ;
					});
				}
    }
  });
