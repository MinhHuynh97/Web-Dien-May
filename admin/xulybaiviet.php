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
    if(isset($_POST['thembaiviet']))
    {
        $tenbaiviet=$_POST['tenbaiviet'];
       
        $chitiet=$_POST['chitiet'];
        
        $mota=$_POST['mota'];
        
        $hinhanh=$_FILES['hinhanh']['name'];
        
        $hinhanh_tmp=$_FILES['hinhanh']['tmp_name'];
        
        $danhmuc=$_POST['danhmuctin'];

        $path='../images/news/';
        $sql_insert_baiviet=mysqli_query($con,"INSERT INTO tbl_baiviet(tenbaiviet,tomtat,noidung,baiviet_image,danhmuc_id) 
        values ('$tenbaiviet','$chitiet','$mota','$hinhanh','$danhmuc')");
        move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
        
    }elseif(isset($_GET['xoa']))
    {
        $id_sanpham_delete=$_GET['xoa'];
        $sql_delete_sanpham=mysqli_query($con,"DELETE FROM tbl_baiviet where baiviet_id='$id_sanpham_delete'");
    }
    elseif(isset($_POST['suabaiviet'])){
        
        $id_sanpham_update=$_POST['id_update'];
        $tenbaiviet=$_POST['tenbaiviet'];
       
        $chitiet=$_POST['chitiet'];
        
        $mota=$_POST['mota'];
        
        $hinhanh=$_FILES['hinhanh']['name'];
        
        $hinhanh_tmp=$_FILES['hinhanh']['tmp_name'];
        
       
        
        $danhmuc=$_POST['danhmuc'];
        
        $path='../images/news/';
        if($hinhanh=='')
        {
            $sql_update_sanpham="UPDATE tbl_baiviet SET tenbaiviet='$tenbaiviet',tomtat='$chitiet',noidung='$mota',danhmuc_id='$danhmuc' WHERE baiviet_id='$id_sanpham_update' "; 
            $update_1=mysqli_query($con,$sql_update_sanpham);  
            
        }else{
            move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
            $sql_update_sanpham="UPDATE tbl_baiviet SET tenbaiviet='$tenbaiviet',tomtat='$chitiet',baiviet_image='$hinhanh',noidung='$mota',danhmuc_id='$danhmuc' WHERE baiviet_id='$id_sanpham_update' "; 
            
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
        <div class="row">
            <div class="col-md-4">
                <?php

                    if(isset($_GET['sua']))
                    {
                        $id_sua_sanpham=$_GET['sua'];
                        $sql_select_sua=mysqli_query($con,"SELECT * from tbl_baiviet where baiviet_id='$id_sua_sanpham'");
                        $row_sua_sanpham=mysqli_fetch_array($sql_select_sua);
                ?>
                <h4 style="font-size: 30px;">S???a b??i vi???t</h4>
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="">T??n b??i vi???t</label>
                    <input type="text" value="<?php echo $row_sua_sanpham['tenbaiviet']  ?>" class="form-control" name="tenbaiviet">
                    <input type="hidden" value="<?php echo $row_sua_sanpham['baiviet_id']  ?>" class="form-control" name="id_update">
                    
                    <label for="">H??nh ???nh</label>
                    <input type="file" name="hinhanh" class="form-control">
                    <img src="../images/news/<?php echo $row_sua_sanpham['baiviet_image']?>" height="80" width="80"><br>
                    <label for="">Chi ti???t</label>
                    <textarea rows="10" name="chitiet" class="form-control" ><?php echo $row_sua_sanpham['tomtat']  ?></textarea>
                    <label for="">M?? t???</label>
                    <textarea rows="10" name="mota" class="form-control" ><?php echo $row_sua_sanpham['noidung']  ?></textarea>
                    
                    
                    <label for="">Danh m???c tin</label>
                    <select name="danhmuc" class="form-control">
                        <option value="">----Ch???n danh m???c tin-----</option>
                        <?php
                            $sql_select_danhmuc=mysqli_query($con,"SELECT * from tbl_danhmuctin order by danhmuctin_id desc");
                            while($row_select_danhmuc=mysqli_fetch_array($sql_select_danhmuc)){
                                if($row_select_danhmuc['danhmuctin_id']==$row_sua_sanpham['danhmuc_id'])
                                {
                        ?>
                        <option selected value="<?php echo $row_select_danhmuc['danhmuctin_id'] ?>"><?php echo $row_select_danhmuc['tendanhmuc'] ?></option>
                        <?php
                            }else{
                        ?>
                        <option  value="<?php echo $row_select_danhmuc['danhmuctin_id'] ?>"><?php echo $row_select_danhmuc['tendanhmuc'] ?></option>
                        <?php
                            }
                        }
                        ?>

                    </select><br>
                    <input  type="submit" class="btn btn-success" name="suabaiviet" value="S???a b??i vi???t">
                </form>
                <?php
                    }
                    else
                    {
                ?>
                <h4 style="font-size: 30px;">Th??m b??i vi???t</h4>
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="">T??n b??i vi???t</label>
                    <input type="text" placeholder="T??n b??i vi???t" class="form-control" name="tenbaiviet">
                    
                    <label for="">Chi ti???t</label>
                    <textarea name="chitiet" class="form-control" placeholder="Chi ti???t"></textarea>
                    <label for="">M?? t???</label>
                    <textarea name="mota" class="form-control" placeholder="M?? t???"></textarea>
                    <label for="">H??nh ???nh</label>
                    <input type="file" placeholder="Th??m h??nh ???nh" name="hinhanh" class="form-control">
                    <label for="">Danh m???c tin</label>
                    <select name="danhmuctin" class="form-control">
                        <option value="">----Ch???n danh m???c tin----</option>
                        <?php
                            $sql_select_danhmuc=mysqli_query($con,"SELECT * from tbl_danhmuctin order by danhmuctin_id desc");
                            while($row_select_danhmuc=mysqli_fetch_array($sql_select_danhmuc)){
                        ?>
                        <option value="<?php echo $row_select_danhmuc['danhmuctin_id'] ?>"><?php echo $row_select_danhmuc['tendanhmuc'] ?></option>
                        <?php
                            }
                        ?>
                    </select><br>
                    <input  type="submit" class="btn btn-success" name="thembaiviet" value="Th??m b??i vi???t">
                </form>
                <?php
                    }
                ?>
                
                
            </div>
            <div class="col-md-8">
                <h4 style="font-size: 30px;">Li???t k?? b??i vi???t</h4>
                <table style="text-align: center;" class="table table-bordered ">
                    <tr>
                        <th>Th??? t???</th>
                        <th>T??n b??i vi???t </th>
                        
                        <th>H??nh ???nh</th>
                        <th>Danh m???c</th>
                        <th>Qu???n l??</th>
                    </tr>
                    <?php
                    $i=0;
                    $sql_view=mysqli_query($con,"SELECT * from tbl_baiviet as bv,tbl_danhmuctin as dmt where bv.danhmuc_id=dmt.danhmuctin_id order by bv.baiviet_id desc");
                    while($row_view=mysqli_fetch_array($sql_view)){
                        $i++;
                    ?>
                    <tr
                    <?php 
                            if(isset($_GET['sua'])){
                            if($_GET['sua']==$row_view['baiviet_id'])
                            {
                                
                                $a='style="background-color: antiquewhite;"';
                                echo $a;
                            } }
                        ?>
                    >
                        
                        <td><?php echo $i ?></td>
                        <td><?php echo $row_view['tenbaiviet'] ?></td>
                       

                        <td><img style="width: 100px; height:50;" src="../images/news/<?php echo $row_view['baiviet_image'] ?>" alt="ch??a load"> </td>
                        
                        <td><?php echo $row_view['tendanhmuc'] ?></td>
                        <td>
                            <a href="?xoa=<?php echo $row_view['baiviet_id'] ?>" >Xo??</a>
                            <a href="xulybaiviet.php?quanly=baiviet&sua=<?php echo $row_view['baiviet_id'] ?>" >S???a</a>
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