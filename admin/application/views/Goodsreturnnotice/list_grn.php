<?php
$id = 0;
if (count($detail_list) > 0) {
    foreach ($detail_list as $value) {
        $id++;
        ?>
        <tr>
            <td align="center">

                <input type="checkbox"  id="chk_<?php echo $id; ?>" name="chk_<?php echo $id; ?>"/>
            </td>

            <td > <?php echo $value->code; ?></td>
            <td> <?php echo $value->categoryofsparepart; ?></td>
            <td class="text-right"> 
                <input type="hidden" id="byprice_<?php echo $id; ?>" name="byprice_<?php echo $id; ?>" value="<?php echo $value->buyingprice; ?>"/> 
                <input type="hidden" id="code_token_<?php echo $id; ?>" name="code_token_<?php echo $id; ?>" value="<?php echo $value->code; ?>"/> 
                <input type="hidden" id="code_id_<?php echo $id; ?>" name="code_id_<?php echo $id; ?>" value="<?php echo $value->cid; ?>"/> 
                <input type="hidden" id="spare_part_token_<?php echo $id; ?>" name="spare_part_token_<?php echo $id; ?>" value="<?php echo $value->categoryofsparepart; ?>"/> 
                <input type="hidden" id="grsno_token_<?php echo $id; ?>" name="grsno_token_<?php echo $id; ?>" value="<?php echo $value->goodsreceivenoticeno; ?>"/> 
                <input type="hidden" id="b_date_token_<?php echo $id; ?>" name="b_date_token_<?php echo $id; ?>" value="<?php echo $value->goodsreceivenoticedate; ?>"/> 
                <input type="hidden" id="s_date_token_<?php echo $id; ?>" name="s_date_token_<?php echo $id; ?>" value="<?php echo $value->goodsreceivenoticedate; ?>"/> 
                <input type="hidden" id="sel_price_token_<?php echo $id; ?>" name="sel_price_token_<?php echo $id; ?>" value="<?php echo $value->buyingprice; ?>"/> 
                <?php echo $value->buyingprice; ?></td>
            <td class="text-right"> <?php echo $value->quantity; ?></td>
            <td class="text-right"> <?php echo number_format($value->amonut, 2); ?></td>
            <td class="text-right" style="width: 80px;"> <input class="form-control qtyrt" onkeyup="chk_t_box(<?php echo $id; ?>);" type="text" name="qty_<?php echo $id; ?>" id="qty_<?php echo $id; ?>" value="0" /></td>
            <td> 
                <select id="cmb_re_rs_<?php echo $id; ?>" class="form-control" name="cmb_re_rs_<?php echo $id; ?>">
                    <option value="0">Select Return Reason</option>
                    <option value="1">Damage</option>
                    <option value="2">Customer Return</option>
                    <option value="3">G.R.N Correction</option>

                </select>
            </td>

            <td>
                <select id="cmb_claimed_<?php echo $id; ?>" name="cmb_claimed_<?php echo $id; ?>" style="width: 100px;text-align: center">

                    <option value="0"> Yes</option>
                    <option value="1">No</option>


                </select>
            </td>
        </tr>

    <?php }
    ?>


    <?php
}
?>


<input type="hidden" id="tot_fld" value="<?php echo $id; ?>">        

<script type="text/javascript">

    function get_return_details(id) {

    }
    
    function chk_t_box(id){
        if( $('#qty_'+id).val() !== 0){
            $('#chk_'+id).prop('checked', true);
        }else{
           $('#chk_'+id).prop('checked', false); 
        }
       
    }

    function return_good_receive() {
        var data_ret = [];
        var lop = $('#tot_fld').val();
        lop++;
        for (var i = 1; i < lop; i++) {
            if ($("#chk_" + i).is(':checked')) {
                data_ret.push(
                        {
                            qty : $('#qty_' + i).val(),
                            byprice : $('#byprice_' + i).val(),
                            return_Reason: $('#cmb_re_rs_' + i).val(),
                            cmb_claimed: $('#cmb_claimed_' + i).val(),
                            code: $('#code_token_' + i).val(),
                            categoryofsparepart: $('#code_id_' + i).val(),
                            goodsreceivenoticeno: $('#grsno_token_' + i).val(),
                            buyingdate : $('#b_date_token_' + i).val(),
                            solddate: $('#s_date_token_' + i).val(),
                            sellingprice: $('#sel_price_token_' + i).val()
                        }
                );
            }
        }
      
        if (data_ret.length > 0) {
            
         //   var res_pass = JSON.parse(data_ret);
            $.ajax({
                type: "POST",
                url: _BASE_URL + 'post_grn_return',
                data: {
                    key_data : data_ret,
                    grnno : $('#txt_grn_no').val(),
                    returndate : $('#goodsreceivenoticedate').val()
                },
                success: function (data) {
                    swal("Poof! Your imaginary file has been deleted!", {
                        icon: "success",
                    });
                    //location.reload();
                }
            });
        }

    }

</script>
