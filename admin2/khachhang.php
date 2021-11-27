<?php
include_once('../db/connect.php');
?>
    <div style="max-width: 95%;"  class="container">
        <div class="row">
            
            <div  class="col-md-12">
                <h4 style="font-size: 30px;">Khách hàng đã đăng kí</h4>
                <table style="text-align: center;" class="table table-bordered ">
                    <tr>
                        <th>Thứ tự </th>
                        <th>Tên khách hàng </th>
                        <th>Số điện thoại </th>

                        <th>Địa chỉ </th>
                        <th>Email</th>
                        <th>Note</th>

                        <th>Quản lý</th>

                    </tr>
                    <?php
                    $i=0;
                    $sql_giaodich=mysqli_query($con,"SELECT * from tbl_khachhang as kh,tbl_giaodich as gd where kh.khachhang_id=gd.khachhang_id group by kh.khachhang_id having count(kh.khachhang_id)>1 order by kh.khachhang_id desc");
                    $sql_select_khachhang=mysqli_query($con,"SELECT * from tbl_khachhang as kh");
                    $magd = mysqli_fetch_array($sql_giaodich);
                    while($row_select_khachhang=mysqli_fetch_array($sql_select_khachhang)){
                        $i++;
                    ?>
                    <tr >
                        
                        <td><?php echo $i ?></td>
                        <td><?php echo $row_select_khachhang['name'] ?></td>
                        <td><?php echo $row_select_khachhang['phone'] ?></td>
                        <td><?php echo $row_select_khachhang['address'] ?></td>
                        <td><?php echo $row_select_khachhang['email'] ?></td>
                        <td><?php echo $row_select_khachhang['note'] ?></td>
                        <td>
                            <a href="?quanly=donhang&khachhang=<?php echo $magd['magiaodich'] ?>">Xem giao dịch</a>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>
            </div>
            <?php
                if(isset($_GET['khachhang']))
                {
            ?>
            <div class="col-md-12">
                <h4 style="font-size: 30px;">Liệt kê lịch sử đơn hàng</h4>
                <table style="text-align: center;" class="table table-bordered ">
                    <tr>
                        <th>Thứ tự </th>
                        <th>Mã giao dịch </th>
                        <th>Tên sản phẩm </th>
                        <th>Ngày đặt</th>

                    </tr>
                    <?php
                    $i=0;
                    $sql_select_giaodich=mysqli_query($con,"SELECT * from tbl_khachhang as kh,tbl_giaodich as gd,tbl_sanpham as sp where sp.sanpham_id=gd.sanpham_id and kh.khachhang_id=gd.khachhang_id order by gd.giaodich_id desc");
                    while($row_select_giaodich=mysqli_fetch_array($sql_select_giaodich)){
                        $i++;

                    ?>
                    <tr >
                        
                        <td><?php echo $i ?></td>
                        <td><?php echo $row_select_giaodich['magiaodich'] ?></td>
                        <td><?php echo $row_select_giaodich['sanpham_name'] ?></td>
                        <td><?php echo $row_select_giaodich['ngaythang'] ?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
