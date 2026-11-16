# True Precision Engineering – website

Plain PHP 8 site, no CMS, no database, no build step.

- Pages: `index.php`, `about.php`, `services.php`, `contact.php`, `privacy.php`, `404.php`
- Shared layout and settings: `includes/` (phone, emails, address in `includes/config.php`)
- Clean URLs (`/about`, `/services`…) and 301s from the old site: `.htaccess` (Apache)
- SEO/AI: JSON-LD schema in every page, `sitemap.xml`, `robots.txt`, `llms.txt`
- Contact forms send with PHP `mail()` to `MAIL_TO`. The host must be able to send for `MAIL_FROM` (SPF) or mail may land in spam.

Test the form validator: `php -d zend.assertions=1 tests/enquiry_test.php`
