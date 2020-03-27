
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('assets/imgs/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center">
            <h1 class="mb-3 bread">Places to Travel</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="home">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>About us <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center pb-4">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Best Place Destination</h2>
          </div>
        </div>
        <div class="row">
		<?php if(is_array($data['flight'])){?>

		<?php foreach ($data['flight'] as $all) {?>
        	<div class="col-md-4 ftco-animate">
        		<div class="project-wrap">
        			<a href="<?php echo $all[''];?>" class="img" style="background-image: url('assets/imgs/city/<?php echo $all['city'].".jpg";?>');"></a>
        			<div class="text p-4">
        				<span class="price"><?php echo $all['price'];?> $ - PER</span>
        				<span class="days"><span class="flaticon-route"></span> MOROCCO</span>
        				<h3><a href="#"><?php echo $all['city'].",".$all['country'] ?></a></h3>
        				<p class="location"><span class="ion-ios-map"></span>MOROCCO ==>  <?php echo$all['country'] ?></p>
        			</div>
        		</div>
			</div>
			<?php }?>
		<?php }else { ?>
		
		<?php  echo '</div><div class="alert alert-danger text-center" role="alert">
								no data found click <a href="destination?pagenum=1">her</a> to back  
							</div>'; }?>
    	</div>
        <div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul id="numpagination">
				<li><a href="#">&lt;</a></li>
				<?php 
					for ($i=1; $i <=$data['numpage'] ; $i++)
					{ 
						if($i == $data['pagenum'])
						{
							echo  '<li class="active"><a href="destination?pagenum='.$i.'"><span>'.$i.'</span></a></li>';
						}
						else
						{
							echo  '<li><a href="destination?pagenum='.$i.'"><span>'.$i.'</span></a></li>';
						}
					}
				?>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
    	</div>
	</section>
