require('bootstrap');
import $ from 'jquery';
import 'jquery-ui/ui/widgets/autocomplete';
import 'jquery-ui-bootstrap';

const jQuery = global.$ = global.jQuery = $;
require('./GaugeMeter');
$(document).ready(function () {
    $(".GaugeMeter").gaugeMeter();
});
