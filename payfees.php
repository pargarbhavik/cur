<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Form</title>
    <link href="css/rought.css" rel="stylesheet">
    <link rel="shortcut icon" type="x-icon" href="logo3.png">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
         <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:
        ital@1&family=Shantell+Sans:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="rought.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>R K Cargo | Login </title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style1.css">
    
        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">
    
        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    
        <!-- Libraries Stylesheet -->
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



<script type="text/javascript">
    $(document).ready(function () {
        $("#myButton").click(function (e) {
            e.preventDefault(); // Prevent the default form submission

            // Get form data
            var firstName = $(".name[placeholder='First Name']").val();
            var lastName = $(".name[placeholder='Last Name']").val();
            var email = $(".name[placeholder='Email Address']").val();
            var mobileNumber = $(".name[placeholder='Mobile no.']").val();
            var from = $(".name[placeholder='From']").val();
            var destination = $(".name[placeholder='Destination']").val();
            var currentAddress = $(".name[placeholder='Current Address']").val();

            // Create an object to store the data
            var formData = {
                first: firstName,
                last: lastName,
                email: email,
                number: mobileNumber,
                from: from,
                des: destination,
                addr: currentAddress,
                action:"save",
            };

            // Send data to the server
            //https://script.google.com/macros/s/AKfycbyuVeW8qI-CVQi3fWBrgWyL2L-eeRyvJPrTsVZv6e4hLiXNaWgmzQ1FOZ7AeVEB-5DExw/exec
            $.post("back.php", formData, function (response) {
                // Handle the response from the server if needed
                //console.log(response);
                if(response==1){alert("Done");
                // You can redirect to a success page here if necessary
                window.location.href = "payment.php?email="+email+"&number="+mobileNumber;
            }else{alert(response);}
            });
        });
    });
</script>
<style>
/* Navbar */
.navbar {
    background-color: #f8f9fa; /* Light gray background color */
}

.navbar-brand h1 {
    margin: 0;
    font-size: 1.5rem; /* Adjust the size as needed */
    font-weight: bold;
    color: #007bff; /* Primary color */
}

.navbar-brand h1 i {
    margin-right: 0.5rem; /* Spacing between icon and text */
}

/* Contact Info Section */


.contact-info-button {
    width: 2.5rem; /* Adjust size as needed */
    height: 2.5rem; /* Adjust size as needed */
    border-radius: 50%; /* Make it circular */
    background-color: #007bff; /* Primary color */
    margin-right: 1rem; /* Adjust spacing */
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5); /* Add shadow effect */
}

.contact-info-button i {
    color: #fff; /* White text color */
    font-size: 1.2rem; /* Adjust icon size as needed */
}

.contact-info-divider {
    color: #fff; /* White text color */
    margin: 0 1rem; /* Adjust spacing */
}

.text-shadow {
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.7); /* Add shadow effect */
}

.text-primary {
    color: #007bff !important; /* Primary color */
}
.center-content {
    display: flex;
    justify-content: center;
    align-items: center;
}

.contact-info-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: #007bff;
    margin-right: 10px;
    text-decoration: none;
}

.contact-info-button i {
    color: white;
    font-size: 18px;
}

.contact-info-divider {
    color: #fff;
}
.custom-button {
    background-color: #87ceeb; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 10px;
    box-shadow: 0 6px #0487e2; /* Add shadow */
    transition: background-color 0.3s ease, box-shadow 0.3s ease; /* Smooth transitions */
    /* Your button styles */
    margin: 0 auto; /* Center align the button */
    display: block; /* Ensure button takes full width */
}

.custom-button:hover {
    background-color: #0487E2; /* Darker green on hover */
    box-shadow: 0 4px #87ceeb; /* Adjust shadow on hover */
}

    </style>
</head>

<body>
   <!-- Topbar Start -->
   <button class="custom-button" a href="index.html">R.K Cargo </button>

   <div class="container-fluid bg-dark center-content">
    <div class="row py-2 px-lg-5">
        <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
            <div class="d-inline-flex align-items-center"><br>
                
                <a href="tel:+917698448083" class="contact-info-button"> <!-- Added anchor tag -->
                    <i class="fa fa-phone-alt"></i>
                </a>
                <!--<small class="text-white text-shadow align-center">+91 76984 48083</small> Added class align-center -->

                
                    <a href="mail:+rkcargo@email.info" class="contact-info-button">
                    <i class="fa fa-envelope"></i></a>
               
                
                <!--<small class="text-white text-shadow align-center">rkcargo@example.info</small> !-- Added class align-center -->
            </div>
        </div>
    </div>
</div>


<!-- Topbar End -->


<!-- Navbar Start -->

<!-- Navbar End -->

    <div class="wrapper">
        <h2>Details</h2>
        <form method="POST">
            <h4></h4>
            <div class="input-group">
                <div class="input-box">
                    <input type="text" placeholder="First Name" required class="name">
                    <i class="fa fa-user icon"></i><br>
                </div>
                <div class="input-box">
                    <input type="text" placeholder="Last Name" required class="name">
                    <i class="fa fa-user icon"></i>
                </div>
            </div>
            <div class="input-group">
                <div class="input-box">
                    <input type="email" placeholder="Email Address" required class="name">
                    <i class="fa fa-envelope icon"></i>
                </div>
            </div>
            <div class="input-group">
                <div class="input-box">
                    <input type="number" placeholder="Mobile no." required class="name">
                    <i class="fa fa-phone icon"></i>
                </div><br>
                <div class="input-box">
                    <input type="text" placeholder="From" required class="name">
                    <i class="fa fa-home icon"></i>
                </div><br>
                <div class="input-box">
                    <input type="text" placeholder="Destination" required class="name">
                    <i class="fa fa-home icon"></i>
                </div><br>
                <div class="input-box">
                    <input type="text" placeholder="Current Address" required class="name">
                    <i class="fa fa-home icon"></i>
                </div><br>
            </div>
                   
            <div class="input-group">
                <div class="input-box">
                  <button id="myButton" class="float-left submit-button" >PAY NOW</button>

<script type="text/javascript">
   /* document.getElementById("myButton").onclick = function () {
        location.href = "Payment.html";
    };*/
</script>
                </div>
            </div>
        </form>
    </div>
</body>
</html><!DOCTYPE html>

