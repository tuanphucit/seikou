<div class="pageBreaker"></div>
      <!-- portfolio items start -->
      <div class="portfolioWrap">
        <!-- portfolio specific wrap starts -->
        <div class="twoColumnsWrap">
          <?php 
			$this->widget('zii.widgets.CListView', array(
			    'dataProvider'=>$dataProvider,
			    'itemView'=>'_room',
				'template'=>'{items}{pager}',
			));
		?>
        </div>
        <!-- portfolio specific wrap ends -->
        <!-- portfolio specific wrap starts -->
        <div class="twoColumnsWrap">
          <!-- portfolio item starts -->
          <div class="portfolio2ItemWrap">
            <!-- portfolio item image starts -->
            <div class="portfolio2ItemImage"> <a href="<?php echo Html::imageThemeUrl('portfolio/singleProject1.jpg') ?>" class="portfolioItemDetailsBtn zoomInBtn" title="Lorem ipsum dolor sit amet"></a><a href="" class="portfolioItemDetailsBtn linkBtn"></a><a href="./singleProject.html"><img src="<?php echo Html::imageThemeUrl('portfolio/12columnsSmall1.jpg') ?>" alt=""/></a> </div>
            <!-- portfolio item image ends -->
            <h3>Sample project title</h3>
            <p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a.</p>
            <a href="./singleProject.html" class="smallYBtn">Read More</a> </div>
          <!-- portfolio item ends -->
          <!-- portfolio item starts -->
          <div class="portfolio2ItemWrap">
            <!-- portfolio item image starts -->
            <div class="portfolio2ItemImage"> <a href="<?php echo Html::imageThemeUrl('portfolio/singleProject2.jpg') ?>" class="portfolioItemDetailsBtn zoomInBtn" title="Lorem ipsum dolor sit amet"></a><a href="" class="portfolioItemDetailsBtn linkBtn"></a><a href="./singleProject.html"><img src="<?php echo Html::imageThemeUrl('portfolio/12columnsSmall2.jpg') ?>" alt=""/></a> </div>
            <!-- portfolio item image ends -->
            <h3>Sample project title</h3>
            <p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a.</p>
            <a href="./singleProject.html" class="smallYBtn">Read More</a> </div>
          <!-- portfolio item ends -->
          <!-- portfolio item starts -->
          <div class="portfolio2ItemWrap">
            <!-- portfolio item image starts -->
            <div class="portfolio2ItemImage"> <a href="<?php echo Html::imageThemeUrl('portfolio/singleProject3.jpg') ?>" class="portfolioItemDetailsBtn zoomInBtn" title="Lorem ipsum dolor sit amet"></a><a href="" class="portfolioItemDetailsBtn linkBtn"></a><a href="./singleProject.html"><img src="<?php echo Html::imageThemeUrl('portfolio/12columnsSmall3.jpg') ?>" alt=""/></a> </div>
            <!-- portfolio item image ends -->
            <h3>Sample project title</h3>
            <p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a.</p>
            <a href="./singleProject.html" class="smallYBtn">Read More</a> </div>
          <!-- portfolio item ends -->
        </div>
        <!-- portfolio specific wrap ends -->
      </div>
      <!-- portfolio items end -->
      <div class="pageBreaker"></div>
      <!-- page numbers start -->
      <div class="pageNumbers">
        <ul>
          <li><a class="pageNumber" href="#">1</a></li>
          <!--  For Page 2 -->
          <!-- <li><a class="pageNumber" href="#">2</a></li> -->
        </ul>
      </div>
      <!-- page numbers end -->
