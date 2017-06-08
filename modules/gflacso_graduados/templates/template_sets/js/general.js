jQuery(document).ready(function(){

    ///Dsiable inputs wrapped in disableds divs
    jQuery('.form-group.readonly').find('input,select').attr("readonly","readonly");

    //Inject Bootstrap on form elements
    jQuery('form.bootstrap').find('input:not([type="submit"]):not([type="checkbox"]), textarea, select').addClass('form-control');
  
});

var spinner_opts = {
  lines: 13, // The number of lines to draw
  length: 10, // The length of each line
  width: 4, // The line thickness
  radius: 11, // The radius of the inner circle
  rotate: 0, // The rotation offset
  color: '#000', // #rgb or #rrggbb
  speed: 0.4, // Rounds per second
  trail: 32, // Afterglow percentage
  shadow: false, // Whether to render a shadow
  hwaccel: false, // Whether to use hardware acceleration
  className: 'spinner', // The CSS class to assign to the spinner
  zIndex: 2e9, // The z-index (defaults to 2000000000)
  top: '50%', // Top position relative to parent in px
  left: '50%' // Left position relative to parent in px
};

var gflacso_loadingIndex = 0;
var spinner;

function gflacso_startLoading(){
	gflacso_loadingIndex++;
	if (gflacso_loadingIndex == 1){
		jQuery('#loading').show();
		spinner = new Spinner(spinner_opts);
		spinner.spin(document.getElementById('loading'));
		console.log(spinner);
	}

}

function gflacso_stopLoading(){
	gflacso_loadingIndex--;
	if (gflacso_loadingIndex == 0){
		jQuery('#loading').hide();
		spinner.stop();
	}
}