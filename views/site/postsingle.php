<?php
use app\assets\AppAsset;
use app\models\Posts;
$posts_popular = Posts::find()->orderBy(['id' => SORT_DESC])->asArray()->where(['type' => ''])->limit(3)->all();
$posts_recent = Posts::find()->orderBy(['id' => SORT_DESC])->asArray()->where(['type' => ''])->limit(4)->all();

?>



<div v-if="loadcontent">
  <div style="height: 350px;" class="row  skeleton-loader d-flex align-items-center justify-content-center">
    <div class="col align-self-center">
      <div class="center-div">
        <div style="height: 70px;"  class="skeleton-loader"></div>
        <div  class="skeleton-loader"></div>
     
      </div>
      

    </div>
    
  </div>
  
</div>







<div v-if="!loadcontent" class="site-cover site-cover-sm same-height overlay single-page" v-bind:style="{ 'background-image': 'url(' + datafrombackend.img_path + ')' }">
    <div class="container">
      <div class="row same-height justify-content-center">
        <div class="col-md-6">
          <div class="post-entry text-center">
            <h1 class="mb-4">{{datafrombackend.title}}</h1>
            <div class="post-meta align-items-center text-center">
   
              <span class="d-inline-block mt-1">by @{{datafrombackend.nickname}}</span>
              <span>&nbsp;-&nbsp; {{datafrombackend.date}}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section class="section">
    <div class="container">

      <div class="row blog-entries element-animate">

        <div class="col-md-12 col-lg-8 main-content">

          <div v-if="loadcontent">
            <div style="height:1000px;"  class="skeleton-loader"></div>
          </div>

          <div v-if="!loadcontent"  class="post-content-body">
            {{text}}
           <!-- <div class="row my-4">
              <div class="col-md-12 mb-4">
                <img src="web/img/post/6592a634b4b10.jpeg" alt="Image placeholder" class="img-fluid rounded">
              </div>
              <div class="col-md-6 mb-4">
                <img src="web/img/post/6592a514b4dd8.jpeg" alt="Image placeholder" class="img-fluid rounded">
              </div>
              <div class="col-md-6 mb-4">
                <img src="web/img/post/6592a52622945.jpeg" alt="Image placeholder" class="img-fluid rounded">
              </div>
            </div>-->
            {{description}}
          </div>


          <div class="pt-5" data-bs-toggle="modal" data-bs-target="#not_available">
            <p>Categories:  <a href="#">Dogs</a>, <a href="#">Goldenretriver</a>  Tags: <a href="#">#golden</a>, <a href="#">#dogcarrying</a></p>
          </div>


          <div class="pt-5 comment-wrap">
            <h3 class="mb-5 heading">6 Comments</h3>
            <ul class="comment-list">
              <li class="comment">
                <div class="vcard">
                  <img src="/web/img/Proflie/profile-blank-icon-empty-photo-600nw-535853269.webp" alt="Image placeholder">
                </div>
                <div class="comment-body">
                  <h3>@mike_golden</h3>
                  <div class="meta">January 5, 2024 at 2:21pm</div>
                  <p>This is such a pawesome video - thanks so much for sharing!</p>
                  <p data-bs-toggle="modal" data-bs-target="#not_available"><a href="#" class="reply rounded">Reply</a></p>
                </div>
              </li>

              <li class="comment">
                <div class="vcard">
                  <img style="height:50px; object-fit: cover;" src="/web/img/market/67c46a30c4790.jpeg" alt="Image placeholder">
                </div>
                <div class="comment-body">
                  <h3>@tali_dog</h3>
                  <div class="meta">January 5, 2024 at 2:26pm</div>
                  <p>Are you planning to bring home a new puppy? Check out this puppy owner's guide playlist: 
                    <a href="https://www.youtube.com/playlist?list=PL7BBgLulhermDG8uz8L0EkyElfUeQG9Am">
                      https://www.youtube.com/playlist?list=PL7BBgLulhermDG8uz8L0EkyElfUeQG9Am
                    </a>
                  </p>
                  <p data-bs-toggle="modal" data-bs-target="#not_available"><a href="#" class="reply rounded">Reply</a></p>
                </div>

                <ul class="children">
                  <li class="comment">
                    <div class="vcard">
                      <img style="height:50px; object-fit: cover;" src="/web/img/post/67cac19a72302.jpeg" alt="Image placeholder">
                    </div>
                    <div class="comment-body">
                      <h3>@Epic-cw3km</h3>
                      <div class="meta">January 5, 2024 at 2:40pm</div>
                      <p>I just got a puppy 3 days ago right before you posted this😞</p>
                      <p data-bs-toggle="modal" data-bs-target="#not_available"><a href="#" class="reply rounded">Reply</a></p>
                    </div>


                    <ul class="children">
                      <li class="comment">
                        <div class="vcard">
                          <img style="height:50px; object-fit: cover;" src="/web/img/Proflie/profile-blank-icon-empty-photo-600nw-535853269.webp" alt="Image placeholder">
                        </div>
                        <div class="comment-body">
                          <h3>@aldoolivares8235</h3>
                          <div class="meta">January 5, 2018 at 3:05pm</div>
                          <p>Question: Can you teach a dog in a different language?</p>
                          <p data-bs-toggle="modal" data-bs-target="#not_available"><a href="#" class="reply rounded">Reply</a></p>
                        </div>

                        <ul class="children">
                          <li class="comment">
                            <div class="vcard">
                              <img style="height:50px; object-fit: cover;" src="/web/img/Proflie/profile-blank-icon-empty-photo-600nw-535853269.webp" alt="Image placeholder">
                            </div>
                            <div class="comment-body">
                              <h3>@ghiandesilva9142</h3>
                              <div class="meta">January 5, 2024 at 4:24pm</div>
                              <p>Getting 8 week old Cane Corso.  Any help would be appreciated.  Love the sight.</p>
                              <p data-bs-toggle="modal" data-bs-target="#not_available"><a href="#" class="reply rounded">Reply</a></p>
                            </div>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>

              <li class="comment">
                <div class="vcard">
                  <img style="height:50px; object-fit: cover;" src="/web/img/Proflie/profile-blank-icon-empty-photo-600nw-535853269.webp" alt="Image placeholder">
                </div>
                <div class="comment-body">
                  <h3>@TheSilentScreamX</h3>
                  <div class="meta">January 9, 2018 at 2:21pm</div>
                  <p>Thanks for these videos. We've just put a deposit down on a Great Pyrenees/Spanish Mastiff mix so I'm bingeing these videos to be as prepared as possible! The toy aisle bit made me laugh though because my last dog was a 60kg Bullmastiff and those rope toys were literally the only toys I could buy him that wouldn't be utterly destroyed in less than a day! 😂</p>
                  <p data-bs-toggle="modal" data-bs-target="#not_available"><a href="#" class="reply rounded">Reply</a></p>
                </div>
              </li>
            </ul>
            <!-- END comment-list -->

            <div class="comment-form-wrap pt-5">
              <h3 class="mb-5">Leave a comment</h3>
              <form  onsubmit="return false" action="#" class="p-5 bg-light">
               <!-- <div class="form-group">
                  <label for="name">Name *</label>
                  <input type="text" class="form-control" id="name">
                </div>
                <div class="form-group">
                  <label for="email">Email *</label>
                  <input type="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                  <label for="website">Website</label>
                  <input type="url" class="form-control" id="website">
                </div>-->

                <div class="form-group">
                  <label for="message">Message</label>
                  <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <input data-bs-toggle="modal" data-bs-target="#not_available" type="submit" value="Post Comment" class="btn btn-primary">
                </div>

              </form>
            </div>
          </div>

        </div>

        <!-- END main-content -->

        <div class="col-md-12 col-lg-4 sidebar" style="position: static;">
          <div class="sidebar-box search-form-wrap">
            <form action="#" class="sidebar-search-form">
             <!-- <span class="bi-search"></span>-->
              <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
            </form>
          </div>
          <!-- END sidebar-box -->
          <div class="sidebar-box">
            <div v-if="loadcontent">

