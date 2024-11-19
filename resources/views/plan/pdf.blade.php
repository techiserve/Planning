<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Export</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 10px;
            font-size: 10px; /* Smaller font for the entire document */
        }
        .header, .footer {
            text-align: center;
            font-weight: bold;
            margin-bottom: 10px; /* Reduced margin for compactness */
        }
        .footer {
            margin-top: 20px; /* Reduced margin for compactness */
        }
        .table {
            width: 90%; /* Slightly reduced table width for compact layout */
            border-collapse: collapse;
            margin: 10px auto; /* Center table with smaller margin */
        }
        .table th, .table td {
            border: 1px solid black;
            padding: 4px; /* Reduced padding for smaller cells */
            text-align: center;
        }
        .table th {
            background-color: #f2f2f2;
            border: 1px solid black;
            font-size: 10px; /* Smaller font for headers */
        }
        .tall-th {
            height: 40px; /* Reduced height for tall <th> */
        }
        .th-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 8%; /* Ensure it spans the full height of the <th> */
            text-align: center;
        }
        .th-top, .th-bottom {
            padding: 2px; /* Reduced padding inside <th> */
            width: 100%;
        }
        .divider {
            border-top: 1px solid black; /* Match the thinner table border */
            width: 100%; /* Ensure divider spans full width */
            margin: 0; /* Remove default margins */
        }
    </style>
</head>
<body>
    <div class="header">
        <p></p>
        <p></p>
    </div>



    <table class="table">
        <thead>
        <tr>
        <th colspan="11">CLIENT LOADING SCHEDULE</th>
            </tr>
            <tr>
                <th class="tall-th" colspan="2">  <div class="th-content">
                    <div class="th-top">CLIENT NAME:</div>
                    <hr class="divider">
                    <div class="th-bottom">ORIGINATOR NAME:</div>
                </div></th>
                <th class="tall-th" style="background-colo:white;" colspan="3">  <div class="th-content">
                    <div class="th-top">{{$route->from}} </div>
                    <hr class="divider">
                    <div class="th-bottom">{{$user->name}}</div>
                </div></th>
                <th class="tall-th" colspan="1">VALID FROM</th>
                <th  class="tall-th" colspan="2">{{$plan->date}}</th>
                <th class="tall-th" colspan="2">VALID TO/UNTIL</th>
                <th class="tall-th" >{{$plan->enddate}}</th>
              
             
            </tr>
        <thead>
            <tr>
                <th>TRANSPORTER</th>
                <th>MAKE OF TRUCK</th>
                <th>HORSE REG</th>
                <th>TRAILER 1</th>
                <th>TRAILER 2</th>
                <th>DRIVER NAME</th>
                <th>DRIVER ID</th>
                <th>MAX LOADS</th>
                <th>PRODUCT</th>
                <th>LOADING NUMBER</th>
                <th>LOADING NUMBER tehhh</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($data as $info)    
            <tr>
                <td>SOBOTSHANE</td>
                <td>{{$info->make}}</td>
                <td>{{$info->registration}}</td>
                <td>{{$info->regNumber1}}</td>
                <td>{{$info->regNumber2}}</td>
                <td>{{$info->name}}{{$info->surname}}</td>
                <td>{{$info->licenseNumber}}</td>
                <td>N/A</td>
                <td>{{$plan->maxloads}}</td>
                <td>{{$plan->product}}</td>
                <td>{{$plan->loadingNumber}}</td>
            </tr>
        @endforeach
       
        </tbody>
    </table>

 
</body>
</html>
