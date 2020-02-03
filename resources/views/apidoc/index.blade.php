<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>API Reference</title>

    <link rel="stylesheet" href="/docs/css/style.css" />
    <script src="/docs/js/all.js"></script>


          <script>
        $(function() {
            setupLanguages(["bash","javascript"]);
        });
      </script>
      </head>

  <body class="">
    <a href="#" id="nav-button">
      <span>
        NAV
        <img src="/docs/images/navbar.png" />
      </span>
    </a>
    <div class="tocify-wrapper">
        <img src="/docs/images/logo.png" />
                    <div class="lang-selector">
                                  <a href="#" data-language-name="bash">bash</a>
                                  <a href="#" data-language-name="javascript">javascript</a>
                            </div>
                            <div class="search">
              <input type="text" class="search" id="input-search" placeholder="Search">
            </div>
            <ul class="search-results"></ul>
              <div id="toc">
      </div>
                    <ul class="toc-footer">
                                  <li><a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a></li>
                            </ul>
            </div>
    <div class="page-wrapper">
      <div class="dark-box"></div>
      <div class="content">
          <!-- START_INFO -->
<h1>Info</h1>
<p>Welcome to the generated API reference.
<a href="{{ url("storage/apidoc/collection.json") }}">Get Postman Collection</a></p>
<!-- END_INFO -->
<h1>general</h1>
<!-- START_742a1cbd4a274c7269f0db99a704ff41 -->
<h2>Display a listing of the resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/api/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/events"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">[
    {
        "id": 1,
        "name": "Stroman, Blanda and Jones",
        "team1name": "Parker-Blick",
        "team2name": "Lemke-Jacobson",
        "team1wincoef": 2.72,
        "team2wincoef": 2.93,
        "draw_coef": 1.57,
        "score": "0:2",
        "video_link": null,
        "start_date": "1970-12-26 19:11:29",
        "finished_at": null,
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 3007,
        "name": "Conroy, Hoppe and Konopelski",
        "team1name": "Botsford, Luettgen and Kuvalis",
        "team2name": "Block, King and Von",
        "team1wincoef": 2.31,
        "team2wincoef": 1.29,
        "draw_coef": 2.06,
        "score": "0:1",
        "video_link": null,
        "start_date": "1986-11-18 22:55:00",
        "finished_at": null,
        "created_at": null,
        "updated_at": "2020-02-01 19:06:24"
    },
    {
        "id": 3009,
        "name": "Grant, Schuster and Treutel",
        "team1name": "Brekke Inc",
        "team2name": "Rosenbaum-Waelchi",
        "team1wincoef": 3.44,
        "team2wincoef": 1.08,
        "draw_coef": 2.9,
        "score": "1:0",
        "video_link": null,
        "start_date": "1991-08-21 08:17:08",
        "finished_at": null,
        "created_at": null,
        "updated_at": "2020-02-01 18:45:52"
    }
]</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/events</code></p>
<!-- END_742a1cbd4a274c7269f0db99a704ff41 -->
<!-- START_f36e77ce83ef3131131753e9591ba60f -->
<h2>api/events/{id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/api/events/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/events/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "id": 1,
    "name": "Stroman, Blanda and Jones",
    "team1name": "Parker-Blick",
    "team2name": "Lemke-Jacobson",
    "team1wincoef": 2.72,
    "team2wincoef": 2.93,
    "draw_coef": 1.57,
    "score": "0:2",
    "video_link": null,
    "start_date": "1970-12-26 19:11:29",
    "finished_at": null,
    "created_at": null,
    "updated_at": null
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/events/{id}</code></p>
<!-- END_f36e77ce83ef3131131753e9591ba60f -->
<!-- START_248353a0a529f8c8b53575918c24b45f -->
<h2>api/events/{id}/score</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/api/events/1/score" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/events/1/score"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">"0:2"</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/events/{id}/score</code></p>
<!-- END_248353a0a529f8c8b53575918c24b45f -->
      </div>
      <div class="dark-box">
                        <div class="lang-selector">
                                    <a href="#" data-language-name="bash">bash</a>
                                    <a href="#" data-language-name="javascript">javascript</a>
                              </div>
                </div>
    </div>
  </body>
</html>
