const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */


mix.scripts([
	'bower_components/source/backend/js/jquery/jquery.min.js'
	'bower_components/source/backend/js/jquery/jquery.validate.js'
	'bower_components/source/backend/js/jquery/jquery-ui.min.js'
	'bower_components/source/backend/js/jquery/jquery-confirm.min.js'
	'bower_components/source/backend/admin/crown/js/plugins/spinner/jquery.mousewheel.js'
	'bower_components/source/backend/admin/crown/js/plugins/forms/uniform.js'
	'bower_components/source/backend/admin/crown/js/plugins/forms/jquery.tagsinput.min.js'
	'bower_components/source/backend/admin/crown/js/plugins/forms/autogrowtextarea.js'
	'bower_components/source/backend/admin/crown/js/plugins/forms/jquery.maskedinput.min.js'
	'bower_components/source/backend/admin/crown/js/plugins/forms/jquery.inputlimiter.min.js'
	'bower_components/source/backend/admin/crown/js/plugins/tables/datatable.js'
	'bower_components/source/backend/admin/crown/js/plugins/tables/tablesort.min.js'
	'bower_components/source/backend/admin/crown/js/plugins/tables/resizable.min.js'
	'bower_components/source/backend/admin/crown/js/plugins/ui/jquery.tipsy.js'
	'bower_components/source/backend/admin/crown/js/plugins/ui/jquery.collapsible.min.js'
	'bower_components/source/backend/admin/crown/js/plugins/ui/jquery.progress.js'
	'bower_components/source/backend/admin/crown/js/plugins/ui/jquery.timeentry.min.js'
	'bower_components/source/backend/admin/crown/js/plugins/ui/jquery.colorpicker.js'
	'bower_components/source/backend/admin/crown/js/plugins/ui/jquery.jgrowl.js'
	'bower_components/source/backend/admin/crown/js/plugins/ui/jquery.breadcrumbs.js'
	'bower_components/source/backend/admin/crown/js/plugins/ui/jquery.sourcerer.js'
	'bower_components/source/backend/admin/crown/js/custom.js'
	'bower_components/source/backend/js/ckeditor/ckeditor.js'
	'bower_components/source/backend/js/jquery/chosen/chosen.jquery.min.js'
	'bower_components/source/backend/js/jquery/scrollTo/jquery.scrollTo.js'
	'bower_components/source/backend/js/jquery/number/jquery.number.min.js'
	'bower_components/source/backend/js/jquery/formatCurrency/jquery.formatCurrency-1.4.0.min.js'
	'bower_components/source/backend/js/jquery/zclip/jquery.zclip.js'
	'bower_components/source/backend/js/jquery/colorbox/jquery.colorbox.js'
	'bower_components/source/backend/js/custom_admin.js'
	], 'public/js/allscript.js');
