<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php
	$cat = new category();
	if(isset($_GET['type_binhluan']) && isset($_GET['tinhTrang'])){
		$id = $_GET['type_binhluan'];
		$type = $_GET['tinhTrang'];
		$update_type_slider = $cat->update_type_binhluan($id,$type);

	}
	if(isset($_GET['del_binhluan'])){
		$id = $_GET['del_binhluan'];
		
		$del_binhluan = $cat->del_binhluan($id);

	}

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>bình luận của khách</h2>
        <div class="block">
        <?php 
				if(isset($del_binhluan)){
					echo $del_binhluan;
				}
			?>
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên người bình luận</th>
                        <th>Nội dung bình luận </th>
                        <th>Ẩn/hiện</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
						$cat = new category();
						$get_binhluan = $cat->show_binhluan();
						if($get_binhluan){
							$i=0;
							while($result_binhluan = $get_binhluan->fetch_assoc()){
								$i++;
							
					?>
                    <tr class="odd gradeX">
                        <td><?php echo $i  ?></td>
                        <td><?php echo $result_binhluan['tenbinhluan'] ?></td>
                        <td><?php echo $result_binhluan['binhluan'] ?></td>
                        <td>
                            <?php
						if($result_binhluan['tinhTrang']==1){
						?>
                            <a href="?type_binhluan=<?php echo $result_binhluan['binhluan_id'] ?>&tinhTrang=0">Ẩn bình
                                luận</a>
                            <?php
						 }else{
						?>
                            <a href="?type_binhluan=<?php echo $result_binhluan['binhluan_id'] ?>&tinhTrang=1">Hiện bình
                                luận</a>
                            <?php
						}
						?>
                        </td>
                        <td>
					
					<a href="?del_binhluan=<?php echo $result_binhluan['binhluan_id'] ?>" onclick="return confirm('bạn có chắc là bạn muốn xóa bình luận của <?php echo $result_binhluan['tenbinhluan'] ?> ');" >Delete</a> 
				</td>
                    </tr>
                    <?php }
						} ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    setupLeftMenu();
    $('.datatable').dataTable();
    setSidebarHeight();
});
</script>
<?php include 'inc/footer.php';?>