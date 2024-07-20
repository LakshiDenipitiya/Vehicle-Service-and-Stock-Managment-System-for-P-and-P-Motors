<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<html>
    <head>
        <style>
            #customers {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #customers td, #customers th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #customers tr:nth-child(even){background-color: #f2f2f2;}

            #customers tr:hover {background-color: #ddd;}

            #customers th {
                padding-top:12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #2B547E;
                color: white;
            }
            #detail {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }
            #detail table,#detail th,#detail td {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <table style="border: 1px solid black;width: 80%;" id="detail">

            <tr>
                <td width="50%" style="padding-left: 10px;padding-right: 10px;padding-top:5px;
                    padding-bottom: 5px;
                    text-align: left;
                    background-color: #7b7b7b;
                    color: white;">Good Received Note No</td>
                <td style="padding-left: 10px;padding-right: 10px;padding-top:5px;                    padding-bottom: 5px;                    text-align: left;                    background-color: #cacaca;                    color: black;"><?php echo $detail_list[0]->goodsreceivenoticeno; ?></td> 
            </tr>
            <tr>
                <td style="padding-left: 10px;padding-right: 10px;padding-top:5px;
                    padding-bottom: 5px;
                    text-align: left;
                    background-color: #7b7b7b;
                    color: white;" width="50%">Good Return Note No</td>
                <td style="padding-left: 10px;padding-right: 10px;padding-top:5px;                    padding-bottom: 5px;                    text-align: left;                    background-color: #cacaca;                    color: black;"><?php echo $detail_list[0]->goodsreturnnoticeno; ?></td> 
            </tr>
            <tr>
                <td style="padding-left: 10px;padding-right: 10px;padding-top:5px;
                    padding-bottom: 5px;
                    text-align: left;
                    background-color: #7b7b7b;
                    color: white;" width="50%">Good Return Date</td>
                <td style="padding-left: 10px;padding-right: 10px;padding-top:5px;                    padding-bottom: 5px;                    text-align: left;                    background-color: #cacaca;                    color: black;"><?php echo $detail_list[0]->returndate; ?></td> 
            </tr>

            <tr>
                <td style="padding-left: 10px;padding-right: 10px;padding-top:5px;
                    padding-bottom: 5px;
                    text-align: left;
                    background-color: #7b7b7b;
                    color: white;" width="50%">Supplier Name</td>
                <td style="padding-left: 10px;padding-right: 10px;padding-top:5px;                    padding-bottom: 5px;                    text-align: left;                    background-color: #cacaca;                    color: black;"><?php echo $detail_list[0]->companyname; ?></td> 
            </tr>

        </table>
        <br>

        <table id="customers">
            <?php
            $total_qty = 0;
            $total_amount = 0;
            ?>
            <thead>
                <tr>
                    <th>Spare Part No</th>
                    <th>Category of Spare Part</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                </tr>
            </thead>

            <tbody>
                <?php
                if (count($detail_list) > 0) {
                    foreach ($detail_list as $value) {
                        ?>
                        <tr>
                            <td class="text-left"><?php echo $value->code; ?></td>
                            <td class="text-left"><?php echo $value->categoryofsparepart; ?></td>
                            <td class="text-right"><?php echo number_format($value->buyingprice, 2); ?></td>
                            <td class="text-right"><?php echo $value->quantity; ?></td>
                            <td class="text-right"><?php echo number_format($value->amonut, 2);  ?></td>


                        </tr>
                        <?php
                        //
                          $total_qty += $value->quantity;
                          $total_amount += $value->amonut;
                    }
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td class="text-right" colspan="3" style="text-align: right;"><b>Total</b></td>
                    <td class="text-right"><b><?php echo $total_qty; ?></b></td>
                    <td class="text-right"><b><?php echo number_format($total_amount, 2); ?></b></td>
                </tr>
            </tfoot>

        </table>

    </body>
</html>