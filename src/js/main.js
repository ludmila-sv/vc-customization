import jsClasses from './utils/js';
jsClasses();

// global vars for reuse.
//window.PFPopup = window.PFPopup || {};
//window.PFPopup.Manager = new PopupsManager( window.PFPopup.settings );
//window.PF = window.PF || {};
//window.PF.posts = window.PF.posts || {};

// instantiate everything imported so far.
//initLazyLoad();
//initLazyloadGForm();

import initObjectFit from './utils/object-fit';
initObjectFit();

import Slick from 'slick-slider/slick/slick';

// blocks
import { initCompaniesWhoTrustUsSlider } from './blocks/companies-slider';
initCompaniesWhoTrustUsSlider( document );

//ExitPopup.init();
