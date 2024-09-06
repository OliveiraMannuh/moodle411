<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Local plugin "Minha Biblioteca" - Language pack
 *
 * @package    local_boostnavigation
 * @copyright  2017 Alexander Bias, Ulm University <alexander.bias@uni-ulm.de>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'Minha Biblioteca';
$string['auth_xml'] = '<?xml version="1.0" encoding="utf-8"?>
                        <CreateAuthenticatedUrlRequest
                        xmlns="http://dli.zbra.com.br"
                        xmlns:xsd="http://www.w3.org/2001/XMLSchema"
                        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
                        <FirstName>{$a->name}</FirstName>
                        <LastName>{$a->lastname}</LastName>
                        <Email>{$a->username}</Email>
                        <CourseId xsi:nil="true"/>
                        <Tag xsi:nil="true"/>
                        <Isbn xsi:nil="true"/>
                        </CreateAuthenticatedUrlRequest>
                        ';
$string['create_xml'] = '<?xml version="1.0" encoding="utf-8"?>
                        <CreatePreRegisterUserRequest
                        xmlns="http://dli.zbra.com.br"
                        xmlns:xsd="http://www.w3.org/2001/XMLSchema"
                        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
                        <FirstName>{$a->name}</FirstName>
                        <LastName>{$a->lastname}</LastName>
                        <UserName>{$a->username}</UserName>
                        <UserGroupId>2</UserGroupId>
                        </CreatePreRegisterUserRequest>
                        ';

$string['remove_xml'] = '<?xml version="1.0" encoding="utf-8"?>
                        <RemovePreRegisterUserRequest
                        xmlns="http://dli.zbra.com.br"
                        xmlns:xsd="http://www.w3.org/2001/XMLSchema"
                        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
                        <UserName>{$a}</UserName>
                        </RemovePreRegisterUserRequest>';
