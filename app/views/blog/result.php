<?php $this->layout('template', ['title' => 'serarch']) ?>
  <div class="container">
    <div class="row">
      <!-- Latest Posts -->
      <main class="posts-listing col-lg-8"> 
	<p>Количество результат <?php echo $counrRes?></p>
        <div class="container">
          <div class="row">
            <!-- post -->
            <?php foreach ($result as $post):?>
              <div class="post col-xl-6">
                <div class="post-thumbnail"><a href="/post/<?php echo $post->id;?>"><img src="<?php echo $post->img?>" alt="..." class="img-fluid"></a></div>
                <div class="post-details">
                  <div class="post-meta d-flex justify-content-between">
                    <div class="date meta-last">20 May | 2016</div>
                    <div class="category"><a href="#">Business</a></div>
                  </div><a href="/post/<?php echo $post->id;?>">
                    <h3 class="h4"><?php echo $post->title;?></h3></a>
                    <p class="text-muted"><?php echo $post->description;?></p>
                    <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                      <div class="avatar"><img src="img/avatar-3.jpg" alt="..." class="img-fluid"></div>
                      <div class="title"><span><?php echo $post->about;?></span></div></a>
                      <div class="date"><i class="icon-clock"></i><?php echo $post->date;?></div>
                      <div class="comments meta-last"><i class="far fa-comment"></i>12</div>
                    </footer>
                  </div>
                </div>
              <?php endforeach;?>
            </div>
       
            </div>
          </main>
          <!-- Widget [Search Bar Widget]-->
          <?php include 'bar.php'?>
        </div>
      </div>