<div class="row  skeleton-loader d-flex align-items-center justify-content-center">
    <div class="col align-self-center">
      <div class="center-div">
          <div class="avatar-skeleton"></div>
                <div class="skeleton-loader"></div>
     
      </div>
      

    </div>
    
  </div>


              
              </div>

            <div v-if="!loadcontent" class="bio text-center">



              <img :src="datafrombackend.avatar_path" alt="Image Placeholder" class="img-fluid mb-3 img-cover-post">
              <div class="bio-body">
                <h2>@{{datafrombackend.nickname}}</h2>
                <p class="mb-4">{{datafrombackend.profile_description}}</p>
                <p><a style="border-radius: 50em !important;" data-bs-toggle="modal" data-bs-target="#not_available" class="btn btn-outline-primary  px-3 py-3">Subscribe</a></p>

                <p><a style="border-radius: 50em !important;" data-bs-toggle="modal" data-bs-target="#not_available" class="btn btn-primary px-3 py-3">Show more posts</a></p>
            
              </div>

            </div>
          </div>
          <!-- END sidebar-box -->  
          <div class="sidebar-box">
            <h3 class="heading">Ads</h3>
            <div class="post-entry-sidebar">
              <ul>
                <li>
                  <a href="https://www.sti.edu/" target="_blank">
                    <img src="images/sti_edu.jpg" alt="Image placeholder" class="me-4 rounded">
                    <div class="text">
                      <h4>STI College. Be Future-Ready. Be STI.</h4>
                      <div class="post-meta">
                        <span class="mr-2">Sponsor</span>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="https://furpawstopia.mcdir.me/singleproduct/9" target="_blank">
                    <img src="/web/img/market/67c46a30c4790.jpeg" alt="Image placeholder" class="me-4 rounded">
                    <div class="text">
                      <h4>Wanna buy Pure golden retriever?</h4>
                      <div class="post-meta">
                        <span class="mr-2">Sponsor</span>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="https://one.sti.edu/" target="_blank">
                    <img src="images/bg_1.jpg" alt="Image placeholder" class="me-4 rounded">
                    <div class="text">
                      <h4>OneSti Portal</h4>
                      <div class="post-meta">
                        <span class="mr-2">Sponsor</span>
                      </div>
                    </div>
                  </a>
                </li>
                <!--<li>
                  <a href="">
                    <img src="images/img_2_sq.jpg" alt="Image placeholder" class="me-4 rounded">
                    <div class="text">
                      <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                      <div class="post-meta">
                        <span class="mr-2">March 15, 2018 </span>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="">
                    <img src="images/img_3_sq.jpg" alt="Image placeholder" class="me-4 rounded">
                    <div class="text">
                      <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                      <div class="post-meta">
                        <span class="mr-2">March 15, 2018 </span>
                      </div>
                    </div>
                  </a>
                </li>-->
              </ul>
            </div>
          </div>
          <!-- END sidebar-box -->

          <div class="sidebar-box">
            <h3 class="heading">Categories</h3>
            <ul data-bs-toggle="modal" data-bs-target="#not_available" class="categories">
              <li><a href="#">Dogs <span>(57)</span></a></li>
              <li><a href="#">Cats <span>(23)</span></a></li>
              <li><a href="#">All pets <span>(80)</span></a></li>
              <li><a href="#">Rabbits <span>(0)</span></a></li>
              <li><a href="#">Birds <span>(0)</span></a></li>
            </ul>
          </div>
          <!-- END sidebar-box -->

          <div class="sidebar-box">
            <h3 class="heading">Tags</h3>
            <ul data-bs-toggle="modal" data-bs-target="#not_available" class="tags">
              <li><a href="#">Dogs</a></li>
              <li><a href="#">Puppies</a></li>
              <li><a href="#">Goldenretriver</a></li>
              <li><a href="#">Golden</a></li>
              <li><a href="#">Dogcarre</a></li>
              <li><a href="#">Freelancing</a></li>
              <li><a href="#">Guide</a></li>
              <li><a href="#">Dogowners</a></li>
              <li><a href="#">Dogguide</a></li>
              <li><a href="#">Pets</a></li>
              <li><a href="#">Goldenretriverpuppy</a></li>
            </ul>
          </div>
        </div>
        <!-- END sidebar -->

      </div>
    </div>
  </section>


  <!-- Start posts-entry -->
  <section class="section posts-entry posts-entry-sm bg-light">
    <div class="container">
      <div class="row mb-4">
        <div class="col-12 text-uppercase text-black">More Blog Posts</div>
      </div>
      <div class="row">
        
        <?php foreach($posts_recent as $post): ?>
        <div class="col-md-6 col-lg-3">
          <div class="blog-entry">
           
              <img style="object-fit: cover; width: 100%; height: 250px;" src="<?=$post['img_path']?>" alt="Image" class="img-fluid">
          
            <span class="date"><?=$post['date']?></span>
            <h2><a href="single.html"><?=$post['title']?></p>
            <p><a href="/postsingle#<?=$post['id']?>" class="read-more">Continue Reading</a></p>
          </div>
        </div>
        <?php endforeach; ?>
       <!-- <div class="col-md-6 col-lg-3">
          <div class="blog-entry">
            <a href="single.html" class="img-link">
              <img src="images/img_2_horizontal.jpg" alt="Image" class="img-fluid">
            </a>
            <span class="date">Apr. 14th, 2022</span>
            <h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            <p><a href="#" class="read-more">Continue Reading</a></p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="blog-entry">
            <a href="single.html" class="img-link">
              <img src="images/img_3_horizontal.jpg" alt="Image" class="img-fluid">
            </a>
            <span class="date">Apr. 14th, 2022</span>
            <h2><a href="single.html">UK sees highest inflation in 30 years</a></h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            <p><a href="#" class="read-more">Continue Reading</a></p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="blog-entry">
            <a href="single.html" class="img-link">
              <img src="images/img_4_horizontal.jpg" alt="Image" class="img-fluid">
            </a>
            <span class="date">Apr. 14th, 2022</span>
            <h2><a href="single.html">Don’t assume your user data in the cloud is safe</a></h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            <p><a href="#" class="read-more">Continue Reading</a></p>
          </div>
        </div>-->
      </div>
    </div>
  </section>
  <!-- End posts-entry -->

  <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
      <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>