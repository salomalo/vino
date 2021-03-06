﻿=== SMSPILOT.RU WooCommerce ===
Contributors: sergey.shuchkin@gmail.com
Tags: woo commerce, woocommerce, ecommerce, sms, sms notification
Requires at least: 3.8
Tested up to: 4.9.8
Stable tag: 4.7
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

		
SMS уведомления о заказах WooCommerce через шлюз SMSPILOT.RU

== Description ==

SMS уведомления о заказах через сайт SMSPILOT.RU для Wordpress WooCommerce.
[САЙТ](https://smspilot.ru/woocommerce.php) | [Поддержка](https://smspilot.ru/support.php)


== Installation ==
1. Убедитесь что у вас установлена посленяя версия плагина [WooCommerce](http://www.woothemes.com/woocommerce)
2. Через консоль
  * В административной панели перейдите на страницу Плагины и нажмите Добавить новый.
  * Перейдите на вкладку Загрузить, нажмите Обзор и выберите архив с плагином. Нажмите Установить.
3. По FTP
  * распакуйте архив и загрузите "smspilot-woocommerce" в папку ваш-домен/wp-content/plugins
4. После того, как плагин будет установлен, нажмите Активировать плагин.
5. Наведите курсор на пункт меню WooCommerce и выберите SMSPILOT.RU
6. В настройках введите API-ключ, телефон продавца, имя отправителя.
7. Если это необходимо, то укажите статусы для каждого вида сообщений и текст SMS
8. Нажмите кнопку Сохранить. Можно нажать кнопку для сохранения и отправки тестовой SMS на телефон продавца.

== Screenshots ==
1. Окно настройки плагина

== Custom usage ==
Пример оптравки SMS в других частях wordpress

include_once( ABSPATH.'wp-content/plugins/smspilot-woocommerce/smspilot_woocommerce.php' );
smspilot_send('79087964781','test');

== Changelog ==
= 1.31 =
+ текст последней ошибки отображается в настройках плагина
= 1.30 =
- удаление из текста SMS неизвестных полей {VAR}
= 1.29 =
+ вставка значений произвольных полей, например {Трек-номер}, чувствительно к регистру символов
= 1.28 =
- wptexturesize там не нужен
= 1.27 =
- корректно извлекаем комментарий пользователя
= 1.26 =
- Автоопределение транспорта curl или fsocket, корректное тестовое сообщение
= 1.25 =
- SMS нескольким продавцам
= 1.24 =
- удалем лишние пробелы, сокращаем текст, чтобы уложиться в 670 символов
= 1.23 =
- исправлены теги {FIRSTNAME}, {LASTNAME}, {CITY}, {ADDRESS}
= 1.22 =
- При деактивации теперь не слетают настройки
+ Работа через сокеты, этот метод стабильнее
+ Приоритет обработки изменён на минимум, чтобы дать возможность отработать другим плагинам
= 1.20 =
* Релиз
= 1.21 =
* очистка списка заказа от html тегов
= 1.20 =
* Релиз