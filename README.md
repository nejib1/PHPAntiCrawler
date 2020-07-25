## PHPAntiCrawler
This is a simple way to block anyone from crawling your Website.

This script will block any crawler or bot (except Google and Bing for SEO Reasons).

The script consider that a real visitor cannot visit your website 500 times within one hour, only bots can do that.

The script should be included at the head of your script/page.

## Usage

```php
include("anticrawler.php");
```

## Why the script is useful ?
1) Parsers behind proxies or CloudFlare are detected, the script extract user's real IP.
2) Your SEO will be not impacted, Google and Bing bots are whitelisted.

By default, max calls are defined to 500 (line 8)  but you can change it 

## Contributing
If you have any question or you want to contribute, please make a Pull Request, thank you.
