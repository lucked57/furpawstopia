<?php
    use yii\widgets\ActiveForm;
    use yii\helpers\Html;
?>
    <div class="container">
        <!--<h1 class="mt-5 text-center">Авторизация</h1>-->
        

        
      


<div class="form-data">
                    <div class="text-center my-5 pt-5">
                        <h4>Create new account</h4>
                    </div>
                    <div class="row">
                         
                    <div class="col-md-4 d-none d-md-block"></div>
                    <div class="col-md-4">
                        <div :disabled='isDisabled' class="forms-inputs mb-4"> <span>Email</span> <input type="text" placeholder="Email..." v-model="email" v-bind:class="{'form-control':true, 'is-invalid' : (!validEmail(email) && emailBlured) || (error && emailBlured)}" v-on:blur="emailBlured = true">
                        <div class="invalid-feedback">{{email_error}}</div>
                    </div>
                    <div :disabled='isDisabled' class="forms-inputs mb-4"> <span>Pass</span> <input type="password" placeholder="Password..." v-model="password" v-bind:class="{'form-control':true, 'is-invalid' : (!validPassword(password) && passwordBlured) || (error && passwordBlured)}" v-on:blur="passwordBlured = true">
                        <div class="invalid-feedback">{{password_error}}</div>
                    </div>

                    <div :disabled='isDisabled' class="forms-inputs mb-4"> <span>Descrition</span> <input type="text" placeholder="Descrition..." v-model="description" class="form-control">
                        <div class="invalid-feedback">{{description_error}}</div>
                    </div>

                    <div :disabled='isDisabled' class="forms-inputs mb-4"> <span>Color</span> <input type="text" placeholder="Color of your pet..." v-model="color" class="form-control">
                        <div class="invalid-feedback">{{color_error}}</div>
                    </div>


                    <div :disabled='isDisabled' class="forms-inputs mb-4"> <span>Name</span> <input type="text" placeholder="Name of your pet..." v-model="name" class="form-control">
                        <div class="invalid-feedback">{{name_error}}</div>
                    </div>

                    <div :disabled='isDisabled' class="forms-inputs mb-4"> <span>Nickname</span> <input type="text" placeholder="Your nickname..." v-model="nickname" class="form-control">
                        <div class="invalid-feedback">{{nickname_error}}</div>
                    </div>


                    <label for="startDate">Type</label>
                    <select style="border-radius: 50em !important;" :disabled='isDisabled' v-model="type" class="form-select" aria-label="Default select example">
                      <option v-for="(item,key,index) in datafrombackend_1" :value="item.type">{{item.type}}</option>
                    </select>


                    <label for="startDate">Breed</label>
                    <select style="border-radius: 50em !important;" :disabled='isDisabled' v-model="breed" class="form-select mb-3" aria-label="Default select example">
                      <option v-for="(item,key,index) in datafrombackend" :value="item.name">{{item.name}} ({{item.type}})</option>
                    </select>








                    </div>

                    


                    <div class="col-md-4 d-none d-md-block"></div>
                    </div>
                   
                    <div class="mb-3 text-center">
                        <button :disabled='isDisabled' @click="createnewaccount" class="btn btn-dark px-5 py-2">Create account</button> 
                        
                        <a href="/login" :disabled='isDisabled'  class="btn px-5 py-2">Sign in</a>

                     </div>
                </div>
               



    </div>
</main>