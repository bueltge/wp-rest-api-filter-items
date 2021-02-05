# WP REST API Filter Items
[![Unit Tests](https://github.com/bueltge/wp-rest-api-filter-items/workflows/PHP%20Unit%20Tests/badge.svg)](https://github.com/bueltge/wp-rest-api-filter-items/actions)
[![Build Status](https://travis-ci.org/bueltge/wp-rest-api-filter-items.svg?branch=master)](https://travis-ci.org/bueltge/wp-rest-api-filter-items) [![Code Climate](https://codeclimate.com/github/bueltge/wp-rest-api-filter-items/badges/gpa.svg)](https://codeclimate.com/github/bueltge/wp-rest-api-filter-items) [![License](https://poser.pugx.org/bueltge/wp-rest-api-filter-items/license)](https://packagist.org/packages/bueltge/wp-rest-api-filter-items)

A WordPress plugin to filters [WordPress REST API](http://wp-api.org/) items for your request. Its removing key and values from WP API response on your request.

## Description
Per default, a post via WordPress REST API would fetch all data in `wp-json/wp/v2/posts`. For many reasons, you might want to exclude certain fields from WP API response in certain circumstances. This plugin enables you to filter your request for fields you require. Add items to the `GET` attribute on the url, like `wp-json/wp/v2/posts?items=id,title,content` in order to get only according field values.

The plugin currently supports the filtering of post, taxonomy and comments.

## WP-API Versions
 * __Use the branch [`wp-api-v1`](tree/wp-api-v1) if you use WP-API Version 1.__
 * The **`master` branch** is for development, currently ready and open for feature requests for the **WP API Version 2**.

## Installation
Install static via download, clone the repository or use dependency management via Composer

`composer require bueltge/wp-rest-api-filter-items`

## Examples
#### Result for post: `wp-json/wp/v2/posts?_wp_json_nonce=4355d0c4b3&items=id,title,content`
```json
[
	{
		"id": 1,
		"title": {
			"rendered": "Hello world!"
		},
		"content": {
			"rendered": "<p>Welcome to <a href=\"http://localhost/wpbeta/\">WP Beta Dev Sites</a>. This is your first post. Edit or delete it, then start blogging!</p>\n"
		}
	}
]
```

#### Result for taxonomy: `p-json/wp/v2/taxonomies/category?_wp_json_nonce=4355d0c4b3&items=name,slug,types`.
```json
{
	"name": "Categories",
	"slug": "category",
	"types": [
		"post",
		"archiv"
	]
}
```

#### Result for comments: `wp-json/wp/v2/comments?items=id,author_name`
```json
[
	{
		"id": 1,
		"author_name": "Mr WordPress"
	},
	{
		"id": 2,
		"author_name": "admin"
	}
]
```

## Requirements
 * PHP 5.4
 * WordPress 4.*
 * WP REST API

## Kudos
Thanks @dnaber-de for his [modular, extendable PHP autoloader](https://github.com/dnaber-de/Requisite).
