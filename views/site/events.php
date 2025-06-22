<!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
      <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>

<div id="scrolltop">
	
</div>


<div class="container-fluid">

  <div class="row">

<div class="col-md-8 col-12 main-content mt-3">

  <div class="row">
  <div v-if="loadcontent" class="col-md-4 my-3">
<div class="card shadow">
  <div style="height: 210px;"  class="skeleton-loader"></div>
  <div class="card-body">
    <div style="height: 20px;"  class="skeleton-loader"></div>
    <div style="height: 50px;"  class="skeleton-loader"></div>
    
    <div style="height: 40px; width: 90px;"  class="skeleton-loader"></div>
  </div>
  </div>
</div>

  <div v-if="loadcontent" class="col-md-4 my-3">
<div class="card shadow">
  <div style="height: 210px;"  class="skeleton-loader"></div>
  <div class="card-body">
    <div style="height: 20px;"  class="skeleton-loader"></div>
    <div style="height: 50px;"  class="skeleton-loader"></div>
    
    <div style="height: 40px; width: 90px;"  class="skeleton-loader"></div>
  </div>
  </div>
</div>

  <div v-if="loadcontent" class="col-md-4 my-3">
<div class="card shadow">
  <div style="height: 210px;"  class="skeleton-loader"></div>
  <div class="card-body">
    <div style="height: 20px;"  class="skeleton-loader"></div>
    <div style="height: 50px;"  class="skeleton-loader"></div>
    
    <div style="height: 40px; width: 90px;"  class="skeleton-loader"></div>
  </div>
  </div>
</div>
<div v-if="paginatedProductsValue.length === 0 && !loadcontent">
 <h2 class="mt-3"> No products available for this category</h2>
</div>

 <div v-if="!loadcontent" v-for="(item, key, index) in paginatedProductsValue" class="col-md-4 my-3 d-flex align-items-stretch">
  <div class="card shadow w-100">
    <img style="height: 210px; object-fit: cover;" :src="item.img_path" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">{{ item.title }}</h5>
      <span class="mr-2"><i class="fa-solid fa-clock"></i> {{ item.event_date }} <a v-if="isPastEvent(item.event_date)">(Ended)</a> </span> <br>

      <span class="mr-2"><i class="fa-solid fa-location-dot"></i> {{ item.location }} </span> <br>
      
      
      <button 
        data-bs-toggle="modal" 
        data-bs-target="#not_available" 
        class="btn btn-primary mt-2" 
        :disabled="isPastEvent(item.event_date)">
        <i class="fa-solid fa-user-plus"></i> Join
      </button>

      <button 
        data-bs-toggle="modal" 
        data-bs-target="#not_available" 
        class="btn btn-primary mt-2" 
        :disabled="isPastEvent(item.event_date)">
        <i class="fa-solid fa-calendar-days"></i> Add in calendar
      </button>
    </div>
  </div>
</div>


</div>
<div class="col-12">
  <nav aria-label="Page navigation example">
    <ul class="pagination">
      <li style="cursor:pointer;" class="page-item">
        <a class="page-link" 
           aria-label="Previous" 
           :disabled="currentPage === 1" 
           @click="currentPage > 1 && changePage(currentPage - 1)">
          <span aria-hidden="true">&laquo;</span>
          <span class="sr-only">Previous</span>
        </a>
      </li>
      
      <li v-for="page in totalPagesValue" :key="page" style="cursor:pointer;" class="page-item" :class="{ active: page === currentPage }" @click="changePage(page)">
        <a class="page-link">{{ page }}</a>
      </li>
      
      <li style="cursor:pointer;" class="page-item">
        <a class="page-link" 
           aria-label="Next" 
           :disabled="currentPage === totalPagesValue" 
           @click="currentPage < totalPagesValue && changePage(currentPage + 1)">
          <span aria-hidden="true">&raquo;</span>
          <span class="sr-only">Next</span>
        </a>
      </li>
    </ul>
  </nav>
</div>

</div>

<!-- main content end-->

<div class="col-md-4 col-12 sidebar px-md-5" style="position: static;">

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
              </ul>
            </div>
          </div>
          

</div>





</div>
</div>