const $ = jQuery;

// wp.customize('firsttheme_info_tex', (value) => {
//     value.bind((to) => {
//         $('.c-site-info__text').html(to);
//     });
// })

// wp.customize('firsttheme_collor_pikker', (value) => {
//     value.bind(() => {
//         let inlineCss = ``;
//         let inlineCssObj = firsttheme.inline_css;
//         for(let selector in inlineCssObj) {
//             inlineCss += `${selector} {`;
//                 for(prop in inlineCssObj[selector]) {
//                     let val = inlineCssObj[selector][prop];
//                     inlineCss += `${prop}: ${wp.customize(val).get()}`;
//                 }
//             inlineCss += `}`;
//         }
//         $('#bundle-css-inline-css').html(inlineCss);
//     })
// })

// wp.customize('blogname', (value) => {
//     value.bind((to) => {
//         $('.c-header__blogname').text(to);
//     })
// })

// wp.customize('firsttheme_authore_info', (value) => {
//     value.bind((to) => {
//         if(to) {
//             $('.c-post-author').show();
//         }else{
//             $('.c-post-author').hide();
//         }
//     });
// }

wp.customize('themename_single_author_info', (value) => {
    value.bind((to) => {
        if(to) {
            $('.c-post-author').show();
        }else{
            $('.c-post-author').hide();
        }
    });
});

wp.customize('themenaem_footer_info_text', (value) => {
    value.bind((to) => (
        $('.c-site-info__text').html(to)
    ));
});

wp.customize('blogname', (value) => {
    value.bind((to) => {
        $('.c-header__blogname').html(to);
    });
});



wp.customize('themename_color_picker', (value) => {
    value.bind((to) =>{
        let inlineCssObj = themename['inline-css'];
        let inlineCss = ``;
        for(let selector in inlineCssObj) {
            inlineCss += `${selector} {`;
                for(let prop in inlineCssObj[selector]){
                    let val = inlineCssObj[selector][prop];
                    inlineCss += `${prop}: ${wp.customize(val).get()}`;
                }
            inlineCss += `}`;
        }
        $('#main-style-inline-css').html(inlineCss);
    });
});


