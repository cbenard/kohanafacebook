<h1>Instructions for Kohana + Facebook Demo</h1>

<h2>By: <a href="http://chrisbenard.net">Chris Benard</a></h2>

<h3>Created for the Dallas PHP Users Group Meeting</h3>

<h4>January 11, 2011</h4>

<h2>Follow these steps:</h2>

<ol>
    <li>
        Download the source on
        <a href="https://github.com/cbenard/kohanafacebook/">GitHub</a>
        in a zip, tarball, or via git.
    </li>
<li><p>Copy the entire directory structure to your web document root.
e.g. application directory should be in <code>/</code>, relative to the document root</p></li>
<li><p>Create a Facebook application at <a href="http://www.facebook.com/developers/">http://www.facebook.com/developers/</a></p></li>
<li><p>Import the included <code>kohanafacebook.sql</code> file into a MySQL database,
using PHPMyAdmin's import feature, the import feature of your preferred
MySQL IDE, or the mysql command line tool.</p></li>
<li><p>Edit <code>/config.inc.php</code> and fill in the appropriate values, from your
Facebook application's settings page and from your MySQL Database
into which you just imported the test settings.</p></li>
<li><p>Edit <code>.htaccess</code> to reflect the correct RewriteBase. This should match the
baseurl in <code>/config.inc.php</code>. If you host it at <code>http://site.com/</code>, the <code>baseurl</code>
and <code>RewriteBase</code> should be <code>/</code>. If you host it at <code>http://site.com/kohana/</code>,
the baseurl and RewriteBase should be /kohana/.</p></li>
<li><p>Get your Facebook numeric ID. If you go to your Facebook page and it
looks like <code>http://facebook.com/FriendlyUserName</code>, go to
<code>http://graph.facebook.com/FriendlyUserName</code> - This will give you your numeric
ID. If your page looks like <code>http://facebook.com/1234567890</code>, <code>1234567890</code> is
your numeric Facebook ID.</p></li>
<li><p>Add your Facebook numeric ID into the admins table in the MySQL database
so that you can be an admin on the site. Feel free to remove the others
in there (mine).</p></li>
<li><p><em>(Optional)</em> Delete the <code>kohanafacebook.sql</code> file in your web root so that
potential attackers cannot access it via the website.</p></li>
</ol>