
var edittexglobal;

function getCookie(name) {
  let matches = document.cookie.match(new RegExp(
    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}

function setCookie(name, value, options = {}) {

  options = {
    path: '/',
    // при необходимости добавьте другие значения по умолчанию
    ...options
  };

  if (options.expires instanceof Date) {
    options.expires = options.expires.toUTCString();
  }

  let updatedCookie = encodeURIComponent(name) + "=" + encodeURIComponent(value);

  for (let optionKey in options) {
    updatedCookie += "; " + optionKey;
    let optionValue = options[optionKey];
    if (optionValue !== true) {
      updatedCookie += "=" + optionValue;
    }
  }

  document.cookie = updatedCookie;
}

function deleteCookie(name) {
  setCookie(name, "", {
    'max-age': -1
  })
}


function validateEmail(email) {
    var re = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
    return re.test(String(email).toLowerCase());
  }

 
google.charts.load('current', {'packages':['corechart', 'controls']});




const EventHandling = {
  data() {
    return {
      search:"",
      post_image_upload_preview:false,
      post_image_upload: "",
      datetime:'',
      location:'',
      event_only: false,
      loadcontent_2:false,
      datafrombackend_2:false,
      totalPagesValue:0,
      paginatedProductsValue:[],
      currentPage: 1,
      itemsPerPage: 15,
      error: false,
      flag:"",
      id:0,
      edittext:"",
      load:false,
      title:"",
      text:"",
      flag: false,
      email: "",
      subject: "",
      text: "",
      name: "",
      file:"",
      errorshow: [],
      email:'',
      password:'',
      isDisabled:false,
      emailBlured : false,
      valid : false,
      submitted : false,
      submitted_1 : false,
      passwordBlured:false,
      passwordchangeBlured:false,
      passwordchangeagainBlured:false,
      passwordchange:"",
      passwordchangeagain:"",
      username:"",
      usernameBlured:false,
      phone:"",
      phoneBlured:false,
      email_error:'Не валидный email',
      password_error:'Минимум 8 символов и 1 заглавная буква',
      users_telegram:40,
      users_week_seller:15,
      users_week_buyer:10,
      users_week_web:14,
      loadcontent:false,
      loadcontent_1:false,
      loadcontent_3:false,
      datafrombackend:"",
      datafrombackend_1:"",
      breed:false,
      type:false,
      description:"",
      color:"",
      name:"",
      nickname:"",
      currentrul:"",
      products_show: false,
      products:false,
      selectedCategory:false,
      price:false,
      selectedCategoryId: 0,
      /*products:[
        {id:'1',title:'Pure golden retriver',description:'Pure breed wooly golden retriver, Friendly and very sweet and strong immune system. Complete records and vaccines',price:699,path:window.location.protocol + "//" + window.location.host + '/web/img/post/6592a6fa0c77f.jpeg'},
        {id:'2',title:'Pure beagle',description:'Pure breed wooly beagle, Friendly and very sweet and strong immune system. Complete records and vaccines',price:499,path:window.location.protocol + "//" + window.location.host + '/web/img/post/65aa05719c700.jpeg'},
        {id:'3',title:'Pure husky, blue eyes',description:'Pure breed wooly husky, Friendly and very sweet and strong immune system. Complete records and vaccines',price:799,path:window.location.protocol + "//" + window.location.host + '/web/img/post/65aa03fa542a7.jpeg'},
        {id:'4',title:'Pure golden retriver',description:'Pure breed wooly golden retriver, Friendly and very sweet and strong immune system. Complete records and vaccines',price:699,path:window.location.protocol + "//" + window.location.host + '/web/img/post/6592a52622945.jpeg'},
        {id:'5',title:'Pure golden retriver',description:'Pure breed wooly golden retriver, Friendly and very sweet and strong immune system. Complete records and vaccines',price:699,path:window.location.protocol + "//" + window.location.host + '/web/img/post/6592a8070a928.jpeg'},
        {id:'6',title:'Pure golden retriver',description:'Pure breed wooly golden retriver, Friendly and very sweet and strong immune system. Complete records and vaccines',price:699,path:window.location.protocol + "//" + window.location.host + '/web/img/post/6592a634b4b10.jpeg'},
        {id:'7',title:'Pure golden retriver',description:'Pure breed wooly golden retriver, Friendly and very sweet and strong immune system. Complete records and vaccines',price:699,path:window.location.protocol + "//" + window.location.host + '/web/img/post/6592a514b4dd8.jpeg'},
        {id:'8',title:'Pure golden retriver',description:'Pure breed wooly golden retriver, Friendly and very sweet and strong immune system. Complete records and vaccines',price:699,path:window.location.protocol + "//" + window.location.host + '/web/img/post/6592a6fa0c77f.jpeg'},
        {id:'9',title:'Pure golden retriver',description:'Pure breed wooly golden retriver, Friendly and very sweet and strong immune system. Complete records and vaccines',price:699,path:window.location.protocol + "//" + window.location.host + '/web/img/post/6592a6fa0c77f.jpeg'},
        {id:'10',title:'Pure golden retriver',description:'Pure breed wooly golden retriver, Friendly and very sweet and strong immune system. Complete records and vaccines',price:699,path:window.location.protocol + "//" + window.location.host + '/web/img/post/6592a6fa0c77f.jpeg'},
        {id:'11',title:'Pure golden retriver',description:'Pure breed wooly golden retriver, Friendly and very sweet and strong immune system. Complete records and vaccines',price:699,path:window.location.protocol + "//" + window.location.host + '/web/img/post/6592a6fa0c77f.jpeg'},
        {id:'12',title:'Pure golden retriver',description:'Pure breed wooly golden retriver, Friendly and very sweet and strong immune system. Complete records and vaccines',price:699,path:window.location.protocol + "//" + window.location.host + '/web/img/post/6592a6fa0c77f.jpeg'},
      ],*/
      percentcompleteaxios:0,
      currentrul_id:0,
      currentrul_element:"",
      currentrul_element_img:'https://pchelykorolev.mcdir.ru/web/img/post/6592a6fa0c77f.jpeg',
    }
  },
  methods: {
    validate : function(){
this.emailBlured = true;
this.passwordBlured = true;
this.usernameBlured = true;
this.phoneBlured = true;
if( this.validEmail(this.email) && this.validPassword(this.password)){
this.valid = true;
}
else{
  this.valid = false;
}
},
search_in_market() {
       /* const searchTerm = this.search.trim().toLowerCase();

        if (searchTerm.length > 1) {
          this.products_show = this.products.filter(product =>
            product.title.toLowerCase().includes(searchTerm) ||
            (product.description && product.description.toLowerCase().includes(searchTerm))
          );
        } else {
          this.products_show = this.products;
        }

        this.currentPage = 1;
        this.updatePagination();*/
  this.filterProducts();
    },
updatePagination() {
        this.totalPagesValue = Math.ceil(this.products_show.length / this.itemsPerPage);
        const start = (this.currentPage - 1) * this.itemsPerPage;
        this.paginatedProductsValue = this.products_show.slice(start, start + this.itemsPerPage);
    },
ShowCategory : function(category_id){
  /*console.log(category_id);
  if(category_id == 0){
    this.products_show = this.products;
  }
  else{
   this.products_show = this.products.filter(product => String(product.category_id) === String(category_id));

  }
  this.currentPage = 1; 
  this.updatePagination(); */
  this.selectedCategoryId = category_id;
  this.filterProducts();
  
  },
filterProducts() {
  const searchTerm = this.search.trim().toLowerCase();

  this.products_show = this.products.filter(product => {
    const matchCategory =
      this.selectedCategoryId == 0 ||
      String(product.category_id) === String(this.selectedCategoryId);

    const matchSearch =
      searchTerm.length <= 1 ||
      product.title.toLowerCase().includes(searchTerm) ||
      (product.description && product.description.toLowerCase().includes(searchTerm));

    return matchCategory && matchSearch;
  });

  this.currentPage = 1;
  this.updatePagination();
},
  changePage(page) {
            if (page < 1 || page > this.totalPages) return;
            this.currentPage = page;
            this.updatePagination();
        },
  getCategoryCount: function(category_id) {
    return this.products.filter(
      product => String(product.category_id) === String(category_id)
    ).length;
  },
  truncateDescription(description) {
        if (!description) return "";
        
        let words = description.split(" ");
        let truncatedText = "";
        for (let word of words) {
            if ((truncatedText + word).length > 200) break;
            truncatedText += (truncatedText ? " " : "") + word;
        }
        
        return truncatedText + (description.length > truncatedText.length ? "..." : "");
    },
    imagechanged: function(){
        this.error = false;
        this.errorshowo = {};
        let formData = new FormData();
        let imagefile = document.querySelector('#file');
        if(Object.keys(this.errorshowo).length === 0 ){
          this.post_image_upload_preview = URL.createObjectURL(imagefile.files[0]);
          this.post_image_upload = imagefile.files[0];
        }
      },
    getPosts : function(){
      this.loadcontent = true;
                        let param = {
                              target: 'get_posts',
                      };
                      const str = JSON.stringify(param);
                      axios.post('/site/allposts', str)
                      .then(response => {
                       // this.itemsPerPage = 6;
                      this.loadcontent = false;
                              console.log(response.data); 
                              let data_from_backend = response.data;
                              let filtered_data;
                              //this.event_only = true;
                              if(!this.event_only){
                                 filtered_data = data_from_backend.filter(post => post.type !== "event");
                              }
                              else{
                                 filtered_data = data_from_backend.filter(post => post.type == "event");
                                 filtered_data = filtered_data.sort((a, b) => new Date(b.event_date) - new Date(a.event_date));
                              }
                              
                              console.log(filtered_data); 
                              this.products_show = filtered_data;
                              this.products = filtered_data;
                              this.updatePagination(); 
                            })
                            .catch(error => {
                            this.loadcontent = false;
                              console.log(error);
                              console.log(error.response.data.message);
                          });
      },
      getUserPosts : function(){
  this.error = false;

if(!this.error){
              var param = {
                    target: 'get_user_post',
            };
            const str = JSON.stringify(param);
            axios.post('/site/profile', str)
                .then(response => {
                  this.products = response.data;
                  

                  if(typeof this.products[0] == 'undefined'){
                    this.submitted = true;
                  }
                  else{
                    this.products = this.products.filter(post => post.type == "event");
                  }
                    //console.log(response.data); 
                    this.loadcontent_3 = false;
                    console.log("user posts");
                    console.log(this.products);
                    
                })

                .catch(error => {
                    console.log(error);
                    console.log(error.response.data.message);
                    this.loadcontent_3 = false;
                });
      
}
},
      isPastEvent(eventDate) {
    const today = new Date().setHours(0, 0, 0, 0);
    const event = new Date(eventDate).setHours(0, 0, 0, 0);
    return event < today;
  },
loadMarket : function(page = false){
  let hrefthis = window.location.href;
  this.loadcontent = true;
                        let param = {
                              target: 'get_market',
                      };
                      const str = JSON.stringify(param);
                      axios.post('/site/market', str)
                          .then(response => {
                            this.loadcontent = false;
                              console.log(response.data); 
                              this.products_show = response.data;
                              this.products = response.data;
                              this.updatePagination(); 
                              if(page == "singleproduct"){
                                 this.currentrul = 'singleproduct';
                                  document.title = 'singleproduct';
                                  let metaTag = document.querySelector('meta[name="description"]');
                                  if (metaTag) {
                                    metaTag.setAttribute("content", "singleproduct description");
                                  }
                                  //this.currentrul_id = hrefthis.slice(hrefthis.lastIndexOf('/') + 1);
                                  this.currentrul_id = Number(hrefthis.slice(hrefthis.lastIndexOf('/') + 1)); 
                                  console.log(this.currentrul_id); //returns id (correct)
                                  console.log(this.products.find(({ id }) => id === this.currentrul_id)); //returns undefinnd (fix it)
                                  console.log(this.products); // returns array
                                  this.currentrul_element = this.products.find(({ id }) => id === this.currentrul_id);
                                  console.log(this.currentrul_element);
                                  if (this.currentrul_element) {
                                      this.currentrul_element_img = this.currentrul_element.path;
                                  } else {
                                      console.error("Element not found!");
                                  }
                              }
                              if(page == 'buyproduct'){
                                this.currentrul = 'buyproduct';
                                this.currentrul_id = hrefthis.slice(hrefthis.lastIndexOf('/') + 1);
                                  //this.currentrul_element = this.products.find(({ id }) => id === this.currentrul_id);
                                this.currentrul_id = Number(hrefthis.slice(hrefthis.lastIndexOf('/') + 1)); 
                                this.currentrul_element = this.products.find(({ id }) => id === this.currentrul_id);
                                  console.log(this.currentrul_element);
                                  if (this.currentrul_element) {
                                      this.currentrul_element_img = this.currentrul_element.path;
                                  } else {
                                      console.error("Element not found!");
                                  }
                                  this.currentrul_element_img = this.currentrul_element.path;
                                document.title = 'buyproduct';
                                let metaTag = document.querySelector('meta[name="description"]');
                                    if (metaTag) {
                                      metaTag.setAttribute("content", "buyproduct description");
                                    }
                              }
                          })

                          .catch(error => {
                            this.loadcontent = false;
                              console.log(error);
                              console.log(error.response.data.message);
                          });
  },
checkurl : function(){
          let hrefthis = window.location.href;
                if(hrefthis.indexOf('market') > -1){
                  this.currentrul = 'market';
                    document.title = 'Furpawstopia market';
                    let metaTag = document.querySelector('meta[name="description"]');
                        if (metaTag) {
                          metaTag.setAttribute("content", "Market description");
                        }
                        if(this.products == false){
                          this.loadMarket();
                        }
                        
                        
                }
                if(hrefthis.indexOf('singleproduct') > -1){
                  if(this.products == false){
                          this.loadMarket('singleproduct');
                        }
                    else{
                      this.currentrul = 'singleproduct';
                    document.title = 'singleproduct';
                    let metaTag = document.querySelector('meta[name="description"]');
                        if (metaTag) {
                          metaTag.setAttribute("content", "singleproduct description");
                        }
                        //this.currentrul_id = hrefthis.slice(hrefthis.lastIndexOf('/') + 1);
                        this.currentrul_id = Number(hrefthis.slice(hrefthis.lastIndexOf('/') + 1)); 
                        console.log(this.currentrul_id);
                        this.currentrul_element = this.products.find(({ id }) => id === this.currentrul_id);
                        console.log("current element: "+ this.currentrul_element);
                        //this.currentrul_element_img = this.currentrul_element.path;
                        if (this.currentrul_element) {
                            this.currentrul_element_img = this.currentrul_element.path;
                        } else {
                            console.error("Element not found!");
                        }
                    }
                  
                }
                if(hrefthis.indexOf('buyproduct') > -1){
                  if(this.products == false){
                          this.loadMarket('buyproduct');
                        }
                  else{
                    this.currentrul = 'buyproduct';
                    document.title = 'buyproduct';
                    let metaTag = document.querySelector('meta[name="description"]');
                        if (metaTag) {
                          metaTag.setAttribute("content", "buyproduct description");
                        }
                  }
                  
                }
                //console.log(this.currentrul);
},
changeurl : function(url,title,description){
  console.log(url);
  window.history.pushState('data', 'title', url);
  let metaTag = document.querySelector('meta[name="description"]');
  if (metaTag) {
     metaTag.setAttribute("content", description);
  }
  document.title = title;
  //document.querySelector('.site-footer').classList.add("d-none");
  document.body.style.position = "fixed";
  document.body.style.width = '100%';
  //document.getElementsByTagName('html')[0].style.position = "fixed";
  this.checkurl();
  setTimeout(function(){ document.body.style.position = "static"; }, 10);
  
  //window.scrollTo({ top: 0, behavior: 'smooth' });
  //document.querySelector('.site-footer').classList.remove("d-none");
  let element = document.getElementById("app");
  //element.scrollIntoView();
  //window.scrollTo(0, 0);
  //setTimeout(function(){ window.scrollTo(0, 0); }, 100);
},
checkchangeurl:function(){
  window.addEventListener('popstate', () => 
                    this.checkurl()
                  );
},
validatepass : function(){
this.emailBlured = true;
this.passwordBlured = true;
this.usernameBlured = true;
this.phoneBlured = true;
this.passwordchangeBlured = true;
this.passwordchangeagainBlured = true;
if( this.validPassword(this.password) && this.validPassword(this.passwordchange) && this.validPassword(this.passwordchangeagain)){

  if(this.passwordchange.localeCompare(this.passwordchangeagain) == 0){

    if(this.password.localeCompare(this.passwordchange) == 0){
      this.valid = false;
      this.error = true;
      this.password_error = "Новый и старый пароль не должны совпадать";
    }
    else{
      this.valid = true;
      this.error = false;
    }

    
  }
  else{
    this.valid = false;
    this.error = true;
    this.password_error = "New passwords are different";
  }
  

}
else{
  this.valid = false;
  this.error = false;
}
},

validEmail : function(email) {
  if(!this.error){
    this.email_error = "Incorrect email";
  }
  
var re = /(.+)@(.+){2,}\.(.+){2,}/;
if(re.test(email.toLowerCase())){
  return true;
  }
},

validPassword : function(password) {
  if(!this.error){
    this.password_error = "Minimum 8 letters and one capital letter";
  }
   if (password.length > 7 && password !== password.toLowerCase()) {
    return true;
   }
},

botsendnotificationviabot:function(target,message,id){
        //this.botsendnotificationviabot('send_notification','Новая заявка на сайте','1417047628');
              var param = {
                    target: target,
                    message: message,
                    id: id,
            };
            const str = JSON.stringify(param);
            axios.post('https://week-api-bot.ru/web/botindex.php', str)
                .then(response => {
                    console.log(response.data); 
                })

                .catch(error => {
                    console.log(error);
                    console.log(error.response.data.message);

                });

      },

      createnewaccount : function(){
  this.error = false;
  if(this.description.trim().length == 0){
    this.error = 'description is empty';
  }
  if(this.color.trim().length == 0){
    this.error = 'color is empty';
  }
  if(this.name.trim().length == 0){
    this.error = 'name is empty';
  }
  if(this.nickname.trim().length == 0){
    this.error = 'nickname is empty';
  }
  if(!this.breed){
    this.error = "choose breed";
  }

  if(!this.type){
    this.error = "choose type";
  }
this.validate();
if(this.valid && !this.error){

      this.isDisabled = true;
              var param = {
                    target: 'createnewaccount',
                    email: this.email,
                    password: this.password,
                    description: this.description,
                    color: this.color,
                    type: this.type,
                    breed: this.breed,
                    name: this.name,
                    nickname: this.nickname,
            };
            const str = JSON.stringify(param);
            axios.post('/site/signup', str)
                .then(response => {
                  this.isDisabled = false;
                    console.log(response.data); 
                    
                    if(response.data == "account has been created"){
                      window.location = '/';
                    }
                    alert(response.data);
                })

                .catch(error => {
                  this.isDisabled = false;
                    console.log(error);
                    alert(error);
                    console.log(error.response.data.message);
                    //this.error = error.response.data.message;
                    this.email_error = error.response.data.message;
                    this.password_error = error.response.data.message;
                });
}
else{
  alert(this.error);
}
},

submitsignin : function(){
  this.error = false;
this.validate();
if(this.valid){

      this.isDisabled = true;
              var param = {
                    target: 'signin',
                    email: this.email,
                    password: this.password,
            };
            const str = JSON.stringify(param);
            axios.post('/site/login', str)
                .then(response => {
                  this.isDisabled = false;
                    console.log(response.data); 
                    if(response.data == "Данные приняты"){
                      window.location = '/';
                    }
                })

                .catch(error => {
                  this.isDisabled = false;
                    console.log(error);
                    console.log(error.response.data.message);
                    this.error = error.response.data.message;
                    this.email_error = error.response.data.message;
                    this.password_error = error.response.data.message;
                });
}
},
changepass : function(){
  this.error = false;
this.validatepass();
if(this.valid){
  //console.log('work');
            this.isDisabled = true;
              var param = {
                    target: 'changepass',
                    password: this.password,
                    password_new: this.passwordchange,
            };
            const str = JSON.stringify(param);
            axios.post('/site/login', str)
                .then(response => {
                  this.isDisabled = false;
                    console.log(response.data); 
                    alert(response.data);
                    
                })

                .catch(error => {
                  this.isDisabled = false;
                    console.log(error);
                    console.log(error.response.data.message);
                    this.error = error.response.data.message;
                    this.password_error = error.response.data.message;
                });
      
}
},
    //Изменение текста в БД
     editaxios: function (event) {
      document.querySelector('#save').disabled = true;
      document.querySelector('#close').disabled = true;
          var param = {
                    target: 'change',
                    id: this.id,
                    edittext: this.edittext,
            };
            const str = JSON.stringify(param);
            axios.post('/site/index', str)
                .then(function(response) {
                    alert(response.data); 
                    document.querySelector('#save').disabled = false;
                    document.querySelector('#close').disabled = false;   
                })
                .catch(function (error) {
                    console.log(error);
                    document.querySelector('#save').disabled = false;
                    document.querySelector('#close').disabled = false;
                });

    
  },
  validemail: function(email){
    var re = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
        return re.test(String(email).toLowerCase());
    },
  signinaxios: function(){
    console.log('work');
            this.error = false;
            this.errorshowo = {};
            if(typeof this.email == "undefined"){
                  this.errorshowo.email = 'Пожалуйста заполните поле';
               }
               else if(!this.validemail(this.email)){
                this.errorshowo.email = 'Пожалуйста укажите корректный email';
              }
              if(typeof this.password == "undefined"){
                this.errorshowo.password = 'Пожалуйста заполните поле';
              }
              else if(this.password.trim().length == 0){
                this.errorshowo.password = 'Пожалуйста заполните поле';
              }
              console.log(this.email);
              console.log(this.password);

            if(Object.keys(this.errorshowo).length === 0 ){
              this.isDisabled = true;
              var param = {
                    target: 'signin',
                    email: this.email,
                    password: this.password,
            };
            const str = JSON.stringify(param);
            axios.post('/site/login', str)
                .then(response => {
                  this.isDisabled = false;
                    console.log(response.data); 
                })

                .catch(error => {
                  this.isDisabled = false;
                    console.log(error);
                });

            }
  },
  signin: function(){
              var bodyFormData = new URLSearchParams({
            'username': 'b@b.b',
            'password': '123',
             });
              axios({
              method: "post",
              url: "https://week-app-api-dev.ru/webold/auth/sign-in", 
              data: bodyFormData,
              headers: { "Content-Type": "application/x-www-form-urlencoded", 'accept': 'application/json'},
            })
              .then(response => {
               
                
                    console.log(response.data);
                    var access_token = response.data.access_token;
                    var refresh_token = response.data.refresh_token;
                    var token_type = response.data.token_type;
                    var user_type = response.data.user_type;
                })

                .catch(error => {
                  //this.isDisabled = false;
                    console.log(error);
                    //this.errorshowo.password = 'Указан неверный логин или пароль';
                    //this.errorshowo.email = 'Указан неверный логин или пароль';
                    //typeof this.password == "undefined"

                    if (!error.response.data) {
                        //this.errorshowo.email = 'Error: Network Error' + error;
                        //this.errorshowo.password = 'Error: Network Error' + error;

                      }
                      else{
                        //this.errorshowo.password = 'Указан неверный логин или пароль';
                        //this.errorshowo.email = 'Указан неверный логин или пароль';
                      }
                });
            
      },
  //Вывод данные для input
  selecteditaxios: function () {
    document.querySelector('#save').disabled = true;
    document.querySelector('#close').disabled = true;
          var param = {
                    target: 'select',
                    id: this.id,
                    edittext: 'select',
            };
            //console.log(this.id);
            const str = JSON.stringify(param);
            axios.post('/site/index', str)
    .then(response => {
            //console.clear();
            this.edittext = response.data;
            console.log(this.edittext);
            document.querySelector('#save').disabled = false;
            document.querySelector('#close').disabled = false;
          })
          .catch(error => {
            console.log(error);
            document.querySelector('#save').disabled = false;
            document.querySelector('#close').disabled = false;
          });

  },
  //Загрузка поста
  uploadpost: function () {
    const config = {
    onUploadProgress: function(progressEvent) {
      var percentCompleted = Math.round((progressEvent.loaded * 100) / progressEvent.total);
      console.log(percentCompleted);
      //this.percentcompleteaxios = percentCompleted;
      document.querySelector('#loadingcomplete').innerHTML = percentCompleted + "%";
    }
  }

    document.querySelector('#send_file').disabled = true;
    this.load = true;
    var formData = new FormData();
    var imagefile = document.querySelector('#file');
    formData.append("image", imagefile.files[0]);
    formData.append("title", this.title);
    formData.append("text", this.text);
    var error = false;
    if(!imagefile.files[0]){
      error = "Select img";
    }
    if(this.title.length == 0){
      error = "Title is empty";
    }
    if(this.text.length == 0){
      error = "Text is empty";
    }
    if(!error){
    axios.post('/site/addpost', formData, config, {
        headers: {
          'Content-Type': 'multipart/form-data'
        }
    })
    .then(response => {
            alert(response.data);
            document.querySelector('#send_file').disabled = false;
            this.post_image_upload_preview = false;
            this.load = false;
            this.percentcompleteaxios = 0;
            this.title = "";
            this.text = "";
            document.querySelector('#file').value = "";
          })
          .catch(error => {
            alert(error);
            document.querySelector('#send_file').disabled = false;
            this.load = false;
            this.title = '';
            this.text = '';
            this.percentcompleteaxios = 0;
          });

          }
          else{
            alert(error);
            document.querySelector('#send_file').disabled = false;
            this.load = false;
          }
  },
  uploadevent: function () {
    const config = {
    onUploadProgress: function(progressEvent) {
      var percentCompleted = Math.round((progressEvent.loaded * 100) / progressEvent.total);
      console.log(percentCompleted);
      //this.percentcompleteaxios = percentCompleted;
      document.querySelector('#loadingcomplete').innerHTML = percentCompleted + "%";
    }
  }

    document.querySelector('#send_file').disabled = true;
    this.load = true;
    var formData = new FormData();
    var imagefile = document.querySelector('#file');
    formData.append("image", imagefile.files[0]);
    formData.append("title", this.title);
    formData.append("text", this.text);
    formData.append("location", this.location);
    formData.append("datetime", this.datetime);
    var error = false;
    if(!imagefile.files[0]){
      error = "Select img";
    }
    if(this.title.length == 0){
      error = "Title is empty";
    }
    if(this.text.length == 0){
      error = "Text is empty";
    }
    if(this.location.length == 0){
      error = "location is empty";
    }
    if(!error){
    axios.post('/site/addevent', formData, config, {
        headers: {
          'Content-Type': 'multipart/form-data'
        }
    })
    .then(response => {
            alert(response.data);
            document.querySelector('#send_file').disabled = false;
            this.load = false;
            this.post_image_upload_preview = false;
            this.percentcompleteaxios = 0;
            this.title = "";
            this.text = "";
            this.location = "";
            this.datetime = "";
            document.querySelector('#file').value = "";
          })
          .catch(error => {
            alert(error);
            document.querySelector('#send_file').disabled = false;
            this.load = false;
            this.title = '';
            this.text = '';
            this.percentcompleteaxios = 0;
          });

          }
          else{
            alert(error);
            document.querySelector('#send_file').disabled = false;
            this.load = false;
          }
  },
  uploadproduct: function () {
    const config = {
    onUploadProgress: function(progressEvent) {
      var percentCompleted = Math.round((progressEvent.loaded * 100) / progressEvent.total);
      console.log(percentCompleted);
      //this.percentcompleteaxios = percentCompleted;
      document.querySelector('#loadingcomplete').innerHTML = percentCompleted + "%";
    }
  }
var error = false;
  

    document.querySelector('#send_file').disabled = true;
    this.load = true;
    var formData = new FormData(); 
    var imagefile = document.querySelector('#file');
    formData.append("image", imagefile.files[0]);
    formData.append("title", this.title);
    formData.append("text", this.text);
    formData.append("category_id", this.selectedCategory);
    formData.append("price", this.price);
    
    if(!imagefile.files[0]){
      error = "Select img";
    }
    if(this.title.length == 0){
      error = "Title is empty";
    }
    if(this.text.length == 0){
      error = "Text is empty";
    }
    if(!this.price){
      error = "Select price";
    }
    if(!this.selectedCategory){
      error = "Select category";
    }
    if (confirm("You need to fill out your billing data before your product will be seen by other users, continue?") == true) {
  
} else {
  error = "You canceled!";
}
    if(!error){
    axios.post('/site/addproduct', formData, config, {
        headers: {
          'Content-Type': 'multipart/form-data'
        }
    })
    .then(response => {
            alert(response.data);
            document.querySelector('#send_file').disabled = false;
            this.load = false;
            this.post_image_upload_preview = false;
            this.percentcompleteaxios = 0;
            this.title = "";
            this.text = "";
            this.price = null;
            this.selectedCategory = null;
            document.querySelector('#file').value = "";
            document.querySelector('#loadingcomplete').innerHTML = "";
          })
          .catch(error => {
            console.log(error.response.data.message);
            alert(error.response.data.message);
            document.querySelector('#send_file').disabled = false;
            this.load = false;
            this.title = '';
            this.text = '';
            this.percentcompleteaxios = 0;
          });

          }
          else{
            alert(error);
            document.querySelector('#send_file').disabled = false;
            this.load = false;
          }
  },
  //load photo
  uploadphoto: function () {
    const config = {
    onUploadProgress: function(progressEvent) {
      var percentCompleted = Math.round((progressEvent.loaded * 100) / progressEvent.total);
      console.log(percentCompleted);
      //this.percentcompleteaxios = percentCompleted;
      document.querySelector('#loadingcomplete').innerHTML = percentCompleted + "%";
    }
  }
    document.querySelector('#send_file').disabled = true;
    this.load = true;
    var formData = new FormData();
    var imagefile = document.querySelector('#file');
    formData.append("image", imagefile.files[0]);
    var error = false;
    if(!imagefile.files[0]){
      error = "Select img";
    }
    if(!error){
    axios.post('/site/addphoto', formData, config,{
        headers: {
          'Content-Type': 'multipart/form-data'
        }
    })
    .then(response => {
            alert(response.data);
            document.querySelector('#send_file').disabled = false;
            this.load = false;
            this.loadcontent = true;
            this.getuserinfo();
          })
          .catch(error => {
            alert(error);
            document.querySelector('#send_file').disabled = false;
            this.load = false;
          });

          }
          else{
            alert(error);
            document.querySelector('#send_file').disabled = false;
            this.load = false;
          }
  },
  Sendemail() {
      
      console.log(email);
      var error = false;

      if (!validateEmail(this.email)){
        error = 'Некорректное значения email';
      }
      if(this.email == '' || this.name == '' || this.text == '' || this.subject == ''){
        error = 'Есть пустые значения';
      }

      if(this.flag){
        error = 'Данные уже были отправлены';
      }

      if(!error){
        document.querySelector('#send_file').disabled = true;
        this.load = true;
        this.flag = true;

        var bodyFormData = JSON.stringify({ 'email': this.email,'name': this.name,'text': this.text,'subject': this.subject });
              axios({
              method: "post",
              url: "/web/sendemail.php", 
              data: bodyFormData,
              headers: { "Content-Type": "application/json" },
            })
              .then(response => {
            //alert(response.data);
            document.querySelector('#send_file').disabled = false;
            this.load = false;
            if(response.data == '1' || response.data == 1){
                  alert('Данные успешно отправлены');
                }
                else{
                  alert(response.data);
                }
          })
          .catch(error => {
            alert(error);
            document.querySelector('#send_file').disabled = false;
            this.load = false;
          });
      }
      else{
        alert(error);
      }
      //console.log(this.comment);
    },
    gettype : function(){
  this.error = false;

if(!this.error){
              var param = {
                    target: 'select_type',
            };
            const str = JSON.stringify(param);
            axios.post('/site/signup', str)
                .then(response => {
                  this.datafrombackend_1 = response.data;
                    //console.log(response.data); 
                    this.loadcontent_1 = false;
                    console.log(this.datafrombackend_1);
                    
                })

                .catch(error => {
                    console.log(error);
                    console.log(error.response.data.message);
                    this.loadcontent_1 = false;
                });
      
}
},
    getbreed : function(){
  this.error = false;

if(!this.error){
              var param = {
                    target: 'select_breed',
            };
            const str = JSON.stringify(param);
            axios.post('/site/signup', str)
                .then(response => {
                  this.datafrombackend = response.data;
                    //console.log(response.data); 
                    this.loadcontent = false;
                    console.log(this.datafrombackend);
                    
                })

                .catch(error => {
                    console.log(error);
                    console.log(error.response.data.message);
                    this.loadcontent = false;
                });
      
}
},
getuserinfo : function(){
  this.error = false;

if(!this.error){
              var param = {
                    target: 'get_user_info',
            };
            const str = JSON.stringify(param);
            axios.post('/site/profile', str)
                .then(response => {
                  this.datafrombackend = response.data;
                    //console.log(response.data); 
                    this.loadcontent = false;
                    console.log(this.datafrombackend);
                    
                })

                .catch(error => {
                    console.log(error);
                    console.log(error.response.data.message);
                    this.loadcontent = false;
                });
      
}
},
getuserpost : function(){
  this.error = false;

if(!this.error){
              var param = {
                    target: 'get_user_post',
            };
            const str = JSON.stringify(param);
            axios.post('/site/profile', str)
                .then(response => {
                  this.datafrombackend_1 = response.data;
                  

                  if(typeof this.datafrombackend_1[0] == 'undefined'){
                    this.submitted = true;
                  }
                  else{
                    this.datafrombackend_1 = this.datafrombackend_1.filter(post => post.type !== "event");
                  }
                    //console.log(response.data); 
                    this.loadcontent_1 = false;
                    console.log("user posts");
                    console.log(this.datafrombackend_1);
                    
                })

                .catch(error => {
                    console.log(error);
                    console.log(error.response.data.message);
                    this.loadcontent_1 = false;
                });
      
}
},
getusermarket : function(){
  this.error = false;

if(!this.error){
              var param = {
                    target: 'get_user_market',
            };
            const str = JSON.stringify(param);
            axios.post('/site/profile', str)
                .then(response => {
                  this.datafrombackend_2 = response.data;

                  if(typeof this.datafrombackend_2[0] == 'undefined'){
                    this.submitted_1 = true;
                  }
                    //console.log(response.data); 
                    this.loadcontent_2 = false;
                    console.log(this.datafrombackend_2);
                    
                })

                .catch(error => {
                    console.log(error);
                    console.log(error.response.data.message);
                    this.loadcontent_2 = false;
                });
      
}
},
delete_post : function(type, id){
  this.error = false;

  if(confirm("Are you sure that you want to delete this?")){

if(!this.error){
              var param = {
                    target: 'delete_post',
                    type: type,
                    id: id,
            };
            const str = JSON.stringify(param);
            axios.post('/site/profile', str)
                .then(response => {
                  alert(response.data);
                  console.log(response.data);
                  window.location.reload();
                    
                })

                .catch(error => {
                    console.log(error);
                    console.log(error.response.data.message);
                    
                });
      
}
}
},
getpostinfo : function(id){
  this.error = false;

if(!this.error){
              var param = {
                    target: 'get_post_info',
                    id:id,
            };
            const str = JSON.stringify(param);
            axios.post('/site/profile', str)
                .then(response => {
                  this.datafrombackend = response.data;
                  this.text = this.datafrombackend.text.substring(0,1000);
                  this.description = this.datafrombackend.text.substring(1000);
                    //console.log(response.data); 
                    this.loadcontent = false;
                    console.log(this.datafrombackend);
                    
                })

                .catch(error => {
                    console.log(error);
                    console.log(error.response.data.message);
                    this.loadcontent = false;
                });
      
}
},
    Sendemailfile() {
      
      console.log(email);
      var error = false;
      console.log(this.file);

      if(!this.file){
        error = 'Пожалуйста загрузите файл';
      }
      if (!validateEmail(this.email)){
        error = 'Некорректное значения email';
      }
      if(this.email == '' || this.name == '' || this.text == '' || this.subject == ''){
        error = 'Есть пустые значения';
      }
      

      if(this.flag){
        error = 'Данные уже были отправлены';
      }

      if(!error){
        document.querySelector('#send_file').disabled = true;
        this.load = true;
        this.flag = true;

        var bodyFormData = new FormData();
          bodyFormData.append('doc_file', this.file);
          bodyFormData.append('email', this.email);
          bodyFormData.append('subject', this.subject); // 1 - без привязки к товару
          bodyFormData.append('text', this.text);
          bodyFormData.append('name', this.name);
              axios({
              method: "post",
              url: "/web/sendemailfile.php", 
              data: bodyFormData,
              headers: { "Content-Type": "multipart/form-data" },
            })
              .then(response => {
            //alert(response.data);
            document.querySelector('#send_file').disabled = false;
            this.load = false;
            if(response.data == '1' || response.data == 1){
                  alert('Данные успешно отправлены');
                }
                else{
                  alert(response.data);
                }
          })
          .catch(error => {
            alert(error);
            document.querySelector('#send_file').disabled = false;
            this.load = false;
          });
      }
      else{
        alert(error);
      }
      //console.log(this.comment);
    },
    handleFileUpload: function(){
    this.file = this.$refs.file.files[0];
  },
  onFileChange(e) {
      this.file = e.target.files || e.dataTransfer.files;
      /*if (!files.length)
        return;
      this.createImage(files[0]);*/
    },
    drawChart: function () {
      var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Telegram - ' + this.users_telegram,     this.users_telegram],
          ['Week Seller - ' + this.users_week_seller,      this.users_week_seller],
          ['Week Buyer - ' + this.users_week_buyer,  this.users_week_buyer],
          ['Week WEB - ' + this.users_week_web, this.users_week_web],
        ]);

        var options = {
          title: 'Week - кол-во пользователей'
        };
      
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    },
    changedrawchart:function(){
      google.charts.setOnLoadCallback(() => this.drawChart());
    }
  },
    mounted(){
      //this.botsendnotificationviabot('send_notification','Новая заявка на сайте','1417047628');
      console.log(Vue.version);
      //this.signin();
      if(document.querySelector("#piechart")){
        this.changedrawchart();
      }
      let hrefthis = window.location.href;
      if(hrefthis.indexOf('signup') > -1){
        this.loadcontent = true;
        this.getbreed();
        this.loadcontent_1 = true;
        this.gettype();
      }

      if(hrefthis.indexOf('allposts') > -1){
          this.loadcontent = true;
          this.getPosts();
        }
        if(hrefthis.indexOf('events') > -1){
          this.loadcontent = true;
          this.event_only = true;
          this.getPosts();
        }

        
      
        this.checkurl();
        this.checkchangeurl();
      
      if(hrefthis.indexOf('profile') > -1){
        this.loadcontent = true;
        this.getuserinfo();
        this.loadcontent_1 = true;
        this.getuserpost();
        this.loadcontent_2 = true;
        this.getusermarket();
        this.loadcontent_3 = true;
        this.event_only = true;
        this.getUserPosts();
      }

      if(hrefthis.indexOf('postsingle') > -1){
        this.loadcontent = true;
        let url = 'http://www.site.com/234234234';
        let id = hrefthis.substring(hrefthis.lastIndexOf('#') + 1);
        console.log(id); 
        this.getpostinfo(id);
      }
      
    
  }
}

