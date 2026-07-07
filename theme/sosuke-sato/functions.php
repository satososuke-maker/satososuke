<?php
/**
 * Sosuke Sato Theme Functions
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'SOSUKE_VERSION', '1.0.0' );
define( 'SOSUKE_URI', get_template_directory_uri() );

/* ------------------------------------------------------------------
   Theme Setup
   ------------------------------------------------------------------ */
function sosuke_setup() {
	load_theme_textdomain( 'sosuke-sato', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'html5', [
		'search-form', 'comment-form', 'comment-list',
		'gallery', 'caption', 'style', 'script',
	] );
	add_theme_support( 'customize-selective-refresh-widgets' );

	register_nav_menus( [
		'primary' => 'メインナビゲーション',
	] );
}
add_action( 'after_setup_theme', 'sosuke_setup' );

/* ------------------------------------------------------------------
   Assets
   ------------------------------------------------------------------ */
function sosuke_enqueue_assets() {
	wp_enqueue_style(
		'noto-sans-jp',
		'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;700&display=swap',
		[],
		null
	);

	wp_enqueue_style(
		'sosuke-style',
		get_stylesheet_uri(),
		[ 'noto-sans-jp' ],
		SOSUKE_VERSION
	);

	wp_enqueue_script(
		'sosuke-main',
		SOSUKE_URI . '/assets/js/main.js',
		[],
		SOSUKE_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'sosuke_enqueue_assets' );

/* ------------------------------------------------------------------
   Customizer: Profile & Activities
   ------------------------------------------------------------------ */
function sosuke_customizer( $wp_customize ) {

	/* Profile section */
	$wp_customize->add_section( 'sosuke_profile', [
		'title'    => 'プロフィール設定',
		'priority' => 30,
	] );

	$fields = [
		'profile_image' => [
			'label'   => 'プロフィール画像URL',
			'default' => '',
			'type'    => 'url',
		],
		'profile_tagline' => [
			'label'   => 'キャッチコピー（ヒーロー下）',
			'default' => '事業・音楽・旅行・野菜作り・キックボクシング',
			'type'    => 'text',
		],
		'about_bio' => [
			'label'   => '自己紹介文',
			'default' => '日々さまざまな挑戦を楽しみながら生きています。事業を通じて社会に価値を届け、音楽で心を動かし、旅で視野を広げ、農業で土に向き合い、キックボクシングで心身を鍛えています。',
			'type'    => 'textarea',
		],
		'activity_business' => [
			'label'   => '活動説明 - 事業',
			'default' => '起業・事業開発・経営に取り組んでいます。アイデアを形にすることが好きです。',
			'type'    => 'textarea',
		],
		'activity_music' => [
			'label'   => '活動説明 - 音楽活動',
			'default' => '音楽を通じて人と繋がり、表現することを大切にしています。',
			'type'    => 'textarea',
		],
		'activity_travel' => [
			'label'   => '活動説明 - 旅行',
			'default' => '国内外を旅しながら、新しい文化や人との出会いを探求しています。',
			'type'    => 'textarea',
		],
		'activity_farming' => [
			'label'   => '活動説明 - 野菜作り',
			'default' => '自分で野菜を育て、土と向き合う豊かな時間を楽しんでいます。',
			'type'    => 'textarea',
		],
		'activity_kickboxing' => [
			'label'   => '活動説明 - キックボクシング',
			'default' => '心身を鍛えながら、精神力と集中力を高めています。',
			'type'    => 'textarea',
		],
		'sns_x' => [
			'label'   => 'X (Twitter) URL',
			'default' => 'https://x.com/Sosuke_Sato',
			'type'    => 'url',
		],
		'sns_instagram' => [
			'label'   => 'Instagram URL',
			'default' => 'https://www.instagram.com/',
			'type'    => 'url',
		],
		'sns_linktree' => [
			'label'   => 'Linktree URL',
			'default' => 'https://linktr.ee/sosukesato',
			'type'    => 'url',
		],
	];

	foreach ( $fields as $key => $args ) {
		$wp_customize->add_setting( 'sosuke_' . $key, [
			'default'           => $args['default'],
			'sanitize_callback' => 'textarea' === $args['type'] ? 'sanitize_textarea_field' : 'esc_url_raw',
		] );

		$control_args = [
			'label'    => $args['label'],
			'section'  => 'sosuke_profile',
			'settings' => 'sosuke_' . $key,
			'type'     => 'textarea' === $args['type'] ? 'textarea' : 'text',
		];

		$wp_customize->add_control( 'sosuke_' . $key, $control_args );
	}
}
add_action( 'customize_register', 'sosuke_customizer' );

/* ------------------------------------------------------------------
   Helper: get Customizer value
   ------------------------------------------------------------------ */
function sosuke_get( $key, $fallback = '' ) {
	return get_theme_mod( 'sosuke_' . $key, $fallback );
}
