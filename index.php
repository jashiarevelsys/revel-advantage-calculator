<?php

 // require_once 'inc/keys.php';
 // $secret = MUNCHKIN_API_KEY . "ja@tpainrules.com";
 // $munchkinHash = hash('sha1', $secret);
 // echo $munchkinHash;

 ?>

<html>
<head>
	<meta charset="UTF-8">
	<title>Revel Advantage Calculator</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0/materia/bootstrap.min.css" media="screen" title="no title">
    <link rel="stylesheet" href="/css/main.css" media="screen" title="no title">


</head>
<body>

	<div class="container">

	<div id="main" ng-app="quoteGenerator" ng-controller="quoteController">
    <div class="form-head">
      <div class="adv-logo">
        <img src="https://static.revelsystems.com/wp-content/themes/reveldown/-/img_min/revel-advantage-logo.svg"  alt="">
      </div>
      <h1>Generate Your Free Quote Today</h1>
      <p>
         Complete the form below for your very own Revel Advantage processing quote and get in contact with a Rep immediately.
         <br><small class="text-muted">Rates are subject to change*</small>
      </p>
    </div>
	   	<form id="initial-quote-form" name="getQuoteForm" novalidate>
		  <div class="form-group">
		  	<label for="fullName">Full Name</label>
		  	<input name="fullName" type="text" id="fullName" class="form-control" placeholder="Your Full Name" ng-model="fullName" required>
		  	<span ng-show="getQuoteForm.fullName.$touched && getQuoteForm.fullName.$invalid">Your full name is required.</span>
		  </div>
		  <div class="form-group">
		    <label for="email">Email address</label>
		    <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email address" ng-model="email" required>
		    <span style="color:red" ng-show="getQuoteForm.email.$dirty && getQuoteForm.email.$invalid">
			  <span ng-show="getQuoteForm.email.$dirty && getQuoteForm.email.$error.required">Email is required.</span>
			  <span ng-show="getQuoteForm.email.$dirty && getQuoteForm.email.$error.email">Invalid email address.</span>
		    </span>
		  </div>
		  <div class="form-group">
		    <label for="businessName">Business Name</label>
		    <input name="businessName" type="text" class="form-control" id="businessName" aria-describedby="emailHelp" placeholder="Enter Business Name" ng-model="businessName" required>
		    <span ng-show="getQuoteForm.businessName.$touched && getQuoteForm.businessName.$invalid">Your Business name is required.</span>
		  </div>
		  <div class="form-group">
		    <label for="totalMonthlyVolume">Current Total Monthly Volume (ex. $20,000)</label>
		    <span class="input-group-addon"></span>
		     <input type="number" min="0" step="1" value="1000" data-number-to-fixed="2" data-number-stepfactor="100" class="form-control currency" id="totalMonthlyVolume" ng-model="totalMonthlyVolume" required />
		  </div>
		  <div class="form-group">
		    <label for="totalMonthlyTransactions">Current Total Monthly Transactions</label>
		    <input type="number" class="form-control" id="totalMonthlyTransactions" aria-describedby="emailHelp" placeholder="Enter your total monthly transactions" ng-model="totalMonthlyTransactions" required >
		  </div>
		  <div class="form-group">
		    <label for="totalMonthlyCosts">Current Total Monthly Processing Fees (ex. $400.00)</label>
		    <span class="input-group-addon"></span>
		    <input type="number" class="form-control" id="totalMonthlyCosts" aria-describedby="emailHelp" placeholder="Enter your total monthly costs" ng-model="yourTotalMonthlyCosts" required >
		  </div>
      <div class="form-submit">
        <input type="submit" id="initial-quote-form-submit" class="btn btn-primary" ng-disabled="getQuoteForm.$invalid" value="Get Quote">
      </div>
		</form>
    <!-- Results -->
		<div class="my-quote" >
			<h2>Estimate Prepared for:</h2>
			<p>{{fullName}}<br>{{businessName}}<br>{{email}}<br>{{date | date:'MM-dd-yyyy'}}</p>
			<table class="table table-hover">
			  <thead>
			    <tr>
			      <th scope="col">Rates and Transaction Fees</th>
			      <th scope="col">Rate/Transaction</th>
			      <th scope="col">Volume</th>
			      <th scope="col">Cost</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <th scope="row">Discount Rate</th>
			      <td id="discount-rate-rate">2.49%</td>
			      <td id="discount-rate-volume">${{totalMonthlyVolume}}</td>
			      <td id="discount-rate-cost">{{totalMonthlyVolume * .0249 | currency}}</td>
			    </tr>
			    <tr>
			      <th scope="row">Transaction Fee</th>
			      <td id="transaction-fee-rate">$0.15</td>
			      <td id="transaction-fee-volume">${{ totalMonthlyTransactions }}</td>
			      <td id="transaction-fee-cost">{{ (totalMonthlyTransactions) * .15 | currency }}</td>
			    </tr>
			    <tr>
			      <th scope="row" colspan="3">Breach Coverage</th>
			      <td id="breach-coverage-cost">$6.95</td>
			    </tr>
			    <tr>
			      <th scope="row" colspan="3">Translink Access</th>
			      <td id="translink-access-cost">$7.50</td>
			    </tr>
			    <tr>
			      <th scope="row" colspan="3">Total Monthly Cost</th>
			      <td>${{(totalMonthlyCostsUpdate()) | number:2 }}</td>
			    </tr>
			    <tr>
			      <th scope="row" colspan="3">Your Current Monthly Cost</th>
			      <td>${{yourTotalMonthlyCosts | number:2 }}</td>
			    </tr>
			    <tr>
			      <th scope="row" colspan="3">Revel Advantage Savings</th>
			      <td>${{(revelAdvantageSavings()) | number:2 }}</td>
			    </tr>
			    <tr>
			      <th scope="row" colspan="3">% Saving with Revel Advantage</th>
			      <td>{{percentSavingWithRevelAdvantage() | number:0 }}%</td>
			    </tr>
			  </tbody>
			</table>
      <div class="quote-btns">
        <button id="saveQuoteButton" type="button" class="btn btn-light">Save Quote</button>
  			<!-- <button id="emailQuoteButton" type="button" class="btn btn-light">Email Me</button> -->
  			<button id="switchQuoteButton" type="button" class="btn btn-light">Switch Now</button>
      </div>
      <div class="call-now">
        <script src="//app-sj14.marketo.com/js/forms2/js/forms2.min.js"></script>
        <form id="mktoForm_2552"></form>
        <script>
        MktoForms2.loadForm("//app-sj14.marketo.com", "804-YHP-876", 2552, function (form){
        // MktoForms2.lightbox(form).show();
        });
        </script>
      </div>
			<div class="high-opacity-gradient"></div>

		</div>
		<!-- Add in the scripts here -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
 	<script src="//app-sj14.marketo.com/js/forms2/js/forms2.min.js"></script>
	<!-- <form id="mktoForm_2550"></form> -->
	<script>
		MktoForms2.loadForm("//app-sj14.marketo.com", "804-YHP-876", 2550, function(form){
			var fullName,
				firstName,
				lastName,
				emailAddress,
				businessName,
				totalMonthlyVolume,
				totalMonthlyTransactions,
				mktoHash,
				yourTotalMonthlyCosts;
			var mktoForm = form;

			var clickSubmitButton = document.getElementById('initial-quote-form-submit');
			clickSubmitButton.onclick = function(){
				fullName = document.getElementById('fullName').value;
				firstName = fullName.split(' ').slice(0, -1).join(' ');
				lastName = fullName.split(' ').slice(-1).join(' ');
				emailAddress = document.getElementById('email').value;
				businessName = document.getElementById('businessName').value;
				totalMonthlyVolume = document.getElementById('totalMonthlyVolume').value;
				totalMonthlyTransactions = document.getElementById('totalMonthlyTransactions').value;
				yourTotalMonthlyCosts = document.getElementById('totalMonthlyCosts').value;


				form.setValues({
					"FirstName" : firstName,
					"LastName" : lastName,
					"Email" : emailAddress,
					"Company" : businessName,
					"Total_Monthly_Volume__c" : totalMonthlyVolume,
					"Total_Monthly_Transactions__c" : totalMonthlyTransactions,
					"Your_Currently_Monthly_Cost__c" : yourTotalMonthlyCosts
				});
				//form.submit();
				console.log(form.vals());

				if (emailAddress && fullName) {

					form.setValues({
						"FirstName" : firstName,
						"LastName" : lastName,
						"Email" : emailAddress,
						"Company" : businessName,
						"Total_Monthly_Volume__c" : totalMonthlyVolume,
						"Total_Monthly_Transactions__c" : totalMonthlyTransactions,
						"Your_Currently_Monthly_Cost__c" : yourTotalMonthlyCosts
					});
					form.submit();
					form.onSuccess(function(values, followUpUrl){
						$('#initial-quote-form').hide();
						$('#my-quote').show();
						var values = form.vals();

						$.post('/inc/quote.php', {email: values['Email']}, function(data, textStatus, xhr) {
							var mktoHash = JSON.parse(data);
							var emailMeButton = document.getElementById('emailQuoteButton');
							emailMeButton.onclick = function(){
								Munchkin.munchkinFunction('associateLead', {
									'Email' : values['Email'],
									'utm_term' : 'Yes Email Me'
								},
								mktoHash);
								this.innerHTML = 'Changed';
							}
						});
						return false;

					});

				}
			};


		});


	</script>

	</div>
	<!-- Optional JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
    	var app = angular.module('quoteGenerator', []);
		app.controller('quoteController', function($scope, $location){
			$scope.totalMonthlyVolume = 1000;
			$scope.totalMonthlyTransactions = 100;
			$scope.yourTotalMonthlyCosts = 100;
			$scope.myLocation = $location;
			$scope.showQuote = false;
			$scope.date = new Date();
			$scope.totalMonthlyCostsUpdate = function() {
				return ($scope.totalMonthlyVolume * .0249) + ($scope.totalMonthlyTransactions * .15) + (6.95 + 7.50)
			};
			$scope.revelAdvantageSavings = function() {
				return  $scope.yourTotalMonthlyCosts - $scope.totalMonthlyCostsUpdate()
			}
			$scope.percentSavingWithRevelAdvantage = function() {
				return ( ( $scope.yourTotalMonthlyCosts - $scope.totalMonthlyCostsUpdate()) / $scope.yourTotalMonthlyCosts ) * 100
			}
		});
    </script>
    <script src="/js/quote.js"></script>
