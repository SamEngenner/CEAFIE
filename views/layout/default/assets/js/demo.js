$(function(){


   // this is for the appbar-demo page
   if ($("#appbar-theme-select").length){
      $("#appbar-theme-select").change(function(){
         var ui = $(this).val();

         if (ui != '')
            $("footer.win-commandlayout")
               .removeClass("win-ui-light win-ui-dark")
               .addClass(ui);
      });
   }


   // style switcher 
   if ($("#win-theme-select").length){
      $("#win-theme-select").change(function(){
         var css = $(this).val();

         if (css != '')
            updateCSS(css);
      });
   }


   $("#settings").click(function (e) {
      e.preventDefault();
      $('#charms').charms('showSection', 'theme-charms-section');
   });



   // listview demo
   $('#listview-grid-demo').on('click', '.mediumListIconTextItem', function(e){
      e.preventDefault();
      $(this).toggleClass('selected');
   });

   // Datepicker
   $('.datepicker').datepicker();



   // Tile ListView
   $('#tile-listview-demo').on('click', '.tile-listviewitem', function(e){
      e.preventDefault();
      var $this = $(this);
      $('#tile-listview-demo .tile-listviewitem').removeClass('selected');
      $this.addClass('selected');
   });

//   // FlipView demo
//   $('#myFlipview').carousel()

   $('.bs-docs-example-commands .win-command').tooltip();
});



//function to append a new theme stylesheet with the new style changes
function updateCSS(css){

   $("head").append('<link rel="stylesheet" type="text/css" href="assets/css/' + css +'.css">');

   if($("link[href*=metro-ui-]").size() > 1){
      $("link[href*=metro-ui-]:first").remove();
   }
   
}



/* Win8 animation */
function showDashBoard(){
   for(var i = 1; i <= 3; i++) {
      $('.col'+i).each(function(){
         $(this).addClass('fadeInForward-'+i).removeClass('fadeOutback');
      });
   }
}

function fadeDashBoard(){
   for(var i = 1; i <= 3; i++) {
      $('.col'+i).addClass('fadeOutback').removeClass('fadeInForward-'+i);
   }
}

$('.big, .small').each(function(){
   var $this= $(this),
      page = $this.data('page');
   $this.on('click',function(){
      $('.page.'+page).addClass('openpage');
      fadeDashBoard();
   })
});





// NOTICE!! DO NOT USE ANY OF THIS JAVASCRIPT
// IT'S ALL JUST JUNK FOR OUR DOCS!
// ++++++++++++++++++++++++++++++++++++++++++

!function ($) {

   $(function(){

      var $window = $(window)

      // Disable certain links in docs
      $('section [href^=#]').click(function (e) {
         e.preventDefault()
      })

      // side bar
      $('.bs-docs-sidenav').affix({
         offset: {
            top: function () { return $window.width() <= 980 ? 290 : 210 }
            , bottom: 270
         }
      })

      // make code pretty
      window.prettyPrint && prettyPrint()

      // add-ons
      $('.add-on :checkbox').on('click', function () {
         var $this = $(this)
            , method = $this.attr('checked') ? 'addClass' : 'removeClass'
         $(this).parents('.add-on')[method]('active')
      })

      // add tipsies to grid for scaffolding
      if ($('#gridSystem').length) {
         $('#gridSystem').tooltip({
            selector: '.show-grid > div'
            , title: function () { return $(this).width() + 'px' }
         })
      }

      // tooltip demo
      $('.tooltip-demo').tooltip({
         selector: "a[rel=tooltip]"
      })

      $('.tooltip-test').tooltip()
      $('.popover-test').popover()

      // popover demo
      $("a[rel=popover]")
         .popover()
         .click(function(e) {
            e.preventDefault()
         })

      // button state demo
      $('#fat-btn')
         .click(function () {
            var btn = $(this)
            btn.button('loading')
            setTimeout(function () {
               btn.button('reset')
            }, 3000)
         })

      // carousel demo
      $('#myCarousel').carousel()

      // javascript build logic
      var inputsComponent = $("#components.download input")
         , inputsPlugin = $("#plugins.download input")
         , inputsVariables = $("#variables.download input")

      // toggle all plugin checkboxes
      $('#components.download .toggle-all').on('click', function (e) {
         e.preventDefault()
         inputsComponent.attr('checked', !inputsComponent.is(':checked'))
      })

      $('#plugins.download .toggle-all').on('click', function (e) {
         e.preventDefault()
         inputsPlugin.attr('checked', !inputsPlugin.is(':checked'))
      })

      $('#variables.download .toggle-all').on('click', function (e) {
         e.preventDefault()
         inputsVariables.val('')
      })

      // request built javascript
      $('.download-btn').on('click', function () {

         var css = $("#components.download input:checked")
               .map(function () { return this.value })
               .toArray()
            , js = $("#plugins.download input:checked")
               .map(function () { return this.value })
               .toArray()
            , vars = {}
            , img = ['glyphicons-halflings.png', 'glyphicons-halflings-white.png']

         $("#variables.download input")
            .each(function () {
               $(this).val() && (vars[ $(this).prev().text() ] = $(this).val())
            })

         $.ajax({
            type: 'POST'
            , url: /\?dev/.test(window.location) ? 'http://localhost:3000' : 'http://bootstrap.herokuapp.com'
            , dataType: 'jsonpi'
            , params: {
               js: js
               , css: css
               , vars: vars
               , img: img
            }
         })
      })
   })

   // Modified from the original jsonpi https://github.com/benvinegar/jquery-jsonpi
   $.ajaxTransport('jsonpi', function(opts, originalOptions, jqXHR) {
      var url = opts.url;

      return {
         send: function(_, completeCallback) {
            var name = 'jQuery_iframe_' + jQuery.now()
               , iframe, form

            iframe = $('<iframe>')
               .attr('name', name)
               .appendTo('head')

            form = $('<form>')
               .attr('method', opts.type) // GET or POST
               .attr('action', url)
               .attr('target', name)

            $.each(opts.params, function(k, v) {

               $('<input>')
                  .attr('type', 'hidden')
                  .attr('name', k)
                  .attr('value', typeof v == 'string' ? v : JSON.stringify(v))
                  .appendTo(form)
            })

            form.appendTo('body').submit()
         }
      }
   })

}(window.jQuery)