<?php snippet('head') ?>
</head>
<?php
	$currenturl = $_SERVER['REQUEST_URI'];
	$loadproject = explode("/", $currenturl);
?>
<body class="projects-view">
<script>$('body').css('opacity', 0);</script>

<div id="projects" class="section active" data-view="projects-view">
	<div class="backgrounds">
		<?php foreach ($pages->filterBy('intendedTemplate', 'category')->visible()->children()->visible() as $project): ?>
			<div id="<?= $project->uid() ?>-background" class="project-cover" style='background-image:url("<?= $project->hover()->url() ?>")'></div>
		<?php endforeach ?>	
	</div>
	<div class="ex ex-button"><a href="/" class="ajax-link">
		<img class="ex-gray" src="/assets/images/ex_ex-gray.png" alt="">
		<img class="ex-glow" src="/assets/images/ex_ex-glow.png" alt="">
		<img class="ex-default" src="/assets/images/ex_ex.png" alt="">
	</a></div>
	<div class="mobile-only mobile-ex ex-button"><a href="/" class="ajax-link"><h1 class=""><?= $pages->find('home')->name() ?></h1></a></div>

	<div class="section-inner titles">
		<h1 class="section-title name"><a href="<?= $site->url() ?>" class="ajax-link"><?= $pages->find('home')->name() ?></a></h1>
		<div class="section-content">
			<?php foreach ($pages->filterBy('intendedTemplate', 'category')->visible()->sortBy('title') as $category): ?>
				<div class="project-category">
				<h2 class="category-title"><?= $category->title() ?> ::: </h2>
				<?php foreach ($category->children()->visible() as $project): ?>
					<?php if (!$project->is( $category->children()->visible()->last() )) { $end_str = "/ "; } else { $end_str = "//"; }; ?>
					<h3 class="project-title"><a class="ajax-link project-link" data-cover="<?= $project->uid() ?>-background" href="<?= $project->url() ?>"><?=$project->title() ?></a><?= $end_str ?></h3>
				<?php endforeach ?>
				</div>
			<?php endforeach ?>
		</div>
	</div>

	<div id="load-area" class="load-area">
	  <?php if (count($loadproject) == 3) {
		   snippet('loadproject');
	  } ?>
	</div>

</div>


<?php foreach ($pages->filterBy('intendedTemplate', 'page') as $info_page): ?>
<div id="<?= $info_page->uid() ?>" class="section inactive info-page" data-view="<?= $info_page->uid() ?>-view">
	<div class="section-inner">
		<h1 class="section-title"><a href="<?= $info_page->url() ?>" class="ajax-link"><?= $info_page->title() ?></a></h1>
		<div class="section-content">
			<div class="info-page-text"><?= $info_page->text()->kirbytext() ?></div>
			<?php if ($info_page->uid() == "connect"): ?>
				<div class="social-icons">
					<a class="social-icon" href="mailto:tova.carlin@gmail.com"><img src="/assets/images/icons_mail.png" alt=""></a>
					<a class="social-icon" href=""><img src="/assets/images/icons_twitter.png" alt=""></a>
					<a class="social-icon" href="https://www.linkedin.com/in/tjaycarlin"><img src="/assets/images/icons_linkedin.png" alt=""></a>
					<a class="social-icon" href=""><img src="/assets/images/icons_phone.png" alt=""></a>

					
				</div>
			<?php endif ?>
		</div>
	</div>
</div>

<?php endforeach ?>

<div id="mobile-test"></div>
</body>


<script src="/assets/js/global.js"></script>