<?php
// Site-wide settings. Edit here, used everywhere.
const SITE_URL   = 'https://trueprecisionltd.co.uk';
const SITE_NAME  = 'True Precision Engineering';
const LEGAL_NAME = 'True Precision Engineering Ltd';
const PHONE      = '0191 414 2959';
const PHONE_INTL = '+441914142959';
const EMAIL      = 'sales@trueprecisionengineering.co.uk';
const EMAIL_2    = 'jackie@trueprecisionengineering.co.uk';
const MAIL_TO    = 'sales@trueprecisionengineering.co.uk, jackie@trueprecisionengineering.co.uk'; // form enquiries go here
const MAIL_FROM  = 'noreply@trueprecisionltd.co.uk'; // must be on a domain this server is allowed to send for (SPF)
const LINKEDIN   = 'https://www.linkedin.com/company/true-precision-engineering-limited/';
const ADDRESS    = ['Ryton Industrial Estate', 'Newburn Bridge Road', 'Blaydon-on-Tyne', 'Tyne and Wear', 'NE21 4SQ'];
const MAP_QUERY  = 'True Precision Engineering, Newburn Bridge Rd, Blaydon-on-Tyne NE21 4SQ';

const NAV = ['/' => 'Home', '/about' => 'About', '/services' => 'Services', '/contact' => 'Contact'];

function e(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
