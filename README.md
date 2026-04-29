# Luminary Collective — WordPress Theme

Класична (non-block) WordPress-тема, зроблена на основі React-прототипу. Сумісна з PHP 7.4+, WordPress 5.9+. Без сторонніх залежностей.

## Встановлення

1. Запакувати папку `luminary-theme` у zip (або залити по FTP).
2. WP Admin → **Appearance → Themes → Add New → Upload Theme** → вибрати zip → **Install** → **Activate**.
3. (Або залити FTP у `wp-content/themes/luminary-theme/` і активувати.)

## Створення сторінок (це ОБОВ'ЯЗКОВО)

Тема очікує шість сторінок з конкретними slug'ами. Створи їх у **Pages → Add New**:

| Title       | Slug         | Page Template              |
|-------------|--------------|----------------------------|
| Home        | `home`       | Default                    |
| Programs    | `programs`   | Luminary — Programs        |
| Summits     | `summits`    | Luminary — Summits         |
| Members     | `members`    | Luminary — Members         |
| Stories     | `stories`    | Luminary — Stories         |
| Membership  | `membership` | Luminary — Membership      |
| Apply       | `apply`      | Luminary — Apply           |

**Template вибирається у правій панелі редактора сторінки** (Page → Template).

### Встановити головну сторінку

**Settings → Reading**:
- *Your homepage displays* → **A static page**
- *Homepage* → **Home**

Тема автоматично використає `front-page.php` для головної.

## Permalinks

**Settings → Permalinks** → вибрати **Post name** (`/%postname%/`). Інакше URL типу `/programs/` не працюватимуть.

## Що всередині

```
luminary-theme/
├── style.css             ← заголовок теми + весь CSS
├── functions.php         ← bootstrap, enqueue, меню
├── header.php            ← <head>, навігація
├── footer.php            ← футер + </body>
├── front-page.php        ← головна сторінка
├── page-programs.php     ← сторінка програм
├── page-summits.php      ← сторінка самітів
├── page-members.php      ← сторінка учасниць
├── page-stories.php      ← сторінка історій
├── page-membership.php   ← сторінка тарифів + FAQ
├── page-apply.php        ← форма подачі заявки
├── index.php             ← запасний шаблон
├── inc/
│   ├── data.php          ← ВЕСЬ контент сайту (учасниці, програми, ...)
│   └── render.php        ← допоміжні функції (plate, icon, pill, ...)
├── template-parts/
│   └── cta.php           ← фінальний CTA-блок
└── assets/images/        ← 35 згенерованих PNG
```

## Як редагувати контент

Зараз весь контент — у `inc/data.php`. Відкрий у редакторі коду й редагуй масиви:

- `testimonials` — 3 відгуки
- `programs` — 4 програми
- `summits` — 6 самітів (upcoming + past)
- `members` — 12 портретів учасниць
- `stories` — 8 обкладинок публікацій
- `tiers` — 3 тарифи + `features[]` + `featured`
- `faqs` — FAQ на сторінці Membership
- `press` — логотипи у стрічці "As featured in"

Кожен елемент має:
- `plate` — колір градієнту-заглушки (`v-coral` / `v-blush` / `v-honey` / `v-ivory` / `v-green` / `v-aqua`)
- `img` — назва файлу в `/assets/images/` без `.png` (наприклад, `member-portrait-03`)

## Як додати власні зображення

1. Закинь PNG у `wp-content/themes/luminary-theme/assets/images/` (назви — будь-які латиницею без пробілів, наприклад `member-olena.png`).
2. У `inc/data.php` зміни поле `img` відповідного елемента на нову назву без `.png`:
   ```php
   'img' => 'member-olena',
   ```

## Наступний крок (необов'язково): перенести контент у WP-адмінку

Щоб контент можна було редагувати через адмінку (без зміни коду), треба:

1. Зареєструвати Custom Post Types: `luminary_member`, `luminary_program`, `luminary_summit`, `luminary_story`, `luminary_tier`.
2. Додати поля (або руками через `get_post_meta`, або з ACF).
3. У `inc/data.php` замінити хардкод на `WP_Query` по цих CPT.

Усі шаблони звертаються до даних через `luminary_data()` / `luminary( 'key' )`, тож треба буде змінити лише один файл — `inc/data.php`.

## Відомі обмеження

- Зображення в темі (не в Media Library) — швидкий старт, але вони не індексуються WP Media і не мають автоматичних розмірів. При переході на CPT — перенести їх у Media через `wp_insert_attachment`.
- Форма `page-apply.php` — статична, не надсилає лист. Підключи WPForms / Contact Form 7 / Gravity Forms, або додай PHP-хендлер у `functions.php`.
- Інтерактивні фільтри на Members / фільтри по статусу на Summits — були у React, тут замінені на простий лістинг. При потребі — додати JS або server-side filtering через `?filter=` query param.
