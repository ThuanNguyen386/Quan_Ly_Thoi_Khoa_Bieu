<?php
        session_start();
        if($_SESSION['loggedIn'] != 1){
            header("Location: ../view/login.php");
        }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tìm kiếm môn học</title>
	<link rel="stylesheet" type="text/css" href="../../web/css/subjects_search.css">
</head>
<body>
<!--model-->
	<?php
		require('../controller/subjects_search_controller.php');
	?>
<!--controller-->

	<div class='container boder'>
		<form name='formSearch' action="" method="get" id="addform" >
			<div class='format'>
				<div class='subformat'>
					<div class='lab color'>
						<div>Khoá học</div>
					</div>
					<div class='lab'>
						<select name='khoahoc' id='khoahoc' >
							<option value=''></option>
							<option value="1">Năm nhất</option>
							<option value="2">Năm hai</option>
							<option value="3">Năm ba</option>			
							<option value="4">Năm bốn</option>	
						</select>
						
					</div>
				</div>
				<div class='subformat'>
					<div class='lab color'>
						<div>Từ khóa</div>
					</div>
					<div class='lab'>
						<input type='text' name='keyName' id='keyName' >
						
					</div>
				</div>
				<div class='subformat'>
					<div class='lab'>
						<button name="search" value="search" id="btsearch">Tìm kiếm</button>
					</div>
				</div>
				<div class='subformat'>
					<span>
						<?php if(isset($_GET['search'])){
								if($school_year != 'none' and $key != ''){
									echo "Số môn học tìm thấy: ".$count;
								}
							}
						?>
					</span>
				</div>
				<div class='tableinfo'>
					<div class='tab'>
						<table id='show'>
							<tr>
								<th style="width:30px;">No</th>
								<th style="width:150px;">Tên môn học</th>
								<th style="width:90px;">Khoá</th>
								<th style="width:200px;">Mô tả chi tiết</th>
								<th style="width:100px;">Action</th>
							</tr>
								<?php foreach ($subjects as $subjects){ ?>
										<tr>
											<td><?php $id=$subjects['id']; echo $id; ?></td>
											<td><?php echo $subjects['name']; ?></td>
											<td><?php 
													$namhoc='';
													if($subjects['school_year']=='1'){
														$namhoc='Năm nhất';
													}else if($subjects['school_year']=='2'){
														$namhoc='Năm hai';
													}else if($subjects['school_year']=='3'){
														$namhoc='Năm ba';
													}else $namhoc='Năm bốn';
													echo $namhoc;
												?>
											</td>
											<td><?php echo $subjects['description']; ?></td>
											<td>
												<button style="background-color: #99CCFF; border: 1px solid #0078ED; margin-right: 5px; cursor: pointer;" name="delete">
												<a onclick="return confirm('Bạn chắc chắn muốn xoá môn <?php echo $subjects['name']?>?')" style="text-decoration:none;" href="../controller/subjects_delete_controller.php?id=<?php echo $subjects['id'] ?>">Xóa</a></button>
												
												<button style="background-color: #99CCFF; border: 1px solid #0078ED;  margin-right: 5px; cursor: pointer;">
												<a style="text-decoration:none;" href="subject_edit_input.php?id=<?= $id?>">Sửa</a></button>
											</td>
										</tr>
								<?php } ?>
						</table>
						<a href="../view/home.php">Home</a>
					</div>
				</div>
			</div>
		</form>
	</div>
	<script type="text/javascript" src=""></script>
</body>
</html>