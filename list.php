<?php
/**
 * @copyright Copyright (c) 2016, ownCloud, Inc.
 *
 * @author Kavita sonawane<kavita.sonawane@t-systems.com>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

use OCP\Share\IManager;

$config = \OC::$server->getConfig();
$userSession = \OC::$server->getUserSession();

// TODO: move this to the generated config.js
/** @var IManager $shareManager */
$shareManager = \OC::$server->get(IManager::class);
$publicUploadEnabled = $shareManager->shareApiLinkAllowPublicUpload() ? 'yes' : 'no';

$showgridview = $config->getUserValue($userSession->getUser()->getUID(), 'files', 'show_grid', false);

// renders the controls and table headers template
$tmpl = new OCP\Template('nmc_sharing', 'index', '');

// gridview not available for ie
$tmpl->assign('showgridview', $showgridview);
$tmpl->assign('publicUploadEnabled', $publicUploadEnabled);
$tmpl->printPage();
