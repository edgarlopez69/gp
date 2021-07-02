<div class="content">
    <div class="container-fluid">
        <div class="section">
        	<h1>
        		Popup
        	</h1>
        	<div class="row">
        		<div class="col-12">
        			<img src="" id="popup-img" class="popup-img">
        		</div>
        		<div class="col-12">
                    <button type="button" class="btn btn-primary" href="#collapsePopup" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapsePopup" >Cambiar Popup</button>
                    <div class="collapse" id="collapsePopup">
                        <div class="collapsePopupInterior">
                            <form id="img_form">
                              <div class="form-group">
                                <label for="exampleFormControlFile1">Imagen a subir</label>
                                <input type="file" class="form-control-file" name="fileToUpload" id="file_input" accept="image/*">
                              </div>
                            </form>
                            <button type="button" class="btn btn-primary" onclick="uploadImg()">Cambiar</button>
                        </div>
                        
                    </div>
        			
        		</div>
        	</div>
        	
        	
        </div>
    </div>
</div>