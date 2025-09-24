<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<title>Payment</title>
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}body{
			display: flex;
			align-items: center;
			justify-content: center;height: 100vh;
		}
		.box{
			width: 90%;
			max-width: 600px;
			padding: 40px;

    box-shadow: rgba(100, 100, 111, 0.2) 0 7px 29px 0;
		}.amount{
			width: 100%;
			height: 50px;
			border:1px solid #efefef;
			outline: none;
			padding: 0 20px;
		}input{
			margin-top: 10px;
		}input:focus{
			border: 1px solid #0989ff;
		}.pay_now{
			background-color: #0989ff;
			padding: 0 20px;
			height: 50px;
			border: none;
			outline: none;
			color: #fff;cursor: pointer;
		}
	</style>

   <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
   <script type="text/javascript">
   	$(document).ready(function() {
   		// body...
   	
    $(".pay_now").click(function() {console.log("Pay");
        var t = $(".amount").val(),
            a = $(".number").val(),
            e = $(".email").val(),
            n = t;
        if ("" != t && "" != a && "" != e) {
            var i = new Razorpay({
                key: "rzp_test_OXruRqJ6qMIrKK",
                name: "Company Name",
                description: "Payment",
                image: "https://yt3.ggpht.com/ytc/AL5GRJV8C79mjvuZKWalgTdrO7QnpREZNbj66eP1rV9I4g=s240-c-k-c0x00ffffff-no-rj",
                prefill: {
                    email: e,
                    contact: a
                },
                theme: {
                    color: "#0989ff"
                },
                amount: 100 * n,
                currency: "INR",
                handler: function(t) {
                     window.location.href = "pay.php?amount=" + 100 * parseInt(n) + "&id=" + t.razorpay_payment_id+"&email="+e+"&action=pay&number="+a;
                },
                modal: {
                    ondismiss: function() {
                        alert("Payment Failed!");
                    }
                }
            });
            i.on("payment.failed", function(t) {
                alert("Payment Failed!");
            }), i.open()
        } else alert("Payment Failed!");
    }); 
});
</script>

</head>
<body>
<?php
$email=$_GET['email'];
$number=$_GET['number'];
?>
<div class="box">
	<h2>Choose an Amount you wish to pay</h2><br>
	<div>
		<label>Amount*</label>
		<input type="number" class="amount" placeholder="Amount*">
	</div>
	<input type="email" value="<?php echo $email;?>" class="email" hidden>

	<input type="number" value="<?php echo $number;?>" class="number" hidden>
	<br>
	<div>
		<button class="pay_now">
			Pay Now
		</button>
	</div>
</div>
</body>
</html>