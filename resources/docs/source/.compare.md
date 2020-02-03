---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#general


<!-- START_742a1cbd4a274c7269f0db99a704ff41 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
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
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[
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
]
```

### HTTP Request
`GET api/events`


<!-- END_742a1cbd4a274c7269f0db99a704ff41 -->

<!-- START_f36e77ce83ef3131131753e9591ba60f -->
## api/events/{id}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
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
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
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
}
```

### HTTP Request
`GET api/events/{id}`


<!-- END_f36e77ce83ef3131131753e9591ba60f -->

<!-- START_248353a0a529f8c8b53575918c24b45f -->
## api/events/{id}/score
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/score" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
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
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
"0:2"
```

### HTTP Request
`GET api/events/{id}/score`


<!-- END_248353a0a529f8c8b53575918c24b45f -->


