<?php

// Path to Teepee from webroot
$dir['teepee'] = '/resources/teepee/';

// Directories
$dir['root'] = $_SERVER['DOCUMENT_ROOT'];
$dir['path'] = $_SERVER['REQUEST_URI'];
$dir['queries'] = $_SERVER['QUERY_STRING'];
$dir['host'] = $_SERVER['HTTP_HOST'];
$dir['parent'] = dirname($dir['path']);

// Remove query string from path
$parts = explode('?', $dir['path']);
$dir['path'] = $parts[0];

// Construct full URL
$dir['url'] = $dir['host'].$dir['path'];

// Full path to current location
$dir['full'] = $dir['root'].$dir['path'];

// Icons
$icons['archive'] = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAHmSURBVDiNlY+/TxRRFEbPLHcXWUNgRTYokVJCIAEbLSS2Vjs2/gEmJmosrKisqKykxMTKzoqYOKudrYWSaFgxFFtoICghSBZml5k375fFGBLDbgJf8op3k3u+c4Pmhwe3M2OfO+9n6JagxN2Hb6nVagDU63VWXt6hgF4vSd+CdDrtpQvVK9NjE5MUpHgSUDhHrCPuPXoCwOs375icvcXOz7WZ/d2tJVGddHp0pIw7/ILz9qRAsQJApVI5nvnOBqMjZX7/SKfFZCk+2cR3WQYIGARgeXmZRqMBgMsUXv/CZCkFrRRWtbFZ0vU5awAQERYXF3OANVjVRiuFGJXisqOu7fkJOSAMQ6Ioyk8wBpcdYVRKwSjVsz03cABEUUQYhv8MHDZLMEohOlO4LOlp4Kw9YeCsxWUJOlOItYJVvQFBGjM/Vz1un5+rYtMYqxKsFSTVA/ggwKn9rgDfavJiYYqgeD3/6xjdakIwQKo90m7FmP4bDI6P97T4P5coDl0l3tum3fqEBFJic+0jRwetUwLylIeGCaSMWK2ZmL3J4MXTGuSJ97ZZ3/yMeCmx9X2Vzp/3ZwKcH6nipYR4dbjTKU2NXQtriPSdatkYy9fVb3i1sRO8enz5fuvAPUsU1bMYDPSzOzxUePoXhH8UgmSvdmoAAAAASUVORK5CYII=';
$icons['code'] = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAHGSURBVDiNlZLPSlthEMV/98t3c4PBXJtbSCEg2RQkNN34DC5cuOgL+BT1LXwAX6R7CegmReE2tHAjKsQ/pCuDBsn3504XMTeNLaUZmMUMZ86cOUzQ6/V2nHOHeZ5/ZIVQSqVa689Bt9tNW61Wp9FooJT6r+E8zxmNRlxfX3/TxphOkiQYY1YRQJIkZFnW0d57vPcrDQPM57RzDhF5pVFABQAEE0NgPXmtUvTm4ZxDWWsRkSLLJ1eou3FRV758R/fvUXdjyidXS1hrLcp7XzSi7iXh+S2+vjZT9WzRP0aYdgNfXyM8vyXqXhZ47z1qfkJ0fEF4NuRxf5s8KiEihP17/NsqPq6QRyUe97cJz4ZExxeICM65hQfB0xQBpBQUnoRfh5jOu4VHpQCBGfaFoFAw2d3Cbm6wfnQKU0cwfkZnP5nOCaaO9aNT7OYGk92tPwlEhMleG9uMUTcPlHtDbKuOr5YREdTNA7YZM9lrF/ilE+bx9OkDgfWIVovtgGvWsK038Bv2rwQAohV5s/ZSSNHjFa4gsNaitV7pE51zMw+01lmaphhjlp7kX2mMIU1TtNaZrlarB4PB4LDf779fRUEURYM4jg9+AY0DZ4cpAUR4AAAAAElFTkSuQmCC';
$icons['css'] = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAHNSURBVDiNlZK9bhNBFEaPZ2e8axvbImtpgcpCIkIiToOgoqXlAWiQeAAaSB16/AC8Bq/g1lUWV+vGrVG0koOw1zt/FAOJrITE3G6k+c7cc+80ptPpa2PM2Dl3zH+UECKXUn5qTCaTfDgcjrIsQwixV9g5x3K5ZLFYfJd1XY/SNKUYv8f8LAGQ3QOGH77eCknTlKIoRtJai7WWh65EdRsAaFfivb8V8DcnjTF471HO4rdbAJSK7wQAGGOQWmu894jHzxH1BgDfbOH2AGitkdZavPcU0RTNeeggGlCefmN7sQYg7rV58fnNjRqXCll7ifwzA2OXdMwBzW4GQG30jUrGmCuAEGBNUBBRgnQCW9UAyGZ0N0ANXoENLRO1aT1N8VsLQCPeA3D6Q7OqfgHQTxRnasW5DlsZqJjD8Rmri3Du92K+fDzeBVQP1rRVAkCl15TlI6J7CoDSaDa0SO43AdjYGu/9LsBElrUJCs0oRhqoqvBiIgXOSzaboBQruQvQWvOsc8SWKlwgoZclrHXwbqsGWSOm0sE9UeEPGGOQUsoiz/PDt0fvUEpdTejltZldltaaPJ8hpSxkp9M5mc/n49ls9uTfkesVx/G83++f/AbgZRYV7aahUwAAAABJRU5ErkJggg==';
$icons['doc'] = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAGUSURBVDiNjZMxa9tAGIbfyAeOAo1iuFsEJmA56RS62SZLfkTH/IpCO5bQIT8he5f+hC79A7ZXBZo0NhmkRcQKpJAW4/vuvgzNXSTbSXogEJ907/O8J7Tx7Xv6YZLPTsu7PyEAHB8pWGvx2gqCIBVCfNz4fPbj79abVrjbjtFoBHh/qMDML24mIuR5jqIozkVR/g7ftfdxXcxhmaH1DojoVYM4jpFl2YEgY3B7b2AfqcwMZsZwOAQAKKUwm838RqUUut0umBnGGAhDBDJPnV3AYDDwsyRJanRXkYggiAyqZ+YCptOpJ1ctnAEAaK0hjCWvXw1JkqRGrt47g8cKBtZy7SEzYzQa1ehKqZUqRARhjIGpCLiAfr/vZ51Op0ZeCqCawboXn1veoHoGzmA8HvuZlBIAUJYlpJS+ylPAmq/Q6/VWiMtV/gXQ+grOQErpyXEcIwzD1QqaCEFDPGvgyMt0IkIgW9vzm+wnSGtYyz7gpWuxWCBNUwghrsTbvfjLxa/85HJ0sQkAX3X0Xz9Ts9mcRFH06QFIsTx57QMZyQAAAABJRU5ErkJggg==';
$icons['file'] = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAFMSURBVDiNlZA9isJAFMd/hgcWFhZRJFNoLLZ0a7XfStDLrLfwMAqewEILu6xV0lgpgieYj2SbTdhs4qIPhhmG/+drHI/HD2vtKk3Td14Yz/MiEfls7Ha7KAzDUa/Xw/O8p8hpmnK73Tifz1+itR75vo/W+pUA+L5PHMcjcc7hnHuJDJDzxFpLlmUArNdrut1uAVJKcblcSm+lFMPhEABrLWKMKQQWi0XFKQzDyjvHG2MQ51zxsdlsAIoUSimAwjlPM51OixqlCvP5vLbvYDAo3TneWlsW2O/3JadHu8irVAQmk0nJqS7FvwkOh0OJdL/fAeh0OgAEQQDwOMF4PK7dwd95mGC73VbcrtcrQRDU1ioEjDGICLPZrALq9/sl199kay2eiMRRFKG1Jsuyp47WmiiKEJFYWq3WMkmS1el0entqAT/TbDaTdru9/AbO//fVB3FwJQAAAABJRU5ErkJggg==';
$icons['folder'] = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAEISURBVDiNrZGxSgNREEXPCw/S7EZIZWelYqFlvsDKQhC0ssoPmCIfYG1hoWCXP7C3Si+ksBJEtBHE2JhgdgvNm5lnIQYkuLAbb3/vnHvHxRjpdbYugX1+62qpaXsHx7dTCuRixPU6m7a2voFzNQBijAxfnsnzLAA2Z4JYr/v+4cnNrru+2DlrrG4fNZdXig7NafT6xOShf+6DWjtJEj7eh6UCkiThTa3tg2gaPvNSZgCVKUE09aKGSSgdACBq+CCKVgwIongRw6TwU38TyA+BLkAQRCtvMKtQdYNZhaobfBPoAgRq/7CBig3G41GrkaalzJMsQ8UGPljs3t0/nkZolQlwMKBW634BV/GiU2qcKJgAAAAASUVORK5CYII=';
$icons['home'] = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAHnSURBVDiNlZI9axRRFIafmb3L7MdshBRB2EIIqNlCyxSWkkIsAspaBIuQP2CK/ABrCwsFu/wDqwjZhHyYUtjCShDRRlAjumYxOzs7M/fcey3W3XWZGPSF29zzvuc893A95xyb69efA02m1bowa+/ce/gm4xx5zuFtrl+zV6428DwfAOccx18+EUU9DdhcCFwQqIP7j14ve6+e3X4yc3npwezFS+cNyunk60dO3x88VdrYtTAMSX4e5/F8NSSykquFYcgPY9eUFlPTaZQz+CogimIAqpUAK+lU3UiGFlNTYixW9Jnhl7svALh5a5lKqZhrIsbiazEY0ePj8In6Aw53t1iol1iolzjc3SLqD3D4U14tBl/EYiXDSgb49OOEo/1tGvUyRVWgqAo06mWO9rfpxwngj/0iIwKjsc7RT1L2dlrMzwUUVWGMWlQF5ucC9nZa9JMU6xzG/CbQYrCisaKplis0V1aJE5NbapwYmiurVMuVsV+LQYlYjGhAI9mAwOhceKQk6pD2vk+WKBY1JJj8VieaOBW+dZNpglRwoqe8QwIzIhgqSyJuLN09kyDufp7yihkTTC7TXoe01/nrM/6UFoMyYtvd7sniTK32T6GRTns9jNi20tZtvH334bGDxf9p4EEb39/4BVgfNE6XF4wqAAAAAElFTkSuQmCC';
$icons['html'] = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAJ/SURBVDiNlZM9b1RXEIafe+65d9d79wP7rr1oMeCAsOTEjpBQKBBJlygSTZQ+HT8B/gUVok2RPp0lJIjSWJFSGCS02aBk14XBCWZtgyzb7OJ7zpmh2NgUTgFTz/vMzDsz0erq6tfe+zsi8jkfEcaYjrX2VrSystKZm5tbarVaGGM+SCwiDAYD1tfX/7BFUSzleU5RFAAo8PDxvzzfGbLx6oDzMzXO5Bl5NeWLS/kxJM9zer3ekg0hEEIA4OXuiJ9/e0atWuaT9ilazSrtqYwgyu9/Dbj/6Dk3v5mnPVXhSGe896gqIsK95afEScKhE2abGQuzk9QnEja29zEmwmO4u/wnzgdUFe89xjmHqvLjw7+RaOzB1fkZUhuTWIOoosBktUR9IsXElp9+7aOqOOcwIYxpG6+GnJup8+Vnp2lkKTY2JLGh8MJgd4iIciavUC4lrG8doKqEELBHI8TGcHV+hnJqMSYiNhE2NjzdeE3hhM23b1BV8lqZYazvRzgCnJ2usb33lkdrW+wNi2O3s1KCicbb8aKMCk/rVOUkYCIxqAhrL/b45ck/PNvaxwfh8oUm31+7SKOSIgKT1ZQkjk4CpuspO7vjNkeHnsdrO7ggBFF8EKrlBBFlNDpkup6eBFxfaHLoHM1qig9Ke6qC84Lzgg8CwN7+kDSG6wvNkwBV5dvLp3mxvcvm1mtmpyu4ILgg7A8LDt6MqJUNN660j/O99+MtOOew1jKZJdz67lMePNmk09+kcOPKaWKYnZrgh6/Ojs/9P7H3Hmut7XU6nfnFxUWSJMHGETeutP/3iVQVAOcc3W4Xa23PZll2u9/v3+l2u5c+7JHHUSqV+o1G4/Y7VN2AN07a1GsAAAAASUVORK5CYII=';
$icons['image'] = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAIcSURBVDiNlZJNTlNhGIWf9+v9bi8FqnANjVHToCE6ANbgxGUYN8EiTGQJrsC4AgdOGOgABkCjicVII1qr/LS0vbf9fh1gwszQd36enPOeI7u7u8+MMdsxxk1mOBE5SNN0S3Z2dg6azeZGo9FAKXUjcQiBXq9Hp9M5TIwxG3meY4yZxQB5ntNutzcS5xzv9g95/votsVYhaoVMPTJ2SBmQSUAmEWVALIgXAN68eoFzjsQ5R3cwYPl+E5nXBC1MLwvi0JBahSojYWShDIgVlFeIwFl/zLxyJNZaVK1G404DVdUEAk47wnyAiUcM6GmkPC9JKxlZrYZSglRTbGGvHFSU5unjR3y6GLOgFRdjQ6xFcIJYoWYD7rYnRE1taZEs04j2VxG89yhV4ecQ1u+tcNIfczeZp55ozieRlVRzfDxgablKVCmrj5aIaQLSxXuPcs5BgBgjE+tQUVitz/HroqQYTOn1CvIsJUOhBUZDQ7c3Rny8fqLygcuzEeNRSXCBD51z/NTjho5CKnQLjy0cWX2O3u8qIkK4lV0DEufon5xSSROCD5ixYTIo8YVFoQg2XpV/BhWdXAE2Hl4DqlPLny8/ULpC9AFTTHCl+++QnH1wDWjkdU6/fZ1piSv5Iv3uvxY2nzT5/v7lTIDhcMjn/Y8kSqn23t7e2vr6OlrrG4mttbRaLZRS7WRhYWHr6Ohou9Vqrc3iIMuydr1e3/oLlTAupOJParwAAAAASUVORK5CYII=';
$icons['parent'] = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAFrSURBVDiNpZO9SgNBFIW/2Y0jZmJIAhZBbYQV3EJSWfkIWyr4Fj6BxeIT2IrvsO9gK6Sws7GIsBCLLYITjWH3WrjKZjNRxAOX+Tv3DPfMHSUi/AeNH84UsA0IkJbjErwfBLpBEJwEQXAKdFeyRMQVa0mSDJRSQ6XUMEmSgYisubirBHaMMTfAHXBnjLkRkR0X11XCZhRFR9baAfACvFhrB1EUHQGbS0bVXsGbTCZ7vV7vKs9zv2Kc8n0/z7LsvN1uPwLFKhO3wjA8K5NfgbcyXvM898MwPAO2Fm6szDfiOA7SND0GslKgGlmapsdxHAfAhquEXWPMxXQ6XQdyhzcAfrPZnFlrL4EnWGyk9/F4PPQ8T+bzOZ1O57Caaa29ByiKQgHvX/tVgXGr1boGGI1GB8B+VaDRaNxqrR/K5beJ9VYuAESk4NO8b8xms0JrXdT47r+gtRY+jfsVToF+v29F5Lm2PXVx6430Z3wAjCvJuVs9SfYAAAAASUVORK5CYII=';
$icons['video'] = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAJgSURBVDiNlZO9bhtHFIW/mZ2d3RVXJEs1hBMYCQtFhhYp1QgR8g58Cbmy38JurJcI8hCBmq0JxEVAG8gP1KiUREhczp2fFLMJbHe+7WDunHO+M+ri4uJn7/0bpdSLl9/8RdFU6MpS2BJVGgCSeIIT4t4Rdnve/f0tKaXfjTGvzG63e9v3/cnl5SU/Pj+ksBZdlejSoAqdF4RIFE/cC8E5fmifcXV19eLs7Oyt8d6frFYr7u7ueAjvsbWlqPLrSo8LYswq9oIbHB//dKxWK7z3J+r09DSt12vOz8/5mrm+vqbrOtTx8XGazWYAXJ38Q12XaGvRpYbRAiESJRKdYxiEy/fPALi/v0d77+n7HhHhcFJStzXNtKaZTTiYtxzMW5rZhGZaU7c1h5MSEaHve7z3GO89XdcBoKuSorYUTZ1pjBSieMJuP+YREBG6rsN7jxYR1us1IoIqCpQp0KWhqCxle0DZHlBUNlMxBaoo+PSO8d6zXC6z16RIMZFSIsWM7n8KKZFigpQQEZbLZVbgvWez2SAimbUIcXD4pwHZPiLbR/zTQBxcPhOPiLDZbHIGIQQWi0UOe1CgFMSEHi3lIoWcw94RBodIYrFYEELIFm5ubjg6OmL/lLCjdG2Kz4oUfSA6wQ2CiOL29pb5fI5q2zZZa7+qRP+Ncy4r2G63TKdTfltNqJsKbUt0WXzxF7KCYbfnp18eeXh4oGkaTAjhQ1VV32utmR3WuQO1RdsSZcYMRvlhcFRGIXJHVVWklD6YGOPrGOMbpdR3v/7xhLYeXRp0WX6hYKTkHM45Ukoftdav/wWP7nOnXPYUNgAAAABJRU5ErkJggg==';

