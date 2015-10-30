<?php 
    $title_page = 'Playlist';
    include('../includes/functions.php');
	include('../includes/backend/header-admin.php');
	include('../includes/backend/mysqli_connect.php');
    include('../includes/errors.php');
?>

	<!-- Script ################## -->
	<div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line">Manage Videos</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2 style="text-align: center">Videos</h2>
                            <h4 style="text-align: center" ><a href="index.php">Home</a> / <a href="upload_video.php">Upload Videos</a></h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" style="text-align:center">
                                    <thead style="text-align:center">
                                        <tr>
                                            <th style="width: 3% ; text-align:center"><a href="list_videos.php.php?sort=id">ID</a></th>
							    			<th style="width: 5% ; text-align:center"><a href="list_videos.php?sort=cat">Type</a></th>
							    			<th style="width: 15% ; text-align:center"><a href="list_videos.php?sort=title">Title</a></th>
							                <th style="width: 15% ; text-align:center">Description</th>
                                            <th style="width: 28% ; text-align:center">Video</th>
							                <th style="width: 10% ; text-align:center"><a href="list_videos.php?sort=by">Posted By</a></th>
                                            <th style="width: 10% ; text-align:center"><a href="list_videos.php?sort=on">Posted On</a></th>
                                            <th style="width: 4% ; text-align:center">Status</th>
							                <th style="width: 10% ; text-align:center"> </th>
                                        </tr>
                                    </thead>

                                    <tbody>
									<?php 
										 // Sap xep theo thu tu cua table head
                                        if(isset($_GET['sort'])){
                                            switch ($_GET['sort']) {
                                                case 'id':
                                                    $order_by = 'video_id';
                                                    break;

                                                case 'type':
                                                    $order_by = 'type_name';
                                                    break;

                                                case 'title':
                                                    $order_by = 'title';
                                                    break;

                                                case 'by':
                                                    $order_by = 'name';
                                                    break;

                                                case 'on':
                                                    $order_by = 'date';
                                                    break;

                                                case 'stt':
                                                    $order_by = 'status';
                                                    break;

                                                default:
                                                    $order_by = 'video_id';
                                                    break;

                                            } // END Switch
                                        } else {
                                            $order_by = 'video_id';
                                        }
										// Truy xuat csdl de hien thi category
										$result = get_all_videos($order_by);
										if(mysqli_num_rows($result) > 0 ) {

										// vong lap while de hien thi ket qua tu csdl ra
									 	while($videos = mysqli_fetch_array($result, MYSQLI_ASSOC)){
									 		// in ra cac cot cua bang
                                            if($videos['status'] == 0){
                                                $active = "<a class='fa fa-remove' style='font-size: 20px; margin-left: 5px; text-decoration: none' onClick='change_status_video({$videos['video_id']},{$videos['status']})'></a>";
                                            }else {
                                                $active = "<a class='fa fa-check' style='font-size: 20px; margin-left: 5px; text-decoration: none' onClick='change_status_video({$videos['video_id']},{$videos['status']})'></a>";
                                            }
                                        ?>
                                            <tr>
                                                <td style='text-align:right' ><?= $videos['video_id']?></td>
                                                <td style='text-align:left'><?= $videos['type_name']?></td>
                                                <td style='text-align:left'><?= $videos['title']?></td>
                                                <td style='text-align:justify'><?= $videos['description']?></td>
                                                <td style='text-align:right'><img style="width: 300px; height: 169px" src="/images/thumbnails/<?= $videos['thumbnail']?>" alt="" class="item-chil-row1" ></td>
                                                <td style='text-align:right'><?= $videos['name']?></td>
                                                <td style='text-align:right'><?= $videos['date']?></td>
                                                <td style='text-align:center'><?= $active?></td>

                                                <td style='width : 100px'>
                                                <a class='fa fa-eye' href='show_video.php?vid=<?= $videos['video_id']?>' style='font-size: 20px; margin-left: 5px; text-decoration: none'></a>
                                                <a class='fa fa-pencil' href='edit_video.php?vid=<?= $videos['video_id']?>' style='font-size: 20px; margin-left: 5px; text-decoration: none'></a>
                                                <a class='fa fa-trash-o' id='delete' name='delete' href='#' style='font-size: 20px; margin-left: 5px; text-decoration: none' value='' onClick='check_delete_video(<?= $videos['video_id'] ?>);'></a>
                                                </td>
                                            </tr>
									<?php 
                                            }// END While loop
										} else { 
                                    ?>
                                        <!--Neu khong co page de hien thi, bao loi hoac noi nguoi dung tao page-->
										 	<p class='alert alert-warning'><?= $error_videos_no_item?></p>
									<?php 	}   ?>
							    	</tbody>
                                </table>
                            </div>
                        </div>
                    </div>
    			</div>
    		</div>
		</div>
	</div>
<!--end content-->
<?php include('../includes/backend/footer-admin.php'); ?>