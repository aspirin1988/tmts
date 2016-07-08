<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'tmtskz_main');

/** Имя пользователя MySQL */
define('DB_USER', 'tmtsk_admin');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'Zznkmdie21');

/** Имя сервера MySQL */
define('DB_HOST', 'srv-db-plesk14.ps.kz:3306');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'b&-I!{0+10bt_,|LkT|L<PE{*2p^8UkL/Ihze|7@-7Now.I)~2L[~gQ(UE7B}rus');
define('SECURE_AUTH_KEY',  '!(6a-=l]- |G{_tHrp_[BYFe!&|&9_=V,>_qf/!h+6[)qok}`O{Z*HPibeT&+b>u');
define('LOGGED_IN_KEY',    'g^.fdTvt5|ntLEMW$.:+BIERYRL-D.DezR.PwO825+@&|@Q4AtCZD<+_!~ o8(FB');
define('NONCE_KEY',        '--iUllRDig%GQ$E`wEVu.uG6LL1}08zAcL|vR=#+z%6A}d-(`r1YI(p.~W;t$4r!');
define('AUTH_SALT',        'ma^|}LNZ?kHushz5-_VJ3Kyn9Erj7#hZ[3vg35Dh-_<CzrP12NDg%qv)h14TT c ');
define('SECURE_AUTH_SALT', 't@++(ij+v>3AL5N%GStx74KsIF!3I;h!/w&/%qPj0M[d?70-{l^:VRl,_]%Vt3&S');
define('LOGGED_IN_SALT',   '+-Q:W// SzYb?1 +RbSqiy@b)z)m(Nd<G__!xd64|$DzXHV5,iT5Cd;G4nffaNxA');
define('NONCE_SALT',       'Efk+.!@`xE+7?5W|j.|Pt_VLh|9F.a#!CnTiVM_z8Un}rU@a(3_Pq:bkG7S)g~F,');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 * 
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