// Title & breadcrumbs
$title = '<h1>';
$parts = explode('/', $dir['path']);
$parts = array_filter($parts);
$parts = array_reverse($parts);

// Home link
$title .= '<a href="/" class="icon home"></a> /';

// Show each breadcrumb
$count = count($parts) - 1;
for ($i = $count; $i >= 0; $i--) {

	// Don't make the current folder a link
	if ($i !== 0) {
		$title .= '<a href="';
		for ($i2 = 0; $i2 < $i; $i2++) {
			$title .= '../';
		}
		$title .= '" class="breadcrumb">'.$parts[$i].'</a>/';
	} else {
		$title .= '<b>'.$parts[$i].'</b>/';
	}

}

$title .= '</h1>';

// Start table
$table = '<table>';

// Table head
$table .= '	<thead>';
$table .= '		<tr>';
$table .= '			<th class="faded smallcaps head-file"></th>';
$table .= '			<th class="faded smallcaps head-file">File</th>';
$table .= '			<th class="faded smallcaps head-size">Size</th>';
$table .= '			<th class="faded smallcaps head-modified">Modified</th>';
$table .= '		</tr>';
$table .= '	</thead>';
$table .= '	<tbody>';

// Get dir list
$items['all'] = array_diff(scandir($dir['full']), array('..', '.'));

