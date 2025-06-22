<!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
      <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>


    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4 d-none d-md-block">
          
        </div>
        <div class="col-md-4 mt-2">



<div v-if="loadcontent">
  <div class="row  d-flex align-items-center justify-content-center">
    <div class="col align-self-center">
      <div class="center-div">
        <div style="width: 150px; height: 150px;" class="avatar-skeleton"></div>
      
        <div  class="skeleton-loader"></div>
        <div style="height: 75px;"  class="skeleton-loader"></div>
        <div  class="skeleton-loader"></div>
        <div  class="skeleton-loader"></div>
     
      </div>
      

    </div>
    
  </div>
  
</div>
            
          

          <div v-if="!loadcontent" class="sidebar-box">
            <div class="bio text-center">
              <img style="width: 150px; height: 150px; object-fit: cover;" :src="datafrombackend.img_path" alt="Image Placeholder" class="img-fluid mb-3">

              <div class="bio-body">
                <h2>{{datafrombackend.name}}</h2>
                <h2>@{{datafrombackend.nickname}}</h2>
                <p><i style="color:black; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#not_available"><i class="fa-solid fa-pen-to-square"></i>Edit</i> Description: {{datafrombackend.description}} <br>
                  <i style="color:black; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#not_available"><i class="fa-solid fa-pen-to-square"></i>Edit</i> Breed: {{datafrombackend.breed}} <br>
                  <i style="color:black; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#not_available"><i class="fa-solid fa-pen-to-square"></i>Edit</i> Type: {{datafrombackend.type}} <br>
                Created {{datafrombackend.date_created}}</p>
           
                <p>
                  <button data-bs-toggle="modal" data-bs-target="#exampleModal" style="border-radius: 50em !important;" class="btn btn-dark btn-sm rounded px-2 py-2"><i class="fa-solid fa-key"></i> Change password</button>
                </p>

                <form onsubmit="return false">

 
 <div class="form-group">
   <label for="file" class="form-label">New avatar</label>
  <input class="form-control" type="file" id="file" accept="image/*">
  </div>
  <div v-if="load">
    <p id="loadingcomplete"></p>
  </div>
  <div v-if="load" class="spinner-border text-primary mb-2" role="status">
  <span class="visually-hidden">Загрузка...</span>
</div>
  <button type="submit" id="send_file" v-on:click="uploadphoto" class="btn btn-primary btn-sm px-2 py-2"><i class="fa-solid fa-image"></i> Update avatar</button>
</form>

                
             
               
            
              </div>
            </div>
          </div>

        </div>
        <div class="col-md-4 d-none d-md-block">
          
        </div>

        <div class="col-md-2 d-none d-md-block">
          
        </div>

        <div class="col-md-8">
          <div class="sidebar-box">
            <h3 class="heading">Market</h3>
            <a href="/addproduct" style="border-radius: 50em !important;" class="btn btn-primary btn-sm rounded px-2 py-2"><i class="fa-solid fa-plus"></i> Add new product</a> 


            <div v-if="loadcontent_2">
  <div class="row mt-5 justify-content-center">
    <div class="col-12">

      <div class="row">
        <div class="col-md-3 col-lg-2 col-4">
          <div style="width: 100px; height: 100px"  class="skeleton-loader"></div>
        </div>
        <div class="col-md-9 col-lg-10 col-8">
          <div style="width:200px;" class="skeleton-loader mt-3"></div>
          <div style="width: 100px;" class="skeleton-loader"></div>
        </div>
      </div>
      
        
        
     
      

    </div>
    
  </div>
  
</div>



            <div v-if="!loadcontent_2 && !submitted_1" class="post-entry-sidebar mt-5">
              <ul>
                <li v-for="(item,key,index) in datafrombackend_2">

                  <a style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#not_available" class="heading mb-0"><i class="fa-solid fa-pen-to-square"></i> Edit</a>

                  <a style="cursor:pointer;" @click="delete_post('market', item.id)" class="heading mb-0"><i class="fa-solid fa-trash"></i> Delete</a>

                  <a :href="'singleproduct/' + item.id">
                    <img :src="item.path" alt="Image placeholder" class="me-4 rounded img-cover-post">
                    <div class="text">
                      <h4>{{item.title}}</h4>
                      <div class="post-meta">
                        <span class="mr-2">{{item.date}} </span>

                        
                      </div>

                    </div>

                  </a>

                </li>
              </ul>
            </div>

            <h3 class="heading mt-3">My Posts</h3>
            <a href="/addpost" style="border-radius: 50em !important;" class="btn btn-primary btn-sm rounded px-2 py-2"><i class="fa-solid fa-plus"></i> Add new post</a> 


            
  


            <div v-if="loadcontent_1">
  <div class="row mt-5 justify-content-center">
    <div class="col-12">

      <div class="row">
        <div class="col-md-3 col-lg-2 col-4">
          <div style="width: 100px; height: 100px"  class="skeleton-loader"></div>
        </div>
        <div class="col-md-9 col-lg-10 col-8">
          <div style="width:200px;" class="skeleton-loader mt-3"></div>
          <div style="width: 100px;" class="skeleton-loader"></div>
        </div>
      </div>
      
        
        
     
      

    </div>
    
  </div>
  
</div>



            <div v-if="!loadcontent_1 && !submitted" class="post-entry-sidebar mt-5">
              <ul>
                <li v-for="(item,key,index) in datafrombackend_1">
                  <a style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#not_available" class="heading mb-0"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                  <a style="cursor:pointer;" @click="delete_post('post', item.id)" class="heading mb-0"><i class="fa-solid fa-trash"></i> Delete</a>
                  <a :href="'/postsingle#' + item.id">
                    <img :src="item.img_path" alt="Image placeholder" class="me-4 rounded img-cover-post">
                    <div class="text">
                      <h4>{{item.title}}</h4>
                      <div class="post-meta">
                        <span class="mr-2">{{item.date}} </span>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </div>


            <h3 class="heading mt-3">My events</h3>
            <a href="/addevent" style="border-radius: 50em !important;" class="btn btn-primary btn-sm rounded px-2 py-2"><i class="fa-solid fa-plus"></i> Add new event</a> 


             <div v-if="loadcontent_3">
  <div class="row mt-5 justify-content-center">
    <div class="col-12">

      <div class="row">
        <div class="col-md-3 col-lg-2 col-4">
          <div style="width: 100px; height: 100px"  class="skeleton-loader"></div>
        </div>
        <div class="col-md-9 col-lg-10 col-8">
          <div style="width:200px;" class="skeleton-loader mt-3"></div>
          <div style="width: 100px;" class="skeleton-loader"></div>
        </div>
      </div>
    </div>
    
  </div>
  
</div>


<div v-if="!loadcontent_3 && !submitted" class="post-entry-sidebar mt-5">
              <ul>
                <li v-for="(item,key,index) in products">
                  <a style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#not_available" class="heading mb-0"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                  <a style="cursor:pointer;" @click="delete_post('post', item.id)" class="heading mb-0"><i class="fa-solid fa-trash"></i> Delete</a>
                  <a :href="'/postsingle#' + item.id">
                    <img :src="item.img_path" alt="Image placeholder" class="me-4 rounded img-cover-post">
                    <div class="text">
                      <h4>{{item.title}}</h4>
                      <div class="post-meta">
                        <span class="mr-2">{{item.date}} </span>
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