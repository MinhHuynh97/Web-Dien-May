<?php
include_once('../db/connect.php');
?>
<?php
    if (isset($_GET['quanly']))
    {
        if($_GET['quanly']=='dangxuat')
        {
            unset($_SESSION['dangnhap']);
            header('Location: login.php');
        }
    }
    if(isset($_POST['themsanpham']))
    {
        $tensanpham=$_POST['tensanpham'];
       
        $chitiet=$_POST['chitiet'];
        
        $mota=$_POST['mota'];
        
        $hinhanh=$_FILES['hinhanh']['name'];
        
        $hinhanh_tmp=$_FILES['hinhanh']['tmp_name'];
        
        $giasanpham=$_POST['giasanpham'];
        
        $giakhuyenmai=$_POST['giakhuyenmai'];
        
        $danhmuc=$_POST['danhmuc'];
        $soluong=$_POST['soluong'];
        $path='../images/products/';
        $sql_insert_sanpham=mysqli_query($con,"INSERT INTO tbl_sanpham(sanpham_name,sanpham_chitiet,sanpham_mota,sanpham_image,sanpham_gia,sp_khuyenmai,category_id,sanpham_soluong) 
        values ('$tensanpham','$chitiet','$mota','$hinhanh','$giasanpham','$giakhuyenmai','$danhmuc','$soluong')");
        move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
        
    }elseif(isset($_GET['xoa']))
    {
        $id_sanpham_delete=$_GET['xoa'];
        $sql_delete_sanpham=mysqli_query($con,"DELETE FROM tbl_sanpham where sanpham_id='$id_sanpham_delete'");
    }
    elseif(isset($_POST['suasanpham'])){
        
        $id_sanpham_update=$_POST['id_update'];
        $tensanpham=$_POST['tensanpham'];
       
        $chitiet=$_POST['chitiet'];
        
        $mota=$_POST['mota'];
        
        $hinhanh=$_FILES['hinhanh']['name'];
        
        $hinhanh_tmp=$_FILES['hinhanh']['tmp_name'];
        
        $giasanpham=$_POST['giasanpham'];
        
        $giakhuyenmai=$_POST['giakhuyenmai'];
        
        $danhmuc=$_POST['danhmuc'];
        $soluong=$_POST['soluong'];
        $path='../uploads/';
        if($hinhanh=='')
        {
            $sql_update_sanpham="UPDATE tbl_sanpham SET sanpham_name='$tensanpham',sanpham_chitiet='$chitiet',sanpham_mota='$mota',sanpham_gia='$giasanpham',sp_khuyenmai='$giakhuyenmai',category_id='$danhmuc',sanpham_soluong='$soluong' WHERE sanpham_id='$id_sanpham_update' "; 
            $update_1=mysqli_query($con,$sql_update_sanpham);  
            
        }else{
            move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
            $sql_update_sanpham="UPDATE tbl_sanpham set sanpham_name='$tensanpham',sanpham_chitiet='$chitiet',sanpham_mota='$mota',sanpham_image='$hinhanh',sanpham_gia='$giasanpham',sp_khuyenmai='$giakhuyenmai',category_id='$danhmuc',sanpham_soluong='$soluong' where sanpham_id='$id_sanpham_update' "; 
            $update_2=mysqli_query($con,$sql_update_sanpham); 
            
        }
        
        
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        label{
            margin:1rem 0 0 0;
        }
    </style>
    <title>Welcome Admin  </title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="xulydonhang.php">????n h??ng</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="xulydanhmuc.php">Danh m???c s???n ph???m</a>
                </li>
                
                <li class="nav-item">
                <a class="nav-link" href="xulysanpham.php">S???n ph???m</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="xulykhachhang.php">Kh??ch h??ng</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="xulymuctin.php">Danh m???c tin</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="xulybaiviet.php">B??i vi???t</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="?quanly=dangxuat">????ng xu???t</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <div style="max-width: 95%;" class="container">
        <div style="margin-top: 10px;" class="row">
            <div class="col-md-3">
                <?php

                    if(isset($_GET['sua']))
                    {
                        $id_sua_sanpham=$_GET['sua'];
                        $sql_select_sua=mysqli_query($con,"SELECT * from tbl_sanpham where sanpham_id='$id_sua_sanpham'");
                        $row_sua_sanpham=mysqli_fetch_array($sql_select_sua);
                ?>
                <h4 style="text-align:center;font-size:30px">S???a s???n ph???m</h4>
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="">T??n s???n ph???m</label>
                    <input type="text" value="<?php echo $row_sua_sanpham['sanpham_name']  ?>" class="form-control" name="tensanpham">
                    <input type="hidden" value="<?php echo $row_sua_sanpham['sanpham_id']  ?>" class="form-control" name="id_update">
                    
                    <label for="">H??nh ???nh</label>
                    <input type="file" value="12" name="hinhanh" class="form-control">
                    <img style="margin-top: 4px;" src="../images/products/<?php echo $row_sua_sanpham['sanpham_image']?>" height="80" width="80"><br>
                    <label for="">G??a s???n ph???m</label>
                    <input type="text" value="<?php echo $row_sua_sanpham['sanpham_gia']  ?>" class="form-control" name="giasanpham">
                    <label for="">G??a khuy???n m??i</label>
                    <input type="text" value="<?php echo $row_sua_sanpham['sp_khuyenmai']  ?>" class="form-control" name="giakhuyenmai">
                    <label for="">S??? l?????ng</label>
                    <input type="text" value="<?php echo $row_sua_sanpham['sanpham_soluong']  ?>" class="form-control" name="soluong">
                    <label for="">Chi ti???t</label>
                    <textarea rows="10" name="chitiet" class="form-control" ><?php echo $row_sua_sanpham['sanpham_chitiet']  ?></textarea>
                    <label for="">M?? t???</label>
                    <textarea rows="10" name="mota" class="form-control" ><?php echo $row_sua_sanpham['sanpham_mota']  ?></textarea>
                    
                    
                    <label for="">Danh m???c</label>
                    <select name="danhmuc" class="form-control">
                        <option value="">----Ch???n danh m???c s???n ph???m-----</option>
                        <?php
                            $sql_select_danhmuc=mysqli_query($con,"SELECT * from tbl_category order by category_id desc");
                            while($row_select_danhmuc=mysqli_fetch_array($sql_select_danhmuc)){
                                if($row_select_danhmuc['category_id']==$row_sua_sanpham['category_id'])
                                {
                        ?>
                        <option selected value="<?php echo $row_select_danhmuc['category_id'] ?>"><?php echo $row_select_danhmuc['category_name'] ?></option>
                        <?php
                            }else{
                        ?>
                        <option  value="<?php echo $row_select_danhmuc['category_id'] ?>"><?php echo $row_select_danhmuc['category_name'] ?></option>
                        <?php
                            }
                        }
                        ?>

                    </select><br>
                    <input  type="submit" class="btn btn-success" name="suasanpham" value="S???a s???n ph???m">
                </form>
                <?php
                    }
                    else
                    {
                ?>
                <h4 style="text-align: center;font-size:30px">Th??m s???n ph???m</h4>
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="">T??n s???n ph???m</label>
                    <input type="text" placeholder="T??n s???n ph???m" class="form-control" name="tensanpham">
                    <label for="">S??? l?????ng</label>
                    <input type="text" placeholder="S??? l?????ng" class="form-control" name="soluong">
                    <label for="">Chi ti???t</label>
                    <textarea name="chitiet" class="form-control" placeholder="Chi ti???t"></textarea>
                    <label for="">M?? t???</label>
                    <textarea name="mota" class="form-control" placeholder="M?? t???"></textarea>
                    <label for="">H??nh ???nh</label>
                    <input type="file" placeholder="Th??m h??nh ???nh" name="hinhanh" class="form-control">
                    <label for="">G??a s???n ph???m</label>
                    <input type="text" placeholder="Gi?? s???n ph???m" class="form-control" name="giasanpham">
                    <label for="">G??a khuy???n m??i</label>
                    <input type="text" placeholder="Gi?? khuy???n m??i" class="form-control" name="giakhuyenmai">
                    <label for="">Danh m???c</label>
                    <select name="danhmuc" class="form-control">
                        <option value="">----Ch???n danh m???c----</option>
                        <?php
                            $sql_select_danhmuc=mysqli_query($con,"SELECT * from tbl_category order by category_id desc");
                            while($row_select_danhmuc=mysqli_fetch_array($sql_select_danhmuc)){
                        ?>
                        <option value="<?php echo $row_select_danhmuc['category_id'] ?>"><?php echo $row_select_danhmuc['category_name'] ?></option>
                        <?php
                            }
                        ?>
                    </select><br>
                    <input  type="submit" class="btn btn-success" name="themsanpham" value="Th??m s???n ph???m">
                </form>
                <?php
                    }
                ?>
                
                
            </div>
            <div class="col-md-9">
                <h4 style="text-align:center;font-size:30px">Li???t k?? danh m???c</h4>
                <table style="text-align:center" class="table table-bordered ">
                    <tr>
                        <th>Th??? t???</th>
                        <th>T??n s???n ph???m </th>
                        <th>H??nh ???nh</th>
                        <th>S??? l?????ng</th>
                        <th>Gi?? s???n ph???m</th>
                        <th>Gi?? khuy???n m??i</th>
                        <th>Danh m???c</th>
                        <th>Qu???n l??</th>
                    </tr>
                    <?php
                    $i=0;
                    $sql_view=mysqli_query($con,"SELECT * from tbl_sanpham as sp,tbl_category as cate where sp.category_id=cate.category_id order by sp.sanpham_id desc");
                    while($row_view=mysqli_fetch_array($sql_view)){
                        $i++;
                    ?>
                    <tr
                    <?php 
                            if(isset($_GET['sua'])){
                            if($_GET['sua']==$row_view['sanpham_id'])
                            {
                                
                                $a='style="background-color: antiquewhite;"';
                                echo $a;
                            } }
                        ?>
                    >
                        
                        <td><?php echo $i ?></td>
                        <td><?php echo $row_view['sanpham_name'] ?></td>
                        <td><img style="max-width: 154px; max-height:95px;" src="../uploads/<?php echo $row_view['sanpham_image'] ?>" alt="ch??a load"> </td>
                        <td><?php echo $row_view['sanpham_soluong'] ?></td>
                        <td><?php echo number_format($row_view['sanpham_gia'])." vnd" ?></td>
                        <td><?php echo number_format($row_view['sp_khuyenmai'])." vnd" ?></td>
                        <td><?php echo $row_view['category_name'] ?></td>
                        <td>
                            <a href="?xoa=<?php echo $row_view['sanpham_id'] ?>" >Xo??</a>
                            <a href="xulysanpham.php?quanly=sanpham&sua=<?php echo $row_view['sanpham_id'] ?>" >S???a</a>
                        </td>

                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>