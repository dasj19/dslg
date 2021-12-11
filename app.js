(function() {
	var button = document.querySelector('button'),
		mirror = document.querySelector('select[name=mirror]'),
		arch = document.querySelector('select[name=arch]'),
		releases = document.querySelector('select[name=releases]'),
		list = document.querySelector('textarea[name=list]'),
		src = document.querySelector('input[name=src]'),
		backports = document.querySelector('input[name=backports]'),
		contrib = document.querySelector('input[name=contrib]'),
		nonfree = document.querySelector('input[name=non-free]'),
		security = document.querySelector('input[name=security]');

	var sourceList = [];

	var getComponents = function() {

		var components = ['main'];

		if(contrib.checked) components.push('contrib');
		if(nonfree.checked) components.push('non-free');

		return components.join(' ');
	};

	var getArch = function() {
		var value = arch.options[arch.selectedIndex].value;
		return value ? '[arch=' + value + ']' : '';
	};

	var appendSource = function(source) {
		sourceList.push(source.filter(function(element) { return element.length; }).join(' '));
	};

	var generate = function() {
		var url = mirror.options[mirror.selectedIndex].value,
			dist = releases.options[releases.selectedIndex].value;

		var comps = getComponents();
		var arch = getArch();

		appendSource(['deb', arch, url, dist, comps]);
		if(src.checked) appendSource(['deb-src', arch, url, dist, comps]);


		if(releases.options[releases.selectedIndex].hasAttribute('data-updates')) {
			appendSource(['']);
			appendSource(['deb', arch, url, dist + '-updates', comps]);
			if(src.checked) appendSource(['deb-src', arch, url, dist + '-updates', comps]);
		}

		if(security.checked) {
			appendSource(['']);
			appendSource(['deb', arch, 'http://security.debian.org/', dist + '/updates', comps]);
			if(src.checked) appendSource(['deb-src', arch, 'http://security.debian.org/', dist + '/updates', comps]);
		}

		// When the backports are checked, excepting testing and unstable we add new lines to the output (den and deb-src).
		if(backports.checked && dist != 'sid' && dist != 'bookworm') {
			appendSource(['']);
			appendSource(['# Backports brings newer software to stable releases.']);
			appendSource(['# Backports are disabled by default and are installed differently.']);
			appendSource(['# For instructions check https://backports.debian.org/Instructions/ .']);
			appendSource(['deb', arch, url, dist + '-backports', comps]);
			if(src.checked) appendSource(['deb-src', arch, url, dist + '-backports', comps]);
		}


		list.value = sourceList.join("\n");
		sourceList = [];
	};

	button.addEventListener('click', generate, false);
	generate();
})();
