<?php
/**
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program (see LICENSE.txt in the base directory.  If
 * not, see:
 *
 * @link      <http://www.gnu.org/licenses/>.
 * @author    b3rs3rk
 * @copyright 2016
 */

require(__DIR__ . '/../source/b3rs3rk/steamfront/Main.php');
require(__DIR__ . '/../source/b3rs3rk/steamfront/App.php');

$steamApp = new b3rs3rk\steamfront\App(array());

$testAppID = isset($argv[1]) && is_numeric($argv[1]) ? $argv[1] : 30;

$test = $steamApp->getAppDetails($testAppID);

if ($test instanceof \Httpful\Response) {
	if (isset($test->body)) {
		var_dump($test->body->$testAppID);
		exit(0);
	} else {
		exit(1);
	}
}