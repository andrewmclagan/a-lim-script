'use strict';

angular.module('theProblem', [])

	.controller('TheProblemCtrl', ['$scope', '$http', function ($scope, $http) {
		
		/**
		 * Data object
		 * 
		 * @var Object
		 */ 
		$scope.data = {  
			graphData: 		window.ssGraphData,
			processedData: 	'Awaiting User Interaction...',
			varDumped: 		'Awaiting User Interaction...',
		};

		/**
		 * Prevents multiple concurrent requests
		 * 
		 * @var Object
		 */ 
		$scope.requestLock = false;

    	/**
    	 * send data to server for processing
    	 * 
    	 * @return void
    	 */
		$scope.processData = function() {

			$scope.sendRequest('processData', { data: $scope.data.graphData }, function(response){

				$scope.$apply(function(){
					$scope.data.processedData 	= response.parsed;
					$scope.data.varDumped 		= response.dumped;
				});

				document.getElementById("dumped-data").innerHTML = response.dumped;

				hljs.highlightBlock(document.getElementById("processed-data"));
				hljs.highlightBlock(document.getElementById("dumped-data"));
			});
		};		

    	/**
    	 * Send a server reuest
    	 * 
    	 * @return void
    	 */
		$scope.sendRequest = function(route, data, callback) {

			if($scope.requestLock) return; // lets lock the requests down while making one
			else $scope.requestLock = true;

			$('.spinner-part').removeClass('hidden');

        	$.ajax({
        	    method:     'POST',
        	    url:        appBaseURL + '/' + route,
        	    data:       data,
        	    dataType:   'json',
        	    success:    callback,
        	    error:      function(jqXHR, textStatus, errorThrown) {

					alert('Uh oh... an error has occured. Status: "' + textStatus );
			    	console.log(data, textStatus);        	    	
        	    },
        	    complete:   function() {
	
					$scope.requestLock = false; // unlock the request
        	        $('.spinner-part').addClass('hidden');
        	    }
        	});			
		};  		

    	/**
    	 * Angular document ready
    	 * 
    	 * @return void
    	 */    	
   		angular.element(document).ready(function () {

   			$('.spinner-part').addClass('hidden');
   		});	

   		hljs.initHighlightingOnLoad();

	}]);