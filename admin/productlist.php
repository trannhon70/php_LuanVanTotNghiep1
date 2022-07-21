<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php'; ?>
<?php include_once '../helpers/format.php'; ?>
<?php 
	$pd= new category();
	$fm= new Format();
	if(isset($_GET['productid'])){
		$id = $_GET['productid'];
		$delpro = $pd->del_product($id);
	}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách các sản phẩm có trong cửa hàng</h2>
        <div class="block">  
			<?php 
				if(isset($delpro)){
					echo $delpro ;
				}
			?>
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>STT</th>
					<th>Tên sản phẩm</th>
					<th>Hình ảnh</th>
					<th>Danh mục </th>
					<th>Thương hiệu</th>
					
					<th>Giá</th>
					<th>Tình trạng</th>
					<th>Thao tác</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$i =0;
					$pdlist = $pd->show_product();
					if($pdlist){
						while($result = $pdlist->fetch_assoc()){
							$i++;
					
				?>
				<tr class="odd gradeX">
					<td class="center"> <?php echo $i;?></td>
					<td class="center"><?php echo $result['productName'];?></td> 
					<td class="center"><img src="uploads/<?php echo $result['hinhanh'];?>" alt="..." width="90px" height="70px" > </td>
					<td class="center"> <?php echo $result['catName'];?></td>
					<td class="center"> <?php echo $result['brandName'];?></td>
					
					<td class="center"> <?php echo number_format($result['price'],0,'.',' ') ;?> VNĐ</td>
					<td class="center"> <?php 
						if($result['type1']==0){
							echo 'không nổi bật';
						}else{
							echo 'Nổi bật';
						}
					?></td>
					<td><a href="productedit.php?productid=<?php echo $result['productid'] ?>">Sửa</a> || <a onclick = "return confirm('bạn có chắc là bạn muốn xóa sản phẩm <?php echo $result['productName']; ?>')" href="?productid=<?php echo $result['productid'] ?>">Xóa</a></td>
				</tr>
				<?php 	}
					} ?>
				
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
