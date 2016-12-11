/* Add theme related links to theme customizer */

(function($) {
	if ('undefined' !== typeof amalie_links) {

		// Add Upgrade Notice
		upgrade = $('<a class="amalie-upgrade-link"></a>')
			.attr('href', amalie_links.upgradeURL)
			.attr('target', '_blank')
			.text(amalie_links.upgradeLabel);

		$('.preview-notice').append(upgrade);

		// Theme Links
		box = $('<div class="amalie-theme-links-wrap"></div>');

		title = $('<h3 class="amalie-theme-links-title"></h3>')
			.text(amalie_links.title);

		themePage = $('<a class="amalie-theme-link amalie-theme-link-info"></a>')
			.attr('href', amalie_links.themeURL)
			.attr('target', '_blank')
			.text(amalie_links.themeLabel);

		themeDocu = $('<a class="amalie-theme-link amalie-theme-link-docs"></a>')
			.attr('href', amalie_links.docsURL)
			.attr('target', '_blank')
			.text(amalie_links.docsLabel);

		themeSupport = $('<a class="amalie-theme-link amalie-theme-link-support"></a>')
			.attr('href', amalie_links.supportURL)
			.attr('target', '_blank')
			.text(amalie_lite_links.supportLabel);

		themeRate = $('<a class="amalie-theme-link amalie-theme-link-rate"></a>')
			.attr('href', amalie_links.rateURL)
			.attr('target', '_blank')
			.text(amalie_links.rateLabel);

		// Add Theme Links
		links = box.append(title).append(themePage).append(themeDocu).append(themeSupport).append(themeRate);

		setTimeout(function() {
			$('#accordion-panel-amalie_theme_options .control-panel-content').append(links);
		}, 2000);

		// Remove accordion click event
		$('.amalie-upgrade-link, .amalie-theme-link').on('click', function(e) {
			e.stopPropagation();
		});

	}
})(jQuery);