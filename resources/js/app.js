/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

/*require('./bootstrap');*/
import Helper from './helper/index';

window.swal = require('sweetalert');
window.helper = Helper;

document.addEventListener("DOMContentLoaded", Helper.onLoad);
