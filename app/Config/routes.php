<?php

/**
 * Routes Configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app.config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/views/pages/home.ctp)...
 */

    Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
    Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

    // video
    Router::redirect(
    '/video',
    array(
        'controller' => 'content',
        'action' => 'video',
        'vid' => 'eygDwQeLEw4',
    ));

// /eng or /spa or /fre or /rus
Router::connect('/:language', array('controller' => 'pages', 'action' => 'display', 'home'),
    array(
        'language' => 'eng|spa|fre|rus'
    )
);

Router::connect('/Unser_Immobilienmakler_Mallorca_Team', array('controller' => 'content', 'action' => 'team', 'language' => 'deu', 'slug' => 'Unser_Immobilienmakler_Mallorca_Team'));
Router::connect('/:language/:slug', array('controller' => 'content', 'action' => 'team'),
array(
    'language' => 'eng|spa|fre|rus',
    'slug' => 'Our_Team|Nuestro_equipo|Notre_equipe'
));

Router::connect('/Unsere_Empfehlung', array('controller' => 'content', 'action' => 'immobiliencanarien', 'language' => 'deu', 'slug' => 'Unsere_Empfehlung'));

Router::connect('/Apartments_Fincas_Villen_Kauf_Verkauf_Mallorca', array('controller' => 'content', 'action' => 'sell', 'language' => 'deu', 'slug' => 'Apartments_Fincas_Villen_Kauf_Verkauf_Mallorca'));
Router::connect('/:language/:slug', array('controller' => 'content', 'action' => 'sell'),
array(
    'language' => 'eng|spa|fre|rus',
    'slug' => 'Apartments_and_penthouses_for_sale_in_Palma_de_Mallorca|Apartamentos_y_aticos_en_venta_en_Palma_de_Mallorca|Vous_voulez_vendre|You_are_interested_in_selling'
));

Router::connect('/Kontakt', array('controller' => 'contacts', 'action' => 'show', 'language' => 'deu', 'slug' => 'Kontakt'));
Router::connect('/:language/:slug', array('controller' => 'contacts', 'action' => 'show'),
array(
    'language' => 'eng|spa|fre|rus',
    'slug' => 'Contact|Contacto|contact'
));

Router::connect('/Impressum', array('controller' => 'contacts', 'action' => 'show', 'language' => 'deu', 'slug' => 'URLKontakt'));
Router::connect('/:language/:slug', array('controller' => 'contacts', 'action' => 'show', 'language' => 'deu', 'slug' => 'URLKontakt'),
array(
    'language' => 'eng|spa|fre|rus',
    'slug' => 'Legal_info|Aviso_legal|Mentions_legales'
));

Router::connect('/VIP_Special', array('controller' => 'content', 'action' => 'vip', 'language' => 'deu', 'slug' => 'VIP_Special'));
Router::connect('/:language/:slug', array('controller' => 'content', 'action' => 'vip', 'language' => 'deu', 'slug' => 'VIP_Special'),
array(
    'language' => 'eng|spa|fre|rus',
    'slug' => 'VIP_Special|Oferta_VIP|SPECIAL_VIP'
));





