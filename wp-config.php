<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、インストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さずにこのファイルを "wp-config.php" という名前でコピーして
 * 直接編集して値を入力してもかまいません。
 *
 * このファイルは、以下の設定を含みます。
 *
 * * MySQL 設定
 * * 秘密鍵
 * * データベーステーブル接頭辞
 * * ABSPATH
 *
 * @link https://ja.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// 注意:
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.osdn.jp/%E7%94%A8%E8%AA%9E%E9%9B%86#.E3.83.86.E3.82.AD.E3.82.B9.E3.83.88.E3.82.A8.E3.83.87.E3.82.A3.E3.82.BF 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define( 'DB_NAME', 'origin_db' );

/** MySQL データベースのユーザー名 */
define( 'DB_USER', 'root' );

/** MySQL データベースのパスワード */
define( 'DB_PASSWORD', 'root' );

/** MySQL のホスト名 */
define( 'DB_HOST', 'localhost' );

/** データベースのテーブルを作成する際のデータベースの文字セット */
define( 'DB_CHARSET', 'utf8mb4' );

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define( 'DB_COLLATE', '' );

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '$9K-%RyX6QTce<8o>}:ndgSg27I[R?6^0xP_YOna|.Mw2|a#Jf>(dT[}F&]Wzg-4' );
define( 'SECURE_AUTH_KEY',  '[{s%}+)nwIXTFbm3y;}O,VZI:~R6CR_KLZ7xhkmuy)GwYmN6`e3vvm1DDtV6W>fs' );
define( 'LOGGED_IN_KEY',    'z5lHr$E3g#0dNVFU7!}ly,,!=)lPcM@,ida.,J%NU](igaCV2/M2#&I]y(vDz_rU' );
define( 'NONCE_KEY',        'qz^j| e=vha_*>vc(F*+T!J>J;VS/%T2bHOpvX79[D^S:$=KD,mucK7dZ)x;8<kC' );
define( 'AUTH_SALT',        '>>C~qC~]KVTO#G(SPofx~bb+e++RI}n`w~k,nFjjCaG 9Mp2&Pxl*S:~_fZyK)~W' );
define( 'SECURE_AUTH_SALT', '~DAo!msu6oFfG5%i+1w,_Xyw2a7qq}Cu/&1{@8|=5&@@QE|CC)c0]k{1trM?G#`b' );
define( 'LOGGED_IN_SALT',   'SX!kfS2-D:tVO<}8r6t:-.vc.P/C`{p=wy|)L?{(R,T@Tj>U,@F*PJ*3%lmt^GSy' );
define( 'NONCE_SALT',       'NbT4ivnix`DZh<Pm_YpILBa7`~}faL#-UIk|zoxhPSe92/&dA8!_GFTT(:xYC#!e' );

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix = 'origin_';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 *
 * その他のデバッグに利用できる定数についてはドキュメンテーションをご覧ください。
 *
 * @link https://ja.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* カスタム値は、この行と「編集が必要なのはここまでです」の行の間に追加してください。 */



/* 編集が必要なのはここまでです ! WordPress でのパブリッシングをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
