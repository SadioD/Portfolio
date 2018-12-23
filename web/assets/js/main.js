$(function() {
    var AplCss, aboutSection, manager;
    var timing = 500;
    manager = {
        // Hire Me Buttton - Page About -------------------------------------------------------------------------------------
        hireMeSection: {
            close_about_page: function() {
                AplCss       = { 'display': 'none', 'top': '-100%' };
                aboutSection = $('.prt_about_wrapper');
                
                setTimeout(function () {
                    aboutSection.css('display', 'none');
                }, 
                timing);

                aboutSection.animate(AplCss, timing);
            },
            open_contact_page: function() {
                $('#contactLink').trigger('click');
            },
            load_script: function() {
                $('#hireButton').on('click', function (e) {
                    e.preventDefault();
                    manager.hireMeSection.close_about_page();
                    manager.hireMeSection.open_contact_page();                    
                });
            }
        }// ------------------------------------------------------------------------------------------------------------
    };
    manager.hireMeSection.load_script();
});