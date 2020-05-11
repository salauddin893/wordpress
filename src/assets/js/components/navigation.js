const $ = jQuery;

$('.c-navigation').on('mouseenter', '.menu-item-has-children', (e) => {
    if(!$(e.currentTarget).parents('.sub-menu').length) {
        $('.menu > .menu-item.open').find('> a > .menu-button').trigger('click');
    }

    $(e.currentTarget).addClass('open');
}).on('mouseleave', '.menu-item-has-children', (e) => {
    $(e.currentTarget).removeClass('open');
});


$('.c-navigation').on('click', '.menu .menu-button', (e) => {
    e.preventDefault();
    e.stopPropagation();
    let menuButton = $(e.currentTarget);
    let menuLink = menuButton.parent();
    let menuItem = menuLink.parent();

    if($(menuItem).hasClass('open')){
        menuItem.add(menuItem.find('.menu-item.open > a > .menu-button').trigger('click')).removeClass('open');
        menuLink.attr('aria-haspopup', 'true');
        menuLink.attr('aria-expanded', 'false');
        menuButton.find('.menu-button-show').attr('aria-hidden', 'false');
        menuButton.find('.menu-button-hide').attr('aria-hidden', 'true');
    }else{      
        menuItem.siblings('.open').find('> a > .menu-button').trigger('click');  
        menuItem.addClass('open');
        menuLink.attr('aria-haspopup', 'false');
        menuLink.attr('aria-expanded', 'true');
        menuButton.find('.menu-button-show').attr('aria-hidden', 'true');
        menuButton.find('.menu-button-hide').attr('aria-hidden', 'false');
    }
});


$(document).on('click', (e) => {
    if($('.menu-item.open').length) {
        $('.menu > .menu-item.open > a > .menu-button').trigger('click');
    }
});