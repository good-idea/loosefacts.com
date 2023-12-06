<div id="main-container" data-cover="<?= $page->uid() ?>-background" data-slug="/<?= $page->uri() ?>" >
	<div class="main-container-background" style='background-image:url("<?php echo $page->background()->url(); ?>")'></div>
	<h1 class="project-page-title inactive-title"><a class="ajax-link" href="<?= $page->url() ?>">MAIN</a></h1>
	<h1 class="project-page-title"><a class="ajax-link" href="<?= $page->url() ?>"><?= $page->title() ?></a></h1>
  <div class="project-inner">
			<?php if (strlen($page->text()) || strlen($page->linkout())): ?>
				<div class="description-container">
					<div class="project-page-description">
						<div class="description-top"></div>
						<div class="description-inner">
							<?= $page->text()->kirbytext() ?>
						</div>
					</div>					
				</div>
			<?php endif?>
		<div class="project-images">
			<div class="project-images-container">
				<?php foreach ($page->images() as $image): ?>
					<?php if (strlen($page->outlink()) > 0): ?>
						<a class="" href="<?= $page->outlink() ?>" target="_blank" >
					<?php endif ?>
						<figure class="project-image">
							<img class="<?php ecco(strlen($image->caption()) > 0, "with-caption")   ?>" src="<?= $image->url() ?>" alt="">
							<?php if (strlen($image->caption()) > 0): ?>
								<h5 class="caption"><?= $image->caption() ?></h5>
							<?php endif ?>
							<img src="/assets/images/shadow.png" alt="" class="shadow">			
						</figure>
						</a>


				<?php endforeach ?>
				
			</div>
		</div>
  	
  </div>
  <script type="text/javascript">
  	$("#main-container").fadeTo('300', 1);
  </script>
</div>