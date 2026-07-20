<?php
/**
 * Sosuke Sato Theme Functions
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'SOSUKE_VERSION', '1.1.0' );
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
   Activities: Custom Post Type & Taxonomy
   ------------------------------------------------------------------ */
function sosuke_register_activity_cpt() {
	register_post_type( 'activity_post', [
		'labels' => [
			'name'          => '活動記録',
			'singular_name' => '活動記録',
			'add_new_item'  => '新規活動記録を追加',
			'edit_item'     => '活動記録を編集',
			'all_items'     => 'すべての活動記録',
			'search_items'  => '活動記録を検索',
			'not_found'     => '活動記録が見つかりません',
		],
		'public'       => true,
		'has_archive'  => false,
		'show_in_rest' => true,
		'menu_icon'    => 'dashicons-camera',
		'supports'     => [ 'title', 'editor', 'thumbnail', 'excerpt' ],
		'rewrite'      => [ 'slug' => 'activities', 'with_front' => false ],
	] );

	register_taxonomy( 'activity_category', 'activity_post', [
		'labels' => [
			'name'          => '活動カテゴリ',
			'singular_name' => '活動カテゴリ',
		],
		'public'       => true,
		'hierarchical' => true,
		'show_in_rest' => true,
		'rewrite'      => [ 'slug' => 'activities/category', 'with_front' => false ],
	] );
}
add_action( 'init', 'sosuke_register_activity_cpt' );

/* ------------------------------------------------------------------
   Activities: icon / English-name lookup by taxonomy term slug
   ------------------------------------------------------------------ */
function sosuke_activity_meta( $slug ) {
	$meta = [
		'business'   => [ 'icon' => '💻', 'name_en' => 'Business',   'label' => '仕事',           'customizer_key' => 'activity_business' ],
		'music'      => [ 'icon' => '🎸', 'name_en' => 'Music',      'label' => '音楽',           'customizer_key' => 'activity_music' ],
		'travel'     => [ 'icon' => '🗾', 'name_en' => 'Travel',     'label' => '旅行',           'customizer_key' => 'activity_travel' ],
		'farming'    => [ 'icon' => '🥬', 'name_en' => 'Farming',    'label' => '野菜作り',       'customizer_key' => 'activity_farming' ],
		'eating'     => [ 'icon' => '🍽️', 'name_en' => 'Food',       'label' => '食べ歩き',       'customizer_key' => 'activity_eating' ],
		'kickboxing' => [ 'icon' => '🥊', 'name_en' => 'Kickboxing', 'label' => 'キックボクシング', 'customizer_key' => 'activity_kickboxing' ],
	];
	return $meta[ $slug ] ?? [ 'icon' => '⭐', 'name_en' => '', 'customizer_key' => '' ];
}

/* ------------------------------------------------------------------
   Activities: category highlights list (term meta, editable per category)
   ------------------------------------------------------------------ */
function sosuke_activity_category_add_form_field( $taxonomy ) {
	?>
	<div class="form-field">
		<label for="sosuke-highlights">ハイライト・実績リスト</label>
		<textarea name="sosuke_highlights" id="sosuke-highlights" rows="5" cols="40"></textarea>
		<p>できること・実績を1行につき1項目で入力してください（省略可）。</p>
	</div>
	<div class="form-field">
		<label for="sosuke-order">表示順</label>
		<input type="number" name="sosuke_order" id="sosuke-order" step="10" value="">
		<p>「活動」ページでの並び順です。数字が小さいほど先に表示されます（未入力の場合は最後尾）。</p>
	</div>
	<?php
}
add_action( 'activity_category_add_form_fields', 'sosuke_activity_category_add_form_field' );

function sosuke_activity_category_edit_form_field( $term ) {
	$highlights = get_term_meta( $term->term_id, 'sosuke_highlights', true );
	$order      = get_term_meta( $term->term_id, 'sosuke_order', true );
	?>
	<tr class="form-field">
		<th scope="row"><label for="sosuke-highlights">ハイライト・実績リスト</label></th>
		<td>
			<textarea name="sosuke_highlights" id="sosuke-highlights" rows="5" cols="40"><?php echo esc_textarea( $highlights ); ?></textarea>
			<p class="description">できること・実績を1行につき1項目で入力してください（省略可）。</p>
		</td>
	</tr>
	<tr class="form-field">
		<th scope="row"><label for="sosuke-order">表示順</label></th>
		<td>
			<input type="number" name="sosuke_order" id="sosuke-order" step="10" value="<?php echo esc_attr( $order ); ?>">
			<p class="description">「活動」ページでの並び順です。数字が小さいほど先に表示されます（未入力の場合は最後尾）。</p>
		</td>
	</tr>
	<?php
}
add_action( 'activity_category_edit_form_fields', 'sosuke_activity_category_edit_form_field' );

function sosuke_save_activity_category_meta( $term_id ) {
	if ( isset( $_POST['sosuke_highlights'] ) ) {
		update_term_meta( $term_id, 'sosuke_highlights', sanitize_textarea_field( wp_unslash( $_POST['sosuke_highlights'] ) ) );
	}
	if ( isset( $_POST['sosuke_order'] ) && '' !== $_POST['sosuke_order'] ) {
		update_term_meta( $term_id, 'sosuke_order', (int) $_POST['sosuke_order'] );
	}
}
add_action( 'created_activity_category', 'sosuke_save_activity_category_meta' );
add_action( 'edited_activity_category', 'sosuke_save_activity_category_meta' );