// home.ctp links
Router::connect('/Finest_Properties_Mallorca_praesentiert_Ihnen_exklusive_Immobilien_Mallorca', array('controller' => 'content', 'action' => 'video', 'vid' => 'eygDwQeLEw4', 'language' => 'deu', 'slug' => 'URLFinest_Properties_praesentiert_Ihnen_exklusive_Immobilien_Mallorca'));
Router::connect('/:language/:slug', array('controller' => 'content', 'action' => 'video', 'vid' => 'eygDwQeLEw4'),
array(
    'language' => 'eng|spa|fre|rus',
    'slug' => 'Finest_Properties_Mallorca_presents_luxury_properties_on_Majorca|Finest_Properties_Mallorca_le_presenta_seleccionadas_propiedades_de_lujo_en_Mallorca|Finest_Properties_Mallorca_presente_des_proprietes_exclusives_de_Majorque'
));
//Router::connect('/Finest_Properties_Mallorca_praesentiert_Ihnen_exklusive_Immobilien_Mallorca', array('controller' => 'content', 'action' => 'video', 'language' => 'deu', 'slug' => 'URLFinest_Properties_praesentiert_Ihnen_exklusive_Immobilien_Mallorca'));
//Router::connect('/:language/:slug', array('controller' => 'content', 'action' => 'video'),
//array(
//    'language' => 'eng|spa|fre|rus',
//    'slug' => 'Finest_Properties_Mallorca_presents_luxury_properties_on_Majorca|Finest_Properties_Mallorca_le_presenta_seleccionadas_propiedades_de_lujo_en_Mallorca|Finest_Properties_Mallorca_presente_des_proprietes_exclusives_de_Majorque'
//));

Router::connect('/Villen_an_erster_Meereslinie', array('controller' => 'gesamtobjekt', 'action' => 'search', 'cat' => 100, 'multiple' => 1, 'language' => 'deu', 'slug' => 'URLVillen_an_erster_Meereslinie'));
Router::connect('/:language/:slug', array('controller' => 'gesamtobjekt', 'action' => 'search', 'cat' => 100, 'multiple' => 1),
array(
    'language' => 'eng|spa|fre|rus',
    'slug' => 'Waterfront_villas|Villas_en_primera_linea|Majorque_villas_en_bord_de_mer|Frontline_villas_in_Mallorca'
));

Router::connect('/Mallorca_Villas_mit_Meerblick', array('controller' => 'gesamtobjekt', 'action' => 'search', 'cat' => 100, 'multiple' => 2, 'language' => 'deu', 'slug' => 'Mallorca_Villas_mit_Meerblick'));
Router::connect('/:language/:slug', array('controller' => 'gesamtobjekt', 'action' => 'search', 'cat' => 100, 'multiple' => 2),
array(
    'language' => 'eng|spa|fre|rus',
    'slug' => 'Sea_view_villas_in_Mallorca|Villas_con_vistas_al_mar_en_Mallorca|Majorque_villas_avec_vue_sur_la_mer'
));

Router::connect('/Die_schoensten_Ferienwohnungen_auf_der_zauberhaften_Insel', array('controller' => 'gesamtobjekt', 'action' => 'search', 'cat' => 1, 'multiple' => 1, 'language' => 'deu', 'slug' => 'URLDie_schoensten_Ferienwohnungen_auf_der_zauberhaften_Insel'));
Router::connect('/:language/:slug', array('controller' => 'gesamtobjekt', 'action' => 'search', 'cat' => 1, 'multiple' => 1),
array(
    'language' => 'eng|spa|fre|rus',
    'slug' => 'The_most_beautiful_apartments_on_the_Island|Los_mas_hermosos_apartamentos_en_la_Isla|Mallorca_Appartements'
));

Router::connect('/Fincas_Mallorca_Landsitze_und_Landhaeuser', array('controller' => 'gesamtobjekt', 'action' => 'search', 'cat' => 3, 'multiple' => 1, 'language' => 'deu', 'slug' => 'Fincas_Mallorca_Landsitze_und_Landhaeuser'));
Router::connect('/:language/:slug', array('controller' => 'gesamtobjekt', 'action' => 'search', 'cat' => 3, 'multiple' => 1),
array(
    'language' => 'eng|spa|fre|rus',
    'slug' => 'Country_houses_and_fincas_in_Mallorca|Mallorca_fincas_y_casas_de_campo|Manoirs_Majorque_et_maisons_de_campagne'
));

