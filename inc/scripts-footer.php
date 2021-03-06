<script type="text/javascript">
	// Adds class of js to the html tag if JS is enabled.
	document.getElementsByTagName('html')[0].className += ' js';


	// Adds class of svg to the html tag if svg is enabled.
	(function flagSVG() {
		var ns = {'svg': 'http://www.w3.org/2000/svg'};
		if(document.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#BasicStructure", "1.1")) {
			document.getElementsByTagName('html')[0].className += ' svg';
		}
	})();

	// off-canvas pattern for navigation.
	(function (win, doc) {
		'use strict';
		if (!doc.querySelector || !win.addEventListener) {
			// doesn't cut the mustard.
			return;
		}
		if (doc.documentElement.clientWidth < 640) {
			// If the viewport is small enough, use the off-canvas pattern for navigation.
			if (!doc.querySelector('.js-container') || !doc.querySelector('.nav-global-primary') || !doc.querySelector('.nav-global-secondary') || !doc.querySelector('.skip-to-nav')
			) {
				return;
			}
			var toggleclass = 'slid',
				reg = new RegExp('(\\s|^)' + toggleclass + '(\\s|$)'),
				page = doc.querySelector('.js-container'),
				primary = doc.querySelector('.nav-global-primary'),
				secondary = doc.querySelector('.nav-global-secondary'),
				skiplink = doc.querySelector('.skip-to-nav'),
				newnav = doc.createElement('div'),
				togglePage = function(e) {
					e.preventDefault();
					if (!page.className.match(reg)) {
						page.className += ' ' + toggleclass;
					} else {
						page.className = page.className.replace(reg, '');
					}
				};
			skiplink.addEventListener('click', togglePage, false);
			newnav.appendChild(secondary);
			newnav.appendChild(primary);
			newnav.className = 'js-offcanvas';
			skiplink.className = skiplink.className + ' persist';
			doc.body.appendChild(newnav);
		} else {
			// Add or remove a class on the navigation depending on how far the user has scrolled down. In the CSS, this class gets position:fixed within a widescreen media query.
			if (!doc.querySelector('.global-header') || !doc.querySelector('.masthead') || !doc.querySelector('.nav-global-primary')) {
				return;
			}
			var toggleclass = 'sticky',
				reg = new RegExp('(\\s|^)' + toggleclass + '(\\s|$)'),
				header = doc.querySelector('.global-header'),
				triggerpoint = doc.querySelector('.masthead').offsetHeight + 35,
				scrollDistance = null,
				checkToggle = function () {
					scrollDistance = (win.pageYOffset !== undefined) ? win.pageYOffset : doc.body.scrollTop;
					if (scrollDistance > triggerpoint) {
						if (!header.className.match(reg)) {
							header.className += ' ' + toggleclass;
						}
					} else {
						if (header.className.match(reg)) {
							header.className = header.className.replace(reg, '');
						}
					}
				};
			checkToggle();
			win.addEventListener('scroll', checkToggle, false);
		}
	}(this, this.document));


	// Adds a fade to elements with the ID of "fade". Modified from http://stackoverflow.com/questions/3795481/javascript-slidedown-without-jquery
	var minheight = 50;
	var maxheight = document.getElementById('fade').offsetHeight + 15;
	var time = 1000;
	var timer = null;
	var toggled = false;

	if (document.getElementById('fade')) {
		window.onload = function() {
			var controller = document.getElementById('fade-activate');
			var slider = document.getElementById('fade-content');
			slider.style.height = minheight + 'px';
			controller.onclick = function(e) {
				e.preventDefault();
				clearInterval(timer);
				var instanceheight = parseInt(slider.style.height);  // Current height
				var init = (new Date()).getTime(); // start time
				var height = (toggled = !toggled) ? maxheight: minheight; // if toggled
				var disp = height - parseInt(slider.style.height);
				timer = setInterval(function() {
					var instance = (new Date()).getTime() - init; // animating time
					if(instance <= time ) { // 0 -> time seconds
						var pos = instanceheight + Math.floor(disp * instance / time);
						slider.style.height =  pos + 'px';
					} else {
						slider.style.height = height + 'px'; // safety side ^^
						clearInterval(timer);
					}
				},1);
			};
		};
	}
</script>

<!-- Twitter Share Script -->
<script>
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
</script>

<!-- facebook -->
<script src='http://static.ak.fbcdn.net/connect.php/js/FB.Share' type='text/javascript'></script>

<!-- Google Analytics -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-20825280-1']);
  _gaq.push(['_setDomainName', 'none']);
  _gaq.push(['_setAllowLinker', true]);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<!-- Ethnio Activation Code -->
<script type="text/javascript" language="javascript" src="//ethn.io/30340.js" async="true" charset="utf-8"></script>
