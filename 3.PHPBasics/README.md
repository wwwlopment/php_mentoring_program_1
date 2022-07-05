# Words calculator

## Installation
$ docker-compose up

Open in browser at http://0.0.0.0:8000

## Description
**Create a webpage with a form where you can submit a text and get back some data about it as a result.
The following information should be calculated for the text input:**

*Statistical information:*
- Number of characters
- Number of words
- Number of sentences
- Frequency of characters
- Distribution of characters as a percentage of total
- Average word length
- The average number of words in a sentence
- Top 10 most used words
- Top 10 longest words
- Top 10 shortest words
- Top 10 longest sentences
- Top 10 shortest sentences
- Number of palindrome words
- Top 10 longest palindrome words
- Is the whole text a palindrome? (Without whitespaces and punctuation marks.)
- The time it took to process the text in ms
- (Optional) Add any data that you think could be interesting
- Date and time when the report was generated.
- The reversed text
- “This is the text.” -> ”.txet desrever ehT”
- The reversed text but the character order in words kept intact.
“This is the text.” -> ”.text the is This”
>The calculation should work for UTF8 encoded text as well.