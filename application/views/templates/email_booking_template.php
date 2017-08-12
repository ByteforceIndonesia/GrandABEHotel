<?php
/**
 * Created by PhpStorm.
 * User: JohnNate
 * Date: 8/12/17
 * Time: 4:20 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<html>
<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        body{
            margin:0;
            padding:0;
            background:#1B2021;
        }

        .wrapper{
            width: 100%;
            height:100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container{
            padding:50px;
            background: #F6F7EB;
        }

        .container h3{
            margin-left: 10px;
            margin-bottom: 30px;
        }

        .table tr{
            height:100px;
        }

        .table tr td{
            font-size: 18px;
            padding-top: 20px !important;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="container">
        <div class="col-lg-12">
            <h1>Grand ABE Hotel</h1>
            <h3>Booking Request Form Data</h3>
            <table class="table table-bordered">
                <tr>
                    <td>Name</td>
                    <td><?php echo $name ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $email ?></td>
                </tr>
                <tr>
                    <td>Room</td>
                    <td><?php echo $room ?></td>
                </tr>
                <tr>
                    <td>Check In </td>
                    <td><?php echo $checkin ?></td>
                </tr>
                <tr>
                    <td>Check Out </td>
                    <td><?php echo $checkout ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
</body>
</html>