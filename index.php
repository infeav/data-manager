<!--
    This file is part of the
    Infeav Data Manager (https://www.infeav.org/data-manager)
    open source project

    @copyright   2018-2020 Tobias Krebs and the Infeav Team
    @license     https://www.gnu.org/licenses/gpl.html GNU General Public License 3
-->

<!--
    The official entry point to this application is public/start.php

    Apache's document root should be set to the public/ directory!
-->

<?php

if (! isset($heading)) {
    $heading = 'Apache setup required';
}

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="application-name" content="Infeav Data Manager">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="favicon.ico">
        <link rel="stylesheet" href="<?php if (! isset($fromPublic)) { echo 'public/'; } ?>css/compiled/foundation.min.css">
        <link rel="help" href="https://www.infeav.org/data-manager/help?search=<?php echo urlencode($heading); ?>">
        <title>Infeav Data Manager / Setup</title>
    </head>

    <body class="inf-has-basic-message">
        <article class="inf-basic-message">
            <header>
                <figure>
                    <svg id="inf-logo" width="160" height="34" viewBox="0 0 160 34">
                        <title>Infeav</title>
                        <path d="M442.62,292.88H437.2V261.54h5.42Z" transform="translate(-394.73 -259.37)" />
                        <path d="M453.66,269.59l.15,2.69a8.37,8.37,0,0,1,6.78-3.12q7.28,0,7.4,8.33v15.39h-5.23V277.79a4.85,4.85,0,0,0-.95-3.28,4,4,0,0,0-3.13-1.06,5,5,0,0,0-4.72,2.86v16.57h-5.23V269.59Z" transform="translate(-394.73 -259.37)" />
                        <path d="M475.16,292.88V273.47h-3.55v-3.88h3.55v-2.13a8,8,0,0,1,2.15-6,8.25,8.25,0,0,1,6-2.11,12.07,12.07,0,0,1,2.93.39l-.13,4.09a9.9,9.9,0,0,0-2-.18q-3.75,0-3.75,3.86v2.06h4.74v3.88h-4.74v19.41Z" transform="translate(-394.73 -259.37)" />
                        <path d="M498.69,293.31a10.79,10.79,0,0,1-8.06-3.13,11.36,11.36,0,0,1-3.09-8.34v-.65a14.08,14.08,0,0,1,1.34-6.23,10.27,10.27,0,0,1,3.78-4.27,10,10,0,0,1,5.42-1.53,9.13,9.13,0,0,1,7.35,3q2.6,3,2.6,8.59v2.1H492.81a7,7,0,0,0,1.93,4.57,5.77,5.77,0,0,0,4.25,1.68,7.08,7.08,0,0,0,5.85-2.91l2.82,2.69a9.47,9.47,0,0,1-3.73,3.24A11.69,11.69,0,0,1,498.69,293.31Zm-.63-19.95a4.38,4.38,0,0,0-3.47,1.51,7.69,7.69,0,0,0-1.69,4.19h10v-.38a6.3,6.3,0,0,0-1.4-4A4.36,4.36,0,0,0,498.06,273.36Z" transform="translate(-394.73 -259.37)" />
                        <path d="M526,292.88a8,8,0,0,1-.6-2.17,8.81,8.81,0,0,1-11.84.6,6.39,6.39,0,0,1-2.22-4.95,6.59,6.59,0,0,1,2.77-5.71q2.76-2,7.91-2h3.2v-1.52a4.07,4.07,0,0,0-1-2.9,4,4,0,0,0-3.08-1.09,4.56,4.56,0,0,0-2.92.9,2.75,2.75,0,0,0-1.14,2.27h-5.23a5.76,5.76,0,0,1,1.27-3.58,8.31,8.31,0,0,1,3.45-2.62,12.17,12.17,0,0,1,4.88-.95,9.8,9.8,0,0,1,6.52,2.06,7.33,7.33,0,0,1,2.49,5.78v10.5a11.8,11.8,0,0,0,.89,5v.37Zm-5.75-3.77a6,6,0,0,0,2.92-.75,5.05,5.05,0,0,0,2.05-2V282H522.4a7.72,7.72,0,0,0-4.36,1,3.27,3.27,0,0,0-1.47,2.86,3.06,3.06,0,0,0,1,2.4A3.86,3.86,0,0,0,520.25,289.11Z" transform="translate(-394.73 -259.37)" />
                        <path d="M543.82,286.25l4.93-16.66h5.4l-8.07,23.29h-4.54l-8.14-23.29h5.43Z" transform="translate(-394.73 -259.37)" />
                        <path d="M417.4,271.17c-.16-.18-.28-.07-.38,0l-13.31,13.3c-.1.1-.21.22,0,.38a9.7,9.7,0,0,0,13.72-13.72Z" transform="translate(-394.73 -259.37)" />
                        <path d="M404.23,278.58l-6.44-6.43c-.11-.11-.22-.22-.39,0a9.71,9.71,0,0,0,0,13.38c.16.18.27.07.38,0l6.44-6.44A.32.32,0,0,0,404.23,278.58Z" transform="translate(-394.73 -259.37)" />
                        <path d="M410.2,272.71a4.86,4.86,0,0,0-6.53,0c-.17.16-.06.28,0,.38l3,3a.3.3,0,0,0,.43,0l3-3C410.25,273,410.37,272.87,410.2,272.71Z" transform="translate(-394.73 -259.37)" />
                    </svg>

                    <figcaption>Data Manager &nbsp;/&nbsp; Setup</figcaption>
                </figure>
            </header>

            <main>
                <section>
                    <figure class="-type-symbol text-warning" aria-hidden="true">
                        <svg class="bi bi-exclamation-triangle-fill" width="40" height="40" viewBox="0 0 16 16" fill="currentColor">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M8.982 1.566a1.13 1.13 0 00-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5a.905.905 0 00-.9.995l.35 3.507a.552.552 0 001.1 0l.35-3.507A.905.905 0 008 5zm.002 6a1 1 0 100 2 1 1 0 000-2z" />
                        </svg>
                    </figure>

                    <?php

                    echo "<h1>$heading</h1>";

                    if (isset($text)) {
                        if (is_string($text)) {
                            echo "<p>$text</p>";
                        } else if (is_array($text)) {
                            foreach ($text as $line) {
                                echo "<p>$line</p>";
                            }
                        }
                    } else {
                        echo '<p>The Apache HTTP Server module <b>mod_rewrite</b> must be installed and enabled to be used in <b>.htaccess</b> files – but seems not to.</p>';
                        echo '<p>Please ask your server\'s administrator to enable it.</p>';
                    }

                    ?>
                </section>
            </main>

            <footer>
                <a href="https://www.infeav.org/data-manager" target="_blank" rel="external noreferrer">Infeav Website</a>
                <a href="https://www.infeav.org/data-manager/help?search=<?php echo urlencode($heading); ?>" target="_blank" rel="external noreferrer">Help</a>
            </footer>
        </article>
    </body>
</html>