Router::connect('/Freistehende_Villen_und_Fincas', array('controller' => 'gesamtobjekt', 'action' => 'search', 'cat' => 3, 'multiple' => 2, 'language' => 'deu', 'slug' => 'URLFreistehende_Villen_und_Fincas'));
Router::connect('/:language/:slug', array('controller' => 'gesamtobjekt', 'action' => 'search', 'cat' => 3, 'multiple' => 2),
array(
    'language' => 'eng|spa|fre|rus',
    'slug' => 'Exclusive_villas_country_houses_and_fincas_for_sale|Exclusivas_villas_casas_de_campo_y_fincas_en_venta|Majorque_villas_individuelles'
));

Router::connect('/Mallorca_Villas_in_Anlagen', array('controller' => 'gesamtobjekt', 'action' => 'search', 'cat' => 3, 'multiple' => 3, 'language' => 'deu', 'slug' => 'Mallorca_Villas_in_Anlagen'));
Router::connect('/:language/:slug', array('controller' => 'gesamtobjekt', 'action' => 'search', 'cat' => 3, 'multiple' => 3),
array(
    'language' => 'eng|spa|fre|rus',
    'slug' => 'Mallorca_villas_in_a_housing_complex|Mallorca_villas_en_urbanizaciones|Majorque_Villas_dans_les_plantes'
));

Router::connect('/Mallorca_Penthaeuser', array('controller' => 'gesamtobjekt', 'action' => 'search', 'cat' => 1, 'multiple' => 2, 'language' => 'deu', 'slug' => 'Mallorca_Penthaeuser'));
Router::connect('/:language/:slug', array('controller' => 'gesamtobjekt', 'action' => 'search', 'cat' => 1, 'multiple' => 2),
array(
    'language' => 'eng|spa|fre|rus',
    'slug' => 'Penthouses_in_Mallorca|Mallorca_aticos|Penthouses_Majorque'
));

Router::connect('/Grundstuecke_in_besten_Lagen_vom_Immobilienmakler_Mallorca', array('controller' => 'gesamtobjekt', 'action' => 'search', 'cat' => 7, 'language' => 'deu', 'slug' => 'URLGrundstuecke_in_besten_Lagen_vom_Immobilienmakler_Mallorca'));
Router::connect('/:language/:slug', array('controller' => 'gesamtobjekt', 'action' => 'search', 'cat' => 7),
array(
    'language' => 'eng|spa|fre|rus',
    'slug' => 'Mallorca_plots_in_prime_locations|Mallorca_parcelas_en_privilegiadas_situaciones|Majorque_parcelles_dans_des_emplacements_privilegies'
));

Router::connect('/Immobilien_Mallorca_kaufen_traumhafte_Altstadtpalaeste', array('controller' => 'gesamtobjekt', 'action' => 'search', 'cat' => 300, 'language' => 'deu', 'slug' => 'URLImmobilien_Mallorca_kaufen_traumhafte_Altstadtpalaeste'));
Router::connect('/:language/:slug', array('controller' => 'gesamtobjekt', 'action' => 'search', 'cat' => 300),
array(
    'language' => 'eng|spa|fre|rus',
    'slug' => 'Palma_de_Mallorca_and_old_town_palaces|Palma_de_Mallorca_y_casas_palacios|Palma_de_Majorque_et_anciens_palais'
));

Router::connect('/Immobilien_veraeussern', array('controller' => 'content', 'action' => 'sell', 'multiple' => 2, 'language' => 'deu', 'slug' => 'URLImmobilien_veraeussern'));
Router::connect('/:language/:slug', array('controller' => 'content', 'action' => 'sell', 'multiple' => 2),
array(
    'language' => 'eng|spa|fre|rus',
    'slug' => 'Sell_your_real_estate|Usted_quiere_vender_su_unica_propiedad|Proprietes_de_Majorque_a_la_vente'
));



Router::connect('/news/index', array('controller' => 'news', 'action' => 'index'));
Router::connect('/smscallbacks/index', array('controller' => 'smscallbacks', 'action' => 'index'));
Router::connect('/contacts/index', array('controller' => 'contacts', 'action' => 'index'));


