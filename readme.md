# WP REST API Filter Items

A WordPress plugin to filter [WordPress REST API](http://wp-api.org/) items for your request.

## Description
Per default, a post via WordPress REST API would fetch all data in `/wp-json/posts`. This plugin enables you to filter your request for fields you require. Add items to the `GET` attribute on the url, like `wp-json/posts?items=ID,title,content` in order to get only according field values.

## WP-API Versions
 * __Use the branch [`wp-api-v1`](tree/wp-api-v1) if you use WP-API Version 1.__
 * The `master` branch is for development, currently refactoring for WP API Version 2.

## Examples
#### Result for post: `wp-json/posts?items=ID,title,content`
```json
[
  {
    "ID": 1,
    "title": "Hello world!",
    "content": "<p>Welcome to <a href=\"http:\/\/localhost\/wpbeta\/\">WP Beta Dev Sites<\/a>. This is your first post. Edit or delete it, then start blogging!<\/p>\n",
    "author": {'…'},
    "featured_image": null,
    "terms": {'…'}
  }
]
```

#### Result for taxonomy: `wp-json/taxonomies/category?items=name,slug`.
```json
{
  "name": "Categories",
  "slug": "category",
  "labels": {'…'},
  "types": {'…'},
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

#### Result for comments: `wp-json/posts/1/comments?items=ID,post`
```json
[
  {
    "ID": 2,
    "post": 1,
    "author": {'…'}
  },
  {'…'}
]
```

## Requirements
 * PHP 5.4
 * WordPress 4.*
 * WP REST API

## Kudos
Thanks @dnaber-de for his [modular, extendable PHP autoloader](https://github.com/dnaber-de/Requisite).