// Show parent link
if ($dir['path'] !== '/') {

	// Get parent folder name
	$parts = explode('/', $dir['parent']);
	$parent = end($parts);
	if ($parent === '') { $parent = '/'; }

	// Get data for parent folder
	$stats = stat($dir['root'].$dir['parent']);

	$table .= '<tr>';

	// Parent icon
	$table .= '	<td class="col-icon"><a href="../"><img src="'.$icons['parent'].'" class="icon"></a></td>';

	// Parent name
	$table .= '	<td class="col-file"><a href="../" class="faded">'.$parent.'</a></td>';

	// Parent size
	$items['parent'] = array_diff(scandir($dir['root'].$dir['parent']), array('..', '.'));
	$size = count($items['parent']);
	if ($size === 1) {
		$file_s = 'File';
	} else {
		$file_s = 'Files';
	}
	$table .= '<td class="col-size"><a href="../" class="faded">'.$size.' <span class="smallcaps">'.$file_s.'</span></a></td>';

	// Parent modified
	// $table .= '	<td class="col-modified"><a href="../"></a></td>';
	$table .= '<td class="col-modified"><a href="../" class="faded">'.date('\<\s\p\a\n\ \c\l\a\s\s\=\"\s\m\a\l\l\c\a\p\s\"\>D\<\/\s\p\a\n\> Y-m-d \<\s\p\a\n\ \c\l\a\s\s\=\"\s\m\a\l\l\c\a\p\s\"\>h:i\<\/\s\p\a\n\>', $stats['mtime']).'</a></td>';
	$table .= '</tr>';

}

