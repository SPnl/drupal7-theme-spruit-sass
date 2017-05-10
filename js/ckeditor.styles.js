/*
Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

/*
 * This file is used/requested by the 'Styles' button.
 * The 'Styles' button is not enabled by default in DrupalFull and DrupalFiltered toolbars.
 */
if(typeof(CKEDITOR) !== 'undefined') {
    CKEDITOR.addStylesSet( 'drupal',
    [
            /* Block Styles */

            { name : 'Paragraph'        , element : 'p' },
	    { name : 'Heading 1'        , element : 'h1' },
            { name : 'Heading 2'        , element : 'h2' },
            { name : 'Heading 3'        , element : 'h3' },
            { name : 'Slogan'           , element : 'h2', attributes : { 'class' : 'slogan' } },
            { name : 'Viewport width'   , element : 'p', attributes  : { 'class' : 'viewport-width' } } ,
            { name : 'Uitspraak'        , element : 'q' },
            { name : 'Lang citaat'      , element : 'blockquote'},
  	    { name : 'Citaat uitstaand' , element : 'blockquote', attributes : { 'class' : 'outset' } }, 
            { name : 'Vervolg-acties', element : 'ul', attributes : { 'class' : 'actions' }},
            
            /* Object styles */
            {
                    name : 'Links uitlijnen',
                    element : 'img',
                    attributes :
                    {
                            'style' : 'padding: 5px; margin-right: 5px',
                            'align' : 'left'
                    }
            },

            {
                    name : 'Rechts uitlijnen',
                    element : 'img',
                    attributes :
                    {
                            'style' : 'padding: 5px; margin-left: 5px',
                            'align' : 'right'
                    }
            }
    ]);
}
