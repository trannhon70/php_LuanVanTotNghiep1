<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php' ?>
<?php
	$cat = new category();
	if(isset($_GET['delid'])){
		$id = $_GET['delid'];
		$delcat = $cat->del_category_post($id);
	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh sách tin tức</h2>
                <div class="block">   
					<?php
						if(isset($delcat)){
							echo $delcat;
						}
					?>     
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Mã danh mục</th>
							<th>tên danh mục</th>
							<th>Mô tả</th>
							<th>Ẩn/hiện</th>
							<th>Thao tác</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$show_cate = $cat->show_post();
							if($show_cate){
								$i =0;
								while($result = $show_cate->fetch_assoc()){
									$i++;
								
						?>
						<tr class="even gradeC">
							<td><?php echo $result['id_cate_post']; ?></td>
							<td><?php echo $result['title']; ?> </td>
							<td>
								<img src="<?php echo $result['description'];?>" alt="">
								<?php echo $result['description'];?> </td>
							<td>
								<?php 
                                if($result['status'] == 0){
                                    echo 'hiển thị';
                                }else{
                                    echo 'ẩn';
                                }
                            ?> </td>
							<td><a href="tintucedit.php?catid=<?php echo $result['id_cate_post'] ?>">Sửa</a> || <a onclick = "return confirm('bạn có chắc là bạn muốn xóa danh mục <?php echo $result['title']; ?>')" href="?delid=<?php echo $result['id_cate_post'] ?>">Xóa</a></td>
						</tr>
						<?php }}?>
					</tbody>
				</table>
               </div>
            </div>
        </div>

<?php include 'inc/footer.php';?>

