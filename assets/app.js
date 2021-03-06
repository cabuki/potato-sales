/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

import 'bootstrap/dist/css/bootstrap.min.css';
import 'datatables.net-dt/css/jquery.dataTables.min.css';
import 'datatables.net-bs4/css/dataTables.bootstrap4.min.css';


const $ = require('jquery');
require('bootstrap');
require('bootstrap-datepicker');
require( 'datatables.net-bs4' )();

$(document).ready(function() {
    $('.js-datepicker').datepicker({
        format: 'yyyy-mm-dd'
    });
});