// Folders and Files arrays
$items['folders'] = array();
$items['files'] = array();

// Split folders and files
foreach ($items['all'] as $item) {
	if (is_dir($dir['full'].$item)) {
		array_push($items['folders'], $item);
	} else {
		array_push($items['files'], $item);
	}
}

// Count folders and files
$counts = array();
$counts['folders'] = count($items['folders']);
$counts['files'] = count($items['files']);

// Show folders
foreach ($items['folders'] as $key => $folder) {
	
	$table .= '<tr>';

		// Get folder stats
		$stats = stat($dir['full'].$folder);

		// Icon
		$table .= '<td class="col-icon"><a href="'.$folder.'"><img src="'.$icons['folder'].'" class="icon"></a></td>';

		// Folder name
		$table .= '<td class="col-file"><a href="'.$folder.'">'.$folder.'</a></td>';

		// Child count
		$items['children'] = array_diff(scandir($dir['full'].'/'.$folder), array('..', '.'));
		$size = count($items['children']);
		if ($size === 1) {
			$file_s = 'File';
		} else {
			$file_s = 'Files';
		}
		$table .= '<td class="col-size"><a href="'.$folder.'">'.$size.' <span class="faded smallcaps">'.$file_s.'</span></a></td>';

		// Modified
		$table .= '<td class="col-modified"><a href="'.$folder.'">'.date('\<\s\p\a\n\ \c\l\a\s\s\=\"\f\a\d\e\d\ \s\m\a\l\l\c\a\p\s\"\>D\<\/\s\p\a\n\> Y-m-d \<\s\p\a\n\ \c\l\a\s\s\=\"\f\a\d\e\d\ \s\m\a\l\l\c\a\p\s\"\>h:i\<\/\s\p\a\n\>', $stats['mtime']).'</a></td>';

	$table .= '</tr>';

}

