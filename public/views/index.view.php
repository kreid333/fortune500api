<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/assets/css/reset.css">
    <link rel="stylesheet" href="/public/assets/css/styles.css">
    <link rel="icon" type="image/x-icon" href="/public/assets/images/download.png">
    <title>Fortune 500 API</title>
</head>

<body>
    <!-- HEADER -->
    <header class="header">
        <div class="header__logo">
            <h1>Fortune 500 API</h1>
            <img src="/public/assets/images/download.png" alt="">
        </div>
    </header>

    <div class="container">
        <!-- DESCRIPTION -->
        <h2 class="description">An easy to use, public API that provides data on Fortune 500 companies.</h2>

        <!-- NOTICE -->
        <figure class="notice">
            <figcaption>Currently, we only have data for the following years:</figcaption>
            <ul class="notice__years">
                <li>2022</li>
                <li>2021</li>
                <li>2020</li>
            </ul>
        </figure>

        <!-- CONTENT -->
        <div class="content">
            <div class="content__info">
                <h3 class="content__title"><code>GET</code> Companies</h2>
                    <p>Get a list of all companies for the specified year by using the <code>/{year}/companies</code> endpoint.</p>
                    <pre><code><a href="/2020/companies">https://fortune500api.sndbxx.com/2020/companies</a></code></pre>
                    <p>The API will return 25 items per page by default.</p>
                    <p>To request another page, use the <code>?page</code> parameter.</p>
                    <p>To change the amount of items per page, use the <code>?limit</code> parameter.</p>
                    <pre><code><a href="/2020/companies?page=2&amp;limit=100">https://fortune500api.sndbxx.com/2020/companies?page=2&amp;limit=100</a></code></pre>
            </div>
            <div class="content__code">
                <pre class="code-box"><code>
        [
            {
                "rank":1,
                "company_name": "Walmart",
                "number_of_employees": 2200000,
                "change_in_rank": 0,
                "revenues_in_millions": 523964,
                "revenue_percent_change": 1.9,
                "profits_in_millions": 14881,
                "profit_percent_change": 123.1,
                "assets_in_millions": 236495,
                "market_value_in_millions": 321803
            }
        ]
    </code>
            </pre>
            </div>
        </div>

        <!-- CONTENT -->
        <div class="content">
            <div class="content__info">
                <h3 class="content__title"><code>GET</code> Company by Rank</h2>
                    <p>Get information about a specific company for the specified year by using the <code>{year}/rank/{number}</code> endpoint.</p>
                    <pre><code><a href="/2020/rank/1">https://fortune500api.sndbxx.com/2020/rank/1</a></code></pre>
            </div>
            <div class="content__code">
                <pre class="code-box"><code>
            {
                "rank":1,
                "company_name": "Walmart",
                "number_of_employees": 2200000,
                "change_in_rank": 0,
                "revenues_in_millions": 523964,
                "revenue_percent_change": 1.9,
                "profits_in_millions": 14881,
                "profit_percent_change": 123.1,
                "assets_in_millions": 236495,
                "market_value_in_millions": 321803
            }
    </code>
            </pre>
            </div>
        </div>
    </div>

    <footer>
        <span>Created by <a href="https://github.com/kreid333">Kai Reid</a></span>
    </footer>
</body>

</html>