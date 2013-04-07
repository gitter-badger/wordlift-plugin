angular.element(document).ready ->
	angular
		.module("wordLiftOptions", [])
		.service("OptionService", [ "$http", "$rootScope", "$log", ($http, $rootScope, $log) ->

			get: (key, defaultValue = null) ->
				$http(
					method: "GET"
					url: "admin-ajax.php"
					params:
						action: "wordlift.option"
						key: key
						defaultValue: defaultValue
				)
					.success (data, status, headers, config) -> 
						$rootScope.$broadcast key, data
					.error (data, status, headers, config) ->
						$log.info "error"

			set: (key, value) ->
				$http(
					method: "POST"
					url: "admin-ajax.php"
					params:
						action: "wordlift.option"
						key: key
						value: value
				)
					.success (data, status, headers, config) -> 
						$log.info "success"
					.error (data, status, headers, config) ->
						$log.info "error"

		])
		.controller("OptionsController", [ "OptionService", "$scope", "$log", (OptionService, $scope, $log) ->
			$scope.enableFooterBar = false
			$scope.$on "wordlift_show_footer_bar", (event, value) ->
				$scope.enableFooterBar = value is "\"true\""

			OptionService.get "wordlift_show_footer_bar", true, $scope.enableFooterBar

			$scope.save = ->
				OptionService.set "wordlift_show_footer_bar", $scope.enableFooterBar
		])

	angular.bootstrap document.getElementById("wordLiftOptions"), ["wordLiftOptions"]