// search without language
Router::connect('/Apartments_Penthaeuser/*', array('controller' => 'gesamtobjekt', 'action' => 'search', 'cat' => 1));

Router::connect('/Villen_Landhaeuser_Fincas_Mallorca/*', array('controller' => 'gesamtobjekt', 'action' => 'search', 'cat' => 3));

Router::connect('/Villen_mit_Meerblick/*', array('controller' => 'gesamtobjekt', 'action' => 'search', 'cat' => 100));

Router::connect('/Vermietungen/*', array('controller' => 'gesamtobjekt', 'action' => 'search', 'cat' => 400));

Router::connect('/Palma_de_Mallorca_und_Altstadtpalaeste/*', array('controller' => 'gesamtobjekt', 'action' => 'search', 'cat' => 300));

Router::connect('/Grundstuecke/*', array('controller' => 'gesamtobjekt', 'action' => 'search', 'cat' => 7));

Router::connect('/Gewerbeimmobilien/*', array('controller' => 'gesamtobjekt', 'action' => 'search', 'cat' => 9));

Router::connect('/Hotels/*', array('controller' => 'gesamtobjekt', 'action' => 'search', 'cat' => 8));

// needed for pagination of "search for price"
Router::connect('/bis_1_Mio/*', array('controller' => 'gesamtobjekt', 'action' => 'search', 'price' => 1));
Router::connect('/up_to_1_Mio/*', array('controller' => 'gesamtobjekt', 'action' => 'search', 'price' => 1));
Router::connect('/hasta_1_Mio/*', array('controller' => 'gesamtobjekt', 'action' => 'search', 'price' => 1));

Router::connect('/bis_2_Mio/*', array('controller' => 'gesamtobjekt', 'action' => 'search', 'price' => 2));
Router::connect('/up_to_2_Mio/*', array('controller' => 'gesamtobjekt', 'action' => 'search', 'price' => 2));
Router::connect('/hasta_2_Mio/*', array('controller' => 'gesamtobjekt', 'action' => 'search', 'price' => 2));

Router::connect('/bis_3_Mio/*', array('controller' => 'gesamtobjekt', 'action' => 'search', 'price' => 3));
Router::connect('/up_to_3_Mio/*', array('controller' => 'gesamtobjekt', 'action' => 'search', 'price' => 3));
Router::connect('/hasta_3_Mio/*', array('controller' => 'gesamtobjekt', 'action' => 'search', 'price' => 3));

Router::connect('/bis_4_Mio/*', array('controller' => 'gesamtobjekt', 'action' => 'search', 'price' => 4));
Router::connect('/up_to_4_Mio/*', array('controller' => 'gesamtobjekt', 'action' => 'search', 'price' => 4));
Router::connect('/hasta_4_Mio/*', array('controller' => 'gesamtobjekt', 'action' => 'search', 'price' => 4));

Router::connect('/bis_5_Mio/*', array('controller' => 'gesamtobjekt', 'action' => 'search', 'price' => 5));
Router::connect('/up_to_5_Mio/*', array('controller' => 'gesamtobjekt', 'action' => 'search', 'price' => 5));
Router::connect('/hasta_5_Mio/*', array('controller' => 'gesamtobjekt', 'action' => 'search', 'price' => 5));

Router::connect('/ab_5_Mio/*', array('controller' => 'gesamtobjekt', 'action' => 'search', 'price' => 5));
Router::connect('/5_Mio_and_more/*', array('controller' => 'gesamtobjekt', 'action' => 'search', 'price' => 5));
Router::connect('/apartir_de_5_Mio/*', array('controller' => 'gesamtobjekt', 'action' => 'search', 'price' => 5));

