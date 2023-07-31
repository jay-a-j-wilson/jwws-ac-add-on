jQuery(function ($) {
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
});
