<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php' ?>
<?php
	$cat = new category();
	if(isset($_GET['delid'])){
		$id = $_GET['delid'];
		$delcat = $cat->del_NguoiDung($id);
	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh mục</h2>
                <div class="block">   
					<?php
						if(isset($delcat)){
							echo $delcat;
						}
					?>     
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>STT</th>
							<th>Tên người dùng</th>
							<th>Số điện thoại</th>
							<th>Email</th>
							<th>Quốc gia</th>
							<th>Thao tác</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$show_cate = $cat->show_nguoiDungAdmin();
							if($show_cate){
								$i =0;
								while($result = $show_cate->fetch_assoc()){
									$i++;
								
						?>
						<tr class="even gradeC">
							<td><?php echo $i ?></td>
							<td><?php echo $result['name']; ?> </td>
							<td><?php echo $result['phone']; ?> </td>
							<td><?php echo $result['email']; ?> </td>
							<td><?php echo $result['country']; ?> </td>
							<td><a onclick = "return confirm('bạn có chắc là bạn muốn xóa tài khoản người dùng <?php echo $result['name']; ?>')" href="?delid=<?php echo $result['id'] ?>">Xóa</a></td>
						</tr>
						<?php }}?>
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