// search for category names w/ language
Router::connect('/:language/:catname/*', array('controller' => 'gesamtobjekt', 'action' => 'search', 'cat' => 1), array(
    'catname' => 'Apartments_Penthouses|Apartamentos_Aticos|Appartements_Penthouse',
    'language' => 'eng|spa|fre|rus'
));
Router::connect('/:language/:catname/*', array('controller' => 'gesamtobjekt', 'action' => 'search', 'cat' => 3), array(
    'catname' => 'Villas_Country_Houses|Villas_Casas_de_Campo|Villas_Maisons_de_campagne',
    'language' => 'eng|spa|fre|rus'
));
Router::connect('/:language/:catname/*', array('controller' => 'gesamtobjekt', 'action' => 'search', 'cat' => 100), array(
    'catname' => 'Sea_view_villas|Villas_con_vistas_al_mar|Villas_avec_vue_sur_la_mer',
    'language' => 'eng|spa|fre|rus'
));
Router::connect('/:language/:catname/*', array('controller' => 'gesamtobjekt', 'action' => 'search', 'cat' => 400), array(
    'catname' => 'Rentals|Alquileres|Location',
    'language' => 'eng|spa|fre|rus'
));
Router::connect('/:language/:catname/*', array('controller' => 'gesamtobjekt', 'action' => 'search', 'cat' => 300), array(
    'catname' => 'Old_town_houses_and_Palma|Casas_palacios_y_Palma_de_Mallorca|Palais_de_la_Vieille_et_Ville_de_Palma',
    'language' => 'eng|spa|fre|rus'
));
Router::connect('/:language/:catname/*', array('controller' => 'gesamtobjekt', 'action' => 'search', 'cat' => 7), array(
    'catname' => 'Building_plots|Solares|Parcelles',
    'language' => 'eng|spa|fre|rus'
));
Router::connect('/:language/:catname/*', array('controller' => 'gesamtobjekt', 'action' => 'search', 'cat' => 9), array(
    'catname' => 'Commercial_properties|Inmuebles_comerciales|immeubles_commerciales',
    'language' => 'eng|spa|fre|rus'
));
Router::connect('/:language/:catname/*', array('controller' => 'gesamtobjekt', 'action' => 'search', 'cat' => 8), array(
    'catname' => 'Hotels|Hoteles',
    'language' => 'eng|spa|fre|rus'
));

// search for ref  /URLImmobilien_Suche_nach_Referenznummer/ref:21
Router::connect('/:slug/ref::ref', array('controller' => 'gesamtobjekt', 'action' => 'search'));
Router::connect('/:language/:slug/ref::ref', array('controller' => 'gesamtobjekt', 'action' => 'search'), array(
    'language' => 'eng|spa|fre|rus'
));

// detail pages
Router::connect('/:what-:oid.html', array('controller' => 'gesamtobjekt', 'action' => 'show'), array(
    'oid' => '[0-9\-]{4,6}'
));
Router::connect('/:language/:what-:oid.html', array('controller' => 'gesamtobjekt', 'action' => 'show'), array(
    'language' => 'eng|spa|fre|rus',
    'oid' => '[0-9\-]{4,6}'
));

// search for anything having any parameters
Router::connect('/:language/:any/*', array('controller' => 'gesamtobjekt', 'action' => 'search'), array(
    'language' => 'eng|spa|fre|rus'
));

Router::redirect('/content/team', array('controller' => 'content', 'action' => 'team', 'language' => 'deu', 'slug' => 'Unser_Immobilienmakler_Mallorca_Team'), array('status' => 301));
Router::redirect('/Unser_Team', array('controller' => 'content', 'action' => 'team', 'language' => 'deu', 'slug' => 'Unser_Immobilienmakler_Mallorca_Team'), array('status' => 301));

Router::connect('/:any/*', array('controller' => 'gesamtobjekt', 'action' => 'search'), array());


    CakePlugin::routes();
    require CAKE . 'Config' . DS . 'routes.php';