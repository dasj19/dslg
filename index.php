<?php ?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Sources List Generator for Debian</title>
		<meta name="description" content="Sources List Generator for Debian repositories">
		<meta name="keywords" content="Debian, Server, Repository, Generator, Sources, Sources List, deb, deb-src, Linux, distro, distribution">
		<meta name="robots" content="noodp,noydir">
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<main>
			<div class="wrap--header">
				<div class="wrap">
					<h2 class="header">Debian Sources List Generator</h2>

					<div class="fixed--right">
					</div>
				</div>
			</div>
			<div class="wrap">
				<div class="elemnts--inline">
					<p><label>Mirror<br>
					<select name="mirror">
						<option value="http://ftp.au.debian.org/debian/" selected>Australia</option>
						<option value="http://ftp.at.debian.org/debian/">Austria</option>
						<option value="http://ftp.by.debian.org/debian/">Belarus</option>
						<option value="http://ftp.be.debian.org/debian/">Belgium</option>
						<option value="http://ftp.br.debian.org/debian/">Brazil</option>
						<option value="http://ftp.bg.debian.org/debian/">Bulgaria</option>
						<option value="http://ftp.by.debian.org/debian/">Belarus</option>
						<option value="http://ftp.ca.debian.org/debian/">Canada</option>
						<option value="http://ftp.cn.debian.org/debian/">China</option>
						<option value="http://ftp.hr.debian.org/debian/">Croatia</option>
						<option value="http://ftp.cz.debian.org/debian/">Czech Republic</option>
						<option value="http://ftp.dk.debian.org/debian/">Denmark</option>
						<option value="http://ftp.sv.debian.org/debian/">El Salvador</option>
						<option value="http://ftp.ee.debian.org/debian/">Estonia</option>
						<option value="http://ftp.fi.debian.org/debian/">Finland</option>
						<option value="http://ftp.gr.debian.org/debian/">Greece</option>
						<option value="http://ftp.fr.debian.org/debian/">France</option>
						<option value="http://ftp.de.debian.org/debian/">Germany</option>
						<option value="http://ftp.hk.debian.org/debian/">Hong Kong</option>
						<option value="http://ftp.hu.debian.org/debian/">Hungary</option>
						<option value="http://ftp.is.debian.org/debian/">Iceland</option>
						<option value="http://ftp.ir.debian.org/debian/">Iran</option>
						<option value="http://ftp.ie.debian.org/debian/">Ireland</option>
						<option value="http://ftp.it.debian.org/debian/">Italy</option>
						<option value="http://ftp.jp.debian.org/debian/">Japan</option>
						<option value="http://ftp.kr.debian.org/debian/">Korea, Republic of</option>
						<option value="http://ftp.lt.debian.org/debian/">Lithuania</option>
						<option value="http://ftp.mx.debian.org/debian/">Mexico</option>
						<option value="http://ftp.md.debian.org/debian/">Moldova</option>
						<option value="http://ftp.nl.debian.org/debian/">Netherlands</option>
						<option value="http://ftp.nz.debian.org/debian/">New Zealand</option>
						<option value="http://ftp.nc.debian.org/debian/">New Caledonia</option>
						<option value="http://ftp.no.debian.org/debian/">Norway</option>
						<option value="http://ftp.pl.debian.org/debian/">Poland</option>
						<option value="http://ftp.pt.debian.org/debian/">Portugal</option>
						<option value="http://ftp.ro.debian.org/debian/">Romania</option>
						<option value="http://ftp.ru.debian.org/debian/">Russian Federation</option>
						<option value="http://ftp.sk.debian.org/debian/">Slovakia</option>
						<option value="http://ftp.si.debian.org/debian/">Slovenia</option>
						<option value="http://ftp.es.debian.org/debian/">Spain</option>
						<option value="http://ftp.se.debian.org/debian/">Sweden</option>
						<option value="http://ftp.ch.debian.org/debian/">Switzerland</option>
						<option value="http://ftp.tw.debian.org/debian/">Taiwan</option>
						<option value="http://ftp.th.debian.org/debian/">Thailand</option>
						<option value="http://ftp.tr.debian.org/debian/">Turkey</option>
						<option value="http://ftp.ua.debian.org/debian/">Ukraine</option>
						<option value="http://ftp.uk.debian.org/debian/">United Kingdom</option>
						<option value="http://ftp.us.debian.org/debian/">United States</option>
					</select></label></p>

					<p><label>Releases<br>
					<select name="releases">
						<option value="sid">Unstable (sid)</option>
						<option value="bookworm">Testing (bookworm)</option>
						<option value="bullseye" selected>Debian 11 (bullseye)</option>
						<option value="buster">Debian 10 (buster)</option>
						<option value="stretch">Debian 9 (stretch)</option>
						<option value="jessie">Debian 8 (jessie)</option>
						<option value="wheezy">Debian 7 (wheezy) </option>
						<option value="squeeze">Debian 6.0 (squeeze) </option>
					</select></label></p>

					<p><label>Arch<br>
					<select name="arch">
						<option selected></option>
						<option>all</option>
						<option>amd64</option>
						<option>arm64</option>
						<option>armel</option>
						<option>armhf</option>
						<option>hurd-i386</option>
						<option>i386</option>
						<option>ia64</option>
						<option>kfreebsd-amd64</option>
						<option>kfreebsd-i386</option>
						<option>mips</option>
						<option>mipsel</option>
						<option>powerpc</option>
						<option>ppc64el</option>
						<option>s390</option>
						<option>s390x</option>
						<option>sparc</option>
					</select></label></p>
				</div>

				 <p>
					<label><input name="src" type="checkbox" checked> Include source</label><br>
					<label><input name="backports" type="checkbox" checked> Backports</label><br>
					<label><input name="contrib" type="checkbox" checked> Contrib</label><br>
					<label><input name="non-free" type="checkbox" checked> Non-Free</label><br>
					<label><input name="security" type="checkbox" checked> Security</label>
				</p>

				<p><label>Source List<br>
				<pre><code name="list"></code></pre>
				<!--<textarea autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" name="list" rows="10" cols="100"></textarea> --></label></p>
				<p><button class="button">Compile list definitions!</button></p>
			</div>
		</main>

		<div class="wrap wrap--footer"></div>

		<script nonce="<?php print $_SERVER['CSP_NONCE'] ?>" src="app.js"></script>

	</body>
</html>
<?php ?>
