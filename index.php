<?php
	include('includes/backend/mysqli_connect.php');
	include('includes/functions.php');
 	include('includes/frontend/header.php');
 	include('includes/frontend/banner.php');
?>
	<div class="content">
        <!--===================================== New game [start] =====================================-->
		<div class="container">
			<div class="content-top">
				<a href="games.php" style="text-decoration:none;"><h2 class="new" style="padding-bottom: 14px"><?= $lang['HEADER_GAME']?></h2></a>
				<div class="wrap">
					<div class="main">
						<ul id="og-grid" class="og-grid">
							<?php
								$result= get_new_games();
								if(mysqli_num_rows($result) > 0){
									while($games = mysqli_fetch_array($result, MYSQLI_ASSOC)){
										$content = excerpt_features($games['content']);
							?>
							<li>
								<a href="single.php?nid=<?= $games['news_id'];  ?>" data-largesrc="images/news/<?= $games['image']; ?>" data-title="<?= $games['title']; ?>" data-description="<?= $content ?>...">
                                    <img style="width: 252px; height: 252px;" class="img-responsive" src="images/news/<?= $games['image']; ?>" alt="img<?= $games['title']; ?>"/>
								</a>
							</li>
							<?php
								}
							}
							?>
						 <div class="clearfix"> </div>
						</ul>
					</div>
				</div>
			</div>
			<script src="js/grid.js"></script>
			<script>
				$(function() {
					Grid.init();
				});
			</script>
		</div>
		<!--===================================== New game [end] =====================================-->

        <!--===================================== Feature [start] =====================================-->
		<div class="col-mn">
            <?php
                $result = get_features();
                if (mysqli_num_rows($result) > 0) {
                    $games = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $content = excerpt_features($games['content']);
            ?>
			<div class="container">
                <div class="col-mn2">
                    <h3><?= $games['title']; ?></h3>
                    <p><?= $content; ?>...</p>
                    <a class=" more-in" href="single.php?nid=<?= $games['news_id']; ?>"><?= $lang['READ_MORE']?></a>
                    <?php } ?>
				</div>
			</div>
		</div>
		<!--===================================== Feature [end] =====================================-->

        <div class="featured">
			<div class="container">
                <a href="news.php" style="text-decoration:none;"><h2 class="new" style="padding-bottom: 14px"> <?= $lang['HEADER_NEWS']?></h2></a>
                <br>
                <!--===================================== News [start] =====================================-->
                <!-- =============== Newest News ============== -->
				<div class="col-md-4 latest">
                    <a href="blog.php?t=newest" style="text-decoration:none;"><h4 class="new" style="padding-bottom: 14px"><?= $lang['NEWS_NEWEST']?></h4></a>
					<?php
						$result = get_newest_news();
						if (mysqli_num_rows($result) > 0 ) {
							while ($lastest_news = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
					?>
					<div class="late">
						<a href="single.php?nid=<?= $lastest_news['news_id'] ?>" class='fashion'><img class='img-responsive' style="width: 120px; height: 120px;" src='images/news/<?= $lastest_news['image'] ?>' alt='<?= $lastest_news['title'] ?>'></a>
						<div class='grid-product'>
							<span><?= $lastest_news['date'] ?></span>
							<p><a href="single.php?nid=<?= $lastest_news['news_id'] ?>"><?= $lastest_news['title'] ?></a></p>
							<a class="comment" href='single.php?nid=<?= $lastest_news['news_id'] ?>'><i> </i><?= $lastest_news['count']?> Comments</a>
						</div>
						<div class='clearfix'> </div>
					</div>
					<?php
							}
						}
					?>
				</div>

				<!-- =============== Hotest News ============== -->
				<div class="col-md-4 latest">
                    <a href="blog.php?t=topmonth" style="text-decoration:none;"><h4 class="new" style="padding-bottom: 14px"><?= $lang['NEWS_TOPMONTH']?></h4></a>
					<?php
						$result = get_hotest_news();
						if (mysqli_num_rows($result) > 0 ) {
							// Neu co post de hien thi thi in ra
							while ($lastest_news = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
					?>
					<div class='late'>
						<a href='single.php?nid=<?= $lastest_news['news_id'] ?>' class='fashion'><img class='img-responsive' style="width: 120px; height: 120px;" src='images/news/<?= $lastest_news['image'] ?>' alt='<?= $lastest_news['title'] ?>'></a>
						<div class='grid-product'>
							<span><?= $lastest_news['date'] ?></span>
							<p><a href='single.php?nid=<?= $lastest_news['news_id'] ?>' ><?= $lastest_news['title'] ?></a></p>
							<a class='comment' href='single.php?nid=<?= $lastest_news['news_id'] ?>'><i> </i><?= $lastest_news['count']?> Comments</a>
						</div>
						<div class='clearfix'> </div>
					</div>
					<?php
							}
						}
					?>
                </div>

				<!-- =============== Popular News ============== -->
				<div class="col-md-4 latest">
                    <a href="blog.php?t=topweek" style="text-decoration:none;"><h4 class="new" style="padding-bottom: 14px"><?= $lang['NEWS_TOPWEEK']?></h4></a>
					<?php
						$result = get_topweek_news();
						if (mysqli_num_rows($result) > 0 ) {
							// Neu co post de hien thi thi in ra
							while ($lastest_news = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
					?>
                        <div class='late'>
                            <a href='single.php?nid=<?= $lastest_news['news_id'] ?>' class='fashion'><img class='img-responsive' style="width: 120px; height: 120px;" src='images/news/<?= $lastest_news['image'] ?>' alt='<?= $lastest_news['title'] ?>'></a>
                            <div class='grid-product'>
                                <span><?= $lastest_news['date'] ?></span>
                                <p><a href='single.php?nid=<?= $lastest_news['news_id'] ?>'><?= $lastest_news['title'] ?></a></p>
                                <a class='comment' href='single.php?nid=<?= $lastest_news['news_id'] ?>'><i> </i><?= $lastest_news['count']?> Comments</a>
                            </div>
                        	<div class='clearfix'> </div>
                        </div>
					<?php
							}
						}
					?>
				</div>

				<div class="clearfix"></div>
				<!--===================================== News [end] =====================================-->

                <!--===================================== Gallery [start] =====================================-->
				<div class="content-gallery">
					<a href="gallery.php" style="text-decoration:none;"><h2 class="new" style="padding-bottom: 14px"> <?= $lang['HEADER_GALLERY'] ?> </h2></a>
					<div class="wrap">
						<ul>
                            <div class="col-md-5" style="padding-top: 10px">
                            <?php
                                $result = get_first_image_gallery();
                                if (mysqli_num_rows($result) > 0 ) {
                                    $gallery = mysqli_fetch_array($result, MYSQLI_ASSOC);
                            ?>
                                <a href="slideshow.php?tid=<?= $gallery['type_id'] ?>" ><img src="images/gallery/<?= $gallery['image']?>" alt="<?= $gallery['title']?>" width="455" height="260" ></a>
                            <?php } ?>
                            </div>
                            <?php
                                $result = get_image_row();
                                if (mysqli_num_rows($result) > 0 ) {
                                    while ($gallery = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                            ?>
                            <li class="item-row-1">
                                <a href="slideshow.php?tid=<?= $gallery['type_id'] ?>" ><img src="images/gallery/<?= $gallery['image']?>" alt="<?= $gallery['title']?>" width="200" height="125"></a>
                            </li>
                            <?php
                                    }
                                }
                            ?>
                        </ul>
					</div>
        		</div>
        		<div class="clearfix"> </div>
				<!--===================================== Gallery [end] =====================================-->

                <!--===================================== Video [start] =====================================-->
                <div class="content-video">
					<a href="gallery.php" style="text-decoration:none;"><h2 class="new" style="padding-bottom: 14px"><?= $lang['HEADER_VIDEO']?></h2></a>
					<div class="wrap">
                        <ul>
                            <div class="col-md-5" style="padding-top: 10px">
                                <?php
                                    $result = get_first_thumbnail();
                                    if (mysqli_num_rows($result) > 0 ) {
                                        $video = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                ?>
                                    <a href="video.php?vid=<?= $video['video_id'] ?>" ><img src="images/thumbnails/<?= $video['thumbnail']?>" alt="<?= $video['title']?>" width="455" height="260" ></a>
                                    <h3 class="title-video"><?= $video['title']?></h3>
                                    <h4 class="des-video"><?= $video['description']?></h4>
                                <?php } ?>
                            </div>
                            <?php
                                $result = get_thumbnail_row();
                                if (mysqli_num_rows($result) > 0 ) {
                                    while ($video = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                            ?>
                            <li class="item-row-1" style="height: 200px">
                                <a href="video.php?vid=<?= $video['video_id'] ?>" ><img src="images/thumbnails/<?= $video['thumbnail']?>" alt="<?= $video['title']?>" width="200" height="135"></a>
                            	<h5 class="title-video-row1"><?= $video['title']?></h5>
                            </li>
                            <?php
                                    }
                                }
                            ?>
                        </ul>
					</div>
        		</div>
        		<div class="clearfix"></div>
			</div>
		</div>
        <!--===================================== Video [end] =====================================-->
	</div>
	<!---->
<?php include('includes/frontend/footer.php'); ?>