# PHPAntiCrawler
This is a simple way to block anyone from crawling your Website.
This script will block any crawler or bot (except Google and Bing for SEO Reasons) to crawl your content.

The script should be included at the first of your page.

include("anticrawler.php");

session_start(); is mandatory the top of your script/page... 

By default, max call are defined 500 (line 8)  but you can change it 

If you have any question of you want to modify the script please make a Pull Request, thank you.
