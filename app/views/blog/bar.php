            <aside class="col-lg-4">
              <!-- Widget [Search Bar Widget]-->
              <div class="widget search">
                <header>
                  <h3 class="h6">Поиск по сайту</h3>
                </header>
                <form action="/posts/serarch/" class="search-form" method="POST">
                  <div class="form-group">
                    <input type="search" placeholder="Ведите текст" name="search">
                    <button type="submit" class="submit" name="btn"><i class="icon-search"></i></button>
                  </div>
                </form>
              </div>
              <!-- Widget [Latest Posts Widget]        -->
              <div class="widget latest-posts">
                <header>
                  <h3 class="h6">Популярные</h3>
                </header>
                <div class="blog-posts"><a href="#">
                  <?php foreach ($posts as $post):?>
                  <div class="item d-flex align-items-center">
                    <div class="image"><img src="img/small-thumbnail-1.jpg" alt="..." class="img-fluid"></div>
                    <div class="title"><strong><?php echo $post->title ?></strong>
                      <div class="d-flex align-items-center">
                        <div class="views"><i class="icon-eye"></i> 500</div>
                        <div class="comments"><i class="icon-comment"></i>12</div>
                      </div>
                    </div>
                  </div>
                </a>
              <?php endforeach;?>
                </div>
                    </div>
                    <!-- Widget [Categories Widget]-->
                    <div class="widget categories">
                      <header>
                        <h3 class="h6">Категория</h3>
                      </header>
                      <div class="item d-flex justify-content-between"><a href="#">Программирование</a></div>
                      <div class="item d-flex justify-content-between"><a href="#">Взлом</a></div>
                      <div class="item d-flex justify-content-between"><a href="#">Защита</a></div>
                      <div class="item d-flex justify-content-between"><a href="#">Психология</a></div>
                      <div class="item d-flex justify-content-between"><a href="#">Управление временем</a></div>
                       <div class="item d-flex justify-content-between"><a href="#">ЛайфХаки</a></div>
                    </div>
                    <!-- Widget [Tags Cloud Widget]-->
                    <div class="widget tags">       
                      <header>
                        <h3 class="h6">Теги</h3>
                      </header>
                      <ul class="list-inline">
                        <li class="list-inline-item"><a href="#" class="tag">#Программирование</a></li>
                        <li class="list-inline-item"><a href="#" class="tag">#Взлом</a></li>
                        <li class="list-inline-item"><a href="#" class="tag">#Психология</a></li>
                        <li class="list-inline-item"><a href="#" class="tag">#Управление временем</a></li>
                        <li class="list-inline-item"><a href="#" class="tag">#ЛайфХаки</a></li>
                      </ul>
                    </div>
                  </aside>