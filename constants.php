<?php

/************************************************************************************
 * WordLift Post Custom Type and Fields
 ************************************************************************************/
// the type to use when registering/accessing entities in WP (max. 20 characters, can not contain capital letters or spaces).
// for more information, see http://codex.wordpress.org/Function_Reference/register_post_type.
define('WORDLIFT_20_ENTITY_CUSTOM_POST_TYPE', 		'io-wordlift-entity');

define('WORDLIFT_20_FIELD_PREFIX',					'io-wordlift-');
define('WORDLIFT_20_FIELD_NAME',					WORDLIFT_20_FIELD_PREFIX.'name');
define('WORDLIFT_20_FIELD_SCHEMA_TYPE',				WORDLIFT_20_FIELD_PREFIX.'schema-type');
define('WORDLIFT_20_FIELD_IMAGE',					WORDLIFT_20_FIELD_PREFIX.'image');
define('WORDLIFT_20_FIELD_ABOUT',					WORDLIFT_20_FIELD_PREFIX.'url');
define('WORDLIFT_20_FIELD_LATITUDE',				WORDLIFT_20_FIELD_PREFIX.'latitude');
define('WORDLIFT_20_FIELD_LONGITUDE',				WORDLIFT_20_FIELD_PREFIX.'longitude');

// hidden fields.
define('WORDLIFT_20_ENTITY_POSTS', 					'_'.WORDLIFT_20_FIELD_PREFIX.'posts');
define('WORDLIFT_20_ENTITY_ACCEPTED', 				'_'.WORDLIFT_20_FIELD_PREFIX.'posts-accepted');
define('WORDLIFT_20_ENTITY_REJECTED', 				'_'.WORDLIFT_20_FIELD_PREFIX.'posts-rejected');
define('WORDLIFT_20_ENTITY_BOGUS', 					'_'.WORDLIFT_20_FIELD_PREFIX.'bogus');

/************************************************************************************
 * Stanbol Job Metadata
 *  - known files: JobService.php, JobModel.php
 ************************************************************************************/
define('WORDLIFT_20_FIELD_JOB_ID', 					'_'.WORDLIFT_20_FIELD_PREFIX.'job-id');
define('WORDLIFT_20_FIELD_JOB_STATE', 				'_'.WORDLIFT_20_FIELD_PREFIX.'job-state');

define('WORDLIFT_20_JOB_STATE_ANALYZING',			'in-progress');
define('WORDLIFT_20_JOB_STATE_COMPLETED',			'completed');


/************************************************************************************
 * Admin Settings
 *  - known files: WordLiftSetup.php
 ************************************************************************************/
// The position in the menu order the post type should appear.
define('WORDLIFT_20_ADMIN_MENU_POSITION', 21);


/************************************************************************************
 * WordPress Settings
 *  - known files: WordLiftSetup.php
 ************************************************************************************/
define('WORDLIFT_20_ENTITIES_SLUG',					'entities');

define('WORDLIFT_20_ENTITIES_PAGE_NAME',			'all-entities');
define('WORDLIFT_20_ENTITIES_MAP_PAGE_NAME',		'entities-map');


/************************************************************************************
 * some helpful variables
 ************************************************************************************/
// get the base folder for plugins_url translations.
// $base = __FILE__;
require_once __DIR__ . '/lib/externals/WordPressFramework/WordPressFramework.php';
$base = WordPressFramework::getPluginDir('ec20e942-0fd9-4780-af19-86919129638b') . 'fake';
// load WordPress
// require_once( dirname(dirname(dirname(dirname(__FILE__)))).'/wp-load.php' );

define('WORDLIFT_20_ROOT_PATH', 					$base . 'wordlift.php');
define('WORDLIFT_20_PLUGIN_DIR', 					basename(WORDLIFT_20_ROOT_PATH) . '/');
define('WORDLIFT_20_CHAIN_NAME', 					'default');

/************************************************************************************
 * End-Points
 ************************************************************************************/
define('WORDLIFT_20_URLS_ENHANCE_TEXT',				'http://localhost:8081/insideout10/enhance/text');
define('WORDLIFT_20_URLS_ON_COMPLETE', 				plugins_url('api/complete.php', $base));
define('WORDLIFT_20_URLS_ON_PROGRESS', 				plugins_url('api/progress.php', $base));

?>