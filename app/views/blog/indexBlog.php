  <?php $this->layout('template', ['title' => 'Добавить запись']) ?>

  <div class="container">
    <div class="row">
      <!-- Latest Posts -->
      <main class="posts-listing col-lg-8"> 
        <div class="container">
          <div class="row">
            <!-- post -->
            <?php foreach ($posts as $post):?>
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
            
            <!-- Pagination -->
            <nav aria-label="Page navigation example">

              <!-- </ul> -->
              <ul class="pagination pagination-template d-flex justify-content-center">

                <?php if ($paginator->getPrevUrl()): ?>
                  <li class="page-item"><a class="page-link active" href="<?php echo $paginator->getPrevUrl(); ?>"><</a></li>
                <?php endif; ?>

                <?php foreach ($paginator->getPages() as $page): ?>
                  <?php if ($page['url']): ?>
                    <li class="page-item" <?php echo $page['isCurrent'] ? 'class="active"' : ''; ?>>
                      <a class="page-link" href="<?php echo $page['url']; ?>"><?php echo $page['num']; ?></a>
                    </li>
                    <?php else: ?>
                      <li class="page-item"><span><?php echo $page['num']; ?></span></li>
                    <?php endif; ?>
                  <?php endforeach; ?>

                  <?php if ($paginator->getNextUrl()): ?>
                    <li class="page-item"><a class="page-link" href="<?php echo $paginator->getNextUrl(); ?>">></a></li>
                  <?php endif; ?>
                </ul>
              </nav>
            </div>
          </main>
          <!-- Widget [Search Bar Widget]-->
          <?php include 'bar.php'?>
        </div>
      </div>