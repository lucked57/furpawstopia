<?php
    use yii\widgets\ActiveForm;
    use yii\helpers\Html;
?>
    <div class="container">
        <!--<h1 class="mt-5 text-center">Авторизация</h1>-->
        

    <!-- pass - A12345567-->
        
      


<div class="form-data">
                    <div class="text-center my-5 pt-5">
                        <h4>Sign in</h4>
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
                    </div>
                    <div class="col-md-4 d-none d-md-block"></div>
                    </div>
                   
                    <div class="mb-3 text-center">
                        <button :disabled='isDisabled' @click="submitsignin" class="btn btn-dark px-5 py-2">Sign in</button> 

                        <a href="/signup" :disabled='isDisabled'  class="btn px-5 py-2">Create account</a>

                     </div>
                </div>
               



    </div>
</main>