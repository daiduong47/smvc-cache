<?php
/**
 * Helper class for caching data
 *
 * LICENSE: The MIT License (MIT)
 *
 * Copyright (c) 2016 Jeffrey Ponsen
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
 * You should have received a copy of the MIT License along with this program.
 * If not, see <https://opensource.org/licenses/MIT>;
 *
 * @category   Helpers\Twig
 *
 * @author     Jeffrey Ponsen <git@studioponsen.nl>
 * @copyright  2016 Studio Ponsen
 * @license    MIT
 *
 * @version    1.0.0
 *
 * @link       https://github.com/jponsen/smvc-cache
 * @since      File available since release 1.0.0
 **/

namespace Helpers;

use phpFastCache\Core\phpFastCache;

/**
 * Class Cache
 * @package Helpers
 */
class Cache {

	/**
	 * @var phpFastCache
	 */
	private $_cache;

	/**
	 * Cache constructor.
	 *
	 * @param string $cacheMethod caching method
	 * @param array  $config      custom configuration settings
	 */
	public function __construct( $cacheMethod = '', $config = [ ] ) {
		$this->_cache = new phpFastCache( $cacheMethod, $config );
	}

	/**
	 * Save data to cache
	 *
	 * @param string $key   cache identifier
	 * @param string $value value of cache
	 * @param int    $time  expiration time
	 *
	 * @return mixed
	 */
	public function set( $key = '', $value = '', $time = 3600 ) {
		return $this->_cache->set( $key, $value, $time );
	}

	/**
	 * Get data from cache
	 *
	 * @param string $key cache identifier
	 *
	 * @return mixed
	 */
	public function get( $key = '' ) {
		return $this->_cache->get( $key );
	}

	/**
	 * Get cache statistics
	 *
	 * @return mixed
	 */
	public function getStats() {
		return $this->_cache->stats();
	}

	/**
	 * Delete data from cache
	 *
	 * @param $key cache identifier
	 *
	 * @return mixed
	 */
	public function deleteCache( $key ) {
		return $this->_cache->delete( $key );
	}

	/**
	 * Delete a cached data
	 *
	 * @return mixed
	 */
	public function deleteAllCaches() {
		return $this->_cache->clean();
	}

	/**
	 * Check if there is any cached data for given key
	 *
	 * @param string $key cache identifier
	 *
	 * @return mixed
	 */
	public function cacheExists( $key = '' ) {
		return $this->_cache->isExisting( $key );
	}

	/**
	 * Extend expiry time for given key
	 *
	 * @param string $key  cache identifier
	 * @param int    $time time to add
	 *
	 * @return mixed
	 */
	public function extendCacheTime( $key = '', $time = 3600 ) {
		return $this->_cache->touch( $key, $time );
	}

}