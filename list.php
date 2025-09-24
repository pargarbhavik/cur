<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>List</title>
</head>
<body>
<table class="table align-items-center mb-0" border="1">
                              <thead>
                                 <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Vehicle Number</th>
                                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Customer Name</th>
                                                                 <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone</th>   
                                                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>   
                                                                   <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">LR NUMBER</th>   
                                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">From</th>     
                                                                     <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">To</th>       
                                                                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>     
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                    include_once 'config.php';
                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                    $num=$_GET['search'];
                                    // Construct and execute the SELECT query
                                    $sql = "SELECT * FROM `cur` where cp='$num'";
                                    $result = $conn->query($sql);
                                    
                                    if ($result) {
                                        if ($result->num_rows > 0) {
                                            // Output data from each row
                                            while ($row = $result->fetch_assoc()) {
                                                echo ' <tr>
                                                          <td>
                                                            <p class="text-xs font-weight-bold mb-0">'.$row["vn"].'</p>
                                                          </td>
                                                          <td>
                                                            <p class="text-xs font-weight-bold mb-0">'.$row["cn"].'</p>
                                                          </td>
                                                          <td class="align-middle text-center text-sm">
                                                            <span class="badge badge-sm bg-gradient-success">'.$row["cp"].'</span>
                                                          </td>
                                                          <td class="align-middle text-center">
                                                            <span class="text-secondary text-xs font-weight-bold">'.$row["ce"].'</span>
                                                          </td><td class="align-middle text-center text-sm">
                                                            <span class="badge badge-sm bg-gradient-success">'.$row["ln"].'</span>
                                                          </td>
                                                          <td class="align-middle text-center">
                                                            <span class="text-secondary text-xs font-weight-bold">'.$row["f"].'</span>
                                                          </td>
                                                          <td class="align-middle text-center">
                                                            <span class="text-secondary text-xs font-weight-bold">'.$row["t"].'</span>
                                                          </td>
                                                          <td class="align-middle text-center">
                                                            <span class="text-secondary text-xs font-weight-bold">'.$row["date"].'</span>
                                                          </td>
                                                          
                                                          
                                                        </tr>';
                                            }
                                        } 
                                    } else {
                                        echo "Error: ";
                                    }
                                    
                                    
                                    ?>
                              </tbody>
                           </table>

</body>
</html>