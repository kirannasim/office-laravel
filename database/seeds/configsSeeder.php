<?php

use Illuminate\Database\Seeder;

/**
 * Class configsSeeder
 */
class configsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('config_field_tags')->insert([
            [
                "title" => "{\"en\":\"System Settings\",\"de\":\"Systemeinstellungen\",\"es\":\"Ajustes del sistema\",\"fr\":\"Les paramètres du système\",\"it\":\"Impostazioni di sistema\",\"pl\":\"Ustawienia systemowe\",\"pt\":\"Configurações de sistema\",\"ar\":\"اعدادات النظام\",\"hi\":\"प्रणाली व्यवस्था\",\"zh\":\"系统设置\",\"zh-Hant\":\"系統設置\",\"ja\":\"システム設定\",\"ko\":\"환경 설정\",\"ru\":\"Настройки системы\",\"sw\":\"Mipangilio ya Mfumo\",\"vi\":\"Cài đặt hệ thống\"}",
                "slug" => "system_settings",
                'description' => '{"en":"All system settings groups","de":"Alle Systemeinstellungsgruppen","es":"Todos los grupos de configuraciones del sistema.","fr":"Tous les groupes de paramètres système","it":"Tutti i gruppi di impostazioni di sistema","pl":"Wszystkie grupy ustawień systemowych","pt":"Todos os grupos de configurações do sistema","ar":"جميع مجموعات إعدادات النظام","hi":"सभी सिस्टम सेटिंग्स समूह","zh":"所有系统设置组","zh-Hant":"所有系統設置組","ja":"すべてのシステム設定グループ","ko":"모든 시스템 설정 그룹","ru":"Все группы настроек системы","sw":"Vikundi vyote vya mipangilio ya mfumo","vi":"Tất cả các nhóm cài đặt hệ thống"}',
                'editable' => 1,
                'core' => 1
            ],
        ]);

        DB::table('config_field_groups')->insert([
            [
                "parent" => 0,
                'title' => "{\"en\":\"Company Information\",\"de\":\"Firmeninformation\",\"es\":\"Información de la empresa\",\"fr\":\"Informations sur la société\",\"it\":\"Informazioni sull'azienda\",\"pl\":\"Informacje o firmie\",\"pt\":\"Informações da Empresa\",\"ar\":\"معلومات الشركة\",\"hi\":\"कंपनी की जानकारी\",\"zh\":\"公司信息\",\"zh-Hant\":\"公司信息\",\"ja\":\"会社情報\",\"ko\":\"회사 정보\",\"ru\":\"Информация о компании\",\"sw\":\"Maelezo ya Kampuni\",\"vi\":\"Thông tin công ty\"}",
                'slug' => "company_information",
                'description' => "{\"en\":\"All information belongs to company will go here\",\"de\":\"Alle Informationen, die zum Unternehmen gehören, werden hier angezeigt\",\"es\":\"Toda la información que pertenezca a la empresa irá aquí\",\"fr\":\"Toutes les informations appartiennent à l'entreprise ira ici\",\"it\":\"Tutte le informazioni appartengono alla società andranno qui\",\"pl\":\"Wszystkie informacje należące do firmy będą dostępne tutaj\",\"pt\":\"Toda a informação pertence à empresa vai aqui\",\"ar\":\"جميع المعلومات التي تخص الشركة ستذهب هنا\",\"hi\":\"कंपनी से संबंधित सभी जानकारी यहां जाएगी\",\"zh\":\"所有属于公司的信息都会在这里\",\"zh-Hant\":\"所有屬於公司的信息都會在這裡\",\"ja\":\"会社に属するすべての情報はここに行きます\",\"ko\":\"회사에 속한 모든 정보가 여기에 있습니다.\",\"ru\":\"Вся информация, принадлежащая компании, пойдет сюда\",\"sw\":\"Maelezo yote ni ya kampuni itaenda hapa\",\"vi\":\"Tất cả thông tin thuộc về công ty sẽ đến đây\"}",
                'iconFont' => "fa fa-info",
                "style" => "{\"icon_color\":null,\"text_color\":null,\"background\":null}",
                "tag_id" => 1,
                "sort_order" => 1,
                "core" => 1,
                "editable" => 1
            ],
            [
                "parent" => 0,
                'title' => "{\"en\":\"Localization\",\"de\":\"Lokalisierung\",\"es\":\"Localización\",\"fr\":\"Localisation\",\"it\":\"Localizzazione\",\"pl\":\"Lokalizacja\",\"pt\":\"Localização\",\"ar\":\"الموقع\",\"hi\":\"स्थानीयकरण\",\"zh\":\"本土化\",\"zh-Hant\":\"本土化\",\"ja\":\"ローカライゼーション\",\"ko\":\"현지화\",\"ru\":\"локализация\",\"sw\":\"Ujanibishaji\",\"vi\":\"Bản địa hóa\"}",
                'slug' => "localization",
                'description' => "{\"en\":\"Localization settings\",\"de\":\"Lokalisierungseinstellungen\",\"es\":\"Ajustes de localización\",\"fr\":\"Paramètres de localisation\",\"it\":\"Impostazioni di localizzazione\",\"pl\":\"Ustawienia lokalizacji\",\"pt\":\"Configurações de localização\",\"ar\":null,\"hi\":null,\"zh\":null,\"zh-Hant\":null}",
                'iconFont' => "fa fa-language",
                "style" => "{\"icon_color\":null,\"text_color\":null,\"background\":null}",
                "tag_id" => 1,
                "sort_order" => 4,
                "core" => 1,
                "editable" => 1
            ],
            [
                "parent" => 0, 'title' => "{\"en\":\"Mail Configuration\",\"de\":\"Mail-Konfiguration\",\"es\":\"Configuración de correo\",\"fr\":\"Configuration du courrier\",\"it\":\"Configurazione della posta\",\"pl\":\"Konfiguracja poczty\",\"pt\":\"Configuração de Correio\",\"ar\":\"تكوين البريد\",\"hi\":\"मेल कॉन्फ़िगरेशन\",\"zh\":\"邮件配置\",\"zh-Hant\":\"郵件配置\",\"ja\":\"メール設定\",\"ko\":\"메일 구성\",\"ru\":\"Конфигурация почты\",\"sw\":\"Usanidi wa Barua\",\"vi\":\"Cấu hình thư\"}",
                'slug' => "mail_configuration",
                'description' => "{\"en\":\"Mail configuration like smtp\",\"de\":\"Mail-Konfiguration wie SMTP\",\"es\":\"Configuracion de correo como smtp\",\"fr\":\"Configuration de messagerie comme smtp\",\"it\":\"Configurazione della posta come smtp\",\"pl\":\"Konfiguracja poczty jak smtp\",\"pt\":\"Configuração de email como smtp\",\"ar\":\"تكوين البريد مثل بروتوكول نقل البريد الإلكتروني\",\"hi\":\"मेल कॉन्फ़िगरेशन जैसे smtp\",\"zh\":\"像smtp这样的邮件配置\",\"zh-Hant\":\"像smtp這樣的郵件配置\",\"ja\":\"smtpのようなメール設定\",\"ko\":\"smtp와 같은 메일 구성\",\"ru\":\"Конфигурация почты как SMTP\",\"sw\":\"Usanidi wa barua kama smtp\",\"vi\":\"Cấu hình thư như smtp\"}",
                'iconFont' => "fa fa-envelope-o",
                "style" => "{\"icon_color\":null,\"text_color\":null,\"background\":null}",
                "tag_id" => 1,
                "sort_order" => 3,
                "core" => 1,
                "editable" => 1
            ],
            [
                "parent" => 0, 'title' => "{\"en\":\"Design\",\"de\":\"Design\",\"es\":\"Diseño\",\"fr\":\"Conception\",\"it\":\"Design\",\"pl\":\"Projekt\",\"pt\":\"desenhar\",\"ar\":\"التصميم\",\"hi\":\"डिज़ाइन\",\"zh\":\"设计\",\"zh-Hant\":\"設計\",\"ja\":\"設計\",\"ko\":\"디자인\",\"ru\":\"дизайн\",\"sw\":\"Ubunifu\",\"vi\":\"Thiết kế\"}",
                'slug' => "design",
                'description' => "{\"en\":\"Layout design\",\"de\":\"Layout-Design\",\"es\":\"Plano de diseño\",\"fr\":\"Mise en page\",\"it\":\"Progettazione del layout\",\"pl\":\"Projekt układu\",\"pt\":\"Projeto de layout\",\"ar\":\"تصميم تخطيط\",\"hi\":\"लेआउट डिज़ाइन\",\"zh\":\"版图设计\",\"zh-Hant\":\"版图设计\",\"ja\":\"レイアウト設計\",\"ko\":\"레이아웃 디자인\",\"ru\":\"Дизайн макета\",\"sw\":\Mpangilio wa muundo\",\"vi\":\Thiết kế bố trí\"}",
                'iconFont' => "fa fa-desktop",
                "style" => "{\"icon_color\":null,\"text_color\":null,\"background\":null}",
                "tag_id" => 1,
                "sort_order" => 5,
                "core" => 1,
                "editable" => 1
            ],
            [
                "parent" => 0,
                'title' => "{\"en\":\"Information Pages\",\"de\":\"Informationsseiten\",\"es\":\"Páginas de información\",\"fr\":\"Pages d'information\",\"it\":\"Pagine informative\",\"pl\":\"Strony informacyjne\",\"pt\":\"Páginas de informação\",\"ar\":\"صفحات المعلومات\",\"hi\":\"सूचना पृष्ठ\",\"zh\":\"信息页面\",\"zh-Hant\":\"信息页面\",\"ja\":\"情報ページ\",\"ko\":\"정보 페이지\",\"ru\":\"Информационные страницы\",\"sw\":\"Kurasa za Habari\",\"vi\":\"Trang thông tin\"}",
                'slug' => "information_pages",
                'description' => "{\"en\":\"Information pages like tos\",\"de\":\"Informationsseiten wie tos\",\"es\":\"Páginas de información como tos.\",\"fr\":\"Pages d'informations comme tos\",\"it\":\"Pagine di informazioni come tos\",\"pl\":\"Strony informacyjne takie jak tos\",\"pt\":\"Páginas de informações como tos\",\"ar\":\"صفحات المعلومات مثل tos\",\"hi\":\"जानकारी के पन्नों को पसंद करते हैं\",\"zh\":\"像tos这样的信息页面\",\"zh-Hant\":\"像tos這樣的信息頁面\",\"ja\":\"tosが好きな情報ページ\",\"ko\":\"정보 페이지는 tos를 좋아합니다.\",\"ru\":\"Информационные страницы, такие как tos\",\"sw\":\"Kurasa za habari kama tos\",\"vi\":\"Các trang thông tin như tos\"}",
                'iconFont' => "fa fa-info-circle",
                "style" => "{\"icon_color\":null,\"text_color\":null,\"background\":null}",
                "tag_id" => 1,
                "sort_order" => 7,
                "core" => 1,
                "editable" => 1
            ],
            [
                "parent" => 0,
                'title' => "{\"en\":\"E-mail Templates\",\"de\":\"E-Mail-Vorlagen\",\"es\":\"Plantillas de correo electrónico\",\"fr\":\"Modèles de courrier électronique\",\"it\":\"Modelli e-mail\",\"pl\":\"Szablony wiadomości\",\"pt\":\"Templates de E-mail\",\"ar\":\"قوالب البريد الإلكتروني\",\"hi\":\"ई-मेल टेम्प्लेट\",\"zh\":\"电子邮件模板\",\"zh-Hant\":\"电子邮件模板\",\"ja\":\"電子メールテンプレート\",\"ko\":\"전자 메일 템플릿\",\"ru\":\"Шаблоны электронной почты\",\"sw\":\"Templates za barua-pepe\",\"vi\":\"Mẫu thư điện tử\"}",
                'slug' => "e-mail_templates",
                'description' => "{\"en\":\"All kinds of email templates\",\"de\":\"Alle Arten von E-Mail-Vorlagen\",\"es\":\"Todo tipo de plantillas de email.\",\"fr\":\"Toutes sortes de modèles d'email\",\"it\":\"Tutti i tipi di modelli di email\",\"pl\":\"Wszystkie rodzaje szablonów e-mail\",\"pt\":\"Todos os tipos de modelos de email\",\"ar\":\"جميع أنواع قوالب البريد الإلكتروني\",\"hi\":\"सभी प्रकार के ईमेल टेम्पलेट\",\"zh\":\"各种电子邮件模板\",\"zh-Hant\":\"各種電子郵件模板\",\"ja\":\"あらゆる種類のEメールテンプレート\",\"ko\":\"모든 종류의 이메일 템플릿\",\"ru\":\"Все виды шаблонов электронной почты\",\"sw\":\"Aina zote za templeti za barua pepe\",\"vi\":\"Tất cả các loại mẫu email\"}",
                'iconFont' => "fa fa-keyboard-o",
                "style" => "{\"icon_color\":null,\"text_color\":null,\"background\":null}",
                "tag_id" => 1,
                "sort_order" => 6,
                "core" => 1,
                "editable" => 1
            ],
            [
                "parent" => 0,
                'title' => "{\"en\":\"General\",\"de\":\"Allgemeines\",\"es\":\"General\",\"fr\":\"Générale\",\"it\":\"Generale\",\"pl\":\"Generał\",\"pt\":\"Geral\",\"ar\":\"جنرال لواء\",\"hi\":\"सामान्य\",\"zh\":\"一般\",\"zh-Hant\":\"一般\",\"ja\":\"一般的な\",\"ko\":\"일반\",\"ru\":\"генеральный\",\"sw\":\"Jumla\",\"vi\":\"Chung\"}",
                'slug' => "general",
                'description' => "{\"en\":\"General settings\",\"de\":\"Allgemeine Einstellungen\",\"es\":\"Configuración general\",\"fr\":\"Réglages généraux\",\"it\":\"Impostazioni generali\",\"pl\":\"Ustawienia główne\",\"pt\":\"Configurações Gerais\",\"ar\":\"الاعدادات العامة\",\"hi\":\"सामान्य सेटिंग्स\",\"zh\":\"常规设置\",\"zh-Hant\":\"常规设置\",\"ja\":\"一般設定\",\"ko\":\"일반 설정\",\"ru\":\"Общие настройки\",\"sw\":\"Mipangilio ya jumla\",\"vi\":\"Cài đặt chung\"}",
                'iconFont' => "fa fa-gears",
                "style" => "{\"icon_color\":null,\"text_color\":null,\"background\":null}",
                "tag_id" => 1,
                "sort_order" => 2
                , "core" => 1,
                "editable" => 1
            ],
            [
                "parent" => 7, 'title' => "{\"en\":\"Registration\",\"de\":null,\"es\":null,\"fr\":null,\"it\":null,\"pl\":null,\"pt\":null,\"ar\":null,\"hi\":null,\"zh\":null,\"zh-Hant\":null}", 'slug' => "registration", 'description' => "{\"en\":\"Registration related settings\",\"de\":null,\"es\":null,\"fr\":null,\"it\":null,\"pl\":null,\"pt\":null,\"ar\":null,\"hi\":null,\"zh\":null,\"zh-Hant\":null}", 'iconFont' => "fa fa-user-plus", "style" => "{\"icon_color\":null,\"text_color\":null,\"background\":null}", "tag_id" => 1, "sort_order" => 1, "core" => 1, "editable" => 1],
            [
                "parent" => 0, 'title' => "{\"en\":\"Payment Gateway\",\"es\":\"Pasarela de pago\"}", 'slug' => "payment_gateway", 'description' => "{\"en\":\"Payment gateway configuration\",\"es\":null}", 'iconFont' => "fa fa-money", "style" => "{\"icon_color\":null,\"text_color\":null,\"background\":null}", "tag_id" => 1, "sort_order" => 6, "core" => 1, "editable" => 1],
            [
                "parent" => 0,
                'title' => "{\"en\":\"Maintenance Mode\",\"es\":\"Modo de mantenimiento\"}",
                'slug' => "maintenance_mode",
                'description' => "{\"en\":null,\"es\":null}",
                'iconFont' => "fa fa-clock-o",
                "style" => "{\"icon_color\":null,\"text_color\":null,\"background\":null}",
                "tag_id" => 1,
                "sort_order" => 5,
                "core" => 1,
                "editable" => 1
            ],
        ]);

        DB::table('config_fields')->insert([
            ["field_type" => "text", "field_name" => "company_name", "placeholder" => '{"en":"Enter company name","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "label" => "{\"en\":\"Company Name\",\"de\":null,\"es\":null,\"fr\":null,\"it\":null,\"pl\":null,\"pt\":null,\"ar\":null,\"hi\":null,\"zh\":null,\"zh-Hant\":null}", "field_group" => 1, "field_choices" => "[]", "field_validation" => "[\"required\"]", "sort_order" => 0, "conditional_rules" => ""],
            ["field_type" => "textarea", "field_name" => "address", "placeholder" => '{"en":"Enter address","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "label" => '{"en":"Address","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "field_group" => 1, "field_choices" => "[]", "field_validation" => '["required"]', "sort_order" => 0, "conditional_rules" => ""],
            ["field_type" => "text", "field_name" => "telephone", "placeholder" => '{"en":"Enter telephone","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "label" => '{"en":"Telephone","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "field_group" => 1, "field_choices" => "[]", "field_validation" => '["required"]', "sort_order" => 0, "conditional_rules" => ""],
            ["field_type" => "text", "field_name" => "e-mail", "placeholder" => '{"en":"Enter email address","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "label" => '{"en":"E-mail","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "field_group" => 1, "field_choices" => "[]", "field_validation" => '["required","email"]', "sort_order" => 0, "conditional_rules" => ""],
            ["field_type" => "image", "field_name" => "logo", "placeholder" => '{"en":"Choose logo","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "label" => '{"en":"Logo","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "field_group" => 1, "field_choices" => "[]", "field_validation" => '["required"]', "sort_order" => 0, "conditional_rules" => ""],
            ["field_type" => "image", "field_name" => "favicon", "placeholder" => '{"en":"Choose favicon","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "label" => '{"en":"Favicon","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "field_group" => 1, "field_choices" => "[]", "field_validation" => '["required"]', "sort_order" => 0, "conditional_rules" => ""],
            ["field_type" => "multiSelect", "field_name" => "manage_language", "placeholder" => '{"en":"System Languages","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "label" => '{"en":"System Languages","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "field_group" => 2, "field_choices" => '{"choice_type":"language","custom_choice":[{"label":{"en":null,"de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null},"value":null}]}', "field_validation" => '["required"]', "sort_order" => 0, "conditional_rules" => ""],
            ["field_type" => "multiSelect", 'link' =>'currency', "field_name" => "system_currencies", "placeholder" => '{"en":"Select currencies","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "label" => '{"en":"System Currencies","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "field_group" => 2, "field_choices" => '{"choice_type":"currency","custom_choice":[{"label":{"en":null,"de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null},"value":null}]}', "field_validation" => '["required"]', "sort_order" => 0, "conditional_rules" => ""],
            ["field_type" => "multiSelect", "field_name" => "countries", "placeholder" => '{"en":"Select countries","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "label" => '{"en":"Exclude Countries","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "field_group" => 2, "field_choices" => '{"choice_type":"country","custom_choice":[{"label":{"en":null,"de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null},"value":null}]}', "field_validation" => '["required"]', "sort_order" => 0, "conditional_rules" => ""],
            ["field_type" => "radio", "field_name" => "mail_server", "placeholder" => '{"en":"Select mail server","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "label" => '{"en":"Mail Server","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "field_group" => 3, "field_choices" => '{"custom_choice":[{"label":{"en":"Send Mail","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null},"value":"sendmail"},{"label":{"en":"SMTP","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null},"value":"smtp"}],"show_switch":null}', "field_validation" => '', "sort_order" => 0, "conditional_rules" => ""],
            ["field_type" => "radio", "field_name" => "smtp_authentication", "placeholder" => '{"en":"Set SMTP authentication","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "label" => '{"en":"SMTP Authentication","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "field_group" => 3, "field_choices" => '{"custom_choice":[{"label":{"en":"Enable","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null},"value":"1"},{"label":{"en":"Disable","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null},"value":"0"}],"show_switch":null}', "field_validation" => '', "sort_order" => 0, "conditional_rules" => ""],
            ["field_type" => "radio", "field_name" => "protocol", "placeholder" => '{"en":"Select protocol","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "label" => '{"en":"SMTP Protocol","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "field_group" => 3, "field_choices" => '{"custom_choice":[{"label":{"en":"SSL","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null},"value":"ssl"},{"label":{"en":"TLS","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null},"value":"tls"},{"label":{"en":"None","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null},"value":"0"}],"show_switch":null}', "field_validation" => '', "sort_order" => 0, "conditional_rules" => ""],
            ["field_type" => "text", "field_name" => "smtp_host", "placeholder" => '{"en":"Enter host","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "label" => '{"en":"SMTP Host","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "field_group" => 3, "field_choices" => '[]', "field_validation" => '', "sort_order" => 0, "conditional_rules" => ""],
            ["field_type" => "text", "field_name" => "smtp_port", "placeholder" => '{"en":"Enter SMTP port number","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "label" => '{"en":"SMTP Port","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "field_group" => 3, "field_choices" => '[]', "field_validation" => '', "sort_order" => 0, "conditional_rules" => ""],
            ["field_type" => "text", "field_name" => "smtp_username", "placeholder" => '{"en":"Enter SMTP username","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "label" => '{"en":"SMTP Username","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "field_group" => 3, "field_choices" => '[]', "field_validation" => '', "sort_order" => 0, "conditional_rules" => ""],
            ["field_type" => "text", "field_name" => "smtp_password", "placeholder" => '{"en":"Enter SMTP password","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "label" => '{"en":"SMTP Password","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "field_group" => 3, "field_choices" => '[]', "field_validation" => '', "sort_order" => 0, "conditional_rules" => ""],
            ["field_type" => "text", "field_name" => "smtp_timeout", "placeholder" => '{"en":"Set SMTP timeout","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "label" => '{"en":"SMTP Timeout","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "field_group" => 3, "field_choices" => '[]', "field_validation" => '', "sort_order" => 0, "conditional_rules" => ""],
            ["field_type" => "radio", "field_name" => "e-mail_service", "placeholder" => '{"en":"Choose email service","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "label" => '{"en":"E-mail Service","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "field_group" => 3, "field_choices" => '{"custom_choice":[{"label":{"en":"Enable","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null},"value":"yes"},{"label":{"en":"Disable","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null},"value":"no"}],"show_switch":{"radio":"on"}}', "field_validation" => '', "sort_order" => 0, "conditional_rules" => ""],
            ["field_type" => "select", "field_name" => "login_view", "placeholder" => '{"en":"Select login view","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "label" => '{"en":"Login view","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "field_group" => 4, "field_choices" => '{"choice_type":"custom","custom_choice":[{"label":{"en":"Standard","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null},"value":"Standard"},{"label":{"en":"Modern","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null},"value":"Modern"}]}', "field_validation" => '', "sort_order" => 0, "conditional_rules" => ""],
            ["field_type" => "textarea", "field_name" => "terms_&_conditions", "placeholder" => '{"en":"Enter your tos","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "label" => '{"en":"Terms & Conditions","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "field_group" => 5, "field_choices" => '[]', "field_validation" => '["nullable"]', "sort_order" => 0, "conditional_rules" => ""],
            ["field_type" => "textarea", "field_name" => "privacy_policy", "placeholder" => '{"en":"Enter your privacy policy","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "label" => '{"en":"Privacy Policy","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "field_group" => 5, "field_choices" => '[]', "field_validation" => '["nullable"]', "sort_order" => 0, "conditional_rules" => ""],
            ["field_type" => "textarea", "field_name" => "copyright", "placeholder" => '{"en":"Enter your copyright information","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "label" => '{"en":"Copyright","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "field_group" => 5, "field_choices" => '[]', "field_validation" => '["nullable"]', "sort_order" => 0, "conditional_rules" => ""],
            ["field_type" => "textarea", "field_name" => "registration_confirmation", "placeholder" => '{"en":"Enter your registration confirmation","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "label" => '{"en":"Registration Confirmation","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "field_group" => 6, "field_choices" => '[]', "field_validation" => '["required","min:50"]', "sort_order" => 0, "conditional_rules" => ""],
            ["field_type" => "textarea", "field_name" => "forget_password", "placeholder" => '{"en":"Enter forget password mail","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "label" => '{"en":"Forget Password","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "field_group" => 6, "field_choices" => '[]', "field_validation" => '["required","min:50"]', "sort_order" => 0, "conditional_rules" => ""],
            ["field_type" => "textarea", "field_name" => "password_change", "placeholder" => '{"en":"Enter password change mail","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "label" => '{"en":"Password Change","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "field_group" => 6, "field_choices" => '[]', "field_validation" => '["required"]', "sort_order" => 0, "conditional_rules" => ""],
            ["field_type" => "textarea", "field_name" => "login_attempt_exceeded", "placeholder" => '{"en":"Enter login attempt exceeded mail","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "label" => '{"en":"Login attempt exceeded","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "field_group" => 6, "field_choices" => '[]', "field_validation" => '["required","min:50"]', "sort_order" => 0, "conditional_rules" => ""],
            ["field_type" => "image", "field_name" => "modern_login_slider_1", "placeholder" => '{"en":"Select image","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "label" => '{"en":"Modern Login Slider 1","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "field_group" => 4, "field_choices" => '[]', "field_validation" => '["required"]', "sort_order" => 0, "conditional_rules" => ""],
            ["field_type" => "image", "field_name" => "modern_login_slider_2", "placeholder" => '{"en":"Select Image","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "label" => '{"en":"Modern Login Slider 2","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "field_group" => 4, "field_choices" => '[]', "field_validation" => '', "sort_order" => 0, "conditional_rules" => ""],
            ["field_type" => "image", "field_name" => "modern_login_slider_3", "placeholder" => '{"en":"Select image","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "label" => '{"en":"Modern Login Slider 3","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "field_group" => 4, "field_choices" => '[]', "field_validation" => '', "sort_order" => 0, "conditional_rules" => ""],
            ["field_type" => "radio", "field_name" => "username_type", "placeholder" => '{"en":null,"de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "label" => '{"en":"Username Type","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "field_group" => 8, "field_choices" => '{"custom_choice":[{"label":{"en":"Static","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null},"value":"static"},{"label":{"en":"Dynamic","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null},"value":"dynamic"}],"show_switch":null}', "field_validation" => '["required"]', "sort_order" => 3, "conditional_rules" => ""],
            ["field_type" => "radio", "field_name" => "package_for_registration", "placeholder" => '{"en":null,"de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "label" => '{"en":"Need package for registration ?","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "field_group" => 8, "field_choices" => '{"custom_choice":[{"label":{"en":"Yes","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null},"value":"Yes"},{"label":{"en":"No","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null},"value":"no"}],"show_switch":null}', "field_validation" => '["required"]', "sort_order" => 2, "conditional_rules" => ""],
            ["field_type" => "radio", "field_name" => "registration_allowed", "placeholder" => '{"en":null,"de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "label" => '{"en":"Registration Allowed","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "field_group" => 8, "field_choices" => '{"custom_choice":[{"label":{"en":"Yes","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null},"value":"1"},{"label":{"en":"No","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null},"value":"0"}],"show_switch":null}', "field_validation" => '["required"]', "sort_order" => 1, "conditional_rules" => ""],
            ["field_type" => "text", "field_name" => "username_prefix", "placeholder" => '{"en":"Enter username prefix","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "label" => '{"en":"Username Prefix","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "field_group" => 8, "field_choices" => '[]', "field_validation" => '["required_if:username_type,dynamic"]', "sort_order" => 4, "conditional_rules" => '[{"field":"30","operand":"==","value":"dynamic","concat":"&&"}]'],
            ["field_type" => "text", "field_name" => "username_length", "placeholder" => '{"en":"Enter length of username","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "label" => '{"en":"Username Length","de":null,"es":null,"fr":null,"it":null,"pl":null,"pt":null,"ar":null,"hi":null,"zh":null,"zh-Hant":null}', "field_group" => 8, "field_choices" => '[]', "field_validation" => '["required","integer"]', "sort_order" => 5, "conditional_rules" => '[{"field":"30","operand":"==","value":"dynamic","concat":"&&"}]'],
            ["field_type" => "multiSelect", "field_name" => "registration", "placeholder" => '{"en":"Registro","es":null}', "label" => '{"en":"Registration","es":"Registro"}', "field_group" => 9, "field_choices" => '{"choice_type":"module","custom_choice":[{"label":{"en":null,"es":null},"value":null}],"pool":"Payment"}', "field_validation" => '["required"]', "sort_order" => 1, "conditional_rules" => ''],
            ["field_type" => "multiSelect", "field_name" => "e-pin_purchase", "placeholder" => '{"en":"Compra de E-pin","es":null}', "label" => '{"en":"E-pin Purchase","es":"Compra de E-pin"}', "field_group" => 9, "field_choices" => '{"choice_type":"module","custom_choice":[{"label":{"en":null,"es":null},"value":null}],"pool":"Payment"}', "field_validation" => '', "sort_order" => 2, "conditional_rules" => ''],
            ["field_type" => "multiSelect", "field_name" => "public_registration", "placeholder" => '{"en":null,"es":null}', "label" => '{"en":"Public Registration","es":"Registro publico"}', "field_group" => 9, "field_choices" => '{"choice_type":"module","custom_choice":[{"label":{"en":null,"es":null},"value":null}],"pool":"Payment"}', "field_validation" => '["required"]', "sort_order" => 3, "conditional_rules" => ''],
            [
                "field_type" => "radio",
                "field_name" => "maintenance_mode",
                "placeholder" => '{"en":null,"es":null}',
                "label" => '{"en":"Maintenance Mode","es":"Modo de mantenimiento"}',
                "field_group" => 10,
                "field_choices" => '{"custom_choice":[{"label":{"en":"Enable","es":"Habilitar"},"value":"on"},{"label":{"en":"Disable","es":"Inhabilitar"},"value":"off"}],"show_switch":null}',
                "field_validation" => '["required"]',
                "sort_order" => 1,
                "conditional_rules" => ''
            ],
            [
                "field_type" => "textarea",
                "field_name" => "message",
                "placeholder" => '{"en":"Please enter message to display if some one try to access system","es":"Por favor, introduzca un mensaje para mostrar si alguien intenta acceder al sistema"}',
                "label" => '{"en":"Message","es":"Mensaje"}',
                "field_group" => 10,
                "field_choices" => '[]',
                "field_validation" => '["required"]',
                "sort_order" => 2,
                "conditional_rules" => '[{"field":"38","operand":"==","value":"on","concat":"&&"}]'
            ],
        ]);

        DB::table('config')->insert([
            [
                'meta_key' => 'company_name',
                'meta_value' => 'Hybrid MLM Software',
                'group' => 'company_information',
                'status' => 1
            ],
            [
                'meta_key' => 'address',
                'meta_value' => '<p>Hybrid MLM Software</p><p>India</p>',
                'group' => 'company_information',
                'status' => 1
            ],
            [
                'meta_key' => 'telephone',
                'meta_value' => '+91 123456785',
                'group' => 'company_information',
                'status' => 1
            ],
            [
                'meta_key' => 'e-mail',
                'meta_value' => 'info@hybridmlm.io',
                'group' => 'company_information',
                'status' => 1
            ],
            [
                'meta_key' => 'logo',
                'meta_value' => '/photos/admin/logos/hybrid-logo.png',
                'group' => 'company_information',
                'status' => 1
            ],
            [
                'meta_key' => 'favicon',
                'meta_value' => '/photos/admin/logo9.jpg',
                'group' => 'company_information',
                'status' => 1
            ],
            [
                'meta_key' => 'manage_language',
                'meta_value' => '["en","es"]',
                'group' => 'localization',
                'status' => 1
            ],
            [
                'meta_key' => 'system_currencies',
                'meta_value' => '["USD","INR"]',
                'group' => 'localization',
                'status' => 1
            ],
            [
                'meta_key' => 'countries',
                'meta_value' => '["AO"]',
                'group' => 'localization',
                'status' => 1
            ],
            [
                'meta_key' => 'smtp_host',
                'meta_value' => null,
                'group' => 'mail_configuration',
                'status' => 1
            ],
            [
                'meta_key' => 'smtp_port',
                'meta_value' => null,
                'group' => 'mail_configuration',
                'status' => 1
            ],
            [
                'meta_key' => 'smtp_username',
                'meta_value' => null,
                'group' => 'mail_configuration',
                'status' => 1
            ],
            [
                'meta_key' => 'smtp_password',
                'meta_value' => null,
                'group' => 'mail_configuration',
                'status' => 1
            ],
            [
                'meta_key' => 'smtp_timeout',
                'meta_value' => null,
                'group' => 'mail_configuration',
                'status' => 1
            ],
            [
                'meta_key' => 'terms_&_conditions',
                'meta_value' => '<p><b>Terms & Conditions</b></p><p><br></p><p>Your terms and conditions will  go here</p>',
                'group' => 'information_pages',
                'status' => 1
            ],
            [
                'meta_key' => 'privacy_policy',
                'meta_value' => '<p><span style="font-weight: 700;">Privacy Policy</span></p><p><br></p><p>Your privacy policy will  go here</p>',
                'group' => 'information_pages',
                'status' => 1
            ],
            [
                'meta_key' => 'copyright',
                'meta_value' => '<p><span style="font-weight: 700;">Copyright</span></p><p><br></p><p>Your copyright will  go here</p>', 'group' => 'information_pages', 'status' => 1],
            [
                'meta_key' => 'registration_confirmation',
                'meta_value' => '<p>Hello {@firstname}  {@lastname} ,</p><p><br></p><p>Your registration has been successful. You may login now using below link</p><p style="word-break: break-all;">{@loginlink}</p><p><br></p><p>Thank you </p><p>Team Elysium {@teamhybrid}</p><p><br></p>',
                'group' => 'e-mail_templates',
                'status' => 1
            ],
            [
                'meta_key' => 'forget_password',
                'meta_value' => '<p>Hello {@firstname}  {@lastname} ,</p><p><br></p><p>You have requested to reset password. If  you are not supposed to be the right person, you may ignore this email or you can reset password using below link</p><p style="word-break: break-all;">{@loginlink}</p><p><br></p><p>Thank you </p><p>Team Elysium {@teamhybrid}</p><div><br></div>',
                'group' => 'e-mail_templates',
                'status' => 1
            ],
            [
                'meta_key' => 'password_change',
                'meta_value' => '<p>Hello {@firstname}  {@lastname} ,</p><p><br></p><p>Your password has been changed successfully. </p><p><br></p><p>Thank you </p><p>Team Elysium {@teamhybrid}</p>',
                'group' => 'e-mail_templates',
                'status' => 1
            ],
            [
                'meta_key' => 'login_attempt_exceeded',
                'meta_value' => '<p>Hello {@firstname}  {@lastname} ,</p><p><br></p><p>Your account has been locked out due to excess false login attempts, You may able to login again after {@loginlockremovaltime} minutes.</p><p><br></p><p>Thank you </p><p>Team Elysium {@teamhybrid}</p>',
                'group' => 'e-mail_templates',
                'status' => 1
            ],
            [
                'meta_key' => 'login_view',
                'meta_value' => 'Modern',
                'group' => 'design',
                'status' => 1
            ],
            [
                'meta_key' => 'modern_login_slider_1',
                'meta_value' => '/photos/admin/ModernLoginSlider/bg1.jpg',
                'group' => 'design',
                'status' => 1
            ],
            [
                'meta_key' => 'modern_login_slider_2',
                'meta_value' => '/photos/admin/ModernLoginSlider/bg1.jpg',
                'group' => 'design',
                'status' => 1
            ],
            [
                'meta_key' => 'modern_login_slider_3',
                'meta_value' => '/photos/admin/ModernLoginSlider/bg3.jpg',
                'group' => 'design',
                'status' => 1
            ],
            [
                'meta_key' => 'username_type',
                'meta_value' => 'static',
                'group' => 'registration',
                'status' => 1
            ],
            [
                'meta_key' => 'registration_allowed',
                'meta_value' => 1,
                'group' => 'registration',
                'status' => 1
            ],
            [
                'meta_key' => 'package_for_registration',
                'meta_value' => 1,
                'group' => 'registration',
                'status' => 1
            ],
            [
                'meta_key' => 'username_prefix',
                'meta_value' => 'HBD',
                'group' => 'registration',
                'status' => 1
            ],
            [
                'meta_key' => 'username_length',
                'meta_value' => 8,
                'group' => 'registration',
                'status' => 1
            ],
            [
                'meta_key' => 'maintenance_mode',
                'meta_value' => 'on',
                'group' => 'maintenance_mode',
                'status' => 1
            ],
            [
                'meta_key' => 'message',
                'meta_value' => '<p><font color="#666666" face="Roboto Slab, sans-serif"><span style="font-size: 14px; background-color: rgb(255, 254, 251);">The Blueprint account interface is temporarily unavailable due to system maintenance.&nbsp;</span></font></p><p><font color="#666666" face="Roboto Slab, sans-serif"><span style="font-size: 14px; background-color: rgb(255, 254, 251);"><b>Estimated downtime :</b> 05:00 AM to 12:00 PM IST</span></font></p><p><font color="#666666" face="Roboto Slab, sans-serif"><span style="background-color: rgb(255, 254, 251);"><span style="font-size: 14px;">Please note that your earnings will continue to be tracked as normal, and your targeting will not be effected during this downtime. We apologize for any inconvenience&nbsp;</span></span></font></p><p><span style="color: rgb(102, 102, 102); font-family: &quot;Roboto Slab&quot;, sans-serif; font-size: 14px; background-color: rgb(255, 254, 251);"><br></span></p><p><span style="color: rgb(102, 102, 102); font-family: &quot;Roboto Slab&quot;, sans-serif; font-size: 14px; background-color: rgb(255, 254, 251);">Thank You !<br></span><br></p>',
                'group' => 'maintenance_mode',
                'status' => 1
            ],
            [
                'meta_key' => 'default_plan',
                'meta_value' => null,
                'group' => 'plan_configuration',
                'status' => 1
            ],
        ]);

    }
}
