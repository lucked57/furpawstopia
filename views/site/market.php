<!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
      <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>

<div id="scrolltop">
	
</div>

<div v-if="currentrul == 'market'" class="container-fluid">

  <div class="row">

<div class="col-md-8 col-12 main-content mt-3">

	<div class="row">
    <div v-if="loadcontent" class="col-12">
  <div style="height: 50px; width: 203px;"  class="skeleton-loader"></div>
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

<div v-if="!loadcontent" class="col-12">
  <form class="bd-search position-relative me-auto">
      <span class="algolia-autocomplete algolia-autocomplete-left" style="position: relative; display: inline-block; direction: ltr;">
        <input @input="search_in_market" v-model="search" type="search" class="form-control ds-input" id="search-input" placeholder="Search..." aria-label="Search docs for..." autocomplete="off" data-bd-docs-version="5.0" spellcheck="false" role="combobox" aria-autocomplete="list" aria-expanded="false" aria-owns="algolia-autocomplete-listbox-0" dir="auto" style="position: relative; vertical-align: top;">
        <pre aria-hidden="true" style="position: absolute; visibility: hidden; white-space: pre; font-family: system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, &quot;Liberation Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px; font-style: normal; font-variant: normal; font-weight: 400; word-spacing: 0px; letter-spacing: normal; text-indent: 0px; text-rendering: auto; text-transform: none;">afa</pre><span class="ds-dropdown-menu ds-with-1" role="listbox" id="algolia-autocomplete-listbox-0" style="position: absolute; top: 100%; z-index: 100; left: 0px; right: auto; display: none;"><div class="ds-dataset-1"></div></span></span>
    </form>
</div>

	<div v-if="!loadcontent" v-for="(item, key, index) in paginatedProductsValue" class="col-md-4 my-3 d-flex align-items-stretch">
  <div class="card shadow w-100">
        <img style="height: 210px; object-fit: cover;" :src="item.path" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ item.title }}</h5>
            <!--<p class="card-text">{{ truncateDescription(item.description) }}</p>-->
            <div class="post-meta">
                        <span class="mr-2">{{item.date}} </span>
                      </div>
            <button class="btn btn-primary" @click="changeurl('/singleproduct/' + item.id, 'singleproduct', 'singleproduct/')">
                Buy ₱{{ item.price }}
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
            <h3 class="heading">Categories</h3>
            <ul v-if="loadcontent" class="categories">
              <li>
                <div style="height: 20px;"  class="skeleton-loader"></div>
              </li>
              <li>
                <div style="height: 20px;"  class="skeleton-loader"></div>
              </li>
              <li>
                <div style="height: 20px;"  class="skeleton-loader"></div>
              </li>
              <li>
                <div style="height: 20px;"  class="skeleton-loader"></div>
              </li>
              <li>
                <div style="height: 20px;"  class="skeleton-loader"></div>
              </li>
            </ul>
            <ul v-if="!loadcontent" class="categories">
              <li><a style="cursor: pointer;" @click="ShowCategory(0)" class="text-primary">Show all </a></li>
              <?php foreach($categories as $category): ?>
            <li>
                <a style="cursor: pointer;" @click="ShowCategory(<?=$category['id']?>)" class="text-primary">
                    <?=$category['name']?> <span>({{ getCategoryCount(<?=$category['id']?>) }})</span>
                </a>
            </li>
        <?php endforeach; ?>
            </ul>
          </div>

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

<div v-if="currentrul == 'singleproduct'">
<div class="site-cover site-cover-sm same-height overlay single-page" v-bind:style="{ 'background-image': 'url(' + currentrul_element_img + ')' }">
    <div class="container">
      <div class="row same-height justify-content-center">
        <div class="col-md-6">
          <div class="post-entry text-center">
            <h1 class="mb-4">{{currentrul_element.title}}</h1>
            <div class="post-meta align-items-center text-center">
               
              <span class="d-inline-block mt-1">₱{{currentrul_element.price}}</span>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
<section class="section">
    	<div class="container">

      <div class="row blog-entries element-animate">

        <div class="col-md-6 main-content text-center"> <!--d-none d-md-block-->
        	


          <img style="max-width: 80%;" :src="currentrul_element_img" class="img-fluid" alt="...">
        


        	
        </div>
        <div class="col-md-6">
        	<button href="javascript:void(0)" class="btn btn-primary mt-4" @click="changeurl('/buyproduct/' + currentrul_id,'buyproduct','buyproduct')">Buy ₱{{currentrul_element.price}}</button> <br> <br>

        	{{currentrul_element.description}}
        </div>
    </div>
</div>
    </section>

	</div>


	<div v-if="currentrul == 'buyproduct'">
		<div class="container-fluid">
			<div class="row g-3 my-5">

				<div class="row">
					<div class="col-12">
						Price - ₱{{currentrul_element.price}}
					</div>
          <div class="row">
            <div class="col-md-2 col-6">
              <img style="height: 150px;object-fit: cover;object-position: center center;" src="/web/img/icon/gcash.jpg" class="img-fluid rounded">
            </div>
            <div class="col-md-2 col-6">
              <img style="height: 150px;object-fit: cover;object-position: center center;" src="/web/img/icon/mastercard.JPG" class="img-fluid rounded">
            </div>
            <div class="col-md-2 col-6">
              <img style="height: 150px;object-fit: cover;object-position: center center;" src="/web/img/icon/visa.PNG" class="img-fluid rounded">
            </div>
            <div class="col-md-2 col-6">
              <img style="height: 150px;object-fit: cover;object-position: center center;" src="/web/img/icon/dragonpay.PNG" class="img-fluid rounded">
            </div>
            
            <div class="col-md-2 col-6">
              <img style="height: 150px;object-fit: cover;object-position: center center;" src="/web/img/icon/paymaya.JPG" class="img-fluid rounded">
            </div>
            <div class="col-md-2 col-6">
              <img style="height: 150px;object-fit: cover;object-position: center center;" src="/web/img/icon/paypal.PNG" class="img-fluid rounded">
            </div>
            
          </div>
					<div class="col-12">
						
  <!--<div class="col-auto">
    <label for="staticEmail2" class="visually-hidden">Your card number</label>
    <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="Your card number">
  </div>
  <div class="col-auto">
    <label for="inputPassword2" class="visually-hidden">9999-9999-9999-9999</label>
    <input style="max-width:350px;" type="number" class="form-control" id="inputPassword2" placeholder="9999-9999-9999-9999">
  </div>-->

  

  
</div>
					</div>
          <div class="row">

					<div class="col-12">
						<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
    I have confirmed the buying
  </label>
</div>
<div class="col-auto">
    <button data-bs-toggle="modal" data-bs-target="#not_available" type="submit" class="btn btn-primary mb-3">Confirm</button>
  </div>
					</div>
				</div>
  


</div>
		</div>

	</div>