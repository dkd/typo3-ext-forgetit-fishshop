<?php
/**
 * Default configuration of extension "realurl".
 *
 * IMPORTANT: DO NOT EDIT SETTINGS HERE
 * You may want to *override* the default settings in section "Set RealURL-Config(s)"
 * See bottom of this file.
 *
 * @version	$Id: realurlconf.php 96270 2012-05-04 07:05:05Z dkd-bieber $
 * @author	Christian Trabold <christian.trabold@dkd.de>
 * @since	2008-08-06
 * @see	http://typo3.org/documentation/document-library/extension-manuals/realurl/
 */
$tx_realurl_config = array(
	'init' => array(
		'respectSimulateStaticURLs' => false,
		'appendMissingSlash' => 'ifNotFile',
		'enableCHashCache' => true,
		'enableUrlDecodeCache' => true,
		'enableUrlEncodeCache' => true,
		'emptyUrlReturnValue' => '/',
		'disableErrorLog' => false,
	),
	'preVars' => array(
		array(
			'GETvar' => 'L',
			'valueMap' => array(
				'de' => '0',
				'en' => '1',
			),
			'noMatch' => 'bypass',
			'valueDefault' => 'de',
		),
	),
	'fixedPostVars' => array(
		'newsDetailConfiguration' => array(
			array(
				'GETvar' => 'tx_news_pi1[action]',
				'valueMap' => array(
					'detail' => '',
				),
				'noMatch' => 'bypass'
			),
			array(
				'GETvar' => 'tx_news_pi1[controller]',
				'valueMap' => array(
					'News' => '',
				),
				'noMatch' => 'bypass'
			),
			array(
				'GETvar' => 'tx_news_pi1[news]',
				'lookUpTable' => array(
					'table' => 'tx_news_domain_model_news',
					'id_field' => 'uid',
					'alias_field' => 'title',
					'addWhereClause' => ' AND NOT deleted',
					'useUniqueCache' => 1,
					'useUniqueCache_conf' => array(
						'strtolower' => 1,
						'spaceCharacter' => '-'
					),
					'languageGetVar' => 'L',
					'languageExceptionUids' => '',
					'languageField' => 'sys_language_uid',
					'transOrigPointerField' => 'l10n_parent',
					'autoUpdate' => 1,
					'expireDays' => 180,
				)
			)
		),
		'newsCategoryConfiguration' => array(
			array(
				'GETvar' => 'tx_news_pi1[overwriteDemand][categories]',
				'lookUpTable' => array(
					'table' => 'sys_category',
					'id_field' => 'uid',
					'alias_field' => 'title',
					'addWhereClause' => ' AND NOT deleted',
					'useUniqueCache' => 1,
					'useUniqueCache_conf' => array(
						'strtolower' => 1,
						'spaceCharacter' => '-'
					)
				)
			)
		),
		'newsTagConfiguration' => array(
			array(
				'GETvar' => 'tx_news_pi1[overwriteDemand][tags]',
				'lookUpTable' => array(
					'table' => 'tx_news_domain_model_tag',
					'id_field' => 'uid',
					'alias_field' => 'title',
					'addWhereClause' => ' AND NOT deleted',
					'useUniqueCache' => 1,
					'useUniqueCache_conf' => array(
						'strtolower' => 1,
						'spaceCharacter' => '-'
					)
				)
			)
		),
		'264' => 'newsDetailConfiguration',
	),
	'postVarSets' => array(
		'_DEFAULT' => array(
			'controller' => array(
				array(
					'GETvar' => 'tx_news_pi1[action]',
					'noMatch' => 'bypass'
				),
				array(
					'GETvar' => 'tx_news_pi1[controller]',
					'noMatch' => 'bypass'
				)
			),

			'dateFilter' => array(
				array(
					'GETvar' => 'tx_news_pi1[overwriteDemand][year]',
				),
				array(
					'GETvar' => 'tx_news_pi1[overwriteDemand][month]',
				),
			),
			'page' => array(
				array(
					'GETvar' => 'tx_news_pi1[@widget_0][currentPage]',
				),
			),
		),
	),
	'pagePath' => array(
		'type' => 'user',
		'userFunc' => 'EXT:realurl/class.tx_realurl_advanced.php:&tx_realurl_advanced->main',
		'segTitleFieldList' => 'tx_realurl_pathsegment,nav_title,title',
		'disablePathCache' => false,
		'autoUpdatePathCache' => true,
		'spaceCharacter' => '-',
		'languageGetVar' => 'L',
		'expireDays' => 3,
	),
	'fileName' => array(
		'index' => array(
			'printer.html' => array(
				'keyValues' => array(
					'type' => 98,
				)
			),
			'sitemap.xml' => array(
				'keyValues' => array(
					'type' => 200,
				)
			),
			'_DEFAULT' => array(
				'keyValues' => array()
			)
		)
	)
);


/**
 * Set RealURL-Config(s)
 *
 * IMPORTANT: In MultiDomain Environments
 *   1) Remove _DEFAULT-Key
 *   2) configure each domain separatly.
 * This improves performance.
 *
 * @see	http://typo3bloke.net/post-details/realurl_made_easy_part_2/ > "What you did not know about _DEFAULT"
 */


// Set rootpage_id for classic standardpackage
$tx_realurl_config['pagePath']['rootpage_id'] =  193;
$TYPO3_CONF_VARS['EXTCONF']['realurl'] = array(
	// Pipeline master
	'testing-fish-shop.dkd-stage.net' => $tx_realurl_config,
	'integration-fish-shop.dkd-stage.net' => 'testing-fish-shop.dkd-stage.net',
	'web1.fish-shop.net' => 'testing-fish-shop.dkd-stage.net',
	'web2.fish-shop.net' => 'testing-fish-shop.dkd-stage.net',
	'web3.fish-shop.net' => 'testing-fish-shop.dkd-stage.net',
	'web4.fish-shop.net' => 'testing-fish-shop.dkd-stage.net',
	'web5.fish-shop.net' => 'testing-fish-shop.dkd-stage.net',
	'web6.fish-shop.net' => 'testing-fish-shop.dkd-stage.net',
	'web7.fish-shop.net' => 'testing-fish-shop.dkd-stage.net',
	'web8.fish-shop.net' => 'testing-fish-shop.dkd-stage.net',
	'web10.fish-shop.net' => 'testing-fish-shop.dkd-stage.net',
	// Pipeline develop
	// TBD
	// Development
	'fishshop.dev' => 'testing-fish-shop.dkd-stage.net'
);


?>