<!-- <script src="//app-sj14.marketo.com/js/forms2/js/forms2.min.js"></script> -->

<script type="text/javascript">
(function() {
  var didInit = false;
  function initMunchkin() {
    if(didInit === false) {
      didInit = true;
      Munchkin.init('804-YHP-876');
    }
  }
  var s = document.createElement('script');
  s.type = 'text/javascript';
  s.async = true;
  s.src = '//munchkin.marketo.net/munchkin.js';
  s.onreadystatechange = function() {
    if (this.readyState == 'complete' || this.readyState == 'loaded') {
      initMunchkin();
    }
  };
  s.onload = initMunchkin;
  document.getElementsByTagName('head')[0].appendChild(s);
})();
</script>

<script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
<script>
	var switchQuoteButton = document.getElementById('switchQuoteButton');
	switchQuoteButton.onclick = function(){
		MktoForms2.loadForm("//app-sj14.marketo.com", "804-YHP-876", 2552, function (form){
			MktoForms2.lightbox(form).show();
		});
	}
	var saveQuoteButton = document.getElementById('saveQuoteButton');
	saveQuoteButton.onclick = function(){
		var doc = new jsPDF();
	    doc.fromHTML($('.my-quote').html(), 10, 10, {
	        'width': 600
	    });
	    doc.save('revel-quote.pdf');
	}

</script>

</body>
</html>
