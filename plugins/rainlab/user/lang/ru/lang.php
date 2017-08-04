<?php

return [
    'plugin' =>
    [
        'name' => 'Пользователи',
        'description' => 'Фронтенд управление пользователями.',
        'tab' => 'Пользователи',
        'access_users' => 'Управление пользователями',
        'access_groups' => 'Управление группами пользователей',
        'access_settings' => 'Управление настройками пользователей',
    ],
    'users' =>
    [
        'menu_label' => 'Пользователи',
        'all_users' => 'Все пользователи',
        'new_user' => 'Новый пользователь',
        'list_title' => 'Управление пользователями',
        'trashed_hint_title' => 'Пользователь деактивировал свой аккаунт',
        'trashed_hint_desc' => 'Этот пользователь деактивировал свой аккаунт. Он может реактивировать свой аккаунт в любое время.',
        'banned_hint_title' => 'Пользователь заблокирован',
        'banned_hint_desc' => 'Этот пользователь заблокирован администратором и не сможет авторизоваться.',
        'guest_hint_title' => 'Это гостевая учётная запись',
        'guest_hint_desc' => 'Этот пользователь сохранен только для справочных целей и должен быть зарегистрирован, прежде чем сможет выполнить вход.',
        'activate_warning_title' => 'Пользователь не активирован!',
        'activate_warning_desc' => 'Этот пользователь не активирован и не сможет войти.',
        'activate_confirm' => 'Вы действительно хотите активировать данного пользователя?',
        'activated_success' => 'Пользователь был успешно активирован!',
        'activate_manually' => 'Активировать этого пользователя вручную',
        'convert_guest_confirm' => 'Преобразовать гостя в пользователя?',
        'convert_guest_manually' => 'Преобразовать в зарегистрированного пользователя',
        'convert_guest_success' => 'Гостевая учётная запись преобразована в зарегистрированную.',
        'delete_confirm' => 'Вы действительно хотите удалить этого пользователя?',
        'unban_user' => 'Разблокировать',
        'unban_confirm' => 'Вы уверены, что хотите разблокировать этого пользователя?',
        'unbanned_success' => 'Пользователь разблокирован',
        'return_to_list' => 'Вернуться к списку пользователей',
        'update_details' => 'Изменить данные',
        'bulk_actions' => 'Массовые действия',
        'delete_selected' => 'Удалить выбранные',
        'delete_selected_confirm' => 'Удалить выбранных пользователей?',
        'delete_selected_empty' => 'Нет выбранных пользователей для удаления.',
        'delete_selected_success' => 'Выбранные пользователи успешно удалены.',
        'deactivate_selected' => 'Деактивировать выбранные',
        'deactivate_selected_confirm' => 'Деактивировать выбранных пользователей?',
        'deactivate_selected_empty' => 'Нет выбранных пользователей для деактивации.',
        'deactivate_selected_success' => 'Выбранные пользователи успешно деактивированы.',
        'restore_selected' => 'Восстановить выбранные',
        'restore_selected_confirm' => 'Восстановить выбранных пользователей?',
        'restore_selected_empty' => 'Нет выбранных пользователей для восстановления.',
        'restore_selected_success' => 'Выбранные пользователи успешно восстановлены.',
        'ban_selected' => 'Заблокировать выбранные',
        'ban_selected_confirm' => 'Заблокировать выбранных пользователей?',
        'ban_selected_empty' => 'Нет выбранных пользователей для блокировки.',
        'ban_selected_success' => 'Выбранные пользователи успешно заблокированы.',
        'unban_selected' => 'Разблокировать выбранные',
        'unban_selected_confirm' => 'Разблокировать выбранных пользователей?',
        'unban_selected_empty' => 'Нет выбранных пользователей для разблокировки.',
        'unban_selected_success' => 'Выбранные пользователи успешно разблокированы.',
        'active_manually' => 'Активировать этого пользователя вручную',
        'activating' => 'Активация...',
    ],
    'settings' =>
    [
        'users' => 'Пользователи',
        'menu_label' => 'Настройки пользователя',
        'menu_description' => 'Управления параметрами пользователя.',
        'activation_tab' => 'Активация',
        'signin_tab' => 'Авторизация',
        'registration_tab' => 'Регистрация',
        'notifications_tab' => 'Оповещения',
        'allow_registration' => 'Разрешить регистрацию',
        'allow_registration_comment' => 'Если эта опция выключена, только администраторы смогут регистрировать пользователей.',
        'activate_mode' => 'Активация',
        'activate_mode_comment' => 'Активация пользователя.',
        'activate_mode_auto' => 'Автоматическая',
        'activate_mode_auto_comment' => 'Автоматическая активация при регистрации.',
        'activate_mode_user' => 'Стандартная',
        'activate_mode_user_comment' => 'Активация при помощи электронной почты.',
        'activate_mode_admin' => 'Ручная',
        'activate_mode_admin_comment' => 'Только администратор может активировать пользователя.',
        'welcome_template' => 'Шаблон приветствия',
        'welcome_template_comment' => 'Шаблон сообщения, отправляемого после активации.',
        'require_activation' => 'Обязательная активация аккаунта',
        'require_activation_comment' => 'Пользователи должны иметь активированный аккаунт для входа.',
        'use_throttle' => 'Отслеживание неудачных попыток авторизации',
        'use_throttle_comment' => 'При множественных неудачных попытках авторизации пользователь будет заморожен.',
        'login_attribute' => 'Логин',
        'login_attribute_comment' => 'Поле, используемое в качестве логина пользователя.',
        'no_mail_template' => 'Не отправлять уведомление',
        'hint_templates' => 'Вы можете настроить шаблоны почты, выбрав «Почта» → «Шаблоны почты» в меню настроек.',
    ],
    'user' =>
    [
        'label' => 'Пользователь',
        'id' => 'ID',
        'username' => 'Имя пользователя',
        'first_name' => 'Имя',
        'name_empty' => 'Аноним',
        'last_name' => 'Фамилия',
        'patronymic' => 'Очество',
        'phone1' => 'Номер телефона',
        'phone2' => 'Дополнительный номер телефона',
        'type' => 'Тип',
        'vatin' => 'Идентификационный номер',
        'city' => 'Город',
        'street' => 'Улица',
        'house' => 'Номер дома',
        'flat' => 'Номер квартиры',
        'email' => 'Почта',
        'created_at' => 'Дата регистрации',
        'last_seen' => 'Последняя активность',
        'is_guest' => 'Гость',
        'joined' => 'Зарегистрирован',
        'is_online' => 'В сети',
        'is_offline' => 'Не в сети',
        'send_invite' => 'Отправить приглашение по почте',
        'send_invite_comment' => 'Отправляет приветственнное сообщение на почту с логином и паролем для входа.',
        'create_password' => 'Создать пароль',
        'create_password_comment' => 'Введите новый пароль для пользователя.',
        'reset_password' => 'Сброс пароля',
        'reset_password_comment' => 'Для сброса пользовательского пароля, введите здесь новый пароль.',
        'confirm_password' => 'Подтверждение пароля',
        'confirm_password_comment' => 'Введите пароль еще раз для подтверждения.',
        'groups' => 'Группы',
        'empty_groups' => 'Нет групп, доступных пользователю.',
        'avatar' => 'Аватар',
        'details' => 'Информация',
        'account' => 'Аккаунт',
        'block_mail' => 'Отключить всю исходящую почту для этого пользователя.',
        'status_guest' => 'Гость',
        'status_activated' => 'Активирован',
        'status_registered' => 'Зарегистрирован',
        'status' => 'Статус',
        'catalog_favorites' => 'Избранное каталога',
        'shop_favorites' => 'Избранное магазина',
    ],
    'group' =>
    [
        'label' => 'Группа',
        'id' => 'ID',
        'name' => 'Имя',
        'description_field' => 'Описание',
        'code' => 'Код',
        'code_comment' => 'Введите уникальный код для идентификации этой группы.',
        'created_at' => 'Дата создания',
        'users_count' => 'Пользователи',
    ],
    'groups' =>
    [
        'menu_label' => 'Группы',
        'all_groups' => 'Группы пользователей',
        'new_group' => 'Новая группа',
        'delete_selected_confirm' => 'Вы действительно хотите удалить выбранные группы?',
        'list_title' => 'Управление группами',
        'delete_confirm' => 'Вы действительно хотите удалить эту группу?',
        'delete_selected_success' => 'Выбранные группы удалены.',
        'delete_selected_empty' => 'Не выбраны группы для удаления.',
        'return_to_list' => 'Вернутся к списку групп',
        'return_to_users' => 'Вернутся к списку пользователей',
        'create_title' => 'Создание группы',
        'update_title' => 'Редактирование группы',
        'preview_title' => 'Предпросмотр группы',
    ],
    'login' =>
    [
        'attribute_email' => 'Почта',
        'attribute_username' => 'Имя пользователя',
    ],
    'account' =>
    [
        'account' => 'Аккаунт',
        'account_desc' => 'Управление формой.',
        'redirect_to' => 'Перенаправление',
        'redirect_to_desc' => 'Страница для перенаправления после обновления, входа или регистрации.',
        'code_param' => 'Параметр кода',
        'code_param_desc' => 'Параметр, в котором передаётся код активации.',
        'invalid_user' => 'Пользователь с такими данными не найден',
        'invalid_activation_code' => 'Неверный код активации.',
        'invalid_deactivation_pass' => 'Введенный Вами пароль некорректен.',
        'success_activation' => 'Успешная активация пользователя.',
        'success_deactivation' => 'Ваш аккаунт был деактивирован.',
        'success_saved' => 'Настройки успешно сохранены!',
        'login_first' => 'Вам необходимо войти под своими данными!',
        'already_active' => 'Ваш аккаунт ещё активирован!',
        'activation_email_sent' => 'Письмо с дальнейшими инструкциями по активации было выслано на указанный адрес электронной почты.',
        'registration_disabled' => 'Регистрация сейчас недоступна.',
        'sign_in' => 'Авторизация',
        'register' => 'Регистрация',
        'full_name' => 'Полное имя',
        'email' => 'Почта',
        'password' => 'Пароль',
        'login' => 'Логин',
        'new_password' => 'Новый пароль',
        'new_password_confirm' => 'Подтверждение пароля',
    ],
    'reset_password' =>
    [
        'reset_password' => 'Сброс пароля',
        'reset_password_desc' => 'Форма восстановления пароля.',
        'code_param' => 'Параметр кода',
        'code_param_desc' => 'Параметр, в котором передаётся код сброса пароля.',
    ],
    'session' =>
    [
        'session' => 'Сессия',
        'session_desc' => 'Добавление пользовательского сеанса к странице (доступ)',
        'security_title' => 'Доступ к странице',
        'security_desc' => 'Кто имеет право на доступ к этой странице.',
        'all' => 'Все',
        'users' => 'Пользователи',
        'guests' => 'Гости',
        'redirect_title' => 'Перенаправление',
        'redirect_desc' => 'Страница для перенаправления при отсутствии доступа.',
        'logout' => 'Вы успешно вышли из системы!',
    ],
    'type' => [
        'wholesale' => 'Оптовый',
        'retail' => 'Розничный',
    ],
    'login' => [
        'error' => [
            'password' => 'Неверный пароль',
        ],
    ],
    'register' => [
        'validation' => [
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'patronymic' => 'Отчество',
            'phone1' => 'телефона',
            'email' => 'E-mail',
            'password' => 'Пароль',
            'vatin' => 'ИНН',
            'street' => 'Улица',
            'house' => 'Дом',
            'flat' => 'Квартира',
            'phone2' => 'Дополнительный номер',
            'old_password' => 'Текущий пароль',
            'password_confirmation' => 'Повторный пароль'
        ],
    ],
    'update' => [
        'error' => [
            'old_password' => 'Неверный текущий пароль'
        ],
    ],
];
