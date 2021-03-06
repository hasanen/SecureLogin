<?php
$lang['friendlyname'] = 'Secure login';
$lang['really_uninstall'] = 'Oikeasti? Oletko varma, että haluat poistaa tämän moduulin?';
$lang['uninstalled'] = 'Moduuli poistettu.';
$lang['postuninstall'] = $lang['uninstalled'];
$lang['installed'] = 'Moduulista asennettu versio %s .';
$lang['upgraded'] = 'Moduuli päivitetty versioon %s.';
$lang['moddescription'] = 'Moduuli suojaa kirjautumisprosessin tarkistamalla ip-osoitteen hyväksytyistä osoitteista. Kun käyttäjä on kirjautumassa, moduli tarkistaa onko hänen ip-osoitteensa hyväksyttyjen ip-osotteiden listalla. Jos ei, niin käyttäjälle lähetään sähköpostilla linkki, jota klikkaammalla ip-osoite hyväksytään. Auttaa erityisesti, jos tunnukset ovat joutuneet vääriin käsiin, hyökkääjä ei pysty kirjautumaan tunnuksilla, koska ip-osoite tarkistetaan.';

$lang['error'] = 'Virhe!';
$land['admin_title'] = 'Secure login Admin Panel';
$lang['admindescription'] = $lang['moddescription'];
$lang['accessdenied'] = 'Pääsy kielletty. Tarkista käyttöoikeutesi.';
$lang['postinstall'] = 'Käy asettamassa "SecureLogin management" oikeudet tarvittaville henkilöille!';


$lang['changelog'] = '<ul>
<li>Versio 1.1.1 - 18 Toukokuu 2014. Päivitetty päivitysmekanismi.</li>
<li>Versio 1.1 - 18 Toukokuu 2014. Korjattu bugi http://dev.cmsmadesimple.org/bug/view/9629. Lisätty mahdollisuus käyttäjän uudelleenohjaamiseen ensimmäisen kirjautumisen yhteydessä.</li>
<li>Versio 1.0/1.0.1 - 21 Syyskuu 2013. Ensimmäisen version julkaistu.</li>
<li>Versio 1.0 beta3 - 27 Toukokuu 2013. Kolmas beta julkaistu.</li>
<li>Versio 1.0 beta2 - 27 Toukokuu 2013. Toinen beta julkaistu.</li>
<li>Versio 1.0 beta - 27 Huhtikuu 2013. Ensimmäinen beta julkaistu.</li>
</ul>';
$lang['help'] = '<h3>Mitä tämä tekee?</h3>
<p>Moduuli suojaa kirjautumisprosessin tarkistamalla ip-osoitteen hyväksytyistä osoitteista. Kun käyttäjä on kirjautumassa, moduuli tarkistaa onko hänen ip-osoitteensa hyväksyttyjen ip-osotteiden listalla. Jos ei, niin käyttäjälle lähetään sähköpostilla linkki, jota klikkaammalla ip-osoite hyväksytään. Auttaa erityisesti, jos tunnukset ovat joutuneet vääriin käsiin, hyökkääjä ei pysty kirjautumaan tunnuksilla, koska ip-osoite tarkistetaan.</p>
<h3>Miten käytän sitä?</h3>
<p>Asentaminen riittää. Tarvittaessa ip:n voi käydä hyväksymässä hallintasivulta "Sivuston hallinta"-osiosta.</p>
<h3>Tuki</h3>
<p>Ohjelma tarjotaan sellaisenaan GPL-lisenssin alaisena. Lisätietoja lisenssistä voit lukea alla olevasta linkistä.</p>
<h3>Copyright and License</h3>
<p>Copyright &copy; 2013, Joni Hasanen <a href="mailto:joni.hasanen@pieceofcode.net">&lt;joni.hasanen@pieceofcode.net&gt;</a>. All Rights Are Reserved.</p>
<p>This module has been released under the <a href="http://www.gnu.org/licenses/licenses.html#GPL">GNU Public License</a>. You must agree to this license before using the module.</p>';

$lang['actions'] = 'Toiminnot';
$lang['username'] = 'Käyttäjätunnus';
$lang['ip'] = 'IP';
$lang['current_user'] = 'Sisäänkirjautunut käyttäjä';
$lang['validate'] = sprintf('Hyväksy %s', $lang['ip']);
$lang['invalidate'] = sprintf('Estä %s', $lang['ip']);
$lang['email.subject'] = 'Kirjautuminen tuntemattomasta ip-osoitteesta';
$lang['email.template.title'] = 'Sähköposti-pohja';
$lang['email.template.default'] = 'Hei!

Näyttää siltä, että joku on yrittänyt kirjautua tuntemattomasta ip-osoitteesta. Vahvista ip-osoite menemällä seuraavaan osoitteeseen: [url].

Jos et yrittänyt kirjautua, on suositeltavaa vaihtaa salasana HETI!

Tämä on automaattinen viesti eikä tähän tarvitse vastata';
$lang['email.template.variables'] = '
Voit käyttää seuraavia muuttujia pohjassa:<br />
<ul>
<li>[url] = Osoite, jolla IP-osoite hyväksytään</li>
</ul>';
$lang['email.template.submit'] = 'Lähetä';
$lang['email.template.cancel'] = 'Peruuta';
$lang['email.template.apply'] = 'Käytä';
$lang['email.template.hint'] = '(Saadaksesi oletus pohjan, tallenna pohja tyhjänä)';

$lang['save.succeed'] = 'Tallennus onnistui';


$lang['tabtitle.iplist'] = 'Osoitelista';
$lang['tabtitle.settings'] = 'Asetukset';
$lang['redirect.title'] = 'Uudelleenohjaus';
$lang['redirect.submit'] = 'Tallenna';
$lang['redirect.description'] = 'Mihin osoitteeseen käyttäjä ohjataan ensimmäistä kertaa tuntemattomasta osoitteesta kirjauduttaessa. Jätä tyhjäksi oletustoimintoa varten.';
