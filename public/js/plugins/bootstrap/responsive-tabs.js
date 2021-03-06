if (fakewaffle === undefined) {
    var fakewaffle = {};
}

fakewaffle.responsiveTabs = function (collapseDisplayed) {
    "use strict";
    fakewaffle.currentPosition = 'tabs';

    var tabGroups = jQuery('.nav-tabs.responsive'),
        hidden    = '',
        visible   = '';

    if (collapseDisplayed === undefined) {
        collapseDisplayed = ['xs', 'sm'];
    }

    jQuery.each(collapseDisplayed, function () {
        hidden  += ' hidden-' + this;
        visible += ' visible-' + this;
    });

    jQuery.each(tabGroups, function () {
        var $tabGroup   = jQuery(this),
            tabs        = $tabGroup.find('li a'),
            collapseDiv = jQuery("<div></div>", {
                "class" : "panel-group responsive" + visible,
                "id"    : 'collapse-' + $tabGroup.attr('id')
            });

        jQuery.each(tabs, function () {
            var $this          = jQuery(this),
                active         = '',
                oldLinkClass   = $this.attr('class') === undefined ? '' : $this.attr('class'),
                newLinkClass   = 'accordion-toggle',
                oldParentClass = $this.parent().attr('class') === undefined ? '' : $this.parent().attr('class'),
                newParentClass = 'panel panel-default';

            if (oldLinkClass.length > 0) {
                newLinkClass += ' ' + oldLinkClass;
            };

            if (oldParentClass.length > 0) {
                oldParentClass = oldParentClass.replace(/\bactive\b/g, '');
                newParentClass += ' ' + oldParentClass;
                newParentClass = newParentClass.replace(/\s{2,}/g, ' ');
                newParentClass = newParentClass.replace(/^\s+|\s+$/g, '');
            };

            if ($this.parent().hasClass('active')) {
                active = ' in';
            }

            collapseDiv.append(
                jQuery('<div>').attr('class', newParentClass).html(
                    jQuery('<div>').attr('class', 'panel-heading').html(
                        jQuery('<h4>').attr('class', 'panel-title').html(
                            jQuery('<a>', {
                                'class' : newLinkClass,
                                'data-toggle': 'collapse',
                                'data-parent' : '#collapse-' + $tabGroup.attr('id'),
                                'href' : '#collapse-' + $this.attr('href').replace(/#/g, ''),
                                'html': $this.html()
                            })
                        )
                    )
                ).append(
                    jQuery('<div>', {
                        'id' : 'collapse-' + $this.attr('href').replace(/#/g, ''),
                        'class' : 'panel-collapse collapse' + active
                    }).html(
                        jQuery('<div>').attr('class', 'panel-body').html('')
                    )
                )
            );
        });

        $tabGroup.next().after(collapseDiv);
        $tabGroup.addClass(hidden);
        jQuery('.tab-content.responsive').addClass(hidden);
    });

    fakewaffle.checkResize();
    fakewaffle.bindTabToCollapse();
};

fakewaffle.checkResize = function () {
    "use strict";
    if (jQuery(".panel-group.responsive").is(":visible") === true && fakewaffle.currentPosition === 'tabs') {
        fakewaffle.toggleResponsiveTabContent();
        fakewaffle.currentPosition = 'panel';
    } else if (jQuery(".panel-group.responsive").is(":visible") === false && fakewaffle.currentPosition === 'panel') {
        fakewaffle.toggleResponsiveTabContent();
        fakewaffle.currentPosition = 'tabs';
    }

};

fakewaffle.toggleResponsiveTabContent = function () {
    "use strict";
    var tabGroups = jQuery('.nav-tabs.responsive');

    jQuery.each(tabGroups, function () {
        var tabs = jQuery(this).find('li a');

        jQuery.each(tabs, function () {
            var href         = jQuery(this).attr('href').replace(/#/g, ''),
                tabId        = "#" + href,
                panelId      = "#collapse-" + href,
                tabContent   = jQuery(tabId).html(),
                panelContent = jQuery(panelId + " div:first-child").html();

            jQuery(tabId).html(panelContent);
            jQuery(panelId + " div:first-child").html(tabContent);
        });

    });
};

fakewaffle.bindTabToCollapse = function () {
    "use strict";
    var tabs     = jQuery('.nav-tabs.responsive').find('li a'),
        collapse = jQuery(".panel-group.responsive").find('.panel-collapse');

    tabs.on('shown.bs.tab', function (e) {
        var $current  = jQuery(jQuery(e.target)[0].hash.replace(/#/, '#collapse-'));
        $current.collapse('show');

        if(e.relatedTarget){
            var $previous = jQuery(jQuery(e.relatedTarget)[0].hash.replace(/#/, '#collapse-'));
            $previous.collapse('hide');
        }
    });

    collapse.on('show.bs.collapse', function (e) {
        var current = jQuery(e.target).context.id.replace(/collapse-/g, '#');

        jQuery('a[href="' + current + '"]').tab('show');
    });
}

jQuery(window).resize(function () {
    "use strict";
    fakewaffle.checkResize();
});
