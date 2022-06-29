<!DOCTYPE HTML>
<html>
<head>
    <title>Words calculator</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
    <link rel="stylesheet" href="views/assets/css/main.css"/>
    <noscript>
        <link rel="stylesheet" href="views/assets/css/noscript.css"/>
    </noscript>
</head>
<body class="is-preload">
<!-- Sidebar -->
<section id="sidebar">
    <div class="inner">
        <nav>
            <ul>
                <li><a href="#intro">Welcome</a></li>
                <li><a href="#statistic">View statistic</a></li>
            </ul>
        </nav>
    </div>
</section>
<!-- Wrapper -->
<div id="wrapper">
    <!-- Intro -->
    <section id="intro" class="wrapper style1 fullscreen fade-up">
        <div class="inner">
            <a href="index.php"><h1>Words calculator</h1></a>
            <p>Put your text on form below and see some information about</p>
        </div>
        <form method="post" action="#statistic">
            <div class="row gtr-uniform">
                <div class="col-12">
                    <textarea name="calculated-text" id="calculated-text" placeholder="Enter your text" rows="6"
                              autofocus></textarea>
                </div>
                <div class="col-12">
                    <ul class="actions">
                        <li><input type="submit" value="Calculate" class="primary"/></li>
                        <li><input id="reset" type="reset" value="Reset"/></li>
                    </ul>
                </div>
            </div>
        </form>
    </section>
    <!-- Statistic -->
    <section id="statistic" class="wrapper style3 fade-up">
        <div class="inner">
            <h2>Statistic</h2>

            <div class="features">
                <section>
                    <span class="icon solid major fa-list"></span>
                    <h3>Calculations</h3>
                    <p>
                        Number of characters: <?= $text->getCharactersCount(); ?><br>
                        Number of words: <?= $text->getWordsCount(); ?><br>
                        Number of sentences: <?= $text->getSentencesCount(); ?> <br>
                        Average word length: <?= $text->getWordLengthAverage(); ?> <br>
                        The average number of words in a sentence: <?= $text->getWordsInSentenceAverage(); ?> <br>
                    </p>
                </section>
                <section>
                    <span class="icon solid major fa-bars"></span>
                    <h3>Palindroms</h3>
                    <p>
                        Number of palindrome words: <?= $text->getPalindromeWordsCount(); ?><br>
                        Is the whole text a palindrome: <?= $text->isWholeTextPalindrome() ? 'Yes' : 'No'; ?><br>
                    </p>
                </section>
            </div>
            <!-- -->
            <div class="features">
                <section>
                    <span class="icon solid major fa-hashtag"></span>
                    <h3>TOP 10 most used words: </h3>
                    <ol>
                        <?php foreach ($text->getMostUsedWords() as $word) : ?>
                            <li><?= $word ?></li>
                        <?php endforeach; ?>
                    </ol>
                </section>
                <section>
                    <span class="icon solid major fa-hashtag"></span>
                    <h3>TOP 10 longest words:</h3>
                    <ol>
                        <?php foreach ($text->getLongestWords() as $word) : ?>
                            <li><?= $word ?></li>
                        <?php endforeach; ?>
                    </ol>
                </section>
                <section>
                    <span class="icon solid major fa-hashtag"></span>
                    <h3>TOP 10 shortest words:</h3>
                    <ol>
                        <?php foreach ($text->getShortestWords() as $word) : ?>
                            <li><?= $word ?></li>
                        <?php endforeach; ?>
                    </ol>
                </section>
                <section>
                    <span class="icon solid major fa-hashtag"></span>
                    <h3>TOP 10 longest palindrome words:</h3>
                    <ol>
                        <?php foreach ($text->getLongestPalindromeWords() as $word) : ?>
                            <li><?= $word ?></li>
                        <?php endforeach; ?>
                    </ol>
                </section>
            </div>
            <!-- -->
            <div class="features">
                <section>
                    <span class="icon solid major fa-info"></span>
                    <h3>TOP 10 longest sentences: </h3>
                    <ol>
                        <?php foreach ($text->getLongestSentences() as $sentence) : ?>
                            <li><?= $sentence ?></li>
                        <?php endforeach; ?>
                    </ol>
                </section>
                <section>
                    <span class="icon solid major fa-info"></span>
                    <h3>TOP 10 shortest sentences:</h3>
                    <ol>
                        <?php foreach ($text->getShortestSentences() as $sentence) : ?>
                            <li><?= $sentence ?></li>
                        <?php endforeach; ?>
                    </ol>
                </section>
            </div>
            <!-- -->
            <section>
                <div class="row">
                    <div class="col-6 col-12-medium" style="padding-right: 10px">
                        <h2>Frequency of characters</h2>
                        <div class="table-wrapper">
                            <table>
                                <thead>
                                <tr>
                                    <th>Character</th>
                                    <th>Frequency</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($text->getCharactersFrequency() as $char => $count) : ?>
                                    <tr>
                                        <td><?= $char ?></td>
                                        <td><?= $count ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-6 col-12-medium">
                        <h2>Distribution of characters as a percentage of total</h2>
                        <div class="table-wrapper">
                            <table>
                                <thead>
                                <tr>
                                    <th>Character</th>
                                    <th>Percentage</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($text->getCharactersPercentage() as $char => $percentage) : ?>
                                    <tr>
                                        <td><?= $char ?></td>
                                        <td><?= round($percentage, 2) . ' %' ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
            <h3>The reversed text:</h3>
            <blockquote><?= $text->getReverseText() ?></blockquote>
            <!-- -->
            <h3>The reversed text but the character order in words kept intact:</h3>
            <blockquote><?= $text->getReverseWords() ?></blockquote>
            <p>Date and time when the report was generated: <?= isset($timeService) ? $timeService->getCurrentFormattedDataTime() : ''?> </p>
            <p>The time it took to process the text: <?= isset($timeService) ? $timeService->getFormattedSpentTime() : '' ?> </p>
        </div>
    </section>
</div>
<!-- Scripts -->
<script src="views/assets/js/jquery.min.js"></script>
<script src="views/assets/js/jquery.scrollex.min.js"></script>
<script src="views/assets/js/jquery.scrolly.min.js"></script>
<script src="views/assets/js/browser.min.js"></script>
<script src="views/assets/js/breakpoints.min.js"></script>
<script src="views/assets/js/util.js"></script>
<script src="views/assets/js/main.js"></script>
</body>
</html>