<!-- portfolio item starts -->
	<div class="portfolio2ItemWrap">
		<!-- portfolio item image starts -->
		<div class="portfolio2ItemImage"> 
			<?php 
				echo Html::link(
					"",
					$data->image,
					array(
						'class'=>"portfolioItemDetailsBtn zoomInBtn",
						'title'=>t("Zoom In"),
					)
				);
				echo Html::link(
					"",
					$this->createUrl('/room/view',array('pid'=>$data->id)),
					array(
						'class'=>"portfolioItemDetailsBtn linkBtn",
						'title'=>t("Detail"),
					)
				);
				echo Html::link(
					Html::image(
						$data->image,
						"",
						array(
							'class'=>'img-product',
						)
					),
					$this->createUrl('/room/view',array('pid'=>$data->id))
				);
			?>
		</div>
        <!-- portfolio item image ends -->
		<h3><?php echo $data->name?></h3>
		<!-- Product Description Here -->
		<p><?php echo $data->truncate($data->description)?></p>
		<!-- 
			<p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a.</p>
		-->
		<?php 
			echo Html::link(
				t("Read More"),
				$this->createUrl('/room/view',array('pid'=>$data->id)),
				array('class'=>'smallYBtn')
			);
		?>
    </div>
<!-- portfolio item ends -->