function sosuke_get_activity_highlights( $term_id ) {
	$raw = get_term_meta( $term_id, 'sosuke_highlights', true );
	if ( ! $raw ) {
		return [];
	}
	$lines = array_map( 'trim', explode( "\n", $raw ) );
	return array_values( array_filter( $lines ) );
}

function sosuke_get_activity_order( $term_id ) {
	$order = get_term_meta( $term_id, 'sosuke_order', true );
	return '' !== $order ? (int) $order : 999;
}

/* ------------------------------------------------------------------
   One-time migration: give the 5 initial categories a sane default order
   ------------------------------------------------------------------ */
function sosuke_migrate_activity_order() {
	if ( get_option( 'sosuke_activity_order_migrated' ) ) {
		return;
	}

	$defaults = [
		'business'   => 10,
		'music'      => 20,
		'travel'     => 30,
		'farming'    => 40,
		'eating'     => 50,
		'kickboxing' => 60,
	];
	foreach ( $defaults as $slug => $order ) {
		$term = get_term_by( 'slug', $slug, 'activity_category' );
		if ( $term && '' === get_term_meta( $term->term_id, 'sosuke_order', true ) ) {
			update_term_meta( $term->term_id, 'sosuke_order', $order );
		}
	}

	update_option( 'sosuke_activity_order_migrated', 1 );
}
add_action( 'init', 'sosuke_migrate_activity_order', 21 );

/* ------------------------------------------------------------------
   First-run setup: create 活動カテゴリ terms + プロフィール/活動/コンタクト pages
   ------------------------------------------------------------------ */
function sosuke_setup_content() {
	if ( get_option( 'sosuke_pages_created' ) ) {
		return;
	}

	$categories = [
		'business'   => '仕事',
		'music'      => '音楽',
		'travel'     => '旅行',
		'farming'    => '野菜作り',
		'eating'     => '食べ歩き',
		'kickboxing' => 'キックボクシング',
	];
	foreach ( $categories as $slug => $name ) {
		if ( ! term_exists( $slug, 'activity_category' ) ) {
			wp_insert_term( $name, 'activity_category', [ 'slug' => $slug ] );
		}
	}

	$pages = [
		'profile'    => [ 'title' => 'プロフィール', 'template' => 'template-profile.php' ],
		'activities' => [ 'title' => '活動',         'template' => 'template-activities.php' ],
		'contact'    => [ 'title' => 'コンタクト',   'template' => 'template-contact.php' ],
	];
	foreach ( $pages as $slug => $args ) {
		if ( get_page_by_path( $slug ) ) {
			continue;
		}
		$id = wp_insert_post( [
			'post_title'  => $args['title'],
			'post_name'   => $slug,
			'post_type'   => 'page',
			'post_status' => 'publish',
		] );
		if ( $id && ! is_wp_error( $id ) ) {
			update_post_meta( $id, '_wp_page_template', $args['template'] );
		}
	}

	update_option( 'sosuke_pages_created', 1 );
	flush_rewrite_rules();
}
add_action( 'init', 'sosuke_setup_content', 20 );

/* ------------------------------------------------------------------
   Helper: permalink of an auto-created page by slug
   ------------------------------------------------------------------ */
function sosuke_page_url( $slug ) {
	$page = get_page_by_path( $slug );
	return $page ? get_permalink( $page ) : home_url( '/' . $slug . '/' );
}

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
		'sns_asobito' => [
			'label'   => 'アソビト URL',
			'default' => 'https://asobito.jp/',
			'type'    => 'url',
		],
		'sns_tiktok' => [
			'label'   => 'TikTok URL',
			'default' => 'https://www.tiktok.com/@sosuke_sato',
			'type'    => 'url',
		],
		'sns_youtube' => [
			'label'   => 'YouTube URL',
			'default' => 'https://www.youtube.com/@sosuke_sato01',
			'type'    => 'url',
		],
		'sns_instagram' => [
			'label'   => 'Instagram URL',
			'default' => 'https://www.instagram.com/sosuke_sato01/',
			'type'    => 'url',
		],
		'sns_x' => [
			'label'   => 'X (Twitter) URL',
			'default' => 'https://x.com/Sosuke_Sato',
			'type'    => 'url',
		],
		'sns_tabelog' => [
			'label'   => '食べログ URL',
			'default' => 'https://tabelog.com/rvwr/usagidoshi/',
			'type'    => 'url',
		],
		'contact_email' => [
			'label'   => '連絡先メールアドレス',
			'default' => '',
			'type'    => 'email',
		],
	];

	foreach ( $fields as $key => $args ) {
		$sanitize_callback = 'esc_url_raw';
		if ( 'textarea' === $args['type'] ) {
			$sanitize_callback = 'sanitize_textarea_field';
		} elseif ( 'email' === $args['type'] ) {
			$sanitize_callback = 'sanitize_email';
		}

		$wp_customize->add_setting( 'sosuke_' . $key, [
			'default'           => $args['default'],
			'sanitize_callback' => $sanitize_callback,
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