// Show files
foreach ($items['files'] as $key => $file) {
	
	$table .= '<tr>';

		// Get file stats
		$stats = stat($dir['full'].$file);

		// Icon
		$parts = explode('.', $file);
		$filetype = end($parts);
		$icon = '<img src="';
		switch ($filetype) {

			case 'html':
				$icon .= $icons['html'];
				break;
			
			case 'css':
				$icon .= $icons['css'];
				break;

			case 'bmp':
			case 'png':
			case 'psd':
			case 'gif':
			case 'jpg':
			case 'jpeg':
			case 'ico':
				$icon .= $icons['image'];
				break;
			
			case 'php':
			case 'py':
			case 'rb':
			case 'asp':
			case 'aspx':
			case 'jsp':
			case 'do':
			case 'action':
			case 'js':
			case 'json':
			case 'c':
			case 'pl':
			case 'xml':
			case 'rss':
			case 'svg':
			case 'cgi':
			case 'dll':
			case 'htaccess':
				$icon .= $icons['code'];
				break;

			default:
				$icon .= $icons['file'];
				break;
		
		}
		$icon .= '" class="icon">';
		$table .= '<td class="col-icon"><a href="'.$file.'">'.$icon.'</a></td>';

		// File name
		$pathinfo = pathinfo($file);
		$table .= '<td class="col-file"><a href="'.$file.'">'.$pathinfo['filename'].'<span class="faded">.'.$pathinfo['extension'].'</span></a></td>';

		// Size
		if ($stats['size'] >= 1073741824) {
			$stats['size'] = $stats['size'] / 1024 / 1024 / 1024;
			$stats['size'] = round($stats['size'], 2);
			$stats['size'] .= ' <span class="faded smallcaps">GB</span>';
		} elseif ($stats['size'] >= 1048576){
			$stats['size'] = $stats['size'] / 1024 / 1024;
			$stats['size'] = round($stats['size'], 2);
			$stats['size'] .= ' <span class="faded smallcaps">MB</span>';
		} elseif ($stats['size'] >= 1024) {
			$stats['size'] = $stats['size'] / 1024;
			$stats['size'] = round($stats['size'], 2);
			$stats['size'] .= ' <span class="faded smallcaps">KB</span>';
		} else {
			$stats['size'] .= ' <span class="faded smallcaps">B</span>';
		}
		$table .= '<td class="col-size"><a href="'.$file.'">'.$stats['size'].'</a></td>';

		// Modified
		$table .= '<td class="col-modified"><a href="'.$file.'">'.date('\<\s\p\a\n\ \c\l\a\s\s\=\"\f\a\d\e\d\ \s\m\a\l\l\c\a\p\s\"\>D\<\/\s\p\a\n\> Y-m-d \<\s\p\a\n\ \c\l\a\s\s\=\"\f\a\d\e\d\ \s\m\a\l\l\c\a\p\s\"\>h:i\<\/\s\p\a\n\>', $stats['mtime']).'</a></td>';

	$table .= '</tr>';

}

