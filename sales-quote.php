<html>
<head>
	<meta charset="UTF-8">
	<title>Revel Advantage Calculator</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0/materia/bootstrap.min.css" media="screen" title="no title">
    <link rel="stylesheet" href="/css/main.css" media="screen" title="no title">
	<link rel="stylesheet" href="https://use.typekit.net/vog3uzk.css">
</head>
<body>
<div class="container">
	<div id="main" ng-app="quoteGenerator" ng-controller="quoteController">
		<div class="adv-logo">
			<img src="https://static.revelsystems.com/wp-content/themes/reveldown/-/img_min/revel-advantage-logo.svg"  alt="" width="300">
		</div>
		<div class="form-head">
			<h1>Generate Quote Below</h1>
		</div>
<!-- quoting area -->

		<form id="initial-quote-form" name="getQuoteForm" novalidate>
			<div class="form-group">
				<label for="fullName">Full Name</label>
				<input name="fullName" type="text" id="fullName" class="form-control" placeholder="Client Full Name" ng-model="fullName" required>
				<span ng-show="getQuoteForm.fullName.$touched && getQuoteForm.fullName.$invalid">Full name is required.</span>
			</div>
			<div class="form-group">
				<label for="email">Email address</label>
				<input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter client email address" ng-model="email" required>
				<span style="color:red" ng-show="getQuoteForm.email.$dirty && getQuoteForm.email.$invalid">
				<span ng-show="getQuoteForm.email.$dirty && getQuoteForm.email.$error.required">Email is required.</span>
				<span ng-show="getQuoteForm.email.$dirty && getQuoteForm.email.$error.email">Invalid email address.</span>
				</span>
			</div>
			<div class="form-group">
				<label for="businessName">Business Name</label>
				<input name="businessName" type="text" class="form-control" id="businessName" aria-describedby="emailHelp" placeholder="Enter Client Business Name" ng-model="businessName" required>
				<span ng-show="getQuoteForm.businessName.$touched && getQuoteForm.businessName.$invalid">Business name is required.</span>
			</div>
			<div class="form-group">
				<label for="totalMonthlyVolume">Current Total Monthly Volume (ex. $20,000)</label>
				<span class="input-group-addon"></span>
				<input type="number" min="0" step="1" value="1000" data-number-to-fixed="2" data-number-stepfactor="100" class="form-control currency" id="totalMonthlyVolume" ng-model="totalMonthlyVolume" required />
			</div>
			<div class="form-group">
				<label for="totalMonthlyTransactions">Current Number of Monthly Transactions</label>
				<input type="number" class="form-control" id="totalMonthlyTransactions" aria-describedby="emailHelp" placeholder="Enter your total monthly transactions" ng-model="totalMonthlyTransactions" required >
			</div>
			<div class="form-group">
				<label for="totalMonthlyCosts">Current Total Monthly Processing Fees (ex. $400.00)</label>
				<span class="input-group-addon"></span>
				<input type="number" class="form-control" id="totalMonthlyCosts" aria-describedby="emailHelp" placeholder="Enter your total monthly costs" ng-model="yourTotalMonthlyCosts" required >
			</div>
			<div class="form-group">
				<label for="repName">Rep Name</label>
				<input name="repName" type="text" id="repName" class="form-control" placeholder="Client Full Name" ng-model="repName" required>
				<span ng-show="getQuoteForm.repName.$touched && getQuoteForm.repName.$invalid">Full name is required.</span>
			</div>
			<div class="form-group">
				<label for="repEmail">Email address</label>
				<input name="repEmail" type="email" class="form-control" id="repEmail" aria-describedby="emailHelp" placeholder="Enter client email address" ng-model="repEmail" required>
				<span style="color:red" ng-show="getQuoteForm.repEmail.$dirty && getQuoteForm.repEmail.$invalid">
				<span ng-show="getQuoteForm.repEmail.$dirty && getQuoteForm.repEmail.$error.required">Email is required.</span>
				<span ng-show="getQuoteForm.repEmail.$dirty && getQuoteForm.repEmail.$error.email">Invalid email address.</span>
				</span>
			</div>
		</form>
		<div class="quote-btns">
			<button id="saveQuoteButton" type="button" class="btn btn-light">Save Quote</button>
		</div>

		<div id="my-quote" class="my-quote show-quote" >
				
			<div class="quote-head">
				<h2>Estimate Prepared for:</h2>
				<p>{{fullName}}<br>{{businessName}}<br>{{email}}<br>{{date | date:'MM-dd-yyyy'}}</p>
			</div>		
			<div class="quote-head">
				<h2>Estimate Prepared By:</h2>
				<p>{{repName}}<br>{{repEmail}}<br>{{repPhone}}</p>
			</div>
				
				
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
			      <th scope="row">Transaction Base Rate</th>
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
			      <th scope="row" colspan="3">Account Fees</th>
			      <td id="breach-coverage-cost">$20.00</td>
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
		</div>

		<!-- Add in the scripts here -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
 	<script src="//app-sj14.marketo.com/js/forms2/js/forms2.min.js"></script>
	<!-- <form id="mktoForm_2550"></form> -->

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
				return ($scope.totalMonthlyVolume * 0.0249) + ($scope.totalMonthlyTransactions * 0.15) + (20.00);
			};
			$scope.revelAdvantageSavings = function() {
				return  $scope.yourTotalMonthlyCosts - $scope.totalMonthlyCostsUpdate();
			};
			$scope.percentSavingWithRevelAdvantage = function() {
				return ( ( $scope.yourTotalMonthlyCosts - $scope.totalMonthlyCostsUpdate()) / $scope.yourTotalMonthlyCosts ) * 100;
			};
			$scope.firstName = function(){
				fullName = $scope.fullName;
				firstName = fullName.split(' ').slice(0, -1).join(' ');	
				return firstName;

			};
		});
    </script>

<script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
<script>
	var saveQuoteButton = document.getElementById('saveQuoteButton');
	saveQuoteButton.onclick = function(){
		function genPDF() {
			html2canvas(document.getElementById('my-quote')).then(function(canvas) {
				var img = canvas.toDataURL('image/png');
				var doc = new jsPDF('p', 'pt', 'a4');
				var businessName = document.getElementById('businessName').value;
				businessName = businessName.replace(/\W+/g, '-').toLowerCase();
				var logo = 'data:image/png;base64,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';
				//var width = doc.internal.pageSize.width;    
				//var height = doc.internal.pageSize.height;
				doc.addImage(logo, 'PNG', 380, 30, 150, 57.75);
				doc.addImage(img, 'JPEG', 65, 120, 465.75, 398.25);
				doc.save('revel-quote-' + businessName);
			});
		}
		genPDF();
	}

</script>

</body>
</html>