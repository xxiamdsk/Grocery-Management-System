<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Table!</title>
    <style>
        div {
            border: 0px;
            padding-top: 50px;
            padding-right: 30px;
            padding-bottom: 50px;
            padding-left: 30px;
            margin-top: 20px;
            color: white;
        }

        .ui-btn {
            cursor: pointer;
            border-radius: 5px;
            color: black;
            border-style: solid;
            background-color: transparent;
            border-color: rgb(219, 218, 218);
            width: 120px;
            height: 40px;
            transition: 0.2s ease;
            text-transform: uppercase;
            border-width: 2px;
            font-weight: 500;
            font-size: 18px;
            letter-spacing: 2px;
        }

        .ui-btn:hover {
            color: rgb(247, 247, 247);
            background-color: rgb(202, 25, 25);
            border-color: rgb(202, 25, 25);
            text-shadow: 0 0 50px white, 0 0 20px white, 0 0 15px white;
            box-shadow: 0 0 50px rgb(202, 25, 25), 0 0 30px rgb(202, 25, 25),
                0 0 60px rgb(202, 25, 25), 0 0 120px rgb(202, 25, 25);
            font-size: 20px;
            width: 130px;
            height: 50px;
            letter-spacing: 3px;
        }

        .ui-btn:active {
            width: 115px;
            height: 38px;
            letter-spacing: 0px;
        }


        .ui-btn1 {
            cursor: pointer;
            border-radius: 5px;
            color: black;
            border-style: solid;
            background-color: transparent;
            border-color: rgb(219, 218, 218);
            width: 120px;
            height: 40px;
            transition: 0.2s ease;
            text-transform: uppercase;
            border-width: 2px;
            font-weight: 500;
            font-size: 18px;
            letter-spacing: 2px;
        }

        .ui-btn1:hover {
            color: rgb(247, 247, 247);
            background-color: rgb(0, 81, 255);
            border-color: rgb(0, 81, 255);
            text-shadow: 0 0 50px white, 0 0 20px white, 0 0 15px white;
            box-shadow: 0 0 50px rgb(0, 81, 255), 0 0 30px rgb(0, 81, 255),
                0 0 60px rgb(0, 81, 255), 0 0 120px rgb(0, 81, 255);
            font-size: 20px;
            width: 130px;
            height: 50px;
            letter-spacing: 3px;
        }

        .ui-btn1:active {
            width: 115px;
            height: 38px;
            letter-spacing: 0px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 align="center"><u>Product</u> <u>Table</u></h1><br>
        <table border="1" align="center">
            <tr bgcolor="#4682B4" style="height:35px;">
                <tH>Product_Id</tH>
                <tH>Product_Name</tH>
                <tH>Product_Price</tH>
                <tH>Product_Quantity</tH>
                <tH>Action1</tH>
                <tH>Action2</tH>
            </tr>
        </table>
    </div>

</body>

</html>