// Close table
$table .= '	</tbody>';
$table .= '</table>';

// Folder summary
if ($counts['folders'] === 1) {
	$folder_s = 'Folder';
} else {
	$folder_s = 'Folders';
}
$summaries['folders'] = $counts['folders'].' '.$folder_s;

// File summary
if ($counts['files'] === 1) {
	$file_s = 'File';
} else {
	$file_s = 'Files';
}
$summaries['files'] = $counts['files'].' '.$file_s;

// Construct summary
$summary = '<section class="summary faded smallcaps">';
$summary .= $summaries['folders'].' | '.$summaries['files'];
$summary .= '</section>';

?><!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?=$dir['path'];?></title>
		<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link href="data:image/x-icon;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQEAYAAABPYyMiAAAABmJLR0T///////8JWPfcAAAACXBIWXMAAABIAAAASABGyWs+AAAAF0lEQVRIx2NgGAWjYBSMglEwCkbBSAcACBAAAeaR9cIAAAAASUVORK5CYII=" rel="icon" type="image/x-icon">
		<link rel="stylesheet" href="<?php echo $dir['teepee'];?>/style.css">
	</head>
	<body>
		<div class="wrapper">
			<?=$title;?>
			<?=$table;?>
			<?=$summary;?>
		</div>
	</body>
</html>
