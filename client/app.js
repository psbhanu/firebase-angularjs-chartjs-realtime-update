(function () {
	'use strict';
	var app = angular.module('iApp', ['chart.js', 'ui.bootstrap', 'cgPrompt']);
	
	app.controller('ChartCtrl', ['$scope', '$interval', 'prompt', function ($scope, $interval, prompt) {
		var maximum = 100 || document.getElementById('container').clientWidth / 2 || 300;
		//$scope.colors = ['#45b7cd', '#ff6384', '#ff8e72'];
		$scope.colors = ['#45b7cd', '#ff6384', '#ff8e72'];
		$scope.data = [[]];
		$scope.labels = [];
		$scope.options = {
			animation: {
				duration: 0
			},
			elements: {
				line: {
					borderWidth: 0.5
				},
				point: {
					radius: 2
				}
			},
			legend: {
				display: false
			},
			scales: {
				xAxes: [{
					display: true
				}],
				yAxes: [{
					display: true
				}],
				gridLines: {
					display: true
				}
			},
			tooltips: {
				enabled: true
			}
		};
	
		$scope.updateLiveChartData = function (data) {
			if ($scope.data[0].length) {
				$scope.labels = $scope.labels.slice(1);
				$scope.data[0] = $scope.data[0].slice(1);
			}
			
			while ($scope.data[0].length < maximum) {
				$scope.labels.push('');
				$scope.data[0].push(data);
			}
			$scope.$apply();
		}
	
		//ask the user for a string
		prompt({
			title: 'Enter your ID',
			input: true,
		}).then(function(user_id){
			console.log(user_id);
			//the promise is resolved with the user input
			var iFirebaseClient = new firebaseClient(function(snapshot){
				console.log(snapshot.val());
				if(snapshot.val() && snapshot.val().hasOwnProperty('point')){
					$scope.updateLiveChartData (snapshot.val().point);
				}
			}, user_id);
		});
	}]);
	
	var firebaseClient = function(onValue, user_id){
		// Initialize Firebase
		var config = {
			apiKey: "AIzaSyA42Yct7VLWgnnEEusWuY5tPlFTqFj2F5A",
			authDomain: "fir-realtime-e9a30.firebaseapp.com",
			databaseURL: "https://fir-realtime-e9a30.firebaseio.com",
			storageBucket: "fir-realtime-e9a30.appspot.com",
			messagingSenderId: "516180830611"
		};
		
		const DEFAULT_PATH = '/points';
		
		var mainFirebaseApp = firebase.initializeApp(config);
		console.log(mainFirebaseApp);
		var ref = mainFirebaseApp.database().ref(DEFAULT_PATH + '/' + user_id); 
		
		this.onValue = onValue || function(snapshot) {
			console.log(snapshot.val());
		};
		
		this.onError = function (errorObject) {
			console.log("The read failed: " + errorObject.code);
		};
		
		ref.on("value", this.onValue, this.onError);
	};
})();		