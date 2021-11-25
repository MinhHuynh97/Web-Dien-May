<?php
session_start();
include('../db/connect.php');
if(isset($_POST['test1']))
{
    $show_giohang=mysqli_query($con,"SELECT * FROM tbl_giohang");
    $i=1;
    $subtotal=0;
    $tong=0;
    while($row_show_giohang=mysqli_fetch_array($show_giohang))
    {
        $subtotal=$row_show_giohang['giasanpham']*$row_show_giohang['soluong'];
        $tong=$tong+$subtotal;
    echo "
    <tr class='rem1'>
        <td class='invert'>".$i."</td>
        <td class='invert-image'>
             <img src=images/".$row_show_giohang['hinhanh']." class='img-responsive'>
        </td>
        <td class='invert'>
            <input id='soluong_item_giohang' id_slgh=".$row_show_giohang['sanpham_id']." type='number' min='1' value=".$row_show_giohang['soluong'].">
            
        </td>
        <td class='invert'>".$row_show_giohang['tensanpham']."</td>
        <td class='invert'>".$row_show_giohang['giasanpham']."</td>
        <td class='invert'>".$subtotal."</td>
        
        <td class='invert'>
            <input id_xoa=".$row_show_giohang['sanpham_id']." value='Xoá' type='button' class='btn btn-danger xoa_item_giohang' >
        </td>
        </tr>
    
    
    ";
    $i++;
}   
    echo "<tr>
        <td colspan='7'>
            Tổng: ".$tong ."
        </td>
    </tr>
    <tr>
        <td colspan='7'>
            <button type='submit'  name='thanhtoan_cus' class='btn btn-success thanhtoan_giohang' >Thanh toán</button>
        </td>
    </tr>
    ";
}

?>