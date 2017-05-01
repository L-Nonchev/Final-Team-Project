<?php 
	include 'header.php';
?>
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 v-categories">

                <!-- =-=-=-=-=-=-= POPULAR CHANNELS =-=-=-=-=-=-= -->
                <div class="content-block">
                    <div class="cb-header">
                        <div class="row">
                            <div class="col-lg-10">
                                <ul class="list-inline">
                                    <li><p class="color-active">All Categories</p></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="cb-content">
                        <div class="row">
                            <!-- 1-6 -->
                            <div class="col-lg-2 col-xs-6 col-sm-3">
                                <div class="b-category">
                                    <a href="CategoryController.php?category=<?=$allCategories[0]['category_id']?>"><img src="assets/images/categories/film.jpg" alt=""></a>
                                    <a href="CategoryController.php?category=<?=$allCategories[0]['category_id']?>" class="name"> <?=$allCategories[0]['category_name']?></a>
                                    <p class="desc"><?=$allCategories[0]['videos_count']?> videos</p>
                                </div>
                            </div>

                            <div class="col-lg-2 col-xs-6 col-sm-3">
                                <div class="b-category">
                                    <a href="CategoryController.php?category=<?=$allCategories[1]['category_id']?>"><img src="assets/images/categories/cars.jpg" alt=""></a>
                                    <a href="CategoryController.php?category=<?=$allCategories[1]['category_id']?>" class="name"><?=$allCategories[1]['category_name']?></a>
                                    <p class="desc"><?=$allCategories[1]['videos_count'] ?> videos</p>
                                </div>
                            </div>

                            <div class="col-lg-2 col-xs-6 col-sm-3">
                                <div class="b-category">
                                    <a href="CategoryController.php?category=<?=$allCategories[2]['category_id']?>"><img src="assets/images/categories/music.png" alt=""></a>
                                    <a href="CategoryController.php?category=<?=$allCategories[2]['category_id']?>" class="name"><?=$allCategories[2]['category_name']?></a>
                                    <p class="desc"><?=$allCategories[2]['videos_count'] ?> videos</p>
                                </div>
                            </div>

                            <div class="col-lg-2 col-xs-6 col-sm-3">
                                <div class="b-category">
                                    <a href="CategoryController.php?category=<?=$allCategories[3]['category_id']?>"><img src="assets/images/categories/pets.gif" alt=""></a>
                                    <a href="CategoryController.php?category=<?=$allCategories[3]['category_id']?>" class="name"><?=$allCategories[3]['category_name']?></a>
                                    <p class="desc"><?=$allCategories[3]['videos_count'] ?> videos</p>
                                </div>
                            </div>

                            <div class="col-lg-2 col-xs-6 col-sm-3">
                                <div class="b-category">
                                    <a href="CategoryController.php?category=<?=$allCategories[4]['category_id']?>"><img src="assets/images/categories/sport.jpg" alt=""></a>
                                    <a href="CategoryController.php?category=<?=$allCategories[4]['category_id']?>" class="name"><?=$allCategories[4]['category_name']?></a>
                                    <p class="desc"><?=$allCategories[4]['videos_count'] ?> videos</p>
                                </div>
                            </div>

                            <div class="col-lg-2 col-xs-6 col-sm-3">
                                <div class="b-category">
                                    <a href="CategoryController.php?category=<?=$allCategories[5]['category_id']?>"><img src="assets/images/categories/travel.jpg" alt=""></a>
                                    <a href="CategoryController.php?category=<?=$allCategories[5]['category_id']?>" class="name"><?=$allCategories[5]['category_name']?></a>
                                    <p class="desc"><?=$allCategories[5]['videos_count'] ?> videos</p>
                                </div>
                            </div>

                            <!-- 7 ... 12 -->
                            <div class="col-lg-2 col-xs-6 col-sm-3">
                                <div class="b-category">
                                    <a href="CategoryController.php?category=<?=$allCategories[6]['category_id']?>"><img src="assets/images/categories/game.jpg" alt=""></a>
                                    <a href="CategoryController.php?category=<?=$allCategories[6]['category_id']?>" class="name"><?=$allCategories[6]['category_name']?></a>
                                    <p class="desc"><?=$allCategories[6]['videos_count'] ?> videos</p>
                                </div>
                            </div>

                            <div class="col-lg-2 col-xs-6 col-sm-3">
                                <div class="b-category">
                                    <a href="CategoryController.php?category=<?=$allCategories[7]['category_id']?>"><img src="assets/images/categories/people.png" alt=""></a>
                                    <a href="CategoryController.php?category=<?=$allCategories[7]['category_id']?>" class="name"><?=$allCategories[7]['category_name']?></a>
                                    <p class="desc"><?=$allCategories[7]['videos_count'] ?> videos</p>
                                </div>
                            </div>

                            <div class="col-lg-2 col-xs-6 col-sm-3">
                                <div class="b-category">
                                    <a href="CategoryController.php?category=<?=$allCategories[8]['category_id']?>"><img src="assets/images/categories/comedy.jpg" alt=""></a>
                                    <a href="CategoryController.php?category=<?=$allCategories[8]['category_id']?>" class="name"><?=$allCategories[8]['category_name']?></a>
                                    <p class="desc"><?=$allCategories[8]['videos_count'] ?> videos</p>
                                </div>
                            </div>

                            <div class="col-lg-2 col-xs-6 col-sm-3">
                                <div class="b-category">
                                    <a href="CategoryController.php?category=<?=$allCategories[9]['category_id']?>"><img src="assets/images/categories/entertaiment.jpg" alt=""></a>
                                    <a href="CategoryController.php?category=<?=$allCategories[9]['category_id']?>" class="name"><?=$allCategories[9]['category_name']?></a>
                                    <p class="desc"><?=$allCategories[9]['videos_count'] ?> videos</p>
                                </div>
                            </div>

                            <div class="col-lg-2 col-xs-6 col-sm-3">
                                <div class="b-category">
                                    <a href="CategoryController.php?category=<?=$allCategories[10]['category_id']?>"><img src="assets/images/categories/news.jpg" alt=""></a>
                                    <a href="CategoryController.php?category=<?=$allCategories[10]['category_id']?>" class="name"><?=$allCategories[10]['category_name']?></a>
                                    <p class="desc"><?=$allCategories[10]['videos_count'] ?> videos</p>
                                </div>
                            </div>

                            <div class="col-lg-2 col-xs-6 col-sm-3">
                                <div class="b-category">
                                    <a href="CategoryController.php?category=<?=$allCategories[11]['category_id']?>"><img src="assets/images/categories/style.png" alt=""></a>
                                    <a href="CategoryController.php?category=<?=$allCategories[11]['category_id']?>" class="name"><?=$allCategories[11]['category_name']?></a>
                                    <p class="desc"><?=$allCategories[11]['videos_count'] ?> videos</p>
                                </div>
                            </div>

                            <!-- 13 ... 18 -->
                            <div class="col-lg-2 col-xs-6 col-sm-3">
                                <div class="b-category">
                                    <a href="CategoryController.php?category=<?=$allCategories[12]['category_id']?>"><img src="assets/images/categories/education.gif" alt=""></a>
                                    <a href="CategoryController.php?category=<?=$allCategories[12]['category_id']?>" class="name"><?=$allCategories[12]['category_name']?></a>
                                    <p class="desc"><?=$allCategories[12]['videos_count'] ?> videos</p>
                                </div>
                            </div>

                            <div class="col-lg-2 col-xs-6 col-sm-3">
                                <div class="b-category">
                                    <a href="CategoryController.php?category=<?=$allCategories[13]['category_id']?>"><img src="assets/images/categories/technology.jpg" alt=""></a>
                                    <a href="CategoryController.php?category=<?=$allCategories[13]['category_id']?>" class="name"><?=$allCategories[13]['category_name']?></a>
                                    <p class="desc"><?=$allCategories[13]['videos_count'] ?> videos</p>
                                </div>
                            </div>

                            <div class="col-lg-2 col-xs-6 col-sm-3">
                                <div class="b-category">
                                    <a href="CategoryController.php?category=<?=$allCategories[14]['category_id']?>"><img src="assets/images/categories/profit.png" alt=""></a>
                                    <a href="CategoryController.php?category=<?=$allCategories[14]['category_id']?>" class="name"><?=$allCategories[14]['category_name']?></a>
                                    <p class="desc"><?=$allCategories[14]['videos_count'] ?> videos</p>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-= POPULAR CHANNELS END=-=-=-=-=-=-= -->

            </div>
        </div>
    </div>
</div>
<?php 
	require 'view/footer.php';
?>
