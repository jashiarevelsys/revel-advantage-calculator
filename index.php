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
	<link rel="stylesheet" href="https://use.typekit.net/vog3uzk.css">

</head>
<body>

	<div class="container">
	<div id="main" ng-app="quoteGenerator" ng-controller="quoteController">
		<div class="adv-logo">
			<img src="https://static.revelsystems.com/wp-content/themes/reveldown/-/img_min/revel-advantage-logo.svg"  alt="">
		</div>
		<div class="form-head">
			<h1>Generate Your Free Processing Quote Today</h1>
			<p>
				Learn how much you could be saving on your credit card processing, compare your current rates to your generated quote for Revel Advantage!<br>
				<small class="text-muted">Rates are subject to change*</small>
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
		    <label for="totalMonthlyTransactions">Current Number of Monthly Transactions</label>
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
		<!-- Talk with a specialist -->
		<div id="speak-with-a-specialist">
			<h2>Hi, {{fullName}}!<br>It looks like your business has unique needs.</h2>
			<p>You might be better suited to speak with a specialist.</p>
			<p>Want to speak with a specialist today?</p>
	  		<button type="button" class="btn btn-light">Yes, Call Me</button>
	  		<div>
	  			<a id="back-button-to-generator" class="">Back</a>
	  		</div>
		</div>
    <!-- Results -->
		<div id="my-quote" class="my-quote" >
			
			<img src="/images/revel-advantage-logo.png"  alt="" width="200" style="float: right;margin-right: 20px;" data-html2canvas-ignore="true">
			
			
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
			    <!-- <tr>
			      <th scope="row" colspan="3">Breach Coverage</th>
			      <td id="breach-coverage-cost">$6.95</td>
			    </tr>
			    <tr>
			      <th scope="row" colspan="3">Translink Access</th>
			      <td id="translink-access-cost">$7.50</td>
			    </tr> -->
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

			<div id="enterPhoneNumber">
				<div id="cancelButton">X</div>
				<form name="callForm" id="callForm" novalidate>
				<p>What is a good number for us to call?<br>A Revel Advantage expert will be in touch.</p>
					<div class="form-group">
				  	<label for="phone">Phone</label>
				  	<input ng-model="phone" name="phone" type="tel" id="phoneNumber" class="form-control" placeholder="Your Phone Number" required>
				  	<span ng-show="callForm.phone.$touched && callForm.phone.$invalid">Your Phone Number is required.</span>
					</div>
				    <div class="form-submit">
				    	<input type="submit" id="callMeNowSubmit" class="btn btn-primary" ng-disabled="callForm.phone.$invalid" value="Give Me a Call">
				    </div>
				</form>
				<div id="submitted-form">
					<h2>Thank you! We will be in touch shortly.</h2>
					<!-- <script src="//app-sj14.marketo.com/js/forms2/js/forms2.min.js"></script>
					<form id="mktoForm_2309"></form>
					<script>MktoForms2.loadForm("//app-sj14.marketo.com", "804-YHP-876", 2309);</script> -->
				</div>
			</div>
			<div class="quote-btns" data-html2canvas-ignore="true">
				<button id="saveQuoteButton" type="button" class="btn btn-light">Save Quote</button>
				<button id="switchQuoteButton" type="button" class="btn btn-light">Get Revel Advantage</button>
			</div>
		</div>
		<!-- Add in the scripts here -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
 	<script src="//app-sj14.marketo.com/js/forms2/js/forms2.min.js"></script>
	<!-- <form id="mktoForm_2550"></form> -->
	<script>
		function revelAdvantageSavings(){
			var totalMonthlyVolume = document.getElementById('totalMonthlyVolume').value;
			var yourTotalMonthlyCosts = document.getElementById('totalMonthlyCosts').value;
			var totalMonthlyTransactions = document.getElementById('totalMonthlyTransactions').value;
			var rASavings = yourTotalMonthlyCosts - ((totalMonthlyVolume * 0.0249) + (totalMonthlyTransactions * 0.15) + 14.45); 
			return rASavings;
		}

		$('#back-button-to-generator').click(function(event) {
			/* Act on the event */
			event.preventDefault();
			$('#speak-with-a-specialist').hide();
			$('#initial-quote-form').show();
			$('.form-head').show();
		});


		var phoneNumber;
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

				if (revelAdvantageSavings() < 0){
					$('#initial-quote-form').hide();
					$('.form-head').hide();
					$('#speak-with-a-specialist').show();
					return;
				}

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
						$('.form-head').hide();
						$('.my-quote').show();
						values = form.vals();

						$.post('/inc/quote.php', {email: values.Email}, function(data, textStatus, xhr) {
							var mktoHash = JSON.parse(data);
							//var emailMeButton = document.getElementById('emailQuoteButton');
							//emailMeButton.onclick = function(){
							//	Munchkin.munchkinFunction('associateLead', {
							//		'Email' : values['Email'],
							//		'utm_term' : 'Yes Email Me'
							//	},
							//	mktoHash);
							//	this.innerHTML = 'Email Sent';
							//}
							var callMeNowSubmit = document.getElementById('callMeNowSubmit');
							callMeNowSubmit.onclick = function() {
								var phone = document.getElementById('phoneNumber').value;
								if (phone) {
									Munchkin.munchkinFunction('associateLead', {
										'Email' : values.Email,
										'utm_term' : 'Yes Call Me',
										'Phone' : phone
									},
									mktoHash);
									$('#enterPhoneNumber #callForm').hide();
									$('#enterPhoneNumber #submitted-form').show();
								}
								
							};
							var switchQuoteButton = document.getElementById('switchQuoteButton');
							switchQuoteButton.onclick = function(){
								$('#enterPhoneNumber').show();

							};
							var cancelButton = document.getElementById('cancelButton');
							cancelButton.onclick = function() {
								$('#enterPhoneNumber').hide();
							};
						});
						return false;

					});

				}
			};


		});
		//MktoForms2.loadForm("//app-sj14.marketo.com", "804-YHP-876", 2552, function (form){
		//			var switchQuoteButton = document.getElementById('switchQuoteButton');
		//			switchQuoteButton.onclick = function(){
		//				$('#enterPhoneNumber').show();
//
		//			}
		//			var callMeNowSubmit = document.getElementById('call-me-now-submit');
		//			callMeNowSubmit.onclick = function(){
		//				var phoneNumber = document.getElementById('phoneNumber');
		//				form.vals({
		//					"Phone" : phoneNumber
		//				});
		//				form.submit();
		//				form.onSuccess(function(values, followUpUrl) {
		//					$('#enterPhoneNumber').html('<h1>Someone will be with you shortly</h1>')
		//					return false;
		//				});
		//			};
		//			var cancelButton = document.getElementById('cancelButton');
		//			cancelButton.onclick = function() {
		//				$('#enterPhoneNumber').hide();
		//			};
//
		//});


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
				return ($scope.totalMonthlyVolume * .0249) + ($scope.totalMonthlyTransactions * .15) + (20.00)
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
				doc.addImage(logo, 'PNG', 300, 0, 309, 101);
				doc.addImage(img, 'JPEG', 45, 100, 505, 340);
				doc.save('revel-quote-' + businessName);
			});
		}
		genPDF();
	}

</script>

</body>
</html>
