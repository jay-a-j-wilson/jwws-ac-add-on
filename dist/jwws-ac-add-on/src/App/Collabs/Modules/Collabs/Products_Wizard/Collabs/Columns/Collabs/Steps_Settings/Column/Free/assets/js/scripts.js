jQuery(function ($) {
    $(document).tooltip({
        // The content of the tooltip.
        content: function () {
            return $(this).next('[role="tooltip"]').html();
        },
        // Specify additional classes to add to the widget's elements. 
        classes: {
            "ui-tooltip": "JW_ACA--c-tooltip",
        },
        position: {
            my: "right-24",
            at: "center",
        },
        show: {
            effect: "fade",
            duration: 200,
        },
        hide: {
            effect: "fade",
            duration: 200,
        },
    });
    $(".accordion").accordion({
        animate: 100,
        active: false,
        collapsible: true,
        header: ">.accordion-header",
        heightStyle: "content",
        icons: {
            header: "JW_ACA--c-icon dashicons dashicons-arrow-right",
            activeHeader: "JW_ACA--c-icon dashicons dashicons-arrow-down",
        },
    });
    $(".accordion-steps").accordion({
        animate: 100,
        active: false,
        collapsible: true,
        header: ">.accordion-steps-header",
        heightStyle: "content",
        icons: {
            header: "JW_ACA--c-icon dashicons dashicons-arrow-right",
            activeHeader: "JW_ACA--c-icon dashicons dashicons-arrow-down",
        },
    });
    $(".accordion-nested").accordion({
        animate: 100,
        active: false,
        collapsible: true,
        header: ">.accordion-header-nested",
        heightStyle: "content",
        icons: {
            header: "JW_ACA--c-icon dashicons dashicons-arrow-right",
            activeHeader: "JW_ACA--c-icon dashicons dashicons-arrow-down",
        },
    });
});
