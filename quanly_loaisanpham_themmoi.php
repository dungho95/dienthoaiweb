     <!-- Bootstrap --> 
    <link rel="stylesheet" type="text/css" href="style.css"/>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
	    
	<?php
  		include_once("dbconnect.php");		
		if(isset($_POST["btnThemMoi"]))
		{
				$ten = $_POST["txtTen"];
				$moTa = $_POST["txtMoTa"];
				$loi="";
				if($ten=="")
				{
					$loi.="<li>Mời nhập tên loại sản phẩm</li>";
				}
				if($loi!="")
				{
					echo "<ul>$loi</ul>";
				}
				else
				{
					$sq="Select * from loaisanpham where lsp_ten='$ten'";
					$result = mysqli_query($conn,$sq);
					if(mysqli_num_rows($result)==0)
					{
					   mysqli_query($conn, "INSERT INTO loaisanpham (lsp_ten, lsp_mota) VALUES ('$ten','$moTa')");
					   echo '<meta http-equiv="refresh" content="0;URL=quanly_loaisanpham.php"/>';
					}
					else
					{
						echo "<li>Trùng tên loại sản phẩm";
					}
				}

		}
        ?>

<div class="container">
	<h2>Thêm loại sản phẩm</h2>
			 	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
					<div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Tên loại sản phẩm(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtTen" id="txtTen" class="form-control" placeholder="Tên loại sản phẩm" value='<?php echo isset($_POST["txtTen"])?($_POST["txtTen"]):"";?>'>
							</div>
					</div>
                    
                    <div class="form-group">
						    <label for="txtMoTa" class="col-sm-2 control-label">Mô tả(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtMoTa" id="txtMoTa" class="form-control" placeholder="Mô tả" value='<?php echo isset($_POST["txtMoTa"])?($_POST["txtMoTa"]):"";?>'>
							</div>
					</div>
                    
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnThemMoi" id="btnThemMoi" value="Thêm mới"/>
                              <input type="button" class="btn btn-primary" name="btnBoQua"  id="btnBoQua" value="Bỏ qua" onclick="window.location='?khoatrang=quanlyloaisanpham'" />
                              	
						</div>
					</div>
				</form>
	</div>