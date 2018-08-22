<?php
require_once "database.php";
require_once "memo.php";
$database = new Database();
$db = $database->getConnection();
$memo = new Memo($db);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Memo</title>
<!-- Bootstrap -->
<link href="dist/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<script src="dist/jquery/jquery-3.2.1.min.js"></script>
	<script src="dist/bootstrap/js/bootstrap.min.js"></script>
	
	<div class="modal fade" id="ModalCreateMemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="add_memo.php">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">Add Memo</h4>
				</div >
				<div class="modal-body">
						<div class="form-group">
		                    <label for="" class="col-sm-3 control-label">Memo Title</label>
		                    <div class="col-sm-8">
		                    <input type="text" class="form-control" name="title_create" id="title_create" maxlength="50" placeholder="Title">
		                    </div>
		                </div>
		                 
		                <div class="form-group">
		                    <label for="" class="col-sm-3 control-label">Description</label>
		                    <div class="col-sm-8">
		            	        <textarea class="form-control" id="description_create" name="description_create" maxlength="500" placeholder="Description"></textarea>
		                    </div>
		                </div>
				</div >
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save</button>
				</div >
				</form>
			</div >
		</div >
	</div >

	<div class="modal fade" id="ModalUpdateMemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="update_memo.php">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">Add Memo</h4>
				</div >
				<div class="modal-body">
						<div class="form-group">
		                    <label for="" class="col-sm-3 control-label">ID</label>
		                    <div class="col-sm-8">
		                    <input type="text" class="form-control" name="id_update" id="id_update" maxlength="50" placeholder="Title" readonly="true">
		                    </div>
		                </div>
						<div class="form-group">
		                    <label for="" class="col-sm-3 control-label">Memo Title</label>
		                    <div class="col-sm-8">
		                    <input type="text" class="form-control" name="title_update" id="title_update" maxlength="50" placeholder="Title">
		                    </div>
		                </div>
		                 
		                <div class="form-group">
		                    <label for="" class="col-sm-3 control-label">Description</label>
		                    <div class="col-sm-8">
		            	        <textarea class="form-control" id="description_update" name="description_update" maxlength="500" placeholder="Description"></textarea>
		                    </div>
		                </div>
				</div >
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save</button>
				</div >
				</form>
			</div >
		</div >
	</div >

	<nav class="navbar navbar-default">
		<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<a class="navbar-brand" href="#">MEMO</a>
			</div >
			<!-- Collect the nav links, forms, and other content for toggling -->
			<ul class="nav navbar-nav navbar-left">
				<li><a  data-toggle="modal" data-target="#ModalCreateMemo"><span class="glyphicon glyphicon-plus"></span> Add</a></li>
			</ul>

		</div ><!-- /.navbar-collapse -->
	</nav>
	
	<div class="container">
		<div class="row">
		<?php
	
    $memoList = $memo->readAll();
    $a = 0;
 	 while ( isset($memoList[$a]['id'])) { ?>
        <div class="col-md-3 ">
			<div id="<?php echo $memoList[$a]['id']; ?>" class="panel panel-default">
				<div class="panel-heading heading<?php echo $memoList[$a]['id']; ?>"><?php echo $memoList[$a]['title']; ?></div>
				<div class="panel-body body<?php echo $memoList[$a]['id']; ?>" style="word-wrap:break-word;"><?php echo $memoList[$a]['description']; ?></div>
				<div class="panel-footer"><a class="update" id="<?php echo $memoList[$a]['id']; ?>" data-toggle="modal" data-target="#ModalUpdateMemo"><span class="glyphicon glyphicon-edit"></span></a> <a onClick="return confirm('Yakin akan menghapus Data?')" href="delete_memo.php?id=<?php echo $memoList[$a]['id']; ?>"><span class="glyphicon glyphicon-trash pull-right"></span></a></div>
			</div>
		</div>
	<?php $a++; }?>
		</div>
	</div>
</body>
<script type="text/javascript">
	$(".update").click(function(event){
	var	item = $(event.currentTarget)
	var id = item.prop("id");		
	var	title = $(".heading" + id).text();
	var	description = $(".body" + id).text();
	$("#id_update").val(id);
		$("#title_update").val(title);
		$("#description_update").val(description);
	});
</script>
</html>