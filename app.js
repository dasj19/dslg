(function() {
	var button = document.querySelector('button'),
		mirror = document.querySelector('select[name=mirror]'),
		arch = document.querySelector('select[name=arch]'),
		releases = document.querySelector('select[name=releases]'),
		list = document.querySelector('code[name=list]'),
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

		return '<span data-components>' + components.join(' ') + '</span>';
	};

	var getArch = function() {
		var value = arch.options[arch.selectedIndex].value;
		return value ? '[arch=' + value + ']' : '';
	};

	var appendSource = function(source) {
		var result = '';
		// Handle one element cases (comments).
		if (source.length == 1) {
			result = '<span data-comment>' + source[0] + '</span>';
		}
		// Process the actual apt lines.
		else if (source.length == 5) {
			result = ((source[0].length > 0) ? '<span data-type>' + source[0] + '</span>' + ' ' : '')
				+ ((source[1].length > 0) ? '<span data-arch>' + source[1] + '</span>' + ' ' : '')
				+ ((source[2].length > 0) ? '<span data-uri>' + source[2] + '</span>' + ' ' : '')
				+ ((source[3].length > 0) ? '<span data-distro>' + source[3] + '</span>' + ' ' : '')
				+ ((source[4].length > 0) ? '<span data-components>' + source[4] + '</span>' : '');
		}
		// All the other cases are not transformed int markup.
		else {
			result = source.join(' ');
		}
		sourceList.push(result);
	};

	var generate = function() {
		var url = mirror.options[mirror.selectedIndex].value,
			dist = releases.options[releases.selectedIndex].value;

		var comps = getComponents();
		var arch = getArch();

		// The main repository.
		appendSource(['# Releases of the main packages.']);
		appendSource(['deb', arch, url, dist, comps]);
		if(src.checked) appendSource(['deb-src', arch, url, dist, comps]);

		// Updates releases do not apply to unstable (index 0).
		if(releases.selectedIndex != 0) {
			appendSource(['']);
			appendSource(['# Updates that cannot wait for the next point release.']);
			appendSource(['deb', arch, url, dist + '-updates', comps]);
			if(src.checked) appendSource(['deb-src', arch, url, dist + '-updates', comps]);
		}

		// Security releases do not apply to unstable (index 0).
		if(security.checked && releases.selectedIndex != 0) {
			appendSource(['']);
			appendSource(['# Security releases from the Debian Security Audit Team.']);
			appendSource(['deb', arch, 'http://security.debian.org/', dist + '/updates', comps]);
			if(src.checked) appendSource(['deb-src', arch, 'http://security.debian.org/', dist + '/updates', comps]);
		}

		// When the backports are checked, excepting testing and unstable
		// we add new lines to the output (deb and deb-src).
		// Index 0 belongs to unstable and index 1 belongs to testing.
		if(backports.checked && releases.selectedIndex != 0 && releases.selectedIndex != 1) {
			appendSource(['']);
			appendSource(['# Backports brings newer software to stable releases.']);
			appendSource(['# Backports are disabled by default and are installed differently.']);
			appendSource(['# For instructions check https://backports.debian.org/Instructions/ .']);
			appendSource(['deb', arch, url, dist + '-backports', comps]);
			if(src.checked) appendSource(['deb-src', arch, url, dist + '-backports', comps]);
		}

		// Populate the code area with the sources separated by a line break.
		text = sourceList.join("\n");
		list.innerHTML = text;
		sourceList = [];
	};

	button.addEventListener('click', generate, false);
	// Generate the list with the default values.
	generate();
})();