Vue.createApp(EventHandling).mount('#app');

//google.charts.load('current', {'packages':['corechart']});
      

      /*function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Telegram (40)',     40],
          ['Week Seller (15)',      15],
          ['Week Buyer (10)',  10],
          ['Week WEB (14)', 14],
        ]);

        var options = {
          title: 'Week - кол-во пользователей'
        };
      
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
        
      }
      google.charts.setOnLoadCallback(drawChart);*/



// Load the Visualization API and the controls package.
      

      // Set a callback to run when the Google Visualization API is loaded.
      if(document.querySelector('#dashboard_div')){
        google.charts.setOnLoadCallback(drawDashboard);
      }
      

      // Callback that creates and populates a data table,
      // instantiates a dashboard, a range slider and a pie chart,
      // passes in the data and draws it.
      function drawDashboard() {

        // Create our data table.
        var data = google.visualization.arrayToDataTable([
          ['Name', 'Кол-во пользователей'],
          ['Telegram (40)',     40],
          ['Week Seller (15)',      15],
          ['Week Buyer (10)',  10],
          ['Week WEB (14)', 14],
        ]);

        // Create a dashboard.
        var dashboard = new google.visualization.Dashboard(
            document.getElementById('dashboard_div'));

        // Create a range slider, passing some options
        var donutRangeSlider = new google.visualization.ControlWrapper({
          'controlType': 'NumberRangeFilter',
          'containerId': 'filter_div',
          'options': {
            'filterColumnLabel': 'Кол-во пользователей'
          }
        });

        // Create a pie chart, passing some options
        var pieChart = new google.visualization.ChartWrapper({
          'chartType': 'PieChart',
          'containerId': 'chart_div',
          'options': {
            'width': '100%',
            'height': 500,
            'pieSliceText': 'value',
            'legend': 'right'
          }
        });

        // Establish dependencies, declaring that 'filter' drives 'pieChart',
        // so that the pie chart will only display entries that are let through
        // given the chosen slider range.
        dashboard.bind(donutRangeSlider, pieChart);

        // Draw the dashboard.
        dashboard.draw(data);
      }

    if(document.querySelector("#btn")){
document.getElementById("btn").addEventListener("click", () => {
  let table2excel = new Table2Excel();
  table2excel.export(document.querySelector("#Record"));
});
}



 





