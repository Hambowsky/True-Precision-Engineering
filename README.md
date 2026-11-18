# True Precision Engineering – website

Plain PHP 8 site, no CMS, no database, no build step.

- Pages: `index.php`, `about.php`, `services.php`, `contact.php`, `privacy.php`, `404.php`
- Shared layout and settings: `includes/` (phone, emails, address in `includes/config.php`)
- Clean URLs (`/about`, `/services`…) and 301s from the old site: `.htaccess` (Apache). Works on any domain, so it runs unchanged on newsite.trueprecisionltd.co.uk and then on the live domain; anything but trueprecisionltd.co.uk is kept out of search engines (noindex) and form emails are tagged "[Test site]".
- SEO/AI: JSON-LD schema in every page, `sitemap.xml`, `robots.txt`, `llms.txt`
- Contact forms send with PHP `mail()` to `MAIL_TO`. The quote form takes up to 5 drawings (10 MB total), attached to the email, never stored; limits are in `includes/enquiry.php`, `.user.ini` and `.htaccess`. The host must be able to send for `MAIL_FROM` (SPF) or mail may land in spam.

Test the form validator: `php -d zend.assertions=1 tests/enquiry_test.php`
