<div class="content">
    <div class="container-fluid">
        <div class="section">
        	<h1>
        		Carrusel
        	</h1>
        	<div class="container carrusel-cont">
	        	<!-- Slider main container -->
				<div class="swiper-container">
				    <!-- Additional required wrapper -->
				    <div class="swiper-wrapper">
				        <!-- Slides -->
				        <div class="swiper-slide">
				        	<img src="" class="carrusel-item" id="slid1" href="#collapseSlider" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseSlider" onclick="setSlide('1')">
			        		<button type="button" class="btn btn-primary swotch" href="#collapseSlider" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseSlider" onclick="setSlide('1')">Cambiar Slider</button>
				        </div>
				        <div class="swiper-slide">
				        	<img src="" class="carrusel-item" id="slid2" href="#collapseSlider" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseSlider" onclick="setSlide('2')">
			        		<button type="button" class="btn btn-primary swotch" href="#collapseSlider" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseSlider" onclick="setSlide('2')">Cambiar Slider</button>
				        </div>
				        <div class="swiper-slide">
				        	<img src="" class="carrusel-item" id="slid3" href="#collapseSlider" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseSlider" onclick="setSlide('3')">
			        		<button type="button" class="btn btn-primary swotch" href="#collapseSlider" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseSlider" onclick="setSlide('3')">Cambiar Slider</button>
				        </div>
				        <div class="swiper-slide">
				        	<img src="" class="carrusel-item" id="slid4" href="#collapseSlider" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseSlider" onclick="setSlide('4')">
			        		<button type="button" class="btn btn-primary swotch" href="#collapseSlider" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseSlider" onclick="setSlide('4')">Cambiar Slider</button>
				        </div>
				        <div class="swiper-slide">
				        	<img src="" class="carrusel-item" id="slid5" href="#collapseSlider" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseSlider" onclick="setSlide('5')">
			        		<button type="button" class="btn btn-primary swotch" href="#collapseSlider" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseSlider" onclick="setSlide('5')">Cambiar Slider</button>
				        </div>
				    </div>
				    <!-- If we need pagination -->
				    <div class="swiper-pagination"></div>

				    <!-- If we need navigation buttons -->
				    <div class="swiper-button-prev"></div>
				    <div class="swiper-button-next"></div>

				    <!-- If we need scrollbar -->
				    <div class="swiper-scrollbar"></div>
				</div>
				<div class="collapse" id="collapseSlider">
				    <div class="collapseSliderInterior">
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