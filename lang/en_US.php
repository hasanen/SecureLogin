<?php
$lang['friendlyname'] = 'Secure login';
$lang['really_uninstall'] = 'Really? Are you sure
you want to uninstall this fine module?';
$lang['uninstalled'] = 'Module Uninstalled.';
$lang['postuninstall'] = $lang['uninstalled'];
$lang['installed'] = 'Module version %s installed.';
$lang['upgraded'] = 'Module upgraded to version %s.';
$lang['moddescription'] = 'Module secures login process with ip-whitelist. When user is logging in module will check if his/hers ip is in the whitelist. If not, user will get an email with link, which adds user\'s ip in the list after click.    Helps especially if user lost his credentials, attacker will not be able to login because of ip check.';

$lang['error'] = 'Error!';
$land['admin_title'] = 'Secure login Admin Panel';
$lang['admindescription'] = $lang['moddescription'];
$lang['accessdenied'] = 'Access Denied. Please check your permissions.';
$lang['postinstall'] = 'Be sure to set "SecureLogin management" permissions to use this module!';


$lang['changelog'] = '<ul>
<li>Version 1.0 - 21 September 2013. First release.</li>
<li>Version 1.0 beta4 - 10 May 2013. Releasing fourth beta.</li>
<li>Version 1.0 beta3 - 09 May 2013. Releasing third beta.</li>
<li>Version 1.0 beta2 - 09 May 2013. Releasing second beta.</li>
<li>Version 1.0 beta - 27 April 2013. Releasing first beta.</li>
</ul>';
$lang['help'] = '<h3>What Does This Do?</h3>
<p>Module secures login process with ip-whitelist. When user is logging in module will check if his/hers ip is in the whitelist. If not, user will get an email with link, which adds user\'s ip in the list after click.    Helps especially if user lost his credentials, attacker will not be able to login because of ip check.</p>
<h3>How Do I Use It</h3>
<p>All you need to do is to install module. After someone has tried to log in from new ip, you can approve it manually from management page under "Site Admin".</p>
<h3>Support</h3>
<p>As per the GPL, this software is provided as-is. Please read the text of the license for the full disclaimer.</p>
<h3>Copyright and License</h3>
<p>Copyright &copy; 2013, Joni Hasanen <a href="mailto:joni.hasanen@pieceofcode.net">&lt;joni.hasanen@pieceofcode.net&gt;</a>. All Rights Are Reserved.</p>
<p>This module has been released under the <a href="http://www.gnu.org/licenses/licenses.html#GPL">GNU Public License</a>. You must agree to this license before using the module.</p>';

$lang['actions'] = 'Actions';
$lang['username'] = 'Username';
$lang['ip'] = 'IP';
$lang['current_user'] = 'Current user';
$lang['validate'] = sprintf('Validate %s', $lang['ip']);
$lang['invalidate'] = sprintf('Invalidate %s', $lang['ip']);
$lang['email.subject'] = 'Login from unauthorized ip';
$lang['email.template.title'] = 'Email-template';
$lang['email.template.default'] = 'Hi!

It looks like you have been trying to login from unauthorized ip-address. Please click following link to approve ip-address: [url].

If you haven\'t tried to log in, it would be good to change your password immediately!

This is automatic message and it needs no response.';
$lang['email.template.variables'] = '
You can use following variables in template:<br />
<ul>
<li>[url] = Url for approving IP-address</li>
</ul>';
$lang['email.template.submit'] = 'Submit';
$lang['email.template.cancel'] = 'Cancel';
$lang['email.template.apply'] = 'Apply';
$lang['email.template.hint'] = '(For the default template, save template as empty)';
