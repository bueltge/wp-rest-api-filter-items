# WP REST API Filter Items

A WordPress plugin that filter [WP REST API](http://wp-api.org/) items on your request.

## Description
The default for a post from the REST API fetch all data in `/wp-json/posts`. This plugin give you the chance to filter for the required fields. Add the items to  `GET` attribute on the url, like `wp-json/posts?items=ID,title,content` and you get only this fields.

## WP-API Versions
 * Use the branch [`wp-api-v1`](tree/wp-api-v1) if you use WP-API Version 1*
 * The `master` branch is for developing, currently refactoring for WP API Version 2*

## Examples
#### Result for post, `wp-json/posts?items=ID,title,content`
```json
[
  {
    "ID": 1,
    "title": "Hello world!",
    "content": "<p>Welcome to <a href=\"http:\/\/localhost\/wpbeta\/\">WP Beta Dev Sites<\/a>. This is your first post. Edit or delete it, then start blogging!<\/p>\n",
    "author": {...},
    "featured_image": null,
    "terms": {...}
  }
]
```

#### Result for taxonomy, `wp-json/taxonomies/category?items=name,slug`.
```json
{
  "name": "Categories",
  "slug": "category",
  "labels": {...},
  "types": {...},
  "show_cloud": true,
  "hierarchical": true,
  "meta": {
    "links": {
      "archives": "http:\/\/localhost\/wpbeta\/plugins\/wp-json\/taxonomies\/category\/terms",
      "collection": "http:\/\/localhost\/wpbeta\/plugins\/wp-json\/taxonomies",
      "self": "http:\/\/localhost\/wpbeta\/plugins\/wp-json\/taxonomies\/category"
    }
  }
}
```

#### Result for comments, `wp-json/posts/1/comments?items=ID,post`
```json
[
  {
    "ID": 2,
    "post": 1,
    "author": {...}
  },
  {...}
]
```

## Requirements
 * PHP 5.4
 * WordPress 4.*
 * WP REST API

## Kudos
Thanks a lot to D.Naber for his [Requiste Autoload](https://github.com/dnaber-de/Requisite).
