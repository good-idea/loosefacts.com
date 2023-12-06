$(window).load(function() {
	setTimeout(function() {
		projectPadding();
		$("body").fadeTo('slow', 1).addClass('preload');
		setTimeout(function() {
			$('body').removeClass('preload');
		}, 100)
	}, 200)
	setTimeout(function() {
		projectPadding();
	}, 600);
	if (isMobile()) {
		var section_height = $('.section.inactive').outerHeight();
		var count = $('.section.inactive').length;
		var body = $('body');
		var screen_height = window.screen.height - 60;
		console.log(body.height());
		if (body.height() < screen_height) {
			//$("body").css('height', window.screen.height - 40 + "px");
		}
	}
})

$(document).ready(function() {
	findView();
	bindlinks();
	setBackground();
})

function changeView(view) {
	var active = "#" + view.replace('-view', "");
	$('body').removeClass().addClass(view);
	sections.removeClass('active').addClass('inactive');
	$(active).removeClass('inactive').addClass('active');
}

var sections = $('.section');

// AJAX & URL handling

function findView() {
	var path = (window.location.pathname).split("/");
	// strip empties
	path = $.grep(path,function(n){ return(n) });
	switch (path.length) {
		case 0:
			changeView('projects-view');
		  break;
		case 1:
		  var view = path[0] + "-view";
		  changeView(view);
		  break;
		case 2:
		  changeView('projects-view');
		  $("#projects").addClass('project-view');
   		  $("body").attr('data-projects', 'open');

		 // loadLink(window.location.href, true);
		  break;
	}
}

function loadLink(url, nostatechange) {
	var origin = window.location.origin;
	var pathname = window.location.pathname;
	relative_url = url.replace(origin, "");
  var urlArr = relative_url.split("/");
  urlArr = $.grep(urlArr,function(n){ return(n) });
	if (urlArr.length == 0) {
		$("#projects").removeClass('project-view');
		$("body").attr('data-projects', '');
		changeView('projects-view');
		if (!nostatechange) { updateState(url) };
	} else if (urlArr.length == 1) {
		var view = (urlArr[urlArr.length - 1]) + "-view";
		changeView(view)
		if (!nostatechange) { updateState(url) };
	} else if (urlArr.length == 2) {
		var loadUrl = url + " #main-container";
		var loadArea = "#load-area";
		var currently_loaded = $("#main-container").attr('data-slug');
		if (relative_url == currently_loaded && $("#projects").hasClass('projects-view')) {
			changeView('projects-view');
			if (!nostatechange) { updateState(url) };
		} else {
			$('.load-area').empty();
			$(loadArea).load(loadUrl, function(response) {
				bindlinks();
				changeView('projects-view');
				setTimeout(function () {
					projectPadding();

				}, 400)
				$("#projects").addClass('project-view');
				$("body").attr('data-projects', 'open');
				if (!nostatechange) { updateState(url) };
			})		
		}
	} 
}

function isMobile() {
	if ($("#mobile-test").is(":visible")) {
		return true;
	} else {
		return false;
	}
}

var resizeTimer;
window.onresize = function(){
  clearTimeout(resizeTimer);
  resizeTimer = setTimeout(projectPadding(), 200);
};

function projectPadding() {
	var titleHeight = $(".titles").height() + 30 + "px";
	if (!isMobile()) {
		$('#main-container .project-inner').animate({
			'opacity': 1,
			//'padding-top': titleHeight
		});		
	}
}

function updateState(url) {
	var rootstring = window.location.origin;
	var newurl = url.replace(rootstring, '');
	history.pushState({}, "", url);
}

$(window).on('popstate', function(e) {
	loadLink(window.location.href, true);
})

function bindlinks() {
	$(".project-page-description a").attr('target', "_blank");

	$(".ajax-link").unbind('click');
	$(".ajax-link").click(function(e) {
		e.preventDefault();
	  var href = $(this).attr('href');
	  loadLink(href);
	})
	$('.project-link').bind('mouseenter', function() {
		$(this).parent().addClass('hover');
		var project = "#" + $(this).attr('data-cover');
		if (!$("#projects").hasClass('project-view')) {
			setBackground(project);
		}
		//$(project).css('opacity', 1);
		$(this).bind('mouseleave', function() {
			$(this).parent().removeClass('hover');
			//$(project).css('opacity', 0);
		})
	}).bind('click', function() {
		var project = "#" + $(this).attr('data-cover');
		setBackground(project);
	})
	// $('.description-top').click(function() {
	// 	$(this).siblings('.description-inner').toggleClass('collapse');
	// })

}

function setBackground(project) {
	if (project === undefined) {
		project = "#" + $("#main-container").attr('data-cover');
	}
	$('.project-cover').css('opacity', 0);
	$(project).css('opacity', 1);
}

$(".ex-button").click(function() {
	$('.project-cover').css('opacity', 0);
})

$('.section').click(function() {
	if ($(this).hasClass('inactive')) {
		if (!$(this).hasClass('project-view')) {
			$(this).find('.section-title .ajax-link').click();
		} else {
			$(this).find('.project-page-title .ajax-link').click();
		}
	}
})

