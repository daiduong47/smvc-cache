# Cache helper for Simple MVC Framework
Using this helper you will be able to use [phpFastCache](http://www.phpfastcache.com/) as caching method for your application. Build for [Simple MVC Framework](http://simplemvcframework.com/php-framework).

**Installation**
* Copy `Cache.php` to your `Helpers` folder
* Install phpFastCache by using `$ composer require phpFastCache/phpFastCache`.
* Have fun using your faster website :)

**Example**
```
<?php

use Core\Model;
use Helper\Cache;

class Movies extends Model {

    private $_cache;

    public function __construct() {
        $this->_cache = new Cache();
    }
    
    public function getMovies() {
        $movies = $this->_cache->get('movies');
        
        if( ! $movies ) {
            $movies = $this->db->select("SELECT * FROM {{PREFIX}}movies");
            
            $this->_cache->set('movies', $movies, 3600);
        }
        
        return $movies;
    }
    
    public function getMovie( $movieID ) {
        $movie = $this->_cache->get('movie_' . $movieID);
        
        if( ! $movie ) {
            $movie = $this->db->select("SELECT * FROM {{PREFIX}}movies WHERE movieID = :movieID", [
                ':movieID' => $movieID,
            ]);
            
            $this->_cache->set('movie_' . $movieID, $movie, 3600 );
        }
        
        return $movie;
    }

}
``` 