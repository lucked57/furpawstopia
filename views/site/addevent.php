<?php
    use yii\widgets\ActiveForm;
    use yii\helpers\Html;

   /* $cookies = Yii::$app->response->cookies;
                    
                        $cookies->add( new \yii\web\Cookie([
                            'name' => '_csrf',
                            'value' => $csrf_token = Yii::$app->request->csrfToken,
                            'expire' => time() + 86400 * 365,
                        ]));*/

    $csrf_param = Yii::$app->request->csrfParam; 
    $csrf_token = Yii::$app->request->csrfToken;
?>
<!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
      <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>


<input id="token" style="display: none" type="text" value="<?=$csrf_token?>">

<div class="container mt-5 pt-5">
<form onsubmit="return false">

  <div class="row">
    <div class="col-lg-4">
      <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control" id="title" aria-describedby="emailHelp" v-model="title" maxlength="255" placeholder="Title...">
    </div>
    </div>
    <div class="col-lg-4">
      <div class="mb-3">
        <label for="location" class="form-label">Location</label>
        <input type="text" class="form-control" id="location" aria-describedby="LocationHelp" v-model="location" maxlength="255" placeholder="Location...">
      </div>
    </div>
    <div class="col-lg-4">
      <div class="mb-3">
        <label class="form-label" for="datetime">Date and time:</label>
      <input class="form-control" type="datetime-local" id="datetime" name="datetime" v-model="datetime">
      </div>
    </div>
    <div class="col-lg-6">
      <div class="mb-3">
      <label for="editFormControlTextarea1" class="form-label">Text</label>
      <textarea class="form-control" id="editFormControlTextarea1" rows="5" v-model="text" placeholder="Text..." maxlength="5000">
        
      </textarea>
    </div>
    </div>
    <div class="col-lg-6">
      <div class="form-group">
    <!--<label for="file">Image</label>
    <input type="file" class="form-control-file" id="file" accept="image/*">-->
    <div class="form-group ">
          <label class="upload-label" for="file">
              <div v-if="post_image_upload_preview" class="upload-label-preview text-center" >
                <img style="width: 80%; margin-left: 10%; margin-bottom: 10px;" class="img-preview-pic" v-bind:src="post_image_upload_preview" /> 
              </div>
                <div v-if="!post_image_upload_preview" class="upload-label-preview text-center" >
                <p>Upload image</p>
            
            </div>
            
          </label>
        <input
            @change="imagechanged"
            id="file"
            class="upload-input-img form-control"
            type="file"
            accept="image/*"
            required
            :class="{'is-invalid': submitted && !post_image_upload}"
          />
          <div class="invalid-feedback">Please upload an image.</div>

          </div>
  </div>
    </div>
  </div>

  

  





 
  <div v-if="load">
    <p id="loadingcomplete"></p>
  </div>
  <div v-if="load" class="spinner-border text-primary mb-2" role="status">
    
  <span class="visually-hidden">Загрузка...</span>
</div>
  <button type="submit" id="send_file" v-on:click="uploadevent" class="btn btn-primary mt-2 mb-5">Upload event</button>
</form>
</div>
</main>